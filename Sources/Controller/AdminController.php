<?php

require_once ROOT_PATH. '/Sources/DAO/AdminDAO.php';
require_once ROOT_PATH. '/Sources/Model/Admin.php';

class AdminController {
    public static function login($email, $senha){
        $admDAO = new AdminDAO();
        $adm = new Admin();
        $adm->setEmail($email);
        $res = $admDAO->getlogin($adm, $senha);

        return $res;
    }
    
    public static function listar(){
        $admDAO = new AdminDAO();
        $res = $admDAO->getUsuarios();

        return $res;
    }

    public static function listarLimite(int $pagina, int $itens_pagina){
        $admDAO = new AdminDAO();
        $res = $admDAO->getUsuariosLimit($pagina, $itens_pagina);

        return $res;
    }

    public static function listarUnico(int $id){
        $admDAO = new AdminDAO();
        $res = $admDAO->getUsuarioOnly($id);

        return $res;
    }

    public static function listarEmail(Admin $email){
        $admDAO = new AdminDAO();
        $res = $admDAO->getEmail($email);

        return $res;
    }

    public function alterarSenha(string $senha, int $id){
        $admDAO = new AdminDAO();
        $res = $admDAO->setSenha($senha, $id);

        return $res;
    }

    public function verificarSenha(Admin $adm){
        $admDAO = new AdminDAO();
        $res = $admDAO->verifySenha($adm);

        return $res;
    }

    public function inserir(Admin $adm){
        $admDAO = new AdminDAO();
        $res = $admDAO->insert($adm);

        return $res;
    }

    public function atualizar(Admin $adm, int $id){
        $admDAO = new AdminDAO();
        $res = $admDAO->update($adm, $id);

        return $res;
    }

    public static function excluir(int $id){
        $admDAO = new AdminDAO();
        $res = $admDAO->delete($id);

        return $res;
    }
}