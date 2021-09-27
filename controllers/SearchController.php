<?php 

	class SearchController {
		public function findProduct(){
			if (isset($_POST['search'])) {
				$data = array(
                'name' =>  $_POST['product']
            );
            $product = Product::getProductByName($data);
            return $product;
			}
		}
	}