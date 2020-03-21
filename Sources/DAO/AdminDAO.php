<?php

use Symfony\Component\Config\Definition\Exception\Exception;

require_once ROOT_PATH. '/Sources/Model/Admin.php';
require_once ROOT_PATH. '/Sources/DB/DB.php';

class AdminDAO {
    public function getUsuarios(){
        $sql = "SELECT * FROM tb_admin";
        
        try {
            $stmt = DB::query($sql);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getUsuariosLimit(int $pagina, int $itens_pagina){
        $sql = "SELECT * FROM tb_admin LIMIT $pagina, $itens_pagina";
        
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
        $sql = "SELECT * FROM tb_admin WHERE idAdm = $id";
        
        try {
            $stmt = DB::query($sql);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getEmail(Admin $admin){
        $sql = "SELECT * FROM tb_admin WHERE emailAdm = :emailAdm";
        
        try {
            $stmt = DB::prepare($sql);
            $stmt->bindValue(":emailAdm", $admin->getEmail(), PDO::PARAM_STR);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getlogin(Admin $admin, string $senha){
        $sql = "SELECT * FROM tb_admin WHERE emailAdm = :emailAdm";
        
        try {
            $stmt = DB::prepare($sql);
            $stmt->bindValue(":emailAdm", $admin->getEmail(), PDO::PARAM_STR);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $senhaCrip = $res['senhaAdm'];

            if (password_verify($senha, $senhaCrip)) {
                $nomeAdm = $res['nomeAdm'];
                setcookie('nomeAdm2', $nomeAdm);
                return $res;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function setSenha(string $senha, int $id){
        $sql = "UPDATE tb_admin SET  
        senhaAdm = :senhaAdm 
        WHERE idAdm = $id";
        
        try {
            $stmt = DB::prepare($sql);
            $stmt->bindValue(":senhaAdm", $senha, PDO::PARAM_STR);
            
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function verifySenha(Admin $admin){
        $sql = "SELECT * FROM tb_admin WHERE senhaAdm = :senhaAdm";
        
        try {
            $stmt = DB::prepare($sql);
            $stmt->bindValue(":senhaAdm", $admin->getSenha(), PDO::PARAM_STR);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_ASSOC);

            echo '<pre>';
            var_dump($res);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function insert(Admin $admin){
        $sql = "INSERT INTO tb_admin (nomeAdm, emailAdm, senhaAdm, contatoAdm, acesso) 
        VALUES (:nomeAdm, :emailAdm, :senhaAdm, :contatoAdm, :acesso)";
        
        try {
            $stmt = DB::prepare($sql);
            $stmt->bindValue(":nomeAdm", $admin->getNome(), PDO::PARAM_STR);
            $stmt->bindValue(":emailAdm", $admin->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(":senhaAdm", $admin->getSenha(), PDO::PARAM_STR);
            $stmt->bindValue(":contatoAdm", $admin->getContato(), PDO::PARAM_STR);
            $stmt->bindValue(":acesso", $admin->getAcesso(), PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function update(Admin $admin, int $id){
        $sql = "UPDATE tb_admin SET 
        nomeAdm = :nomeAdm, 
        emailAdm = :emailAdm, 
        contatoAdm = :contatoAdm, 
        acesso = :acesso WHERE idAdm = $id";
        
        try {
            $stmt = DB::prepare($sql);
            $stmt->bindValue(":nomeAdm", $admin->getNome(), PDO::PARAM_STR);
            $stmt->bindValue(":emailAdm", $admin->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(":contatoAdm", $admin->getContato(), PDO::PARAM_STR);
            $stmt->bindValue(":acesso", $admin->getAcesso(), PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete(int $id){
        $sql = "DELETE FROM tb_admin WHERE idAdm = $id";
        
        try {
            $stmt = DB::prepare($sql);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}