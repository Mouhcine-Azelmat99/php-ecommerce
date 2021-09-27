<?php

class Category{
    static public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM categories');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt =null;
    }
    static public function getCatById($id){
        try{
            $stmt = DB::connect()->prepare('SELECT * FROM categories WHERE cat_id = :id');
            $stmt->execute(array(":id" => $id));
            $category = $stmt->fetch(PDO::FETCH_OBJ);
            return $category;
            $stmt->close();
            $stmt =null;
        }catch(PDOException $ex){
            echo "erreur " .$ex->getMessage();
        }
    }
    static public function addCategory($data){
        $stmt = DB::connect()->prepare('SELECT * FROM categories WHERE cat_title = :cat_title');
        $stmt->execute(array(':cat_title'=>$data['cat_title'])); 
        $r=$stmt->fetchAll();
        if (count($r)>0 ){
            return 'exist';
       } else {
        $stmt = DB::connect()->prepare('INSERT INTO categories (cat_title,image)
        VALUES (:cat_title,:image)');
        $stmt->bindParam(':cat_title',$data['cat_title']);
        $stmt->bindParam(':image',$data['image']);
        if($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
    }
        $stmt->close();
        $stmt = null;
    }
    static public function deleteCategory($data){
        $id = $data['id'];
        try{
            $stmt = DB::connect()->prepare('DELETE FROM categories WHERE cat_id = :id');
            $stmt->execute(array(":id" => $id));
            $category = $stmt->fetch(PDO::FETCH_OBJ);
            if($stmt->execute()){
                return 'ok';
            }else{
                return 'error';
            }
            $stmt->close();
            $stmt =null;
        }catch(PDOException $ex){
            echo "erreur " .$ex->getMessage();
        }
    }
    static public function editCategory($data){
        $stmt = DB::connect()->prepare('UPDATE categories SET
                cat_title = :category_title
                WHERE cat_id=:category_id
        ');
        $stmt->bindParam(':category_id',$data['category_id']);
        $stmt->bindParam(':category_title',$data['category_title']);

        if($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }
}