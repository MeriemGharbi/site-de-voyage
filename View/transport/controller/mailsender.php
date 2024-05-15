<?php
    // for sending mails
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
class MailSender
{
    private $user_name, $password, $email_to_send_to, $subject, $msg;

    public function __construct()
    {
        $this->user_name = 'cashogo.tn@gmail.com';
        $this->password = 'sznc taqr oqzc lpjk';
    }

    public function set_user_name($val)
    {
        $this->user_name = $val;
    }

    public function get_user_name()
    {
        return $this->user_name;
    }

    public function set_password($val)
    {
        $this->password = $val;
    }

    public function get_password()
    {
        return $this->password;
    }

    public function set_email_to_send_to($val)
    {
        $this->email_to_send_to = $val;
    }

    public function get_email_to_send_to()
    {
        return $this->email_to_send_to;
    }

    public function set_subject($val)
    {
        $this->subject = $val;
    }

    public function get_subject()
    {
        return $this->subject;
    }

    public function set_msg($val)
    {
        $this->msg = $val;
    }

    public function get_msg()
    {
        return $this->msg;
    }

    public function send_normal_mail($email_to_send_to, $email_subject, $email_msg){
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username =  $this->get_user_name(); # 'cashogo.tn@gmail.com';
            $mail->Password = $this->get_password(); # 'sznc taqr oqzc lpjk';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom($mail->Username);

            $mail->addAddress($email_to_send_to);

            $mail->isHTML(true);
            $mail->Subject = $email_subject;
            $mail->Body    = $email_msg;

            $mail->send();
            #echo 'Message has been sent';
            return "mail sent";
        }
        catch (Exception $e) {
            #echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return "$mail->ErrorInfo";
        }
    }
    public function send_email($email, $name, $date){
        $Username =  'cashogo.tn@gmail.com';
        $Password = 'sznc taqr oqzc lpjk';
        $mail_sender = new MailSender();

        $email_to_send_to = $email;

        $subject = "Bienvenue Mr.$name";
        $msg = "Votre réservation est bien confirmée à $date.";

        $mail_send_res = $mail_sender->send_normal_mail($email_to_send_to, $subject, $msg);

        if ($mail_send_res == "mail sent") {
        } else {
            return "error : " . $mail_send_res;
        }
    }

    
}
?>