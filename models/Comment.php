<?php

class Comment{
    static public function getAll($data){
        $blog_id=$data['blog_id'];
        $stmt = DB::connect()->prepare('SELECT * FROM comments WHERE blog_id = :blog_id');
        $stmt->bindParam(':blog_id',$data['blog_id']); 
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt =null;
    }
    static public function addComment($data){
        $stmt = DB::connect()->prepare('INSERT INTO comments (username,comment,blog_id,create_at)
        VALUES (:username,:comment,:blog_id,NOW())');
        $stmt->bindParam(':username',$data['username']);
        $stmt->bindParam(':comment',$data['comment']);
        $stmt->bindParam(':blog_id',$data['blog_id']);        
        if($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }
}