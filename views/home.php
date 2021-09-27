<?php 
  $cat=new CategoriesController();
  $categories=$cat->getAllCategories();

  $blogs=new BlogController();
  $blogs=$blogs->getAllBlogs();

?>
<?php include_once'views/includes/alerts.php' ?>
<!-- Back to top button -->
  <a id="button"></a>
  
  <!-- Main -->
  <main>
    <!-- Hero -->
    <section class="hero">
      <div class="glide glide1" id="glide1">
        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides glide__hero">

            <li class="glide__slide">
              <div class="banner">
                <div class="banner-content">
                  <span>New Inspiration 2020</span>
                  <h1>CLOTHING MADE FOR YOU!</h1>
                  <h3>Trending from men and women style collection</h3>
                  <div class="buttons-group">
                    <button>shop women's</button>
                    <button>shop men's</button>
                  </div>
                </div>
                <img src="./images/undraw_Welcome_re_h3d9.svg" class="special_01"  id="img_slide" >
            </li>

            <li class="glide__slide">
              <div class="banner banner1">
                <div class="banner-content">
                  <span>New Inspiration 2020</span>
                  <h1>CLOTHING MADE FOR YOU!</h1>
                  <h3>Trending from men and women style collection</h3>
                  <div class="buttons-group">
                    <button>shop women's</button>
                    <button>shop men's</button>
                  </div>
                </div>
                <img src="./images/undraw_Online_payments_re_y8f2.svg" class="special_02" id="img_slide" >
              </div>
            </li>

            <li class="glide__slide">
              <div class="banner">
                <div class="banner-content">
                  <span>New Inspiration 2020</span>
                  <h1>CLOTHING MADE FOR YOU!</h1>
                  <h3>Trending from men and women style collection</h3>
                  <div class="buttons-group">
                    <button>shop women's</button>
                    <button>shop men's</button>
                  </div>
                </div>
                <img src="./images/undraw_Credit_card_payment_re_o911.svg" class="special_03" id="img_slide" >
              </div>
            </li>

          </ul>
        </div>

        <!-- Arrows -->
        <div class="glide__arrows" data-glide-el="controls">
          <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="fas fa-angle-double-left"></i></button>
          <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><i
              class="fas fa-angle-double-right"></i></button>
        </div>
      </div>
    </section>

    <!-- Category -->
    <section class="section category">
      <div class="title-container">
        <div class="section-titles">
          <div class="section-title active">
            <span class="dot"></span>
            <h1 class="primary-title">Categories</h1>
          </div>
        </div>
      </div>      
      <h2 class="title">Allow your style to match your ambition!</h2>
      <div class="category-center container">
        <?php
              foreach($categories as $category) :
        ?>
        <div class="category-box">
          <img src="./public/uploads/<?php echo $category['image'];?>" alt="" id="cat_img">
          <div class="content">
            <h2>Shop <?php echo $category['cat_title'];?></h2>
            <span>155 Products</span>
            <a href="<?php echo BASE_URL ?>product">shop now</a>
          </div>
        </div>
        <?php
            endforeach;
         ?>
      </div>
    </section>

    <!-- Filtered Products -->
    <section class="section sort-category">
      <div class="title-container ">
        <div class="section-titles">
          <div class="section-title active filter-btn" data-id="trend">
            <span class="dot"></span>
            <h1 class="primary-title">Trending Products</h1>
          </div>
        </div>

        <div class="section-titles">
          <div class="section-title filter-btn" data-id="special">
            <span class="dot"></span>
            <h1 class="primary-title">Special Products</h1>
          </div>
        </div>

        <div class="section-titles">
          <div class="section-title filter-btn" data-id="featured">
            <span class="dot"></span>
            <h1 class="primary-title">Featured Products</h1>
          </div>
        </div>
      </div>

      <div class="product-center container">
    <?php 
        $data = new ProductsController();
        $products = $data->getProductsTrending();

        foreach($products as $product) :
        ?>  
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
      <?php endforeach; ?>
      </div>
    </section>

    <!-- Grid -->
    <section class="gallary container">
      <figure class="gallary-item item-1">
        <img src="./images/grid_1.jpg" alt="" class="gallary-img">
        <div class="content">
          <h2>Our Popular Products</h2>
          <a href="#">View more</a>
        </div>
      </figure>

      <figure class="gallary-item item-2">
        <img src="./images/grid_2.jpg" alt="" class="gallary-img">
        <div class="content">
          <h2>Winter Collections</h2>
        </div>
      </figure>

      <figure class="gallary-item item-3">
        <img src="./images/grid_3.jpg" alt="" class="gallary-img">
        <div class="content">
          <h2>Summer Collections</h2>
        </div>
      </figure>

      <figure class="gallary-item item-4">
        <img src="./images/grid_4.jpg" alt="" class="gallary-img">
        <div class="content">
          <h2>Up to 70% OFF Spring Sale!</h2>
        </div>
      </figure>
    </section>

    <!-- All Products -->
