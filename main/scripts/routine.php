<?php

$url = 'https://www.varena.id/main/routine/';

$data = array(
    'access_token' => 'd050635b899e1e22fe38f95a40b4021c'
);

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

if ($result === FALSE) { /* Handle error */ }

var_dump($result);

?>