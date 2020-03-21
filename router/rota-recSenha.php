<?php

/*require_once ROOT_PATH. '/Sources/Controller/UsuarioController.php';
require_once ROOT_PATH. '/Sources/Model/Usuario.php';
require_once ROOT_PATH. '/Sources/Controller/FeedController.php';
require_once ROOT_PATH. '/Sources/Model/Feed.php';
require_once ROOT_PATH. '/Sources/Services/Mail.php';*/

$app->get('/recuperar-senha', function($request, $response){

    if (!isset($_SESSION['idUsu'])) {
        $msg1 = $this->flash->getFirstMessage('erroEmail2');
        $msg2 = $this->flash->getFirstMessage('envEmail');
        return $this->view->render($response, "recuperar-senha.html", [
            'title' => 'Recuperar senha Blog',
            'msg1' => $msg1,
            'msg2' => $msg2
        ]);
    } else {
        return $response->withRedirect($this->router->pathFor('painel'));
    }

})->setName('recSenha');

$app->post('/recuperar-senha', function($request, $response){

    $email = filter_input(INPUT_POST, 'email');

    $usuarioC = new UsuarioController();
    $usuario = new Usuario();
    $usuario->setEmail($email);
    $res = $usuarioC->listarEmail($usuario);
    
    if (empty($res)) {
        $this->flash->addMessage('erroEmail2', 'O Imoveis avista não encontrou esse endereço de email');
        return $response->withRedirect($this->router->pathFor('recSenha'));
        die();
    } else {
        foreach ($res as $res) {
            if ($res > 0) {
                $chave = openssl_encrypt($res['idUsu'], "AES-128-CBC", SECRET, 0, SECRET_IV);
                $key = base64_encode($chave);
                $link = "http://localhost/Imoveis-avista/redefinir-senha?key=$key";

                $body = "<hr>
                <div style='text-align: center;'>
                    <h1 style='font-family: sans-serif;'>Redefinição de senha</h1>
                    <p style='font-family: sans-serif;'>Você selecionou a redefinição de senha do Imoveis avista.</p>
                    <p style='font-family: sans-serif;'>Para continuar, por favor clique no botão abaixo:</p>
                    <p style='margin-bottom: 30px; margin-top: 30px;'>
                        <a href='{$link}' style='background-color: #FFB90F; border-radius: 5px; padding: 10px; text-decoration: none; color: #000; font-family: sans-serif;'>
                            Alterar senha
                        </a>
                    </p>    
                </div>
                
                <div style='text-align: center; background-color: #A9A9A9; padding-top: 10px; padding-bottom: 10px;'>
                    <p><small style='font-family: sans-serif;'>Este e-mail foi enviado a partir do <a href='{imoveisavista.com.br}'>imoveisavista.com.br</a>.</small></p>
                    <p><small style='font-family: sans-serif;'>Por favor não responda a esse e-mail</small></p>
                </div>";

                $altBody = "<h1>Redefinição de senha</h1><p>Para continuar, por favor clique no link abaixo</p><a href='{$link}'>$link</a>";

                $mail = new Mail(MAIL['host'], MAIL['user'], MAIL['pass'], 'tls', MAIL['port']);
                $mail->add(MAIL['from_email'], MAIL['from_name'], $email, 'Brenno D.L.');
                $mail->send('Recuperar senha', $body, $altBody);

                $this->flash->addMessage('envEmail', 'Enviado um link de alteração no seu e-mail');
                return $response->withRedirect($this->router->pathFor('recSenha'));
            }
        }
    }

})->setName('recSenha');

$app->get('/redefinir-senha', function($request, $response){

    $code = filter_input(INPUT_GET, 'key');
    $decry = base64_decode($code);
    $idUsu = openssl_decrypt($decry, "AES-128-CBC", SECRET, 0, SECRET_IV);
    
    $msg = $this->flash->getFirstMessage('erroSenha3');

    if (!isset($code) || $idUsu == false ) {
        return $response->withRedirect($this->router->pathFor('login'));
    } else {
        return $this->view->render($response, "nova-senha.html", [
            'title' => 'Redefinir senha',
            'idUsu' => $idUsu,
            'msg' => $msg
        ]);
    }

})->setName('redefSenha');

$app->post('/redefinir-senha', function($request, $response){

    $idUsu = filter_input(INPUT_POST, 'idUsu');
    $senha = filter_input(INPUT_POST, 'senha');
    $conSenha = filter_input(INPUT_POST, 'conSenha');

    if ($senha != $conSenha) {
        $this->flash->addMessage('erroSenha3', 'Senhas não são iguais');
        return $response->withRedirect($this->router->pathFor('redefSenha'));
        die();
    }
    
    $usuario = new UsuarioController();
    $usuario->alterarSenha($senha, $idUsu);

    $this->flash->addMessage('senhaAlt', 'Sua senha foi redefinida, entre no site com sua nova senha');
    return $response->withRedirect($this->router->pathFor('login'));

})->setName('redefSenha');