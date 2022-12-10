<?php

require __DIR__ . "/../functions/acct_ctrl.php";
require_once __DIR__ . "/cleaner.php";

try {
    exit("SUCCESS:" . register_fasttrack(
        cleandata($_POST['username']), 
        cleandata($_POST['password']), 
        cleandata($_POST['region']), 
        cleandata($_POST['city']), 
        cleandata($_POST['email']), 
        cleandata($_POST['phone'])
    ));
} catch (Exception $ex) {
    exit("ERROR:" . $ex->__toString());
}



//Insert here 