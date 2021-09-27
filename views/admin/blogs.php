<?php   
    $data = new BlogController();
    $blogs = $data->getAllBlogs();    


?>
<div class="col py-3">
<div class="content py-3">
            <div class="container-fluid ">
                <a href="<?php echo BASE_URL?>addBlog" class="btn btn-primary px-5
                btn-lg">+ Add new blog</a>
                <div class="row py-5">
            <?php include_once'views/includes/alerts.php' ?>
            <div class="card bg-light p-3">
                <table class="table table-hover table-inverse">
                    <h3 class="font-weight-bold">Blogs</h3>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Text</th>
                            <th>Image</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($blogs as $blog) :?>
                        <tr>
                            <td><?php echo $blog["title"];?></td>
                            <td><?php echo $blog["content"];?></td>
                            <td>
                                <img width="300" height="300"
                                src="./public/uploads/<?php echo $blog["image"];?>"
                                alt="" class="img-fluid">
                            </td>
                            <td><?php echo $blog["created_at"];?></td>
                            <td class="d-flex flex-row justify-content-center py-4" style="height:100%">
                                <form id="form" action="<?php echo BASE_URL?>updateBlog" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $blog['id'];?>">
                                    <button class="btn btn-primary">
                                         <i class="fas fa-edit"></i>
                                    </button>
                                </form>
                                <form id="form" action="<?php echo BASE_URL?>deleteBlog" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $blog['id'];?>">
                                    <button class="btn btn-danger mx-2">
                                         <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach;?>
                        </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
