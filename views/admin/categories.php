<?php
    $categories =new CategoriesController();
    $categories=$categories->getAllCategories();
?>
<div class="col py-3">
<div class="content py-3">
            <div class="container-fluid">
                <h1>Categories</h1><hr>
                <a href="<?php echo BASE_URL?>addCategory" class="btn btn-primary px-5
                btn-lg">+ Add New Category</a>
                <div class="row py-5">
                <form id="form" action="<?php echo BASE_URL?>updateCategory" method="POST">
                    <input type="hidden" name="category_id" id="category_id">
                </form>
                <form id="delete_form" action="<?php echo BASE_URL?>deleteCategory" method="POST">
                    <input type="hidden" name="delete_category_id" id="delete_category_id">
                </form>
                <?php include_once'views/includes/alerts.php' ?>
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">Name</th>
                          <th scope="col">Image</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php  
                      foreach($categories as $category) :
                       ?>
                        <tr>
                            <td><h3><?php echo $category['cat_title']; ?></h3></td>
                            <td>
                                <img width="80" height="80"
                                src="./public/uploads/<?php echo $category["image"];?>"
                                alt="" class="img-fluid">
                            </td>
                             <td class="d-flex flex-row justify-content-center py-4">
                                <a onclick="submitFormCategory(<?php echo $category['cat_id'];?>)" class="btn btn-primary ">
                                <i class="fas fa-edit"></i>
                                </a>
                                <a onclick="deleteFormCategory(<?php echo $category['cat_id'];?>)" class="btn btn-danger mx-3">
                                <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>