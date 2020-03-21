<?php

use Symfony\Component\Config\Definition\Exception\Exception;

require_once ROOT_PATH. '/Sources/Model/Usuario.php';
require_once ROOT_PATH. '/Sources/DB/DB.php';

class UsuarioDAO {
    public function getUsuarios(){
        $sql = "SELECT * FROM tb_usuario";
        
        try {
            $stmt = DB::query($sql);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getUsuarioOnly(int $id){
        $sql = "SELECT * FROM tb_usuario WHERE idUsu = $id";
        
        try {
            $stmt = DB::query($sql);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getEmail(Usuario $usuario){
        $sql = "SELECT * FROM tb_usuario WHERE email = :email";
        
        try {
            $stmt = DB::prepare($sql);
            $stmt->bindValue(":email", $usuario->getEmail(), PDO::PARAM_STR);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getlogin(Usuario $usuario, string $senha){
        $sql = "SELECT * FROM tb_usuario WHERE email = :email";
        
        try {
            $stmt = DB::prepare($sql);
            $stmt->bindValue(":email", $usuario->getEmail(), PDO::PARAM_STR);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $senhaCrip = $res['senha'];

            if (password_verify($senha, $senhaCrip)) {
                $nomeUsu = $res['nomeUsu'];
                setcookie('nomeUsu', $nomeUsu);
                return $res;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function setSenha(string $senha, int $id){
        $sql = "UPDATE tb_usuario SET  
        senha = :senha 
        WHERE idUsu = $id";
        
        try {
            $stmt = DB::prepare($sql);
            $stmt->bindValue(":senha", $senha, PDO::PARAM_STR);
            
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function verifySenha(Usuario $usuario){
        $sql = "SELECT * FROM tb_usuario WHERE senha = :senha";
        
        try {
            $stmt = DB::prepare($sql);
            $stmt->bindValue(":senha", $usuario->getSenha(), PDO::PARAM_STR);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_ASSOC);

            echo '<pre>';
            var_dump($res);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function insert(Usuario $usuario){
        $sql = "INSERT INTO tb_usuario (nomeUsu, reputacao, email, senha, contato) 
        VALUES (:nomeUsu, :reputacao, :email, :senha, :contato)";
        
        try {
            $stmt = DB::prepare($sql);
            $stmt->bindValue(":nomeUsu", $usuario->getNome(), PDO::PARAM_STR);
            $stmt->bindValue(":reputacao", $usuario->getReputacao(), PDO::PARAM_INT);
            $stmt->bindValue(":email", $usuario->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(":senha", $usuario->getSenha(), PDO::PARAM_STR);
            $stmt->bindValue(":contato", $usuario->getContato(), PDO::PARAM_STR);
            $stmt->execute();
            $idUsu = DB::lastInsertId();

            return $idUsu;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function update(Usuario $usuario, int $id){
        $sql = "UPDATE tb_usuario SET 
        nomeUsu = :nomeUsu, 
        reputacao = :reputacao, 
        email = :email, 
        contato = :contato WHERE idUsu = $id";
        
        try {
            $stmt = DB::prepare($sql);
            $stmt->bindValue(":nomeUsu", $usuario->getNome(), PDO::PARAM_STR);
            $stmt->bindValue(":reputacao", $usuario->getReputacao(), PDO::PARAM_INT);
            $stmt->bindValue(":email", $usuario->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(":contato", $usuario->getContato(), PDO::PARAM_STR);
            
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete(int $id){
        $sql = "CALL deletar_conta($id)";
        
        try {
            $stmt = DB::prepare($sql);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}