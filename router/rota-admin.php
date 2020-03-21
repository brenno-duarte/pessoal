<?php

$app->get('/admin', function($request, $response){

    $msg1 = $this->flash->getFirstMessage('erroLoginG');
    return $this->view->render($response, "blog/views-gestor/login.html", [
        'title' => 'Login no Blog',
        'msg1' => $msg1
    ]);

})->setName('admin');

$app->post('/admin', function($request, $response){

    $email = filter_input(INPUT_POST, 'email');
    $senha = filter_input(INPUT_POST, 'senha');
    $validar = AdminController::login($email, $senha);
    
    if (isset($validar)) {
        $_SESSION['idAdm'] = $validar['idAdm'];
        $_SESSION['nomeAdm'] = $validar['nomeAdm'];
        $_SESSION['emailAdm'] = $validar['emailAdm'];
        $_SESSION['senhaAdm'] = $validar['senhaAdm'];
        $_SESSION['contatoAdm'] = $validar['contatoAdm'];
        $_SESSION['acesso'] = $validar['acesso'];
        setcookie('nomeAdm', $validar['nomeAdm']);
        return $response->withRedirect($this->router->pathFor('adminPainel'));
    } else {
        $this->flash->addMessage('erroLoginG', 'E-mail e/ou senha incorretos');
        return $response->withRedirect($this->router->pathFor('admin'));
    }
    
})->setName('admin');

$app->get('/admin/posts', function($request, $response){

    if ($_SESSION['idAdm']) {
        $pagina_atual = filter_input(INPUT_GET, 'pag');
        $itens_pagina = 3;

        if (empty($pagina_atual)) {
            $pagina_atual = '1';
        }

        $inicio = ($itens_pagina * $pagina_atual) - $itens_pagina;
        $blogTotal = BlogController::listar();
        $total = count($blogTotal);
        $qnt_pag = ceil($total/$itens_pagina);

        # Páginas anteriores
        $vA1 = $pagina_atual - $itens_pagina;
        $vA2 = $pagina_atual - 1;

        # Páginas posteriores
        $vP1 = $pagina_atual + 1;
        $vP2 = $pagina_atual + $itens_pagina;

        $blog = BlogController::listarLimite($inicio, $itens_pagina);
        
        $msg1 = $this->flash->getFirstMessage('postAdd');
        $msg2 = $this->flash->getFirstMessage('postAlt');
        $msg3 = $this->flash->getFirstMessage('postDel');
        $msg4 = $this->flash->getFirstMessage('erroAcesso');
        return $this->view->render($response, "blog/views-gestor/painel-blog.html", [
            'title' => 'Painel do Blog',
            'noticias' => $blog,
            'msg1' => $msg1,
            'msg2' => $msg2,
            'msg3' => $msg3,
            'msg4' => $msg4,
            'pag_atual' => $pagina_atual,
            'valorAnt1' => $vA1,
            'valorAnt2' => $vA2,
            'valorPost1' => $vP1,
            'valorPost2' => $vP2,
            'qntPag' => $qnt_pag
        ]);
    } else {
        return $response->withRedirect($this->router->pathFor('admin'));
    }

})->setName('adminPainel');

$app->get('/admin/sobre', function($request, $response){

    if ($_SESSION['idAdm']) {
        return $this->view->render($response, "blog/views-gestor/sobre.html", [
            'title' => 'Sobre',
            'dev' => SYSTEM_INFO['DEV'],
            'version' => SYSTEM_INFO['VERSION'],
            'dateVersion' => SYSTEM_INFO['DATE_UPDATE']
        ]);
    } else {
        return $response->withRedirect($this->router->pathFor('admin'));
    }

})->setName('sobre');

$app->get('/logout', function($request, $response){

    setcookie("nomeUsu", NULL, -1);
    setcookie("nomeAdm", NULL, -1);
    session_destroy();
    return $response->withRedirect($this->router->pathFor('admin'));

})->setName('logout');