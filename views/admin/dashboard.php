<?php 
	if(!isset($_SESSION['admin_username'])){
		Redirect::to('admin_login');
	}

    $data = new ProductsController();
    $products = $data->getAllProducts();    

    $categories =new CategoriesController();
    $categories=$categories->getAllCategories();

    $users=new UsersController();
    $users=$users->getAll();

    $data = new ContactController();
    $contacts = $data->getAll();

    $data = new BlogController();
    $blogs = $data->getAllBlogs();

    $data = new OrdersController();
    $orders = $data->getAllOrders();     

?>	

<div class="col py-2"  id="main">
<section class="dashboard text-white">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 my-2">
				<div class="bg-primary p-3">
					<h2 class="text-center">Products</h2>
					<h1 class="text-center"><?php echo count($products);?></h1>
					
					<div class="text-center fs-1"><i class="fas fa-clipboard-list"></i></div>
				</div>
			</div>
			<div class="col-lg-6 my-2">
				<div class="bg-primary p-3">
					<h2 class="text-center">Costumers</h2>
					<h1 class="text-center"><?php echo count($users);?></h1>
					
					<div class="text-center fs-1"><i class="fas fa-users"></i></div>
				</div>
			</div>
			<div class="col-lg-6 my-2">
				<div class="bg-primary p-3">
					<h2 class="text-center">Categories</h2>
					<h1 class="text-center"><?php echo count($categories);?></h1>
					<div class="text-center fs-1">
						<i class="fas fa-th"></i>
					</div>
				</div>
			</div>
			<div class="col-lg-6 my-2">
				<div class="bg-primary p-3">
					<h2 class="text-center">Messages</h2>
					<h1 class="text-center"><?php echo count($contacts);?></h1>
					<div class="text-center fs-1"><i class="fas fa-envelope"></i></div>
				</div>
			</div>
			<div class="col-lg-6 my-2">
				<div class="bg-primary p-2">
					<h2 class="text-center">Blogs</h2>
					<h1 class="text-center"><?php echo count($blogs);?></h1>
					<div class="text-center fs-1"><i class="fas fa-newspaper"></i></div>
				</div>
			</div>
			<div class="col-lg-6 my-2">
				<div class="bg-primary p-2">
					<h2 class="text-center">Orders</h2>
					<h1 class="text-center"><?php echo count($orders);?></h1>
					<div class="text-center fs-1"><i class="fas fa-shopping-basket"></i></div>
				</div>
			</div>
		</div>
	</div>
</section>
</div>
    </div>
</div>