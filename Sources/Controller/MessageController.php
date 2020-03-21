<?php

require_once ROOT_PATH. '/Sources/DAO/MessageDAO.php';
require_once ROOT_PATH. '/Sources/Model/Message.php';

class MessageController {
    
    public function listar(){
        $msg = new MessageDAO();
        $res = $msg->getMessages();

        return $res;
    }

    public function listarUnico(int $id){
        $msg = new MessageDAO();
        $res = $msg->getMessageOnly($id);

        return $res;
    }

    public static function inserir(string $nome, string $email, string $messageDesc){
        $message = new Message();
        $message->setNome($nome);
        $message->setEmail($email);
        $message->setMsg($messageDesc);
        
        $usuarioDAO = new MessageDAO();
        $res = $usuarioDAO->insert($message);

        return $res;
    }

    public static function excluir(int $id){
        $msg = new MessageDAO();
        $res = $msg->delete($id);

        return $res;
    }
}