<?php

require ROOT_PATH . "/Sources/DB/DB.php";
require ROOT_PATH . "/Sources/Services/SEOTags.php";

$app->get('/', function($request, $response){
    
    $stmt = DB::prepare('SELECT * FROM sistemas');
    $stmt->execute();
    $res = $stmt->fetchAll();

    $meta = [
        'BDP Store - Adquira sistemas profissionais para seu negócio',
        'Sistemas online',
        'Brenno Duarte de Lima',
        'index',
        'follow'
    ];

    $tags = SEOTags::metaTags($meta);
    
    return $this->view->render($response, 'index.html', [
        'meta' => $tags,
        'sistemas' => $res
    ]);

})->setName('index');

$app->get('/{nome}', function($request, $response, $args){
    
    $stmt = DB::prepare("SELECT * FROM sistemas WHERE nome = '".$args['nome']."'");
    $stmt->execute();
    $res = $stmt->fetch();

    $meta = [
        $res['nome'] . " - BDP Store",
        'Sistemas online',
        'Brenno Duarte de Lima',
        'index',
        'follow'
    ];

    $tags = SEOTags::metaTags($meta);

    return $this->view->render($response, 'compra.html', [
        'meta' => $tags,
        'sistemas' => $res
    ]);

})->setName('compra');

$app->get('/finalizar-compra/{id}/{nome}', function($request, $response, $args){
    
    $nome = $args['nome'];
    $stmt = DB::prepare("SELECT * FROM sistemas WHERE id = '".$args['id']."'");
    $stmt->execute();
    $res = $stmt->fetch();

    $meta = [
        $res['nome'] . " - BDP Store",
        'Sistemas online',
        'Brenno Duarte de Lima',
        'index',
        'follow'
    ];

    $tags = SEOTags::metaTags($meta);

    return $this->view->render($response, 'finalizar.html', [
        'meta' => $tags,
        'sistemas' => $res,
        'nome' => $nome
    ]);

})->setName('finalizar');