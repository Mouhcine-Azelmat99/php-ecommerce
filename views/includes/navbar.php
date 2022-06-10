<!--  Start Upper Bar -->
<!--   <div class="upper-bar">
    <div class="container">
      <div class="row">
        <div class="info col-sm">
          <i class="fa fa-phone"></i> <span>0505050505</span>,
          <i class="fa fa-envelope-o"></i> Mouhcine@gmal.Com
        </div>
        <div class="search">
          <input type="search" class="form-control" id="search_input" placeholder="Search ...">
          <span><i class="fas fa-search"></i></span>
        </div>
      </div>
    </div>
  </div> -->
  <!-- End Upper Bar -->

  <!-- Header -->
  <header id="home" class="header">
    <nav class="navigation">
      <div class="nav-center container">
        <a href="<?php echo BASE_URL ?>" class="logo">
          <h1>BES<span>T </span>SHO<span>P</span></h1>
        </a>

        <div class="nav-menu">
          <div class="nav-top">
            <div class="logo">
              <h1>BES<span>T</span>SHOP</h1>
            </div>
            <div class="close">
              <i class="fas fa-times"></i>
            </div>
          </div>

          <ul class="nav-list">
            <li class="nav-item">
              <a href="<?php echo BASE_URL ?>home" class="nav-link ">Home</a>
            </li>

            <li class="nav-item">
              <a href="<?php echo BASE_URL ?>product" class="nav-link">Products</a>
            </li>

            <li class="nav-item">
              <a href="#about" class="nav-link scroll-link">About</a>
            </li>
            <li class="nav-item">
              <a href="#contact" class="nav-link scroll-link">Contact</a>
            </li>
            <li class="nav-item mx-lg-5">
              <form method="POST" action="<?php echo BASE_URL;?>product">
               <div class="input-group mx-lg-5" id="search">
                  <input type="text" class="form-control py-2 px-lg-4" placeholder="Search" name="product">
                  <div class="input-group-append">
                    <button class="btn btn-lg py-2 px  text-white" type="submit" name="search">
                      <i class="fa fa-search"></i>
                    </button>
                  </div>
                  </div>
              </form>
            </li>
          </ul>
          <ul class="icon-menu">
            <?php if(isset($_SESSION["logged"]) && $_SESSION["logged"] === true){?>
              <li class="nav-item">
              <a href="<?php echo BASE_URL ?>cart" class="link_register"><i class="fas fa-shopping-cart"></i></a>            
            </li>
            <li class="nav-item">
              <a href="<?php echo BASE_URL ?>favorits" class="link_register"><i class="fas fa-heart"></i></a>
            </li>
            <li class="nav-item">
              <a href="<?php echo BASE_URL ?>profil" class="link_register"><i class="fas fa-user"></i></a>
            </li>
            <li class="nav-item">
              <a href="<?php echo BASE_URL ?>logout" class="link_register"><i class="fas fa-sign-out-alt"></i></a>            
            </li>
          <?php }else { ?>
            <li class="nav-item">
              <a href="<?php echo BASE_URL ?>login" class="link_register">Login</a>            
            </li>
            
            <li class="nav-item">
              <a href="<?php echo BASE_URL ?>register" class="link_register">Sign up</a>            
            </li>

          <?php }?>
          </ul>
        </div>

        <div class="nav-icons ml-4 mb-3">
          <?php if(isset($_SESSION["logged"]) && $_SESSION["logged"] === true){?>
           <a href="<?php echo BASE_URL ?>profil" class="text-dark ">
              <span class="p-2"><i class="fas fa-user"></i></span>
           </a>
           <a href="<?php echo BASE_URL ?>favorits" class="text-dark mx-2">
              <span class="position-relative p-1"><i class="fas fa-heart"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger fs-6">
                <?php if(isset($_SESSION['count_favorits'])){
                   echo $_SESSION['count_favorits'] ;
                }else{
                  echo 0;
                }
                ?>
                  <span class="visually-hidden"></span>
                </span>
            </span>
           </a>
           <a href="<?php echo BASE_URL ?>cart" class="text-dark mx-2 p-0">
              <span class="position-relative p-1"><i class="fas fa-shopping-cart"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger fs-6">
                <?php if(isset($_SESSION['count'])){
                   echo $_SESSION['count'] ;
                }else{
                  echo 0;
                }
                ?>
                  <span class="visually-hidden"></span>
                </span>
            </span>
          </a>
          <a href="<?php echo BASE_URL ?>logout" class="link_register mx-4">Logout</a>
        <?php }else {?>
          <a href="<?php echo BASE_URL ?>login" class="link_register">Login</a>
          <a href="<?php echo BASE_URL ?>register" class="link_register">Sign up</a>
          
        <?php }?>
        </div>

        <div class="hamburger">
          <i class="fas fa-bars"></i>
        </div>
      </div>
    </nav>
  </header>
