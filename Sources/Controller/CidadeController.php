<?php

require_once ROOT_PATH. '/Sources/DAO/CidadeDAO.php';

class CidadeController {
    public static function listarEstados(){
        $cidade = new CidadeDAO();
        $res = $cidade->listarEstado();

        return $res;
    }

    public static function listarCidades(int $id){
        $cidade = new CidadeDAO();
        $res = $cidade->listarCidade($id);

        return $res;
    }
}