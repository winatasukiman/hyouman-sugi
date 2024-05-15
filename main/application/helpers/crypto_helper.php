<?php

/**
 * Used for `1 time use` invitation token.
 */
function secret_token_for_team($team_id) {

    // Enryption
    // $encrypted = bin2hex(openssl_encrypt($text,'AES-128-CBC', $key));

    // Hash functions
    date_default_timezone_set('Asia/Jakarta'); 
    $secret = $team_id." ".date("Y-m-d H:i:s", time());

    // sha1 40digits
    // $token = sha1($secret);

    // sha512 128digits
    // $token = hash("sha512", $secret);

    // md5 raw 16 binary format / 32 characters hex number
    $token = md5($secret);
    return $token;
}

/**
 * Used for open recruitment token.
 */
function convert_secret_to_hash($secret) {
    return md5($secret);
}

?>