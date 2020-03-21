<?php

require_once ROOT_PATH. '/Sources/Model/Blog.php';
require_once ROOT_PATH. '/Sources/DB/DB.php';

class BlogDAO {
    public function getNoticiasLimit(int $pagina, int $itens_pagina){
        $sql = "SELECT * FROM tb_blog ORDER BY idNot DESC LIMIT $pagina, $itens_pagina";

        try {
            $stmt = DB::query($sql);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getMaisNoticiasLimit(int $limite){
        $sql = "SELECT * FROM tb_blog ORDER BY idNot DESC LIMIT $limite";

        try {
            $stmt = DB::query($sql);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function getAllNoticias(){
        $sql = "SELECT * FROM tb_blog ORDER BY idNot DESC";

        try {
            $stmt = DB::query($sql);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getNoticia(int $id){
        $sql = "SELECT * FROM tb_blog a INNER JOIN tb_categories b ON a.idcategory=b.idcategory 
        WHERE a.idNot = $id";

        try {
            $stmt = DB::query($sql);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_ASSOC);

            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function insert(Blog $blog){
        $sql = "INSERT INTO tb_blog (idcategory, titulo, resumo, autor, imagem, nome_imagem, conteudo, data_not) 
        VALUES (:idcategory, :titulo, :resumo, :autor, :imagem, :nome_imagem, :conteudo, :data_not)";

        try {
            $stmt = DB::prepare($sql);
            $stmt->bindValue(":idcategory", $blog->getIdcategory(), PDO::PARAM_INT);
            $stmt->bindValue(":titulo", $blog->getTitulo(), PDO::PARAM_STR);
            $stmt->bindValue(":resumo", $blog->getResumo(), PDO::PARAM_STR);
            $stmt->bindValue(":autor", $blog->getAutor(), PDO::PARAM_STR);
            $stmt->bindValue(":imagem", $blog->getImagem(), PDO::PARAM_STR);
            $stmt->bindValue(":nome_imagem", $blog->getNome_imagem(), PDO::PARAM_STR);
            $stmt->bindValue(":conteudo", $blog->getConteudo(), PDO::PARAM_STR);
            $stmt->bindValue(":data_not", $blog->getData(), PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function update(Blog $blog, int $id){
        $sql = "UPDATE tb_blog SET
        idcategory = :idcategory, 
        titulo = :titulo, 
        resumo = :resumo, 
        autor = :autor, 
        imagem = :imagem, 
        nome_imagem = :nome_imagem, 
        conteudo = :conteudo, 
        data_not = :data_not WHERE idNot = $id";

        try {
            $stmt = DB::prepare($sql);
            $stmt->bindValue(":idcategory", $blog->getIdcategory(), PDO::PARAM_INT);
            $stmt->bindValue(":titulo", $blog->getTitulo(), PDO::PARAM_STR);
            $stmt->bindValue(":resumo", $blog->getResumo(), PDO::PARAM_STR);
            $stmt->bindValue(":autor", $blog->getAutor(), PDO::PARAM_STR);
            $stmt->bindValue(":imagem", $blog->getImagem(), PDO::PARAM_STR);
            $stmt->bindValue(":nome_imagem", $blog->getNome_imagem(), PDO::PARAM_STR);
            $stmt->bindValue(":conteudo", $blog->getConteudo(), PDO::PARAM_STR);
            $stmt->bindValue(":data_not", $blog->getData(), PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete(int $id){
        $sql = "DELETE FROM tb_blog WHERE idNot = $id";

        try {
            $stmt = DB::prepare($sql);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}