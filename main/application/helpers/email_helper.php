<?php 
require 'vendor/autoload.php';
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function send_email($email,$subject,$text)
{
    $mail             = new PHPMailer();

    $body             = $text;
    $body             = preg_replace('/\[\]/','',$body);


    $mail->IsSMTP(); 
    $mail->Host       = "smtp.gmail.com";   
    $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
                                                // 1 = errors and messages
                                                // 2 = messages only
    $mail->Mailer  = 'smtp';
    $mail->SMTPAuth   = true;                 
    $mail->SMTPSecure = "tls";                 
    $mail->Port       = 587;                   
    $mail->Username   = "no-reply@thehyouman.com"; 
    $mail->Password   = "Noreply-thehyouman1";    
    $mail->IsHTML(true);

    $mail->SetFrom('no-reply@thehyouman.com', 'The Hyouman');
    $mail->Subject    = $subject;

    $mail->Body = $body;

    $mail->AddAddress($email, explode("@",$email)[0]);
    //$address = $email;
    /*for ($i=0;$i<count($email);$i++)
    {
        $mail->AddAddress($email[$i], explode("@",$email[$i])[0]);
    }*/
    if(!$mail->Send()) {
        echo 0;
        //echo "Thank you for registering, unfortunately, we cannot deliver payment instruction to your email.<br />";
        //echo $mail->ErrorInfo;
    }else{
        echo 1;
        //echo "Thank you for registering, please check your email for payment instruction.";
    }	
}

function generate_token(){
    $length = 32; // Adjust length to fit your new paranoia level
    $token = bin2hex(random_bytes($length)); // bin2hex output is url safe.
    return $token;
}

?>