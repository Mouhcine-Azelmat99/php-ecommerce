<?php
        $categories = new CategoriesController();
        $categories = $categories->getAllCategories();
        $productToUpdate = new ProductsController();
        $productToUpdate = $productToUpdate->getProduct();
        if(isset($_POST["submit"])){
            $product = new ProductsController();
            $product->updateProduct();
        }
?>
<div class="col py-3">
    <div class="content py-3">
        <div class="container-fluid ">
        <div class="row my-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Update product
                    </h3>
                </div>
                <div class="card-body">
                    <form method="post" class="mr-1" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <input type="text"
                            class="form-control"
                            name="product_title"
                            required autocomplete="off"
                            placeholder="Titre"
                            value="<?php echo $productToUpdate->product_title;?>">
                        </div>
                        <div class="form-group mb-3">
                            <textarea row="5" cols="30" autocomplete="off" class="form-control" name="product_description" style="min-height: 100px;" 
                            placeholder="Description" id=""><?php echo $productToUpdate->product_description;?></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <select class="form-control" name="product_category_id" id="">
                                <?php foreach($categories as $category) :?>
                                    <option
                                        <?php echo $productToUpdate->product_category_id === $category["cat_id"] ? "selected" : "";?>
                                        value="<?php echo $category["cat_id"]?>">
                                        <?php echo $category["cat_title"]?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <input type="number" autocomplete="off"
                            class="form-control" name="product_price"
                            placeholder="Prix"
                            value="<?php echo $productToUpdate->product_price;?>">
                        </div>
                        <input type="hidden"
                            name="product_id"
                            value="<?php echo $productToUpdate->product_id;?>">
                        <input type="hidden" name="product_current_image"
                            value="<?php echo $productToUpdate->product_image;?>">
                        <div class="form-group mb-3">
                            <img src="./public/uploads/<?php echo $productToUpdate->product_image;?>" width="200" height="200" alt="" class="img-fluid rounded">
                        </div>
                         <div class="form-group mb-3">
                            <input type="file"
                            class="form-control" name="image" >
                        </div>
                        <div class="form-group mb-3">
                            <button name="submit" class="btn btn-primary px-5">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
</div>