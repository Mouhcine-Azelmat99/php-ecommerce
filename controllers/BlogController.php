<?php

class BlogController{
    public function getAllBlogs(){
        $blogs = Blog::getAll();
        return $blogs;
    }
    
    public function getBlog(){
        if(isset($_POST["submit"])){
            $data = array(
                'id' =>$_POST["blog_id"]
            );
            $blog = Blog::getBlogById($data);
            return $blog;
        }
    }

    public function newBlog(){
        if(isset($_POST["submit"])){
            $data = array(
                "title" => $_POST["title"],
                "content" => $_POST["content"],
                "image" => $this->uploadPhoto(),
            );
            $result = blog::addBlog($data);
            if($result === "ok"){
                Session::set("success","blog Added successfully");
                Redirect::to("blogs");
            }else{
                echo $result;
            }
        }
    }
    public function updateblog(){
        if(isset($_POST["submit"])){
            $oldImage = $_POST["current_image"];
            $data = array(
                "id" => $_POST["id"],
                "title" => $_POST["title"],
                "content" => $_POST["content"],
                "image" => $this->uploadPhoto($oldImage),
            );
            $result = blog::editblog($data);
            if($result === "ok"){
                Session::set("success","blog has been updated");
                Redirect::to("blogs");
            }else{
                echo $result;
            }
        }
    }
    public function removeblog(){
        if(isset($_POST["id"])){
            $data = array(
                "id" => $_POST["id"]
            );
            $result = blog::deleteblog($data);
            if($result === "ok"){
                Session::set("success","blog Delete successfully");
                Redirect::to("blogs");
            }else{
                echo $result;
            }
        }
    }
    public function uploadPhoto($oldImage = null){
        $dir = "public/uploads";
        $time = time();
        $name = str_replace(' ','-',strtolower($_FILES["image"]["name"]));
        $type = $_FILES["image"]["type"];
        $ext = substr($name,strpos($name,'.'));
        $ext = str_replace('.','',$ext);
        $name = preg_replace("/\.[^.\s]{3,4}$/", "",$name);
        $imageName = $name.'-'.$time.'.'.$ext;
        if(move_uploaded_file($_FILES["image"]["tmp_name"],$dir."/".$imageName)){
            return $imageName;
        }
        return $oldImage;
    }
}