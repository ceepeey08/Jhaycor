<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require 'dbconn.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $to = $_POST['emailTo'];
    $subject = $_POST['emailSubject'];
    $message = $_POST['emailMessage'];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'estrellachristianpaul@gmail.com';     
        $mail->Password   = 'hqokxhromfvmbxsd';                    
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
        $mail->Port       = 465;                                   

        $mail->setFrom('estrellachristianpaul@gmail.com', 'Christian Paul'); 
        $mail->addAddress($to);  

        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
 
        $stmt = $conn->prepare("INSERT INTO sent_emails (recipient_email, subject, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $to, $subject, $message);
        $stmt->execute();

        echo json_encode(['status' => 'success', 'message' => 'Email sent and saved.']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => $mail->ErrorInfo]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}
