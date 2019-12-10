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

$app->get('/busca', function($request, $response){
    
    $categoria = filter_input(INPUT_GET, 'categoria');
    $stmt = DB::prepare("SELECT * FROM sistemas WHERE categoria = '$categoria'");
    $stmt->execute();
    $res = $stmt->fetchAll();
    
    $meta = [
        'BDP Store - Resultados de busca para '. $categoria,
        'Sistemas online',
        'Brenno Duarte de Lima',
        'index',
        'follow'
    ];

    $tags = SEOTags::metaTags($meta);
    
    return $this->view->render($response, 'index.html', [
        'meta' => $tags,
        'sistemas' => $res,
        'categoria' => $categoria
    ]);

})->setName('index');

$app->get('/{nome}', function($request, $response, $args){
    
    $stmt = DB::prepare("SELECT * FROM sistemas WHERE nome = '".$args['nome']."'");
    $stmt->execute();
    $res = $stmt->fetch();

    $stmt2 = DB::prepare("SELECT * FROM fotos WHERE idsistema = '".$res['idsistema']."'");
    $stmt2->execute();
    $res2 = $stmt2->fetchAll();

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
        'sistemas' => $res,
        'fotos' => $res2
    ]);

})->setName('compra');

$app->get('/finalizar-compra/{id}/{nome}', function($request, $response, $args){
    
    $nome = $args['nome'];
    $stmt = DB::prepare("SELECT * FROM sistemas WHERE id = '".$args['id']."'");
    $stmt->execute();
    $res = $stmt->fetch();
    #var_dump($res['valor']);
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
        'nome' => $nome,
        'valor' => $res['valor'].".00"
    ]);

})->setName('finalizar');