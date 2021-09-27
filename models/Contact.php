<?php

class Contact{
    static public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM contact');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt =null;
    }
    
    static public function addContact($data){
        $stmt = DB::connect()->prepare('INSERT INTO contact (username,email,message,send_at)
        VALUES (:username,:email,:message,NOW())');
        $stmt->bindParam(':username',$data['username']);
        $stmt->bindParam(':email',$data['email']);
        $stmt->bindParam(':message',$data['message']);
        if($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }
    
}