<?php 
	$blog=new BlogController();
	$blog=$blog->getBlog();

	
	$comment = new CommentController();
	$comments = $comment->getAllComments();
?>

<div class="container">
	<div class="row px-5">
		<div class="col-lg-6">
			<div class="card">
			  <div class="card-header py-3">
			    <?php echo $blog->title;?>
			  </div>
			  <div class="card-body">
			    <p class="card-text pt-5"> <?php echo $blog->content;?>.</p>
			    <p class="tex-secondary text-end">
			    	<span class="fw-bolder fs-5"> <?php echo $blog->created_at;?></span>
			    </p>
			    <div >
			    	<h3 class="py-3 bg-light">Commentaire</h3> <hr>
			    	<?php foreach ($comments as $comment) :?>
				<div class="commentaire">
					<div class="bg-light py-4 rounded">
						<h5 class="fw-bolder"><?php echo $comment['username'];?></h5> <hr>
						<p class="card-text fs-5">
							<?php echo $comment['comment'];?>.
						</p>
						<p class="tex-secondary text-end">
				    		<span class="fw-bolder fs-5"><?php echo $comment['create_at'];?></span>
				   		 </p>
			   		 </div>					
				</div>
			<?php endforeach ?>
				<form method="post" action="<?php echo BASE_URL;?>comment">
					 <div class="my-5">
					 	<input type="hidden" name="blog_id" value="<?php echo $blog->id;?>">
						  <label for="exampleFormControlTextarea1" class="form-label">Leave some comment</label>
						  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment"></textarea>
						</div>
	                <div class="form-group">
	                	<input type="submit" class="btn btn-primary text-white btn-lg py-3 px-5 my-2" value="Commenter" name="submit">
	               </div>
          	 </form>
			    </div>
			  </div>
			</div>
		</div>
		<div class="col-lg-6">
			<img src="./public/uploads/<?php echo $blog->image;?>" width="100%" height="100%" class="img-fluid rounded"> 
		</div>
	</div>
</div>