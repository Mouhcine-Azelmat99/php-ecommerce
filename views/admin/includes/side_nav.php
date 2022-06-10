<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark text-white py-5">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white">
                <a href="<?php echo BASE_URL ;?>" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-warning text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">ECOMMERCE ADMIN</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start text-white" id="menu">
                    <li class="nav-item my-3">
                        <a href="<?php echo BASE_URL ;?>dashboard" class="nav-link text-white align-middle px-0">
                            <i class="fas fa-home"></i> <span class="ms-1 d-none d-sm-inline">DASHBOARD</span>
                        </a>
                    </li>
                    <li class="nav-item my-1">
                        <a href="<?php echo BASE_URL ;?>products" class="nav-link text-white px-0 align-middle">
                            <i class="fas fa-bars"></i> <span class="ms-1 d-none d-sm-inline">Products</span> </a>
                    </li>
                    <li class="nav-item my-1">
                        <a href="<?php echo BASE_URL ;?>categories" class="nav-link text-white px-0 align-middle">
                            <i class="fas fa-utensils"></i> <span class="ms-1 d-none d-sm-inline">CATEGORIES</span></a>
                    </li>

                    <li class="nav-item my-1">
                        <a href="<?php echo BASE_URL ;?>contacts" class="nav-link text-white px-0 align-middle">
                            <i class="fas fa-comments"></i> <span class="ms-1 d-none d-sm-inline">Contacts</span> </a>
                    </li>
                    <li class="nav-item my-1">
                        <a href="<?php echo BASE_URL ;?>orders" class="nav-link text-white px-0 align-middle">
                            <i class="fas fa-shopping-basket"></i> <span class="ms-1 d-none d-sm-inline">Orders</span> </a>
                    </li>
                    <li class="nav-item my-1">
                        <a href="<?php echo BASE_URL ;?>users" class="nav-link text-white px-0 align-middle ">
                            <i class="fas fa-users"></i> <span class="ms-1 d-none d-sm-inline">Users</span></a>
                    </li>
                    <li class="nav-item my-1">
                        <a href="<?php echo BASE_URL ;?>admins" class="nav-link text-white px-0 align-middle ">
                            <i class="fas fa-user-cog"></i> <span class="ms-1 d-none d-sm-inline">Admins</span></a>
                    </li>
                   
                </ul>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start text-white" id="menu">
                    <li class="nav-item mt-5 mb-3">
                    <a href="<?php echo BASE_URL ;?>adminProfil" class="text-white px-2 align-middle btn btn-primary">
                            <i class="fas fa-user"></i> <span class="ms-1 d-none d-sm-inline"><?php echo $_SESSION['admin_username']; ?></span></a>
                    </li>
                    <li class="nav-item">
                    <a href="<?php echo BASE_URL ;?>exit" class="text-white px-2 align-middle btn btn-danger">
                            <i class="fas fa-sign-out-alt"></i> <span class="ms-1 d-none d-sm-inline">LOGOUT</span></a>
                    </li>
                </li>
            </ul>
            </div>
        </div>