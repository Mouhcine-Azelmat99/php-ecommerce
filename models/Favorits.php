<?php 

	class Favorits{
		static public function getAll(){
			$user_id = $_SESSION['user_id'];
			$stmt = DB::connect()->prepare('SELECT * FROM favorits WHERE user_id = :user_id');
			$stmt->execute(array(':user_id'=>$user_id));          
			return $stmt->fetchAll();
            $stmt->close();
            $stmt =null;
		}
		static public function AddFavorit($data){
			$product_id = $data['product_id'];
			$user_id = $data['user_id'];
			$stmt = DB::connect()->prepare('SELECT * FROM favorits WHERE product_id = :product_id');
			$stmt->execute(array(':product_id'=>$product_id)); 
			$r=$stmt->fetchAll();
			if (count($r)>0 ){
				return 'exist';
			} else {
			$stmt = DB::connect()->prepare('INSERT INTO favorits (user_id,product_id)
	        VALUES (:user_id,:product_id)');
	        $stmt->bindParam(':user_id',$data['user_id']);
	        $stmt->bindParam(':product_id',$data['product_id']);
	        if($stmt->execute()){
            return 'ok';
	        }else{
	            return 'error';
	        }
	    }
	        $stmt->close();
	        $stmt = null;
		}
		static public function deletefavorit($data){
        $id = $data['id'];
        try{
            $stmt = DB::connect()->prepare('DELETE FROM favorits WHERE id = :id');
            $stmt->execute(array(":id" => $id));
            $favorit = $stmt->fetch(PDO::FETCH_OBJ);
            if($stmt->execute()){
                return 'ok';
            }else{
                return 'error';
            }
            $stmt->close();
            $stmt =null;
        }catch(PDOException $ex){
            echo "erreur " .$ex->getMessage();
        }
    }
	}
