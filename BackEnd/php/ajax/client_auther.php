<?php

require_once __DIR__ . "./auther.php";

if (auther()) {
    exit("OKAUTH");
} else {
    exit("NOAUTH");
}
