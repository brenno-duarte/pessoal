<?php

require_once ROOT_PATH. '/Sources/Model/Foto.php';
require_once ROOT_PATH. '/Sources/DB/DB.php';

class FotoDAO {
    public function getFotos(int $id){
        $sql = "SELECT * FROM tb_foto WHERE idImovel = $id";

        try {
            $stmt = DB::query($sql);
            $stmt->execute();
            $fotos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $fotos;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getCountFotos(int $id){
        $sql = "SELECT count(*) AS qnt FROM tb_foto WHERE idImovel = $id";

        try {
            $stmt = DB::query($sql);
            $stmt->execute();
            $fotos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $fotos;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function insert(Foto $foto){
        $sql = "INSERT INTO tb_foto (idImovel, idUsu, nomeFoto) VALUES (:idImovel, :idUsu, :nomeFoto)";
        
        try {
            $stmt = DB::prepare($sql);
            $stmt->bindValue(':idImovel', $foto->getIdImovel(), PDO::PARAM_INT);
            $stmt->bindValue(':idUsu', $foto->getIdUsu(), PDO::PARAM_INT);
            $stmt->bindValue(':nomeFoto', $foto->getNomeFoto(), PDO::PARAM_STR);

            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete(string $nome){
        $sql = "DELETE FROM tb_foto WHERE nomeFoto = '$nome'";
        
        try {
            $stmt = DB::prepare($sql);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
