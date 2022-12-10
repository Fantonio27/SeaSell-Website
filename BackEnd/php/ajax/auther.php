<?php
require_once __DIR__ . "/../functions/acct_ctrl.php";

function auther()
{
    if (checkalive_authkey($_POST['hashkey'], getuseralt($_POST['username'], true))) {
        return true;
    } else {
        return false;
    }
}
