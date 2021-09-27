<?php
    if(isset($_SESSION["logged"]) && $_SESSION["logged"] === true){
        Redirect::to("home");
    }
    if(isset($_POST["submit"])){
        $createUser = new UsersController();
        $createUser->register();
    }
?>
<div class="container">
    <div class="row my-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center fs-2 my-3">
                    Sing Up
                    </h3>
                </div>
                <div class="card-body">
                    <form method="post" class="mr-1" id="sign">
                        <div class="form-group my-3">
                            <input type="text" autocomplete="off" class="form-control p-3" name="username"
                            placeholder="Username">
                        </div>
                        <div class="form-group my-3">
                            <input type="email" autocomplete="off" class="form-control p-3" name="email"
                            placeholder="Email">
                        </div>
                        <div class="form-group my-3">
                            <input type="text" autocomplete="off" class="form-control p-3" name="tel"
                            placeholder="Number Phone">
                        </div>
                        <div class="form-group my-3">
                            <input type="password" autocomplete="off" class="form-control p-3" name="password"
                            placeholder="password">
                        </div>
                        <div class="form-group my-3">
                            <button name="submit" class="btn btn-primary px-5 btn-lg">
                                Sign Up
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="<?php echo BASE_URL;?>login" class="btn btn-link fs-3">
                        Login
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>