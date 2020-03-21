<?php

require_once ROOT_PATH. '/Sources/DAO/CategoryDAO.php';
require_once ROOT_PATH. '/Sources/Model/Category.php';

class CategoryController {
    
    public function listar(){
        $msg = new CategoryDAO();
        $res = $msg->getCategorys();

        return $res;
    }

    public function listarUnico(int $id){
        $msg = new CategoryDAO();
        $res = $msg->getCategoryOnly($id);

        return $res;
    }

    public static function inserir(string $nome){
        $Category = new Category();
        $Category->setNameCategory($nome);
        
        $usuarioDAO = new CategoryDAO();
        $res = $usuarioDAO->insert($Category);

        return $res;
    }

    public static function atualizar(string $nome, int $id){
        $Category = new Category();
        $Category->setNameCategory($nome);
        
        $usuarioDAO = new CategoryDAO();
        $res = $usuarioDAO->update($Category, $id);

        return $res;
    }

    public static function excluir(int $id){
        $msg = new CategoryDAO();
        $res = $msg->delete($id);

        return $res;
    }
}