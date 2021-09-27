<?php 

    $categories = new CategoriesController();
    $categories = $categories->getAllCategories();
    if(isset($_POST["cat_submit"])){
      $products = new ProductsController();
      $products = $products->getProductsByCategory($_POST['cat_id']);
  }else{
      $data = new ProductsController();
      $products = $data->getAllProducts();
  }
?>

<!-- Start Featured Work -->
<div class="featured-work text-center">
      <div class="container-fluid mb-5">
      <div class="row">
        <?php
              if (isset($_POST['search'])) {
                $product=new SearchController();
                $product=$product->findProduct();
                if ($product) {  
        ?>
        <!-- product searched  -->
        <div class="col-4"></div>
        <div class="col-4 shadow" id="card">
              <div class="product">
                  <div class="product-header">
                    <img src="./public/uploads/<?php echo $product->product_image;?>" alt="product" height="250px">
                  </div>
                  <div class="product-footer">
                    <h3 ><?php echo $product->product_title; ?></h3>
                    <div class="rating">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="far fa-star"></i>
                    </div>
                    <div class="product-price">
                      <h4><?php
                            echo $product->product_price;?>dh</h4>
                    </div>
                  </div>
                  <ul>
                    <li>
                      <form method="post" action="<?php echo BASE_URL;?>favorits">
                          <input type="hidden" name="product_id" value="<?php echo $product->product_id;?>">
                          <button type="submit" name="fav">
                            <i class="fas fa-heart"></i>
                          </button>
                      </form>
                    </li>
                    <li>
                      <form id="form" method="post" action="<?php echo BASE_URL;?>show">
                          <input type="hidden" name="product_id" id="product_id" value="<?php echo $product->product_id;?>">
                          <button type="submit" name="submit">
                            <i class="fas fa-shopping-cart"></i>
                          </button>
                      </form>
                    </li>
                  </ul>
                </div>
            </div>
            <?php } else { ?>
              
              <div class="alert alert-danger" role="alert">
                Product Not founded  <a href="<?php echo BASE_URL?>home" class="alert-link">Back</a>.
              </div>    
            <?php }} else { ?>

        <div class="col-lg-3 sticky-lg-top my-3" id="category">
        <h3 class="mb-4">Categories </h3>

        <div class="list-group">
            <a href="<?php echo BASE_URL?>product" class="list-group-item list-group-item-action active" aria-current="true" id="cat_all">
              All
            </a>
            <?php
                    foreach($categories as $category) :
        ?>
                   <form method="post" action="">
                            <input type="hidden" name="cat_id" id="cat_id" value="<?php echo $category['cat_id']?>">
                            <button type="submit" name="cat_submit" class="list-group-item list-group-item-action" id="cat_link" style="cursor: pointer;" >
                            <?php
                                echo $category['cat_title'];
                            ?>
                        </button>
                   </form>
                        <?php
                    endforeach;
                ?>
          </div>
      </div>

        <div class="col-lg-9">
          <div class="row">
          <?php
                    if(count($products) > 0) :
                ?>
                <?php
                    foreach($products as $product) :
                ?>
            <div class="col-lg-3 col-sm-6 shadow" id="card">
              <div class="product">
                <form id="form" method="post" action="<?php echo BASE_URL;?>show">
                    <input type="hidden" name="product_id" id="product_id">
                </form>
                  <div class="product-header">
                    <img src="./public/uploads/<?php echo $product["product_image"];?>" alt="product" height="250px">
                  </div>
                  <div class="product-footer">
                    <h3 onclick="submitForm(<?php echo $product["product_id"];?>)"><?php
                                    echo $product['product_title']; ?></h3>
                    <div class="rating">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="far fa-star"></i>
                    </div>
                    <div class="product-price">
                      <h4><?php
                            echo $product['product_price'];?>dh</h4>
                    </div>
                  </div>
                  <ul>
                    <li>
                      <form method="post" action="<?php echo BASE_URL;?>favorits">
                          <input type="hidden" name="product_id" value="<?php echo $product['product_id'];?>">
                          <button type="submit" name="fav">
                            <i class="fas fa-heart"></i>
                          </button>
                      </form>
                    </li>
                    <li>
                      <form id="form" method="post" action="<?php echo BASE_URL;?>show">
                          <input type="hidden" name="product_id" id="product_id" value="<?php echo $product["product_id"];?>">
                          <button type="submit" name="submit">
                            <i class="fas fa-shopping-cart"></i>
                          </button>
                      </form>
                    </li>
                  </ul>
                </div>
            </div>
            <?php
                    endforeach;
                ?>
                <?php
                    else :
                ?>
                <div class="alert alert-info">
                    Product doesn't exist
                </div>
                <?php
                    endif;
                ?>
        </div>
        </div>
      <?php } ?>
        </div>
    </div>
</div>
    <!-- End Featured Work -->