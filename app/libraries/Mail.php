<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require APPROOT . '/mail/src/Exception.php';
require APPROOT . '/mail/src/PHPMailer.php';
require APPROOT . '/mail/src/SMTP.php';
class Mail
{
    public $mail;
    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug = SMTP::DEBUG_OFF; // Set to 0 for production
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'medsupplyxinfo@gmail.com'; // SMTP username
        $this->mail->Password = 'ectyialdgvecadjt'; // SMTP password
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $this->mail->Port = 465; // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    }
    public function send($to, $subject, $body)
    {
        try {
            $this->mail->setFrom('medsupplyxinfo@gmail.com', 'MedsupplyX');
            $this->mail->addAddress($to);
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $body;
            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function sendConfirmationEmailToPharmacy($email, $name)
    {
        $subject = 'Pharmacy Registration Confirmation';
        $body = 'Hello ' . $name . ', <br> Your registration has been approved. 
        <br> Thank you for registering with us.
        click Here to login 
        <br> <a href="http://localhost/medsupplyx/users/login">
        <button style="background-color:#00607f;color:white;padding:10px 25px;border-radius:5px;"> LOGIN </button> </a>';
        return $this->send($email, $subject, $body);
    }
    

    public function sendConfirmationEmailToSupplier($email, $name)
    {
        $subject = 'Supplier Registration Confirmation';
        $body = 'Hello ' . $name . ', <br> Your registration has been approved. 
        <br> Thank you for registering with us.
        click Here to login 
        <br> <a href="http://localhost/medsupplyx/users/login">
        <button style="background-color:#00607f;color:white;padding:10px 25px;border-radius:5px;"> LOGIN </button> </a>';
        return $this->send($email, $subject, $body);
    }

    public function sendConfirmationEmailToManager($email, $name)
    {
        $subject = 'Manager Registration Confirmation';
        $body = 'Hello ' . $name . ', <br> Your registration has been approved. 
        <br> Thank you for registering with us.
        <br> <h1> Here is the Login Details </h1>
        <br> Username : ' . $email . ' 
        <br> Password : ' . 123456 . '
        <br> <br> click Here to login and you can change your password after login
        <br> <a href="http://localhost/medsupplyx/users/login">
        <button style="background-color:#00607f;color:white;padding:10px 25px;border-radius:5px;"> LOGIN </button> </a>';
        return $this->send($email, $subject, $body);
    }

    public function sendAccountDeletedEmail($email, $name ,$reason)
    {
        $subject = 'Your Account Was Deactivated';
        $body = 'Hello ' . $name . ', 
        <br> Your account has been deactivated by the Manager. because of ' . $reason . ', 
        <br> Please contact Manager to get more details.';
        return $this->send($email, $subject, $body);
    }

    public function sendForgotPasswordEmail($email, $name, $password) 
    {
        $subject = 'Forgot Password';
        $body = 'Hello ' . $name . ', 
        <br> Your password has been reset by the Manager. 
        <br> Here is your new password : ' . $password . ' 
        <br> Please change your password after login.';
        return $this->send($email, $subject, $body);
    }
}
