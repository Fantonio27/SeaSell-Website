<?php

require __DIR__ . "/../../functions/acct_ctrl.php";
require_once __DIR__ . "/../cleaner.php";

try {
    exit("SUCCESS:" . log_in(
        cleandata($_POST['username']),
        cleandata($_POST['passhash'])
    ));
} catch (Exception $ex) {
    exit("ERROR:" . $ex->__toString());
}



//Insert here 