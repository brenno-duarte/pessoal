<?php

$app->get('/admin/mensagens', function($request, $response){

    if ($_SESSION['idAdm'] && $_SESSION['acesso'] == 'Administrador') {
        $message = new MessageController();
        
        $msg = $this->flash->getFirstMessage('msgDeletado');
        return $this->view->render($response, "blog/views-gestor/message.html", [
            'title' => 'Mensagens',
            'message' => $message->listar(),
            'msg' => $msg,
        ]);
    } else {
        $this->flash->addMessage('erroAcesso', 'Você precisa ser um administrador para acessar esta área');
        return $response->withRedirect($this->router->pathFor('adminPainel'));
    }

})->setName('msg');

$app->get('/admin/excluir/{id}', function($request, $response, $args){

    if ($_SESSION['idAdm'] && $_SESSION['acesso'] == 'Administrador') {
        
        MessageController::excluir($args['id']);

        $this->flash->addMessage('msgDeletado', 'Mensagem deletado com sucesso!');
        return $response->withRedirect($this->router->pathFor('msg'));
    } else {
        $this->flash->addMessage('erroAcesso', 'Você precisa ser um administrador para acessar esta área');
        return $response->withRedirect($this->router->pathFor('adminPainel'));
    }

})->setName('msgDel');