<?php

require 'Config.php';
require 'dependences.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$app->get('/',function($request, $response){
   
    return $this->view->render($response, 'index.html', [
        'title' => "Brenno Duarte | Programador de sites e sistemas - Iguatu CE"
    ]);

})->setName('home');

$app->get('/realizar-orcamento',function($request, $response){
    
    $submit = filter_input(INPUT_GET, 'submit');

    return $this->view->render($response, 'contato.html', [
        'title' => "Brenno Duarte | Contato",
        'submit' => $submit
    ]);

})->setName('orcamento');

$app->post('/realizar-orcamento',function($request, $response){

    $nome = filter_input(INPUT_POST, 'name');
    $email = filter_input(INPUT_POST, 'email');
    $fone = filter_input(INPUT_POST, 'fone');
    $msg = filter_input(INPUT_POST, 'message');

    // var_dump($nome, $email, $fone, $msg);
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host       = 'smtp.live.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'brennoduarte2015@outlook.com';
        $mail->Password   = 'b3st1nth3w0rld@0utl00k';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom('brennoduarte2015@outlook.com', 'Projeto');
        $mail->addAddress('brennoduarte2015@outlook.com', 'Brenno Duarte - Programador');

        // Content
        $mail->isHTML(true);
        $mail->setLanguage('br');
        $mail->Charset = 'utf-8';
        $mail->Subject = 'Novo projeto!';
        $mail->Body    = 
        "<div>
            <h1 style='color: #1E90FF;'>Novo projeto!</h1>
            <p>Nome do lead: $nome</p>
            <p>E-mail do lead: $email</p>
            <p>Telefone do lead: $fone</p>
            <p>Mensagem: $msg</p>
        </div>";
        $mail->AltBody = "Novo Projeto! Nome: $nome; E-mail: $email; Telefone: $fone; Mensagem: $msg";

        $mail->send();
        echo 'Message has been sent';

        return $response->withRedirect('realizar-orcamento?submit=true');
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

})->setName('orcamento');

$app->run();
