<?php

	class ContactController {
		public function newContact(){
        if(isset($_POST["submit"])){
            $data = array(
                "username" => $_POST["username"],
                "email" => $_POST["email"],
                "message" => $_POST["message"]
            );
            $result = Contact::addContact($data);
            if($result === "ok"){
                Session::set("success","Contact Added successfully");
                Redirect::to("home");
            }else{
                echo $result;
            }
        }
    }
    public function getAll(){
        $contacts = Contact::getAll();
        return $contacts;
    }
}