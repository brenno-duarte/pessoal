<?php

require ROOT_PATH . "/Sources/DB/DB.php";
require ROOT_PATH . "/Sources/Services/SEOTags.php";

$app->get('/', function($request, $response){
    
    $stmt = DB::prepare('SELECT * FROM sistemas');
    $stmt->execute();
    $res = $stmt->fetchAll();

    $meta = [
        'BDuarte Store | Adquira sistemas web e desktop profissionais para seu negócio',
        'Sistema de vendas, consultório médico, ordem de serviço e muito mais totalmente 
        adaptados para seu celular.',
        'Brenno Duarte de Lima, BDuarte Store',
        'index',
        'follow'
    ];

    $link = [
        'http://bduartestore.com.br'
    ];

    $tags = SEOTags::metaTags($meta);
    $tags2 = SEOTags::linkTags($link);

    return $this->view->render($response, 'index.html', [
        'meta' => $tags,
        'link' => $tags2,
        'sistemas' => $res
    ]);

})->setName('index');

$app->get('/busca', function($request, $response){
    
    $categoria = filter_input(INPUT_GET, 'categoria');
    $stmt = DB::prepare("SELECT * FROM sistemas WHERE categoria = '$categoria'");
    $stmt->execute();
    $res = $stmt->fetchAll();
    
    $meta = [
        'Resultados de busca para '. $categoria. ' | BDuarte Store' ,
        'Sistema de vendas, consultório médico, ordem de serviço e muito mais totalmente 
        adaptados para seu celular.',
        'Brenno Duarte de Lima, BDuarte Store',
        'index',
        'follow'
    ];

    $link = [
        'http://bduartestore.com.br'
    ];

    $tags = SEOTags::metaTags($meta);
    $tags2 = SEOTags::linkTags($link);
    
    return $this->view->render($response, 'index.html', [
        'meta' => $tags,
        'link' => $tags2,
        'sistemas' => $res,
        'categoria' => $categoria
    ]);

})->setName('index');

$app->get('/contato', function($request, $response){

    $meta = [
        'Contato | BDuarte Store',
        'Sistema de vendas, consultório médico, ordem de serviço e muito mais totalmente 
        adaptados para seu celular.',
        'Brenno Duarte de Lima, BDuarte Store',
        'index',
        'follow'
    ];

    $link = [
        'http://bduartestore.com.br/contato'
    ];

    $tags = SEOTags::metaTags($meta);
    $tags2 = SEOTags::linkTags($link);
    
    $msg = $this->flash->getFirstMessage('send');
    return $this->view->render($response, 'contato.html', [
        'meta' => $tags,
        'link' => $tags2,
        'msg' => $msg
    ]);

})->setName('contato');

$app->post('/contato', function($request, $response){

    $nome = filter_input(INPUT_POST, 'nome');
    $email = filter_input(INPUT_POST, 'email');
    $mensagem = filter_input(INPUT_POST, 'mensagem');

    $sql = "INSERT INTO mensagens (nomeMsg, emailMsg, mensagem) VALUES (:nomeMsg, :emailMsg, :mensagem)";
    $stmt = DB::prepare($sql);
    $stmt->bindValue(":nomeMsg", $nome);
    $stmt->bindValue(":emailMsg", $email);
    $stmt->bindValue(":mensagem", $mensagem);
    $stmt->execute();

    $this->flash->addMessage('send', 'Mensagem enviada com sucesso');
    return $response->withRedirect($this->router->pathFor('contato'));

})->setName('contato');