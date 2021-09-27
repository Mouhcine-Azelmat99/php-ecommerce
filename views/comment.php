<?php 

	if (!isset($_SESSION['userame'])) {
		Redirect::to("login");
	}

	if (isset($_POST['submit'])) {
	$comment = new CommentController();
	$comment = $comment->newComment();
		
	}