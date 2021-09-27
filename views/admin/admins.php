<?php 
    $admins=new AdminController();
    $admins=$admins->getAll();
?>

<div class="col py-3">
<div class="content py-3">
            <div class="container-fluid ">
            	<h1>Users</h1><hr>
                <div class="row py-5">
                	<table class="table table-striped table-bordered">
					  <thead>
					    <tr>
                          <th scope="col">username</th>
					      <th scope="col">Email</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php  
		            	foreach ($admins as $admin){
			           ?>
					    <tr>
					      <td><?php echo $admin['username']; ?></td>
					      <td><?php echo $admin['email']; ?></td>
					    </tr>
					<?php }?>
					  </tbody>
					</table>
                </div>
            </div>
        </div>
</div>