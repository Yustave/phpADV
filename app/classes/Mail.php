<?php

namespace App\Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Mail{
    private $mail;

    public function __construct(){
        $this->mail = new PHPMailer();
        $this->setUp();
    }

    public function setUp(){
        $this->mail->SMTPDebug = 2;
        $this->mail->isSMTP();
        $this->mail->Host = getenv("SMTP_HOST");
        $this->mail->SMTPAuth = true;
        $this->mail->Username = getenv("EMAIL_USERNAME");
        $this->mail->Password = getenv("EMAIL_PASSWORD");
        $this->mail->Port = getenv("SMTP_PORT");

        $this->mail->isHTML(true);
        $this->mail->SingleTo = true;

        $this->mail->From = getenv("ADMIN_EMAIL");
        $this->mail->FromName = "E-Commerce";
    }

    public function send(){
        $body = "To sign up for Gmail, create a Google Account. You can use the username and password to sign in to Gmail and other Google products like YouTube, Google Play, and Google Drive.";
        $this->mail->addAddress("mizukiakaman@gmail.com","Yustave");
        $this->mail->Subject = "Testing";
        $this->mail->Body = $body;

        return $this->mail->send();
    }
}

?>