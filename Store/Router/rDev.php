<?php

$app->get('/desenvolvedores', function($request, $response){
    
    $stmt = DB::prepare('SELECT * FROM dev');
    $stmt->execute();
    $res = $stmt->fetchAll();

    $meta = [
        'Desenvolvedores | BDuarte Store',
        'Sistema de vendas, consultório médico, ordem de serviço e muito mais totalmente 
        adaptados para seu celular.',
        'Brenno Duarte de Lima, BDuarte Store',
        'index',
        'follow'
    ];

    $link = [
        'http://bduartestore.com.br/desenvolvedores'
    ];

    $tags = SEOTags::metaTags($meta);
    $tags2 = SEOTags::linkTags($link);

    return $this->view->render($response, 'dev.html', [
        'meta' => $tags,
        'link' => $tags2,
        'dev' => $res
    ]);

})->setName('dev');