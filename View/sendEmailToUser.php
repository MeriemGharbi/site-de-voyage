<?php
session_start();
if(isset($_SESSION['email'])){
    $email=$_SESSION['email']; 
    include "PHPMailer/src/PHPMailer.php";
    include "PHPMailer/src/Exception.php";
    include "PHPMailer/src/SMTP.php";
$mail = new \PHPMailer\PHPMailer\PHPMailer();
$mail->isSMTP(true);
$mail->Host = 'smtp.gmail.com';
$mail->Port = '587';
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls'; 
$mail->isHTML(true);
$mail->Username = 'firas1.rfrf@gmail.com'; 
$mail->Password = 'jlqepropgjuciisi'; 
$mail->SetFrom('firas1.rfrf@gmail.com'); 
$mail->addAddress($email); 
$mail->Subject = 'Xplore,forgot Password';
$mail->Body = '<p align=center>Hi,

Forgotten your password?

You have been sent this email because we received a request to reset the password to your Xplore account.

To do this, please click the href below to enter a new password of your choice.

Regards,

Xplore Support</p><br>
<a href="http://localhost/CRUD_USER/View/phoneResetPassword.php">change Password</a>';
if(!$mail->send()) {
    echo 'Erreur! Mail non envoyé !';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
else {
    echo '<script>alert("check your email!!");</script>';
    echo '<script>window.location.href = "login.php";</script>';
     }}
     else{
        header('Location:login.php');
     }
?>
