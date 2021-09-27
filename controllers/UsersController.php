<?php

class UsersController{
    public function auth(){
        if(isset($_POST["submit"])){
            $data["username"] = $_POST["username"];
            $result = User::login($data);
            if($result->username === $_POST["username"] && password_verify($_POST["password"],$result->password)){
                $_SESSION["logged"] = true;
                $_SESSION["username"] = $result->username;
                $_SESSION["user_id"] = $result->user_id;
                Redirect::to("home");
            }else{
                Session::set("error","Pseudo ou mot de passe est incorrect");
                Redirect::to("login");
            }
        }
    }
    public function register(){
        $options = [
            "cost" => 12
        ];
        $password = password_hash($_POST["password"],PASSWORD_BCRYPT,$options);
        $data = array(
            "username" => $_POST["username"],
            "email" => $_POST["email"],
            "tel" => $_POST["tel"],
            "password" => $password,
        );
        $result = User::createUser($data);
        if($result === "ok"){
            Session::set("success","Compte crée");
            Redirect::to("login");
        }else{
            echo $result;
        }
    }
    public function logout(){
        session_destroy();
    }
    public function getAll(){
        $users = User::getAll();
        return $users;
    }
    public function getUserById(){
        $data["user_id"] = $_SESSION['user_id'];
        $result = User::getById($data);
        return $result;  
    }
}