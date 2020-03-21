<?php

$app->get('/admin/posts/novo', function($request, $response){

    if ($_SESSION['idAdm']) {
        $blog = BlogController::listar();
        $categorias = new CategoryController();
        #var_dump($categorias->listar());

        return $this->view->render($response, "blog/views-gestor/novo-post.html", [
            'title' => 'Novo post',
            'noticias' => $blog,
            'categorias' => $categorias->listar()
        ]);
    } else {
        return $response->withRedirect($this->router->pathFor('admin'));
    }

})->setName('adminPainelNovo');

$app->post('/admin/posts/novo', function($request, $response){

    if ($_SESSION['idAdm']) {
        $pathFotos = ROOT_PATH."/views/blog/views-gestor/fotos-blog/".date("M").date("Y")."/";
        $arquivo = $_FILES['foto'];
        $titulo = filter_input(INPUT_POST, 'titulo');
        $resumo = filter_input(INPUT_POST, 'resumo');
        $autor = $_SESSION['nomeAdm'];
        $conteudo = filter_input(INPUT_POST, 'conteudo');
        $idcategory = filter_input(INPUT_POST, 'category');
        $nome_imagem = filter_input(INPUT_POST, 'nomeImg');
        $data = date("d/m/Y");
        $res = explode("/", $data);
        $res2 = array_reverse($res);
        $dataFormatada = implode("-", $res2);  

        
        if (!is_dir($pathFotos)) {
            umask(0);
            mkdir($pathFotos, 0777);
        }

        $ext = explode(".", $arquivo['name']);
        $end = end($ext);
        $novoNome = uniqid("IMG-".date("M").date("Y")). "." .$end;
        
        $blogC = new BlogController();
        $res = $blogC->inserir($idcategory, $titulo, $resumo, $autor, $conteudo, $dataFormatada, $novoNome, $nome_imagem);

        if (move_uploaded_file($arquivo['tmp_name'], $pathFotos.'/'.$novoNome)) {
            echo 'deu certo';
        } else {
            echo "Erro ao enviar arquivo";
        }

        $this->flash->addMessage('postAdd', 'Post publicado com sucesso');
        return $response->withRedirect($this->router->pathFor('adminPainel'));
    } else {
        return $response->withRedirect($this->router->pathFor('admin'));
    }

})->setName('adminPainelNovo');

$app->get('/admin/posts/alterar/{id}', function($request, $response, $args){

    if ($_SESSION['idAdm']) {
        $blog = BlogController::listarUnico($args['id']);
        $img = $blog['imagem'];
        $img2 = explode("-", $img);
        $pasta = substr($img2[1], 0, 7);
        $categorias = new CategoryController();

        #var_dump($blog);
        $msg = $this->flash->getFirstMessage('postFotoDel');
        return $this->view->render($response, "blog/views-gestor/editar-post.html", [
            'title' => 'Editar post',
            'categorias' => $categorias->listar(),
            'noticia' => $blog,
            'pasta' => $pasta,
            'imagemAtual' => $img,
            'msg' => $msg
        ]);
    } else {
        return $response->withRedirect($this->router->pathFor('admin'));
    }

})->setName('adminPainelEditar');

$app->post('/admin/posts/alterar/{id}', function($request, $response, $args){

    if ($_SESSION['idAdm']) {
        $pasta = filter_input(INPUT_POST, 'pasta');
        $pathFotos = ROOT_PATH."/views/blog/views-gestor/fotos-blog/".$pasta."/";
        $arquivo = $_FILES['foto'];
        $titulo = filter_input(INPUT_POST, 'titulo');
        $resumo = filter_input(INPUT_POST, 'resumo');
        $idcategory = filter_input(INPUT_POST, 'category');
        $autor = $_SESSION['nomeAdm'];
        $conteudo = filter_input(INPUT_POST, 'conteudo');
        $imagemAtual = filter_input(INPUT_POST, 'imagemAtual');
        $nome_imagem = filter_input(INPUT_POST, 'nomeImg');
        $data = date("d/m/Y");
        $res = explode("/", $data);
        $res2 = array_reverse($res);
        $dataFormatada = implode("-", $res2);  

        if (!is_dir($pathFotos)) {
            umask(0);
            mkdir($pathFotos, 0777);
        }
        
        if (!empty($arquivo['name'])) {
            $ext = explode(".", $arquivo['name']);
            $end = end($ext);
            $novoNome = uniqid("IMG-".date("M").date("Y")). "." .$end;

            $pathImgAtual = ROOT_PATH."/views/blog/views-gestor/fotos-blog/".$pasta."/".$imagemAtual;
            $pathImgNovo = ROOT_PATH."/views/blog/views-gestor/fotos-blog/".$pasta."/".$novoNome;
            rename($pathImgAtual, $pathImgNovo);
            
            $blogC = new BlogController();
            $res = $blogC->alterar($idcategory, $titulo, $resumo, $autor, $conteudo, $dataFormatada, $novoNome, $nome_imagem, $args['id']);
            var_dump($res);
            echo '<br>';
            #var_dump($titulo, $resumo, $autor, $conteudo, $dataFormatada, $novoNome, $nome_imagem, $args['id']);
        
            if (move_uploaded_file($arquivo['tmp_name'], $pathFotos.'/'.$novoNome)) {
                echo 'deu certo';
            } else {
                echo "Erro ao enviar arquivo";
            }
        
            $this->flash->addMessage('postAlt', 'Post alterado com sucesso');
            return $response->withRedirect($this->router->pathFor('adminPainel'));
        } else {

            $blogC = new BlogController();
            $res = $blogC->alterar($idcategory, $titulo, $resumo, $autor, $conteudo, $dataFormatada, $imagemAtual, $nome_imagem, $args['id']);
            var_dump($res);
            echo '<br>';

            $this->flash->addMessage('postAlt', 'Post alterado com sucesso');
            return $response->withRedirect($this->router->pathFor('adminPainel'));
        }
    } else {
        return $response->withRedirect($this->router->pathFor('admin'));
    }
    
})->setName('adminPainelEditar');

$app->get('/admin/posts/excluir/{id}', function($request, $response, $args){
    
    if ($_SESSION['idAdm']) {
        $blog = BlogController::listarUnico($args['id']);
        #echo '<pre>';
        $img = $blog['imagem'];
        $img2 = explode("-", $img);
        $pasta = substr($img2[1], 0, 7);

        BlogController::excluir($args['id']);
        $pathFotos = ROOT_PATH."/views/blog/views-gestor/fotos-blog/".$pasta."/".$img;
        unlink($pathFotos);

        $this->flash->addMessage('postDel', 'Post deletado com sucesso');
        return $response->withRedirect($this->router->pathFor('adminPainel'));
    } else {
        return $response->withRedirect($this->router->pathFor('admin'));
    }

})->setName('adminPainelExcluir');

$app->get('/excluir-foto/{pasta}/{nome}/{id}', function($request, $response, $args){
    
    if ($_SESSION['idAdm']) {
        $id = $args['id'];
        $pasta = $args['pasta'];
        $nome = $args['nome'];
        $pathFotos = ROOT_PATH."/views/blog/views-gestor/fotos-blog/".$pasta."/".$nome;
        unlink($pathFotos);

        $this->flash->addMessage('postFotoDel', 'Foto deletado com sucesso (talvez você ainda verá a foto até recarregar a página)');
        return $response->withRedirect($this->router->pathFor('adminPainelEditar', (['id' => $id])));
    } else {
        return $response->withRedirect($this->router->pathFor('admin'));
    }

})->setName('excluirFotoBlog');