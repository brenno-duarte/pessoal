<?php

$app->get('/sobre', function($request, $response, $args){

    $meta = [
        " Sobre | BDuarte Store",
        'Sistemas online',
        'Brenno Duarte de Lima',
        'index',
        'follow'
    ];

    $tags = SEOTags::metaTags($meta);

    return $this->view->render($response, 'sobre.html');

})->setName('sobre');

$app->get('/{nome}', function($request, $response, $args){
    
    $stmt = DB::prepare("SELECT * FROM sistemas WHERE nome = '".$args['nome']."'");
    $stmt->execute();
    $res = $stmt->fetch();

    $stmt2 = DB::prepare("SELECT * FROM fotos WHERE idsistema = '".$res['idsistema']."'");
    $stmt2->execute();
    $res2 = $stmt2->fetchAll();

    $meta = [
        $res['tipo'] . " " . $res['nome'] . " | BDuarte Store",
        'Sistemas online',
        'Brenno Duarte de Lima',
        'index',
        'follow'
    ];

    $tags = SEOTags::metaTags($meta);

    return $this->view->render($response, 'compra.html', [
        'meta' => $tags,
        'sistemas' => $res,
        'fotos' => $res2
    ]);

})->setName('compra');