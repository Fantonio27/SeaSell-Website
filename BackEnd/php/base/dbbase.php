<?php

function create_conn()
{
    require "./dbcred.php";
    return new mysqli($dbcredentials_servname, $dbcredentials_username, $dbcredentials_password, $dbcredentials_database);
}
