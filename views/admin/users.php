<?php 
    $users=new UsersController();
    $users=$users->getAll();
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
					      <th scope="col">Phone</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php  
		            	foreach ($users as $user){
			           ?>
					    <tr>
					      <td><?php echo $user['username']; ?></td>
					      <td><?php echo $user['email']; ?></td>
					      <td><?php echo $user['tel']; ?></td>

					    </tr>
					<?php }?>
					  </tbody>
					</table>
                </div>
            </div>
        </div>
</div>