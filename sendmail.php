<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//header('Content-Type: application/json');

$name = htmlspecialchars($_POST['fullname']);
$email = htmlspecialchars($_POST['email']);
$message = htmlspecialchars($_POST['message']);

$mail = new PHPMailer(true);

try {

    // SMTP SETTINGS (example: Gmail)
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'noreply@stratapartnersng.com';
    $mail->Password = '*****';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    // SENDER & RECEIVER
    $mail->setFrom('noreply@stratapartnersng.com', 'Strata Partners');
    $mail->addAddress('extendavidba4@gmail.com', 'Strata Partners Consumer Message');
    $mail->addReplyTo($email, $name);

    // CONTENT
    $mail->isHTML(true);
    $mail->Subject = "Consumer Form Message";
    $mail->Body = "
        <h3>New Message</h3>
        <p><b>Name:</b> $name</p>
        <p><b>Email:</b> $email</p>
        <p><b>Message:</b><br>$message</p>
    ";

    //     $mail->send();

    //     echo "success";
    // } catch (Exception $e) {
    //     echo "Mailer Error: " . $mail->ErrorInfo;
    // }
    $mail->send();

    echo json_encode([
        "status" => "success"
    ]);
    exit;
} catch (Exception $e) {
    http_response_code(500);

    echo json_encode([
        "status" => "error",
        "message" => $mail->ErrorInfo
    ]);
    exit;
}
