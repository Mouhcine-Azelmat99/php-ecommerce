<?php

class Blog{
    static public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM blog');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt =null;
    }
    static public function getBlogById($data){
        $id=$data['id'];
        try{
            $stmt = DB::connect()->prepare('SELECT * FROM blog WHERE id = :id');
            $stmt->execute(array(":id" => $id));
            $blog = $stmt->fetch(PDO::FETCH_OBJ);
            return $blog;
            $stmt->close();
            $stmt =null;
        }catch(PDOException $ex){
            echo "erreur " .$ex->getMessage();
        }
    }
    static public function addBlog($data){
        $stmt = DB::connect()->prepare('INSERT INTO blog (title,content,image,created_at)
        VALUES (:title,:content,:image,NOW())');
        $stmt->bindParam(':title',$data['title']);
        $stmt->bindParam(':content',$data['content']);
        $stmt->bindParam(':image',$data['image']);
        if($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }
    static public function deleteblog($data){
        $id = $data['id'];
        try{
            $stmt = DB::connect()->prepare('DELETE FROM blog WHERE id = :id');
            $stmt->execute(array(":id" => $id));
            $blog = $stmt->fetch(PDO::FETCH_OBJ);
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
    static public function editblog($data){
        $stmt = DB::connect()->prepare('UPDATE blog SET
                title = :title,content=:content,image=:image,created_at=NOW()
                WHERE id=:id
        ');
        $stmt->bindParam(':id',$data['id']);
        $stmt->bindParam(':title',$data['title']);
        $stmt->bindParam(':content',$data['content']);
        $stmt->bindParam(':image',$data['image']);

        if($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }
}