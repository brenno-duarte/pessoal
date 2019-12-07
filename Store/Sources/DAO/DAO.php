<?php

require ROOT_PATH.'/Sources/DB/DB.php';

class DAO extends DB {
    public static function getAll(){
        $sql = "SELECT * FROM tabela";

        try {
            $stmt = DB::prepare($sql);
            $stmt->execute();
            $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $stmt;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function getOnly(int $id){
        $sql = "SELECT * FROM tabela WHERE id = $id";

        try {
            $stmt = DB::prepare($sql);
            $stmt->execute();
            $stmt->fetch(PDO::FETCH_ASSOC);

            return $stmt;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function insert(Model $model){
        $sql = "INSERT INTO tabela ('name') VALUE (':value')";

        try {
            $stmt = DB::prepare($sql);
            $stmt->bindValue(':value', $model->getModel());
            $stmt->execute();

            return $stmt;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function update(Model $model, int $id){
        $sql = "UPDATE tabela set 
        'name' = ':name' WHERE id = $id";

        try {
            $stmt = DB::prepare($sql);
            $stmt->bindValue(':value', $model->getModel());
            $stmt->execute();

            return $stmt;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function delete(int $id){
        $sql = "DELETE FROM tabela WHERE id = $id";

        try {
            $stmt = DB::prepare($sql);
            $stmt->execute();

            return $stmt;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
