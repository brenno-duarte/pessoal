<?php

require_once ROOT_PATH. '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mail {

    private $mail;

    public function __construct(string $host, string $user, string $pass, string $secure, int $port) {
        $this->mail = new PHPMailer(true);

        $this->mail->SMTPDebug = 2;
        $this->mail->isSMTP();
        $this->mail->Host       = $host;
        $this->mail->SMTPAuth   = true;
        $this->mail->Username   = $user;
        $this->mail->Password   = $pass;
        $this->mail->SMTPSecure = $secure;
        $this->mail->Port       = $port;
        $this->mail->setLanguage('br');
    }

    public function add(string $remetente, string $nomeRemet, string $destinatario, string $nomeDest){
        $this->mail->setFrom($remetente, $nomeRemet);
        $this->mail->addAddress($destinatario, $nomeDest);
    }

    public function send(string $subject, string $body, string $altbody){
        try {
            $this->mail->isHTML(true);
            $this->mail->CharSet = 'utf-8';
            $this->mail->Subject = $subject;
            $this->mail->Body    = $body;
            $this->mail->AltBody = $altbody;
    
            $this->mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }
}