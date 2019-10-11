<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require 'dependences.php';

$app->get('/',function($request, $response){
   
    return $this->view->render($response, 'index.html');

})->setName('home');

$app->run();
