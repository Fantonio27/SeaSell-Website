<?php
function listing_detail_sifter() {
    $types = ["name", "cat", "act", "desc", "pric", "quan"];
    $details = array();
    foreach ($types as $t) {
        $details[$t] = $_POST[$t];
    }
    return $details;
}
?>