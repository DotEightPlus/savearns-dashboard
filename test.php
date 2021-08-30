<?php
session_start();

$to = $email;
$from = "noreply@savearns.com";

$headers = "From: " . $from . "\r\n";
$headers .= "Reply-To: ". $from . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
$headers .= "X-Priority: 1 (Highest)\n";
$headers .= "X-MSMail-Priority: High\n";
$headers .= "Importance: High\n";

$subject = $subj;

$logo = 'https://savearns.com/assets/3.png';
$url = 'https://savearns.com/';

$body = "
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <title>Savearns</title>
</head>
<link rel='stylesheet' href='https://savearns.com/assets/css/bootstrap.min.css'>

<body style='text-align: center;'>";
    $body .= "<section style='margin: 30px; margin-top: 50px ; background: #34459C; color: #fff;'>";
        $body .= "<img style='margin-top: 35px; width: 460px; height: 105px;' src='{$logo}' alt='DotPedia'>";
        $body .= "<h1 style='margin-top: 45px; color: #fff'>Activate your email to continue</h1>
        <br />";
        $body .= "<h3 style='margin-left: 45px; margin-top: 34px; text-align: left; font-size: 17px;'>Hi there! <br /><br />
            Kindly use the otp below to activate your account;</h3>
        <br />";
        $body .= "<h2 style='margin-left: 45px; text-align: center;'><b>{$activator} 7473473</b></h2>
        <br />";
        $body .= "<p style='margin-left: 45px; padding-bottom: 80px; text-align: left;'>Do not bother replying this
            email. This is a virtual email</p>";
        $body .= "<p text-align: center;'><a href='https://savearns.com/contact'><img style='width:150px;heght:150px'
                    src='https://savearns.com/assets/footer.png'></a>";
            $body .= "
        <h6 style='text-align: center;'>Email.: <span style='color: #fff'>savings@savearns.com</span></h6>";
        $body .= "<h6 style='text-align: center;'>Call/Chat.: <span style='color: #fff'>+234(0) 810 317 1902</span>
        </h6>";
        $body .= "<h4 style='text-align: center; padding-bottom: 80px; padding-top: 40px;'>Team Savearns</h4>";    
        $body .= "<script src='https://savearns.com/vendors/bootstrap/bootstrap.min.js'></script>";
        $body .= "
    </section>";
    $body .= "</body>

</html>";
echo $_SESSION[''];

?>