<?php

class DB {

    private static $con;

    public static function Conectar() {

        if (!isset(self::$con)) {
            try {
                self::$con = new PDO("sqlite:banco/sistemas.db");
                self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return self::$con;
            } catch (PDOException $e) {
                echo "<h3 style='color:red;'>Erro no banco: </h3>" . $e->getMessage();
                die();
            }
        }

        return self::$con;
    }

    public static function prepare($sql) {
        return $stmt = DB::Conectar()->prepare($sql);
    }

    public static function query($sql) {
        return $stmt = DB::Conectar()->query($sql);
    }

    public static function lastInsertId(){
        return $stmt = DB::Conectar()->lastInsertId();
    }

}
