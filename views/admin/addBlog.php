<?php

        if(isset($_POST["submit"])){
            $blog = new BlogController();
            $blog->newBlog();
        }
?>
<div class="col py-3">
    <div class="content py-3">
        <div class="container-fluid ">
            <div class="row my-4">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Add new Blog
                        </h3>
                    </div>
                    <div class="card-body">
                        <form method="post" class="mr-1" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <input type="text"
                                class="form-control"
                                name="title" required autocomplete="off" placeholder="title" >
                            </div>
                            <div class="form-group mb-3">
                                <textarea row="5" cols="20" autocomplete="off" class="form-control" name="content"
                                placeholder="text" id=""></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <input type="file"
                                class="form-control" name="image" >
                            </div>
                             <div class="form-group mb-3 d-flex">
                                <button name="submit" class="btn btn-primary px-5">
                                    Valider
                                </button>
                                <a href="<?php echo BASE_URL?>blogs" class="btn btn-danger px-5 mx-5">
                                    Cansel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
