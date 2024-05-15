<html> 
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
<link href='https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;700&display=swap' rel='stylesheet'>
</head>
<style>
    p{ color:#28557B; }
</style>
<body>
    <div style='height:100%;margin:0;padding:20px 0 20px 0;background-color:#f2f4f6;color:#28557B;width:100%!important'>
        <table style='width:570px;margin:0 auto;padding:20px 50px 20px 50px;background-color:#fff;background-image: url("<?= base_url('assets/img/bgisi2.png') ?>");background-position: center;background-repeat: no-repeat;background-size: cover;' align='center' width='570' cellpadding='0' cellspacing='0' role='presentation'>
            <tbody>
                <tr>
                    <td align='center'><img src='<?= base_url('assets/img/navbar/logokecil.png') ?>' alt='' style='display: block;' /></td>
                </tr>
                <tr>
                    <td align='center'><p>Please <b>VERIFY</b> your email</td>
                </tr>
                <tr>
                    <td><p>You have requested to register at <?php date_default_timezone_set('UTC'); echo date('Y-m-d H:i:s');?> as a {role} in <b>The Hyouman</b> platform. To activate it, kindly verify this email by clicking on the Verify Email button below.</p></td>
                </tr>
                <tr>
                    <table cellpadding='0' cellspacing='0' width='100%'>
                        <tr>
                            <td align='right'>
                                <img src='<?= base_url('assets/img/email/iconoren.png') ?>'/>
                            </td>
                            <td>
                                <a style='color: #28557B !important;
                                    background-color: white !important;
                                    border: 2px solid #28557B !important;
                                    padding: 10px 20px;
                                    margin: 0 auto;
                                    border-radius: 10px;box-shadow: none !important;
                                    outline: none !important;text-decoration:none;' href="{email_link}"><b>Verify Email</b></a>
                            </td>
                        </tr>
                    </table>
                </tr>
                <tr>
                    <td><p>Happy Learning,<br><b>Hyouman Team</b></p></td>
                </tr>
                <tr>
                    <td><p>Please ignore this email if you did not register an account through Hyouman</p></td>
                </tr>
            </tbody>
        </table>
        <table style='width:570px;margin:0 auto;padding:20px 50px 20px 50px;background-color:#f2f4f6;' align='center' width='570' cellpadding='0' cellspacing='0' role='presentation'>
            <tbody>
                <tr>
                    <td align='center'>
                        <a href='https://www.instagram.com/thehyouman/  ' style='text-decoration:none;'>
                        <img border='0' src='<?= base_url('assets/img/email/instagram.png') ?>' width='50' height='50'>
                        <a href='https://www.facebook.com/thehyouman/' style='text-decoration:none;'>
                        <img border='0' src='<?= base_url('assets/img/email/facebook.png') ?>' width='50' height='50'>
                        <a href='https://www.youtube.com/channel/UC0hIfMy8dUfxc3S_1HOBJcA' style='text-decoration:none;'>
                        <img border='0' src='<?= base_url('assets/img/email/youtube.png') ?>' width='50' height='50'>
                    </td>
                </tr>
                <tr>
                    <td align='center'><p>Kindly follow our social media to get more information about Hyouman</p></td>
                </tr>
                <tr>
                    <td align='center'><p>This message was sent to <b>{user_email}</b> at your request.<br>The Hyouman, Jl. Mayjen HR. Muhammad No.371, Pradahkalikendal, Kec. Dukuhpakis, Kota SBY, Jawa Timur 60189, Indonesia</p></td>
                </tr>
            </tbody>
        </table>
    </div>
</body> 
</html>