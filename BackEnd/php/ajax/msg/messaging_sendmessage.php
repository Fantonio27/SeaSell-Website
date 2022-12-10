<?php

include_once __DIR__ . "/../../functions/acct_ctrl.php";

$conn = create_conn_mysqli();

$s_uid = getuseralt($_POST['username'], true, $conn);

$stmt = $conn->prepare("INSERT INTO messages (c_id, s_uid, content) VALUES (?, ?, ?)");
$stmt->bind_param("iis", $_POST["convo"], $s_uid, $_POST['content']);
$stmt->execute();
$stmt->close();
$conn->close();


exit("Message sent!");