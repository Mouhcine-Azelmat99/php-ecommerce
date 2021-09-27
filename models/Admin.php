<?php 

    class Admin {
        static public function login ($data){
        $username = $data["admin_username"];
        try {
            $query = "SELECT * FROM admin WHERE username = :username";
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":username"=>$username));
            $admin = $stmt->fetch(PDO::FETCH_OBJ);
            return $admin;
        } catch (PDOException $ex) {
            echo "error : ".$ex.getMessage();
        }
        }
        static public function getAll(){
            $stmt = DB::connect()->prepare('SELECT * FROM admin');
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->close();
            $stmt =null;
        } 
    }