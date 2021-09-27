<?php
    if(isset($_SESSION['admin'])){
		Redirect::to('dashboard');
	}
    if(isset($_POST['submit'])){
        $admin=new AdminController();
        $admin->auth();
    }
?>
<div class="container-fluid py-5 bg-primary" style="height: 100vh;">
    <div class="row my-4">
        <div class="col-md-6 mx-auto my-5">
            <div class="card my-5">
                <div class="card-header">
                    <h3 class="card-title">
                        Connexion
                    </h3>
                </div>
                <div class="card-body">
                    <?php include_once'views/includes/alerts.php' ?>
                    <form method="post" class="mr-1">
                        <div class="form-group mt-3">
                            <input autocomplete="off" type="text" class="form-control" name="username"
                            placeholder="Username" id="">
                        </div>
                        <div class="form-group mt-3">
                            <input autocomplete="off" type="password" class="form-control" name="password"
                            placeholder="Mot de passe" id="">
                        </div>
                        <div class="form-group mt-4">
                            <button name="submit" class="btn btn-primary">
                                Connexion
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>