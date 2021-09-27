<?php
        $blog = new BlogController();
        $blog = $blog->getBlog();
        if(isset($_POST["submit"])){
            $updateblog = new BlogController();
            $updateblog->updateblog();
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
                        Update Blog
                    </h3>
                </div>
                <div class="card-body">
                    <form method="post" class="mr-1" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <input type="text"
                            class="form-control"
                            name="title"
                            required autocomplete="off"
                            placeholder="title"
                            value="<?php echo $blog->title;?>">
                        </div>
                        <div class="form-group mb-3">
                            <textarea row="5" cols="30" autocomplete="off" class="form-control" name="content" style="min-height: 100px;" 
                            placeholder="text"><?php echo $blog->content;?></textarea>
                        </div>
                        <input type="hidden"
                            name="id"
                            value="<?php echo $blog->id;?>">
                        <input type="hidden" name="current_image"
                            value="<?php echo $blog->image;?>">
                        <div class="form-group mb-3">
                            <img src="./public/uploads/<?php echo $blog->image;?>" width="200" height="200" alt="" class="img-fluid rounded">
                        </div>
                         <div class="form-group mb-3">
                            <input type="file"
                            class="form-control" name="image" >
                        </div>
                        <div class="form-group mb-3">
                            <button name="submit" class="btn btn-primary px-5">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
</div>