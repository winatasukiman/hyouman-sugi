<?php

function change_datetime_format_from_db($datetime) {
    // $new_Date = substr_replace($datetime,"",10);
    $new_Date = date("j F Y - H:i", strtotime($datetime)); //20 February 2020
    return $new_Date;
}

?>