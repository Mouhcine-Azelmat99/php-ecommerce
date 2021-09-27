<?php 

	class FavoritsController {
		public function getFavorits(){
			$favorits = Favorits::getAll();
			if($favorits){
				$_SESSION['count_favorits'] = count($favorits);
			}
        	return $favorits;
		}
		public function AddFavorit(){
        if(isset($_POST["fav"])){
            $data = array(
                "user_id" => $_SESSION["user_id"],
                "product_id" => $_POST["product_id"],
            );
            $result = Favorits::AddFavorit($data);
            if($result === "ok"){
                Session::set("success","Product Added successfully to favorits");
                Redirect::to("product");
            }elseif ($result === "exist") {
                Session::set("error","Product Already exist in favorits");
                Redirect::to("product");
            }else{
                echo $result;
            }
        }
    }

    public function removefavorit(){
        if(isset($_POST["id"])){
            $data = array(
                "id" => $_POST["id"]
            );
            $result = Favorits::deletefavorit($data);
            if($result === "ok"){
                Session::set("success","favorit Delete successfully");
                Redirect::to("favorits");
            }else{
                echo $result;
            }
        }
    }

}