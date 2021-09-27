<?php

class CommentController{
    public function getAllComments(){
        $data = array(
             "blog_id" => $_POST['blog_id'],
        );
        $comments = Comment::getAll($data);
        return $comments;
    }
    public function newComment(){
        if(isset($_POST["submit"])){
            $data = array(
                "blog_id" => $_POST['blog_id'],
                "username" => $_SESSION["username"],
                "comment" => $_POST["comment"]
            );
            $result = Comment::addComment($data);
            if($result === "ok"){
                Session::set("success","Comment Added successfully");
                Redirect::to("home");
            }else{
                echo $result;
            }
        }
    }
}    