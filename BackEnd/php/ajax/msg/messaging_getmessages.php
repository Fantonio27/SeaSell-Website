<?php
include_once __DIR__ . "/../../functions/acct_ctrl.php";
include_once __DIR__ . "/../auther.php";

if (!auther()) {
    exit("NOAUTH");
}

$conn = create_conn_mysqli();

$stmtchk = $conn->prepare('WITH PREL AS (
    SELECT 
        conversations_id as `cid`,
        listings.li_user as `owner_uid`,
        listings.li_name as `item`,
        users.user_username as `negotiator`
    FROM conversations
    JOIN listings ON target_listing = listings.listing_id
    JOIN users ON negotiator = users.user_id),
    PREL2 AS (
    SELECT 
        cid,
        users.user_username as `owner`,
        item,
        negotiator
    FROM PREL
    JOIN users ON users.user_id = PREL.`owner_uid`
    WHERE cid = 1 AND 
        (users.user_username = ? 
	    OR negotiator = ?))
    SELECT COUNT(*) from PREL2;
');
$stmtchk->bind_param("ss", $_POST['username'], $_POST['username']);
$stmtchk->bind_result($count);
$stmtchk->execute();
while ($stmtchk->fetch()) {
    if ($count < 1) {
        exit("NOAUTH");
    }
}
$stmtchk->close();
unset($stmtchk, $count);

switch ($_POST["purpose"]) {
    case "populate":
        $stmt = $conn->prepare("SELECT 
            messages_id as `mid`,
            users.user_username as `whosent`,
            `date`,
            `content`,
            `type`,
            `values`
            FROM messages 
            JOIN users ON `s_uid` = users.user_id
            WHERE c_id = ?
            ORDER BY messages_id DESC
            LIMIT 15;");
        $stmt->bind_param("i", $_POST['cid']);
        $stmt->bind_result($mid, $whosent, $date, $content, $type, $values);
        $stmt->execute();
        $stmt->store_result();
        $arr = [];
        while ($stmt->fetch()) {
            array_push($arr, [$mid, $whosent, $date, $content, $type, $values]);
        }
        break;
    case "append":
        $stmt = $conn->prepare("SELECT 
            messages_id as `mid`,
            users.user_username as `whosent`,
            `date`,
            `content`,
            `type`,
            `values`
            FROM messages 
            JOIN users ON `s_uid` = users.user_id
            WHERE c_id = ? AND messages_id > ?
            ORDER BY messages_id ASC LIMIT 15;");
        $stmt->bind_param("i", $_POST['cid'], $_POST['mid']);
        $stmt->bind_result($mid, $whosent, $date, $content, $type, $values);
        $stmt->execute();
        $stmt->store_result();
        $arr = [];
        while ($stmt->fetch()) {
            array_push($arr, [$mid, $whosent, $date, $content, $type, $values]);
        }
        break;
    case "rewind":

        break;
}

echo json_encode($arr);
$stmt->close();
$conn->close();
unset($conn);
unset($stmt);

exit();
