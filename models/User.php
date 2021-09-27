<?php

class User{
    static public function login($data){
        $username = $data["username"];
        try {
            $query = "SELECT * FROM users WHERE username = :username";
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":username"=>$username));
            $user = $stmt->fetch(PDO::FETCH_OBJ);
            return $user;
        } catch (PDOException $ex) {
            echo "error : ".$ex.getMessage();
        }
    }

    static public function createUser($data){
        $stmt = DB::connect()->prepare('INSERT INTO users (username,email,tel,password)
        VALUES (:username,:email,:tel,:password)');
        $stmt->bindParam(':username',$data['username']);
        $stmt->bindParam(':email',$data['email']);
        $stmt->bindParam(':tel',$data['tel']);
        $stmt->bindParam(':password',$data['password']);
        if($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }
    static public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM users');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt =null;
    }
    static public function getById($data){
        $user_id = $data["user_id"];
        try {
            $query = "SELECT * FROM users WHERE user_id = :user_id";
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":user_id"=>$user_id));
            $user = $stmt->fetch(PDO::FETCH_OBJ);
            return $user;
        } catch (PDOException $ex) {
            echo "error : ".$ex.getMessage();
        }
    }
    }