<!--     <section class="section" id="shop">
      <div class="title-container">
        <div class="section-titles">
          <div class="section-title active" data-id="latest">
            <span class="dot"></span>
            <h1 class="primary-title">All Products</h1>
          </div>
        </div>
      </div>

      <div class="shop-center product-center container">

      </div>
    </section> -->

 <!-- blog -->
    <section class="section blog" id="blog">
      <div class="title-container">
        <div class="section-titles">
          <div class="section-title active">
            <span class="dot"></span>
            <h1 class="primary-title">Latest News</h1>
          </div>
        </div>
      </div>

      <div class="blog-container container">
        <div class="glide" id="glide3">
          <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
              <?php 
                    foreach($blogs as $blog) :
              ?>
              <li class="glide__slide">
                <div class="blog-card">
                  <div class="card-header">
                    <img src="./public/uploads/<?php echo $blog['image'];?>" alt="">
                  </div>
                  <div class="card-footer">
                    <h3><?php echo $blog['title'] ?><h3>
                    <span>By Admin</span>
                    <p><?php echo $blog['content'] ?></p>
                    <form method="post" action="<?php echo BASE_URL?>blog">
                      <input type="hidden" name="blog_id" value="<?php echo $blog['id'] ?>">
                      <button name="submit" type="submit" >Read More</button>
                    </form>
                  </div>
                </div>
              </li>
              <?php endforeach ?>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact section  -->
    <section class="contact" id="contact">
    <div class="container-fluid rounded">
    <div class="row px-5">
        <div class="col-sm-6">
            <div>
                <h3 class="text-white fs-1">Contact us</h3>
                <p>Fill up the form and our Team will get back to you within in 24 hours</p>
            </div>
            <div class="links" id="bordering">
              <a href="#" class="btn rounded text-white p-3 fs-4">
                 <i class="fa fa-phone icon text-primary pr-3"></i>+0123 4567 8910
              </a> 
              <a href="#" class="btn rounded text-white p-3 fs-4">
                 <i class="fa fa-envelope icon text-primary pr-3"></i>hello@flowbase.com</a> 
              <a href="#" class="btn rounded text-white p-3 fs-4">
                 <i class="fa fa-map-marker icon text-primary pr-3"></i>102 street 2714 Don</a> 
            </div>
            <div class="pt-lg-4 d-flex flex-row justify-content-start">
                <div class="pad-icon"> <a class="text-white" href="#"><i class="fab fa-facebook"></i></a> </div>
                <div class="pad-icon"> <a class="text-white" href="#"><i class="fab fa-twitter"></i></a> </div>
                <div class="pad-icon"> <a class="text-white" href="#"><i class="fab fa-instagram"></i></a> </div>
            </div>
        </div>
        <div class="col-sm-6 pad">
            <form class="rounded msg-form fs-3" method="post" action="contact">
                <div class="form-group"> <label for="name" class="h6">Your Name</label>
                    <div class="input-group border rounded">
                        <div class="input-group-addon px-2 pt-1">
                            <p class="fa fa-user-o text-primary"></p>
                        </div>
                        <div class="input-group-addon pt-1"> <i class="fa fa-user text-primary"></i> </div>
                        <input type="text" class="form-control border-0 fs-3 p-2" name="username"
                        <?php if(isset($_SESSION["username"])){ ?> value="<?php echo $_SESSION['username'];}?>" required
                        >
                    </div>
                </div>
                <div class="form-group"> <label for="name" class="h6">Email</label>
                    <div class="input-group border rounded">
                        <div class="input-group-addon px-3 pt-1"> <i class="fa fa-envelope text-primary"></i> </div> <input type="text" name="email" class="form-control border-0 fs-3 p-2" 
                        <?php if(isset($_SESSION["email"])){ ?> value="<?php echo $_SESSION['email'];}?>" required
                        >
                    </div>
                </div>
                <div class="form-group"> <label for="msg" class="h6">Message</label> <textarea name="message" id="msgus" cols="10" rows="5" class="form-control bg-light fs-3 p-2" placeholder="Message" required></textarea> </div>
                <div class="form-group d-flex justify-content-end"> <input type="submit" class="btn btn-primary text-white btn-lg p-3 my-2" value="send message" name="submit"> </div>
            </form>
          </div>
        </div>
    </div>
  </section>
    

    <!-- Start about -->
    <div class="about text-center" id="about">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6" id="about_text">
          <h2 class="h1">Abou us</h2>
          <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
          </p>
          <?php if (!isset($_SESSION['userame'])) {
            echo "<h4>Sign in and get a least of costs</h4> <hr class='fs-1'>
            <a href='register'>Sign in</a >";
          }
          ?>
      </div>
      <div class="col-lg-6" id="about_img">
        <img src="./images/cat2.jpg" height="100%" width="100%">
      </div>
      </div>
    </div>
    </div>
    <!-- End about -->

    <!-- Latest Products -->
    <!-- <section class="section latest-products" id="new">
      <div class="title-container">
        <div class="section-titles">
          <div class="section-title active" data-id="latest">
            <span class="dot"></span>
            <h1 class="primary-title">Latest Products</h1>
          </div>
        </div>
      </div>
      <div class="latest-center product-center container"></div>
    </section>
 -->
   

    <!-- Facility -->
    <section class="facility section" id="facility">
        <div class="facility-contianer container">
          <div class="facility-box">
            <div class="facility-icon">
              <i class="fas fa-plane"></i>
            </div>
            <p>FREE SHIPPING WORLD WIDE</p>
          </div>

          <div class="facility-box">
            <div class="facility-icon">
              <i class="fas fa-credit-card"></i>
            </div>
            <p>100% MONEY BACK GUARANTEE</p>
          </div>

          <div class="facility-box">
            <div class="facility-icon">
              <i class="far fa-credit-card"></i>
            </div>
            <p>MANY PAYMENT GATWAYS</p>
          </div>

          <div class="facility-box">
            <div class="facility-icon">
              <i class="fas fa-headset"></i>
            </div>
            <p>24/7 ONLINE SUPPORT</p>
          </div>
        </div>
    </section>
  </main>
<!-- ==========testmonial============ -->

  <section class="testmonial mb-5">
  <h1 class="text-center my-3">What People says about us</h1>   
    <div class="glide glide4 mb-4" id="glide4">
      <div class="glide__track" data-glide-el="track">
        <ul class="glide__slides">

          <li class="glide__slide">
            <div class="quote">
              <blockquote>
                <i class="fas fa-quote-right"></i>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                <i class="fas fa-quote-left"></i>
              </blockquote>
              <figcaption>jhon doe</figcaption>
            </div>
          </li>

          <li class="glide__slide">
            <div class="quote">
              <blockquote>
                <i class="fas fa-quote-right"></i>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                <i class="fas fa-quote-left"></i>              </blockquote>
              <figcaption>jhon doe</figcaption>
            </div>
          </li>

          <li class="glide__slide">
            <div class="quote">
              <blockquote>
                <i class="fas fa-quote-right"></i>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                <i class="fas fa-quote-left"></i>              </blockquote>
              <figcaption>jhon doe</figcaption>
            </div>
          </li>

        </ul>
      </div>

    </div>
  </section>

  <!-- Parteners society -->
    <div class="section brands container">
      <div class="glide" id="glide2">
        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides">
            <li class="glide__slide">
              <img src="./images/brand_1.png" alt="">
            </li>
            <li class="glide__slide">
              <img src="./images/brand_2.png" alt="">
            </li>
            <li class="glide__slide">
              <img src="./images/brand_3.png" alt="">
            </li>
            <li class="glide__slide">
              <img src="./images/brand_2.png" alt="">
            </li>
            <li class="glide__slide">
              <img src="./images/brand_1.png" cla alt="">
            </li>
            <li class="glide__slide">
              <img src="./images/brand_3.png" alt="">
            </li>

          </ul>
        </div>
    </div>
      </div>