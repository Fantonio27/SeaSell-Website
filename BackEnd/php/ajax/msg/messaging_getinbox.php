<?php
require_once __DIR__ . "/../auther.php";
require_once __DIR__ . "/../../base/connectors.php";

if (!auther()) {
    exit("NOAUTH");
}

$conn = create_conn_mysqli();

$stmt = $conn->prepare('WITH PREL AS (
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
    WHERE users.user_username = ? 
        OR negotiator = ?),
    PREL3 AS (
    SELECT 
            `cid`,
            `owner`,
            `negotiator`,
            `item`,
            messages.`content` as lastmsg, 
            messages.`date` as lastwhen,
            messages.`type` as lasttype,
            ROW_NUMBER() OVER (PARTITION BY `cid` ORDER BY `date` DESC) rn
        FROM PREL2
        JOIN messages ON cid = messages.c_id
        )
    SELECT `cid`,
            `owner`,
            `negotiator`,
            `item`,
            `lastmsg`,
            `lastwhen`,
            `lasttype`
    FROM PREL3 WHERE rn = 1 ORDER BY `lastwhen` DESC;');
$stmt->bind_param("ss", $_POST["username"], $_POST["username"]);
$stmt->bind_result($cid, $owner, $negotiator, $item, $lastmessage, $lastwhen, $lasttype);
$stmt->execute();
$stmt->store_result();

$msgs = [];

while ($stmt->fetch()) {
    array_push($msgs, [$cid, $owner, $negotiator, $item, $lastmessage, $lastwhen, $lasttype]);
}

echo json_encode($msgs);
exit();
