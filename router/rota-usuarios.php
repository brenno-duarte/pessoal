<?php

$app->get('/admin/gerenciar-usuarios', function($request, $response){

    if ($_SESSION['idAdm'] && $_SESSION['acesso'] == 'Administrador') {
        $pagina_atual = filter_input(INPUT_GET, 'pag');
        $itens_pagina = 3;

        if (empty($pagina_atual)) {
            $pagina_atual = '1';
        }

        $inicio = ($itens_pagina * $pagina_atual) - $itens_pagina;
        $blogTotal = AdminController::listar();
        $total = count($blogTotal);
        $qnt_pag = ceil($total/$itens_pagina);

        # Páginas anteriores
        $vA1 = $pagina_atual - $itens_pagina;
        $vA2 = $pagina_atual - 1;

        # Páginas posteriores
        $vP1 = $pagina_atual + 1;
        $vP2 = $pagina_atual + $itens_pagina;
        $usuarios = AdminController::listarLimite($inicio, $itens_pagina);

        $msg1 = $this->flash->getFirstMessage('usuCad');
        $msg2 = $this->flash->getFirstMessage('usuAlterado');
        $msg3 = $this->flash->getFirstMessage('usuDeletado');
        return $this->view->render($response, "blog/views-gestor/gerenciar-usu.html", [
            'title' => 'Gerenciar Usuários',
            'usuarios' => $usuarios,
            'msg1' => $msg1,
            'msg2' => $msg2,
            'msg3' => $msg3,
            'pag_atual' => $pagina_atual,
            'valorAnt1' => $vA1,
            'valorAnt2' => $vA2,
            'valorPost1' => $vP1,
            'valorPost2' => $vP2,
            'qntPag' => $qnt_pag
        ]);
    } else {
        $this->flash->addMessage('erroAcesso', 'Você precisa ser um administrador para acessar esta área');
        return $response->withRedirect($this->router->pathFor('adminPainel'));
    }

})->setName('gerenciarUsu');

$app->get('/admin/novo-usuario', function($request, $response){

    if ($_SESSION['idAdm'] && $_SESSION['acesso'] == 'Administrador') {
        $usuarios = AdminController::listar();

        $msg1 = $this->flash->getFirstMessage('erroSenha');
        $msg2 = $this->flash->getFirstMessage('erroNum');
        $msg3 = $this->flash->getFirstMessage('erroEmail');
        return $this->view->render($response, "blog/views-gestor/novo-usuario.html", [
            'title' => 'Novo Usuário',
            'usuarios' => $usuarios,
            'msg1' => $msg1,
            'msg2' => $msg2,
            'msg3' => $msg3,
        ]);
    } else {
        $this->flash->addMessage('erroAcesso', 'Você precisa ser um administrador para acessar esta área');
        return $response->withRedirect($this->router->pathFor('adminPainel'));
    }

})->setName('novoUsu');

$app->post('/admin/novo-usuario', function($request, $response){

    if ($_SESSION['idAdm'] && $_SESSION['acesso'] == 'Administrador') {
        $nome = filter_input(INPUT_POST, 'nome');
        $email = filter_input(INPUT_POST, 'email');
        $senha = filter_input(INPUT_POST, 'senha');
        $cSenha = filter_input(INPUT_POST, 'cSenha');
        $contato = filter_input(INPUT_POST, 'contato');
        $acesso = filter_input(INPUT_POST, 'acesso');
        
        $usuario = new Admin();
        $usuario->setEmail($email);
        $res = AdminController::listarEmail($usuario);
        
        foreach ($res as $res) {
            if ($res > 0) {
                $this->flash->addMessage('erroEmail', 'Esse endereço de e-mail já existe');
                return $response->withRedirect($this->router->pathFor('novoUsu'));
                break;
            }
        }

        if ($senha != $cSenha) {
            
            $this->flash->addMessage('erroSenha', 'Senhas não batem');
            return $response->withRedirect($this->router->pathFor('novoUsu'));

        } else if (strlen($contato) < 14){

            $this->flash->addMessage('erroNum', 'Digite um número de contato válido');
            return $response->withRedirect($this->router->pathFor('novoUsu'));

        } else {
            $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

            $usuarioC = new AdminController();
            $usuario = new Admin();
            $usuario->setNome($nome);
            $usuario->setEmail($email);
            $usuario->setSenha($senhaCriptografada);
            $usuario->setContato($contato);
            $usuario->setAcesso($acesso);
            $usuarioC->inserir($usuario);
        
            $this->flash->addMessage('usuCad', 'Usuário cadastrado com sucesso!');
            return $response->withRedirect($this->router->pathFor('gerenciarUsu'));
        }
    } else {
        $this->flash->addMessage('erroAcesso', 'Você precisa ser um administrador para acessar esta área');
        return $response->withRedirect($this->router->pathFor('adminPainel'));
    }

})->setName('novoUsu');

$app->get('/admin/editar-usuario/{id}', function($request, $response, $args){

    if ($_SESSION['idAdm'] && $_SESSION['acesso'] == 'Administrador') {
        $usuario = AdminController::listarUnico($args['id']);
        
        return $this->view->render($response, "blog/views-gestor/editar-usuario.html", [
            'title' => 'Editar Usuário',
            'usuario' => $usuario[0],
            'acesso' => $usuario[0]['acesso']
        ]);
    } else {
        $this->flash->addMessage('erroAcesso', 'Você precisa ser um administrador para acessar esta área');
        return $response->withRedirect($this->router->pathFor('adminPainel'));
    }

})->setName('editarUsu');

$app->post('/admin/editar-usuario/{id}', function($request, $response, $args){

    if ($_SESSION['idAdm'] && $_SESSION['acesso'] == 'Administrador') {
        $nome = filter_input(INPUT_POST, 'nome');
        $email = filter_input(INPUT_POST, 'email');
        $contato = filter_input(INPUT_POST, 'contato');
        $acesso = filter_input(INPUT_POST, 'tipoAcesso');
        
        $usuarioC = new AdminController();
        $usuario = new Admin();
        $usuario->setNome($nome);
        $usuario->setEmail($email);
        $usuario->setContato($contato);
        $usuario->setAcesso($acesso);
        $usuarioC->atualizar($usuario, $args['id']);

        $this->flash->addMessage('usuAlterado', 'Usuário alterado com sucesso!');
        return $response->withRedirect($this->router->pathFor('gerenciarUsu'));
    } else {
        $this->flash->addMessage('erroAcesso', 'Você precisa ser um administrador para acessar esta área');
        return $response->withRedirect($this->router->pathFor('adminPainel'));
    }

})->setName('editarUsu');

$app->get('/admin/excluir-usuario/{id}', function($request, $response, $args){

    if ($_SESSION['idAdm'] && $_SESSION['acesso'] == 'Administrador') {       
        AdminController::excluir($args['id']);

        $this->flash->addMessage('usuDeletado', 'Usuário deletado com sucesso!');
        return $response->withRedirect($this->router->pathFor('gerenciarUsu'));
    } else {
        $this->flash->addMessage('erroAcesso', 'Você precisa ser um administrador para acessar esta área');
        return $response->withRedirect($this->router->pathFor('adminPainel'));
    }

})->setName('excluirUsu');