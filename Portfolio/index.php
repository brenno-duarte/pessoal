<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require 'Config.php';
require 'dependences.php';

$app->get('/',function($request, $response){
   
    return $this->view->render($response, 'index.html');

})->setName('home');

$app->get('/sistemas',function($request, $response){

    try {
        $pdo = new PDO("sqlite:banco/sistemas.db");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare('select * from sistemas');
        $stmt->execute();
        $res = $stmt->fetchAll();

        echo '<pre>';
        var_dump($res);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    
    return $this->view->render($response, 'sistemas.html', [
        'sistemas' => $res
    ]);

})->setName('sistemas');

$app->run();
