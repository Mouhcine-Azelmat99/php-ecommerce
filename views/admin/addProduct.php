<?php
        $categories = new CategoriesController();
        $categories = $categories->getAllCategories();
        if(isset($_POST["submit"])){
            $product = new ProductsController();
            $product->newProduct();
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
                            Add new product
                        </h3>
                    </div>
                    <div class="card-body">
                        <form method="post" class="mr-1" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <input type="text"
                                class="form-control"
                                name="product_title" required autocomplete="off" placeholder="Titre" id="">
                            </div>
                            <div class="form-group mb-3">
                                <textarea row="5" cols="20" autocomplete="off" class="form-control" name="product_description"
                                placeholder="Description" id=""></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <select class="form-select" aria-label="Default select example" name="product_category_id" id="">
                                         <option class="selected"">
                                            Categories
                                        </option>
                                    <?php foreach($categories as $category) :?>
                                        <option value="<?php echo $category["cat_id"]?>">
                                            <?php echo $category["cat_title"]?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <input type="number" autocomplete="off"
                                class="form-control" name="product_price"
                                placeholder="Prix" id="">
                            </div>
                            <div class="form-group mb-3">
                                <input type="file"
                                class="form-control" name="image" >
                            </div>
                            <div class="form-group mb-3 d-flex">
                                <button name="submit" class="btn btn-primary px-5">
                                    Valider
                                </button>
                                <a href="<?php echo BASE_URL?>products" class="btn btn-danger px-5 mx-5">
                                    Cansel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
