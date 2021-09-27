<?php 
	
    
	if (isset($_POST['fav'])) {
		$favorits = new FavoritsController();
		$favorits = $favorits->AddFavorit();
	}
	else{
	$favorits = new FavoritsController();
	$favorits = $favorits->getFavorits();
	}
    if (isset($_POST['delete'])) {
        $favorits = new FavoritsController();
        $favorits->removefavorit();
    }

?>
<div class="container px-5">
	<div class="row py-4">
		     <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>PriCE</th>
                            <th>Description</th>
                            <th>category</th>
                            <th>Image</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($favorits as $favorit) :?>
                        <tr>
                        	<?php 
                        	$data=array(
                        		'id'=> $favorit['product_id']
                        	);
							$products= $product = Product::getProductById($data);
							 ?>

                            <td><?php echo $product->product_title;?></td>
                            <td><?php echo $product->product_price;?></td>
                            <td><?php echo substr($product->product_description,0,100);?></td>
                            <td><?php 
                            $cat=new CategoriesController();
                            $category=$cat->getCategoryById($product->product_category_id);
                            echo $category->cat_title ;
                            ?></td>
                            <td>
                                <img width="80" height="80"
                                src="./public/uploads/<?php echo $product->product_image;?>"
                                alt="" class="img-fluid">
                            </td>
                            <td class="d-flex flex-row justify-content-center py-4">
                                <form id="form" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $favorit['id'];?>">
                                    <button class="btn btn-danger mx-2" name="delete">
                                         <i class="fas fa-heart"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach;?>
                        </tbody>
                </table>
	</div>
</div>