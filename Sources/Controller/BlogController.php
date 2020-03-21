<?php

require_once ROOT_PATH. '/Sources/DAO/BlogDAO.php';
require_once ROOT_PATH. '/Sources/Model/Blog.php';

class BlogController {
    public static function listarLimite(int $pagina, int $itens_pagina){
        $blog = new BlogDAO();
        $res = $blog->getNoticiasLimit($pagina, $itens_pagina);

        return $res;
    }
    public static function listarMais(int $limite){
        $blog = new BlogDAO();
        $res = $blog->getMaisNoticiasLimit($limite);

        return $res;
    }

    public static function listar(){
        $blog = new BlogDAO();
        $res = $blog->getAllNoticias();

        return $res;
    }

    public static function listarUnico(int $id){
        $blog = new BlogDAO();
        $res = $blog->getNoticia($id);

        return $res;
    }

    public function inserir($idcategory, $titulo, $resumo, $autor, $conteudo, $dataFormatada, $novoNome, $nome_imagem){
        $blogDAO = new BlogDAO();
        $blog = new Blog();
        $blog->setIdcategory($idcategory);
        $blog->setTitulo($titulo);
        $blog->setResumo($resumo);
        $blog->setAutor($autor);
        $blog->setNome_imagem($nome_imagem);
        $blog->setImagem($novoNome);
        $blog->setConteudo($conteudo);
        $blog->setData($dataFormatada);
        $res = $blogDAO->insert($blog);

        return $res;
    }

    public function alterar($idcategory, $titulo, $resumo, $autor, $conteudo, $dataFormatada, $novoNome, $nome_imagem, int $id){
        $blogDAO = new BlogDAO();
        $blog = new Blog();
        $blog->setIdcategory($idcategory);
        $blog->setTitulo($titulo);
        $blog->setResumo($resumo);
        $blog->setAutor($autor);
        $blog->setNome_imagem($nome_imagem);
        $blog->setImagem($novoNome);
        $blog->setConteudo($conteudo);
        $blog->setData($dataFormatada);
        $res = $blogDAO->update($blog, $id);

        return $res;
    }

    public static function excluir(int $id){
        $blogDAO = new BlogDAO();
        $res = $blogDAO->delete($id);

        return $res;
    }
}