<?php

class AdminController{
    public function index($page){
        include('views/admin/'.$page.'.php');
    }
    public function auth(){
        if(isset($_POST["submit"])){
            $data["admin_username"] = $_POST["username"];
            $result = Admin::login($data);
            // if($result->username === $_POST["username"] && password_verify($_POST["password"],$result->password)){
            if($result->username === $_POST["username"] && $_POST['password']===$result->password){
                $_SESSION['admin_username'] =$result->username;
                Redirect::to("dashboard");
            }else{
                Session::set("error","Pseudo ou mot de passe est incorrect");
                Redirect::to("dashboard");
            }
        }
    }

    public function getAll(){
        $admins = Admin::getAll();
        return $admins;
    }

    public function logout(){
        unset($_SESSION['admin_username']);
    }

    public function getAdminByname(){
        $data["admin_username"] = $_SESSION['admin_username'];
        $result = Admin::login($data);
        return $result;  
    }
}