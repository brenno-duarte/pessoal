<?php

$app->get('/sobre', function($request, $response, $args){

    $meta = [
        "Sobre | BDuarte Store",
        'Sistema de vendas, consultório médico, ordem de serviço e muito mais totalmente 
        adaptados para seu celular.',
        'Brenno Duarte de Lima, BDuarte Store',
        'index',
        'follow'
    ];

    $link = [
        'http://bduartestore.com.br/sobre'
    ];

    $tags = SEOTags::metaTags($meta);
    $tags2 = SEOTags::linkTags($link);

    return $this->view->render($response, 'sobre.html', [
        'meta' => $tags,
        'link' => $tags2,
    ]);

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
        $res['descricao'],
        'Brenno Duarte de Lima',
        'index',
        'follow'
    ];

    $link = [
        'http://bduartestore.com.br/'.$res['nome']
    ];

    $tags = SEOTags::metaTags($meta);
    $tags2 = SEOTags::linkTags($link);

    return $this->view->render($response, 'compra.html', [
        'meta' => $tags,
        'link' => $tags2,
        'sistemas' => $res,
        'fotos' => $res2
    ]);

})->setName('compra');