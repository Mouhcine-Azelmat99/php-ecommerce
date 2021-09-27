<?php

class CategoriesController{
    public function getAllCategories(){
        $categories = Category::getAll();
        return $categories;
    }
    public function getCategoryById($id){
        $category = Category::getCatById($id);
        return $category;
    }

    public function getCategory(){
        if(isset($_POST["category_id"])){
            $id=$_POST["category_id"];
            $category = Category::getCatById($id);
            return $category;
        }
    }
    public function newCategory(){
        if(isset($_POST["submit"])){
            $data = array(
                "cat_title" => $_POST["cat_title"],
                "image" => $this->uploadPhoto(),
            );
            $result = Category::addCategory($data);
            if ($result === 'exist'){
                Session::set("error","Category Already exist");
                Redirect::to("categories");
            }
            elseif($result === "ok"){
                Session::set("success","Category Added successfully");
                Redirect::to("categories");
            }else {
                echo $result;
            }

        }
    }
    public function updateCategory(){
        if(isset($_POST["submit"])){
            $data = array(
                "category_id" => $_POST["category_id"],
                "category_title" => $_POST["category_title"],
            );
            $result = Category::editCategory($data);
            if($result === "ok"){
                Session::set("success","Category modified");
                Redirect::to("categories");
            }else{
                echo $result;
            }
        }
    }
    public function removeCategory(){
        if(isset($_POST["delete_category_id"])){
            $data = array(
                "id" => $_POST["delete_category_id"]
            );
            $result = Category::deleteCategory($data);
            if($result === "ok"){
                Session::set("success","Categories Delete");
                Redirect::to("categories");
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