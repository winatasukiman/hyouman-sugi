<?php 

function send_sms($gsm, $sms_text) {
    $curl = curl_init();
    $post_data = array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'http://api.nusasms.com/api/v3/sendsms/plain',
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => array(
            'user' => '<replace-me>',
            'password' => '<replace-me>',
            'SMSText' => $sms_text,
            'GSM' => $gsm,
            'OTP' => 'Y',
            'output' => 'json'
        )
    );
    curl_setopt_array($curl, $post_data);
    $resp = curl_exec($curl);
    if (!$resp) {
        die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
    } else {
        echo $resp;
    }
    curl_close($curl);
    echo "SENT";
}
?>