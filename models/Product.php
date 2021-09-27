<?php

class Product{
    static public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM products');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt =null;
    }
    static public function getProductTrending(){
        $stmt = DB::connect()->prepare('SELECT * FROM products WHERE trend = 1');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt =null;
    }
    static public function getProductByCat($data){
        $id = $data['id'];
        try{
            $stmt = DB::connect()->prepare('SELECT * FROM products WHERE product_category_id = :id');
            $stmt->execute(array(":id" => $id));
            return $stmt->fetchAll();
            $stmt->close();
            $stmt =null;
        }catch(PDOException $ex){
            echo "erreur " .$ex->getMessage();
        }
    }
    static public function getProductById($data){
        $id = $data['id'];
        try{
            $stmt = DB::connect()->prepare('SELECT * FROM products WHERE product_id = :id');
            $stmt->execute(array(":id" => $id));
            $product = $stmt->fetch(PDO::FETCH_OBJ);
            return $product;
            $stmt->close();
            $stmt =null;
        }catch(PDOException $ex){
            echo "erreur " .$ex->getMessage();
        }
    }

    static public function getProductByName($data){
        $name = $data['name'];
        try{
            $stmt = DB::connect()->prepare('SELECT * FROM products WHERE product_title = :title');
            $stmt->execute(array(":title" => $name));
            $product = $stmt->fetch(PDO::FETCH_OBJ);
            return $product;
            $stmt->close();
            $stmt =null;
        }catch(PDOException $ex){
            echo "erreur " .$ex->getMessage();
        }
    }

    static public function addProduct($data){
        $stmt = DB::connect()->prepare('SELECT * FROM products WHERE product_title = :product_title');
            $stmt->execute(array(':product_title'=>$data['product_title'])); 
            $r=$stmt->fetchAll();
            if (count($r)>0 ){
                return 'exist';
            } else {
        $stmt = DB::connect()->prepare('INSERT INTO products (product_title
        ,product_description,product_image,
        product_price,product_category_id)
        VALUES (:product_title,:product_description,:product_image,
        :product_price,:product_category_id)');
        $stmt->bindParam(':product_title',$data['product_title']);
        $stmt->bindParam(':product_description',$data['product_description']);
        $stmt->bindParam(':product_image',$data['product_image']);
        $stmt->bindParam(':product_price',$data['product_price']);
        $stmt->bindParam(':product_category_id',$data['product_category_id']);
        if($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
    }
        $stmt->close();
        $stmt = null;
    }
    static public function editProduct($data){
        $stmt = DB::connect()->prepare('UPDATE products SET
                product_title = :product_title,
                product_description=:product_description,
                product_image=:product_image,
                product_price=:product_price,
                product_category_id=:product_category_id
                WHERE product_id=:product_id
        ');
        $stmt->bindParam(':product_id',$data['product_id']);
        $stmt->bindParam(':product_title',$data['product_title']);
        $stmt->bindParam(':product_description',$data['product_description']);
        $stmt->bindParam(':product_image',$data['product_image']);
        $stmt->bindParam(':product_price',$data['product_price']);
        $stmt->bindParam(':product_category_id',$data['product_category_id']);
        if($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }
    static public function deleteProduct($data){
        $id = $data['id'];
        try{
            $stmt = DB::connect()->prepare('DELETE FROM products WHERE product_id = :id');
            $stmt->execute(array(":id" => $id));
            $product = $stmt->fetch(PDO::FETCH_OBJ);
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
    static public function trendProduct($data){
        $id = $data['id'];
        try{
            $stmt = DB::connect()->prepare('UPDATE products SET trend = 1 WHERE product_id = :id');
            $stmt->execute(array(":id" => $id));
            $product = $stmt->fetch(PDO::FETCH_OBJ);
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
}