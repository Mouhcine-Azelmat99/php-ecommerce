<?php
    ob_start();

require_once './autoload.php';

$home = new HomeController();

$pages = [
        'home','cart','dashboard','updateProduct','deleteProduct',
        'addProduct','emptycart','show','cancelcart','register',
        'login','admin_login','exit','categories','profil'
        ,'adminProfil','checkout','logout','products','product',
        'orders','addOrder','contact','admin_contacts','updateCategory'
        ,'deleteCategory','addCategory','users','admins','trend','blogs','addBlog','deleteBlog','updateBlog','contact','contacts','favorits',
    ];
$admin_pages = ['dashboard','updateProduct','deleteProduct',
                'addProduct','admin_login','exit','categories'
                ,'adminProfil','products','users','admins',
                'orders','admin_contacts','updateCategory',
                'deleteCategory','addCategory','trend','contacts'];

if(isset($_GET['page'])){
    if(in_array($_GET['page'],$pages)){
        $page = $_GET['page'];
        if(in_array($page,$admin_pages)){
                $admin = new AdminController();
                require_once("./views/admin/includes/header_admin.php");
                if(isset($_SESSION['admin_username'])){
                    $admin->index($page);
                }else{
                    $admin->index('admin_login');
                }
                require_once("./views/admin/includes/footer_admin.php");
        }else{
            require_once("./views/includes/header.php");
            $home->index($page);
            require_once("./views/includes/footer.php");
        }
    }else{
        require_once("./views/includes/header.php");
        include('views/includes/404.php');
        require_once("./views/includes/footer.php");
    }
}else{
    require_once("./views/includes/header.php");
    $home->index("home");
    require_once("./views/includes/footer.php");
}
ob_end_flush();
 ?>