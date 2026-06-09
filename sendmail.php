<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

header('Content-Type: application/json');

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$mail = new PHPMailer(true);

try {

    // SMTP SETTINGS (example: Gmail)
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'stratapartners@gmail.com';   // your email
    $mail->Password = 'your_app_password';     // Gmail App Password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // SENDER & RECEIVER
    $mail->setFrom($email, $name);
    $mail->addAddress('stratapartners@gmail.com'); // receiver email

    // CONTENT
    $mail->isHTML(true);
    $mail->Subject = "Consumer Form Message";
    $mail->Body = "
        <h3>New Message</h3>
        <p><b>Name:</b> $name</p>
        <p><b>Email:</b> $email</p>
        <p><b>Message:</b><br>$message</p>
    ";

    $mail->send();

    echo json_encode(["status" => "success"]);

} catch (Exception $e) {
    echo json_encode(["status" => "error", "message" => $mail->ErrorInfo]);
}
?>