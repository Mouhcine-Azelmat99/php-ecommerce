<?php   
    $data = new ProductsController();
    $products = $data->getAllProducts();    


?>
<div class="col py-3">
<div class="content py-3">
            <div class="container-fluid ">
                <a href="<?php echo BASE_URL?>addProduct" class="btn btn-primary px-5
                btn-lg">+ Add new product</a>
                <div class="row py-5">
                <form id="form" action="<?php echo BASE_URL?>updateProduct" method="POST">
                    <input type="hidden" name="product_id" id="product_id">
                </form>
                <form id="delete_form" action="<?php echo BASE_URL?>deleteProduct" method="POST">
                    <input type="hidden" name="delete_product_id" id="delete_product_id">
                </form>
            <?php include_once'views/includes/alerts.php' ?>
            <div class="card bg-light p-3">
                <table class="table table-hover table-inverse">
                    <h3 class="font-weight-bold">Produits <?php echo count($products);?></h3>
                    <thead>
                        <tr>
                            <th>Libellé</th>
                            <th>Prix (dh)</th>
                            <th>Description</th>
                            <th>category</th>
                            <th>Image</th>
                            <th>Action / trend</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($products as $product) :?>
                        <tr>
                            <td><?php echo $product["product_title"];?></td>
                            <td><?php echo $product["product_price"];?></td>
                            <td><?php echo substr($product["product_description"],0,100);?></td>
                            <td><?php 
                            $cat=new CategoriesController();
                            $category=$cat->getCategoryById($product["product_category_id"]);
                            echo $category->cat_title ;
                            ?></td>
                            <td>
                                <img width="80" height="80"
                                src="./public/uploads/<?php echo $product["product_image"];?>"
                                alt="" class="img-fluid">
                            </td>
                            <td class="d-flex flex-row justify-content-center py-4">
                                <form id="form" action="<?php echo BASE_URL?>updateProduct" method="POST">
                                    <input type="hidden" name="product_id" value="<?php echo $product['product_id'];?>">
                                    <button class="btn btn-primary">
                                         <i class="fas fa-edit"></i>
                                    </button>
                                </form>
                                <form id="form" action="<?php echo BASE_URL?>deleteProduct" method="POST">
                                    <input type="hidden" name="product_id" value="<?php echo $product['product_id'];?>">
                                    <button class="btn btn-danger mx-2">
                                         <i class="fas fa-trash"></i>
                                    </button>
                                </form>

                                <form method="POST" action="<?php echo BASE_URL ;?>trend">
                                    <input type="hidden" name="trend_product_id" value="<?php echo $product['product_id'];?>">
                                    <button class="btn btn-<?php if($product['trend']==0){echo 'success';}else {echo 'warning';} ?>" type="submit" name="submit"><?php if($product['trend']==0){echo '<i class="fas fa-check-circle"></i>';}else {echo '<i class="fas fa-times-circle"></i>';} ?>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach;?>
                        </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
