<?php

$app->get('/admin/categorias', function($request, $response){

    if ($_SESSION['idAdm'] && $_SESSION['acesso'] == 'Administrador') {
        $categorias = new CategoryController();
        
        $msg1 = $this->flash->getFirstMessage('catCad');
        $msg2 = $this->flash->getFirstMessage('catAlterado');
        $msg3 = $this->flash->getFirstMessage('catDeletado');
        return $this->view->render($response, "blog/views-gestor/categorias.html", [
            'title' => 'Categorias',
            'categorias' => $categorias->listar(),
            'msg1' => $msg1,
            'msg2' => $msg2,
            'msg3' => $msg3
        ]);
    } else {
        $this->flash->addMessage('erroAcesso', 'Você precisa ser um administrador para acessar esta área');
        return $response->withRedirect($this->router->pathFor('adminPainel'));
    }

})->setName('categorias');

$app->get('/admin/nova-categoria', function($request, $response){

    if ($_SESSION['idAdm'] && $_SESSION['acesso'] == 'Administrador') {

        return $this->view->render($response, "blog/views-gestor/nova-categoria.html", [
            'title' => 'Nova Categoria'
        ]);
    } else {
        $this->flash->addMessage('erroAcesso', 'Você precisa ser um administrador para acessar esta área');
        return $response->withRedirect($this->router->pathFor('adminPainel'));
    }

})->setName('novaCat');

$app->post('/admin/nova-categoria', function($request, $response){

    if ($_SESSION['idAdm'] && $_SESSION['acesso'] == 'Administrador') {
        $nome = filter_input(INPUT_POST, 'nome');
        
        CategoryController::inserir($nome);
        
        $this->flash->addMessage('catCad', 'Categoria cadastrado com sucesso!');
        return $response->withRedirect($this->router->pathFor('categorias'));
    } else {
        $this->flash->addMessage('erroAcesso', 'Você precisa ser um administrador para acessar esta área');
        return $response->withRedirect($this->router->pathFor('adminPainel'));
    }

})->setName('novaCat');

$app->get('/admin/editar-categoria/{id}', function($request, $response, $args){

    if ($_SESSION['idAdm'] && $_SESSION['acesso'] == 'Administrador') {
        $categorias = new CategoryController();
        
        return $this->view->render($response, "blog/views-gestor/editar-categoria.html", [
            'title' => 'Editar Usuário',
            'categoria' => $categorias->listarUnico($args['id'])
        ]);
    } else {
        $this->flash->addMessage('erroAcesso', 'Você precisa ser um administrador para acessar esta área');
        return $response->withRedirect($this->router->pathFor('adminPainel'));
    }

})->setName('editarCat');

$app->post('/admin/editar-categoria/{id}', function($request, $response, $args){

    if ($_SESSION['idAdm'] && $_SESSION['acesso'] == 'Administrador') {
        $nome = filter_input(INPUT_POST, 'nome');
        
        CategoryController::atualizar($nome, $args['id']);

        $this->flash->addMessage('catAlterado', 'Categoria alterado com sucesso!');
        return $response->withRedirect($this->router->pathFor('categorias'));
    } else {
        $this->flash->addMessage('erroAcesso', 'Você precisa ser um administrador para acessar esta área');
        return $response->withRedirect($this->router->pathFor('adminPainel'));
    }

})->setName('editarCat');

$app->get('/admin/excluir-categoria/{id}', function($request, $response, $args){

    if ($_SESSION['idAdm'] && $_SESSION['acesso'] == 'Administrador') {       
        CategoryController::excluir($args['id']);

        $this->flash->addMessage('catDeletado', 'Categoria deletado com sucesso!');
        return $response->withRedirect($this->router->pathFor('categorias'));
    } else {
        $this->flash->addMessage('erroAcesso', 'Você precisa ser um administrador para acessar esta área');
        return $response->withRedirect($this->router->pathFor('adminPainel'));
    }

})->setName('excluirCat');