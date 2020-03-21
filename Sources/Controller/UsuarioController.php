<?php

require_once ROOT_PATH. '/Sources/DAO/UsuarioDAO.php';
require_once ROOT_PATH. '/Sources/Model/Usuario.php';

class UsuarioController {
    public static function login($email, $senha){
        $usuDAO = new UsuarioDAO();
        $usuario = new Usuario();
        $usuario->setEmail($email);
        $res = $usuDAO->getlogin($usuario, $senha);

        return $res;
    }
    
    public function listar(){
        $usuDAO = new UsuarioDAO();
        $res = $usuDAO->getUsuarios();

        return $res;
    }

    public function listarUnico(int $id){
        $usuDAO = new UsuarioDAO();
        $res = $usuDAO->getUsuarioOnly($id);

        return $res;
    }

    public function listarEmail(Usuario $email){
        $usuDAO = new UsuarioDAO();
        $res = $usuDAO->getEmail($email);

        return $res;
    }

    public function alterarSenha(string $senha, int $id){
        $usuDAO = new UsuarioDAO();
        $res = $usuDAO->setSenha($senha, $id);

        return $res;
    }

    public function verificarSenha(Usuario $usuario){
        $usuDAO = new UsuarioDAO();
        $res = $usuDAO->verifySenha($usuario);

        return $res;
    }

    public function inserir(Usuario $usuario){
        $usuarioDAO = new UsuarioDAO();
        $res = $usuarioDAO->insert($usuario);

        return $res;
    }

    public function atualizar(Usuario $usuario, int $id){
        $usuarioDAO = new UsuarioDAO();
        $res = $usuarioDAO->update($usuario, $id);

        return $res;
    }

    public function excluir(int $id){
        $usuarioDAO = new UsuarioDAO();
        $res = $usuarioDAO->delete($id);

        return $res;
    }
}