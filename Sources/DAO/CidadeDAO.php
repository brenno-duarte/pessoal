<?php

class CidadeDAO {
    public function listarEstado(){
        $sql = "SELECT * FROM estado";

        try {
            $stmt = DB::query($sql);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function listarCidade(int $id){
        $sql = "SELECT * FROM cidade WHERE estado = $id";

        try {
            $stmt = DB::query($sql);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}