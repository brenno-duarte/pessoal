<?php

header('Content-Type: text/html; charset=utf-8');

session_start();

error_reporting(E_ALL);
ini_set("display_errors", 1);

require 'dependences.php';

$app->get('/',function($request, $response){
    
    return $this->view->render($response, 'home.html', [
        'title' => 'Brenno Duarte - Programador'
    ]);

})->setName('home');

$app->get('/projetos',function($request, $response){
   
    return $this->view->render($response, 'projetos.html', [
        'title' => 'Projetos pessoais',
        'cabecalho' => 'Projetos'
    ]);

})->setName('projetos');

$app->get('/servicos',function($request, $response){
   
    return $this->view->render($response, 'servicos.html', [
        'title' => 'Serviços',
        'cabecalho' => 'Serviços'
    ]);

})->setName('servicos');

$app->get('/novo',function($request, $response){
   
    return $this->view->render($response, 'index.html', [
        'title' => 'Brenno Duarte - Programador',
        'cabecalho' => 'Serviços'
    ]);

})->setName('servicos');

$app->run();
