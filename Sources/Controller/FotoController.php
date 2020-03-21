<?php

require_once ROOT_PATH. '/Sources/DAO/FotoDAO.php';

class FotoController {
    public static function listar(int $id){
        $fotoDAO = new FotoDAO();
        $res = $fotoDAO->getFotos($id);

        return $res;
    }

    public static function listarQnt(int $id){
        $fotoDAO = new FotoDAO();
        $res = $fotoDAO->getCountFotos($id);

        return $res;
    }

    public function inserir(Foto $foto){
        $fotoDAO = new FotoDAO();
        $res = $fotoDAO->insert($foto);

        return $res;
    }

    public static function excluir(string $foto){
        $fotoDAO = new FotoDAO();
        $res = $fotoDAO->delete($foto);

        return $res;
    }
}