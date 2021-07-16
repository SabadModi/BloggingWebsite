<div class="post-info">
	<!-- if user likes post, style button differently -->
	<i <?php if (userLiked($_GET['id'])): ?>
		class="fa fa-thumbs-up like-btn"
		<?php else: ?>
			class="fa fa-thumbs-o-up like-btn"
		<?php endif ?>
		data-id="<?php echo $post['id'] ?>">
	</i>
	<span class="likes"><?php echo getLikes($post['id']); ?></span>
	
	&nbsp;&nbsp;&nbsp;&nbsp;
	
	<!-- if user dislikes post, style button differently -->
	<i 
	<?php if (userDisliked($_GET['id'])): ?>
		class="fa fa-thumbs-down dislike-btn"
		<?php else: ?>
			class="fa fa-thumbs-o-down dislike-btn"
		<?php endif ?>
		data-id="<?php echo $_GET['id'] ?>">
	</i>
	<span class="dislikes"><?php echo getDislikes($_GET['id']); ?></span>
</div>