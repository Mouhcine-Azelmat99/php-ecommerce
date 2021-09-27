<?php
    if(isset($_SESSION["logged"]) && $_SESSION["logged"] === true){
        Redirect::to("home");
    }
    $loginUser = new UsersController();
    $loginUser->auth();
?>
<div class="container" style="font-size: 3rem;">
    <div class="row my-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title text-center fs-1 my-3">
                    Login
                    </h1>
                </div>
                <div class="card-body">
                    <form method="post" class="mr-1">
                        <div class="form-group my-3">
                            <input autocomplete="off" type="text" class="form-control py-3" name="username"
                            placeholder="username" id="">
                        </div>
                        <div class="form-group my-3">
                            <input autocomplete="off" type="password" class="form-control py-3" name="password"
                            placeholder="password" id="">
                        </div>
                        <div class="form-group my-3">
                            <button name="submit" class="btn btn-primary btn-lg px-5">
                            Login
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="<?php echo BASE_URL;?>register" class="btn btn-link fs-3">
                        Sing up
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>