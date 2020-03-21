<?php

// use Symfony\Component\Config\Definition\Exception\Exception;

require_once ROOT_PATH. '/Sources/Model/Message.php';
require_once ROOT_PATH. '/Sources/DB/DB.php';

class MessageDAO {
    public function getMessages(){
        $sql = "SELECT * FROM tb_message";
        
        try {
            $stmt = DB::query($sql);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getMessageOnly(int $id){
        $sql = "SELECT * FROM tb_message WHERE idmsg = $id";
        
        try {
            $stmt = DB::query($sql);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function insert(Message $message){
        $sql = "INSERT INTO tb_message (nameMsg, emailMsg, messageDesc) 
        VALUES (:nameMsg, :emailMsg, :messageDesc)";
        
        try {
            $stmt = DB::prepare($sql);
            $stmt->bindValue(":nameMsg", $message->getNome(), PDO::PARAM_STR);
            $stmt->bindValue(":emailMsg", $message->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(":messageDesc", $message->getMsg(), PDO::PARAM_STR);
            $res = $stmt->execute();

            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete(int $id){
        $sql = "DELETE FROM tb_message WHERE idmsg = $id";
        
        try {
            $stmt = DB::prepare($sql);
            $res = $stmt->execute();
            
            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}