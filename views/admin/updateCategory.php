<?php
        $categoryToUpdate = new CategoriesController();
        $categoryToUpdate = $categoryToUpdate->getCategory();
        if(isset($_POST["submit"])){
            $category = new CategoriesController();
            $category->updateCategory();
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
                            Update Category
                        </h3>
                    </div>
                    <div class="card-body">
                        <form method="post" class="mr-1">
                        <input type="hidden" name="category_id" value="<?php echo $categoryToUpdate->cat_id;?>">
                            <div class="form-group mb-3">
                                <input type="text"
                                class="form-control"
                                name="category_title"
                                required autocomplete="off"
                                placeholder="Title"
                                value="<?php echo $categoryToUpdate->cat_title;?>">
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