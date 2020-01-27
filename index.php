<?php

require 'Config.php';
require 'dependences.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$app->get('/',function($request, $response){
   
    return $this->view->render($response, 'index.html', [
        'title' => "SMW Digital | Marketing digital e soluções web em Iguatu - CE",
        'CONTACT' => CONTACT
    ]);

})->setName('home');

$app->run();
