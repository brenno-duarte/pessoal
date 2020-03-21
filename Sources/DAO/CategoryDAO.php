<?php

require_once ROOT_PATH. '/Sources/Model/Category.php';
require_once ROOT_PATH. '/Sources/DB/DB.php';

class CategoryDAO {
    public function getCategorys(){
        $sql = "SELECT * FROM tb_categories";
        
        try {
            $stmt = DB::query($sql);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getCategoryOnly(int $id){
        $sql = "SELECT * FROM tb_categories WHERE idcategory = $id";
        
        try {
            $stmt = DB::query($sql);
            $stmt->execute();
            $res = $stmt->fetch(PDO::FETCH_ASSOC);

            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function insert(Category $category){
        $sql = "INSERT INTO tb_categories (nameCategory) VALUES (:nameCategory)";
        
        try {
            $stmt = DB::prepare($sql);
            $stmt->bindValue(":nameCategory", $category->getNameCategory(), PDO::PARAM_STR);
            $res = $stmt->execute();

            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function update(Category $category, int $id){
        $sql = "UPDATE tb_categories SET 
        nameCategory = :nameCategory WHERE idcategory = $id";
        
        try {
            $stmt = DB::prepare($sql);
            $stmt->bindValue(":nameCategory", $category->getNameCategory(), PDO::PARAM_STR);
            $res = $stmt->execute();

            return $res;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete(int $id){
        $sql = "DELETE FROM tb_categories WHERE idcategory=$id";
        
        try {
            $stmt = DB::prepare($sql);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}