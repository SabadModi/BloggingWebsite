<?php 

include("path.php");
include(ROOT_PATH . "/app/controllers/posts.php");
include(ROOT_PATH . "/app/helpers/likes-dislikes.php");

// include(ROOT_PATH.'/like/like.php');
// include(ROOT_PATH.'/like/show_like.php');
// include(ROOT_PATH.'/like/connect.php');

if(isset($_GET['id'])){
    $post = selectOne('posts', ['id'=>$_GET['id']]);
}
$topics = selectAll('topics');
$posts = selectAll('posts', ['published'=>1]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <script src="https://kit.fontawesome.com/faa1fe5a90.js" crossorigin="anonymous"></script> -->
    
    <!-- Custom Styling -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    
    <title><?php echo $post['title'];?> | Blogio </title>  
    <!-- have to change title -->
</head>

<body>
    <!-- Facebook Plugin  -->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/ar_AR/sdk.js#xfbml=1&version=v7.0" nonce="nXLyLvhP"></script>
    
    <?php include(ROOT_PATH . "/app/includes/header.php"); ?>

    <!-- Page Wrapper -->
    
    <div class="page-wrapper">
        
        <!-- CONTENT -->

        <div class="content clearfix">
           <div class="main-content-wrapper">
               <div class="main-content single">
                   <h1 class="post-title"><?php echo $post['title']; ?></h1>
                   <div class="post-content">
                        <?php echo html_entity_decode($post['body']) ?>    
                    </div>
                </div>
            </div>

            <!-- Sidebar -->

            <div class="sidebar single">
                <!-- Facebook Page -->
                    <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore">
                            <a href="https://www.facebook.com/facebook">
                                ‏‎Facebook‎‏
                            </a>
                        </blockquote>
                    </div>

                <div class="section popular">
                    <h2 class="section-title">Popular Posts</h2>
                    
                    <?php foreach ($posts as $p): ?>
                        <div class="post clearfix">
                            <img src="<?php echo BASE_URL . "/assets/images/" . $p['image'] ?>" alt="">
                            <a href="#" class="title"><h4><?php echo $p['title'] ?></h4></a>
                        </div>
                    <?php endforeach; ?>
                    

                </div>

                <div class="section topics">
                    <h2 class="section-title">Topics</h2>
                    <ul>
                        <?php foreach ($topics as $key => $topic ): ?>
                            <li><a href="<?php echo BASE_URL . '/index.php?t_id=' . $topic['id'] . '&name=' . $topic['name']; ?>"><?php echo $topic['name']; ?></a></li>
                        <?php endforeach; ?>
                        
                    </ul>
                </div>

            </div>

            <!-- // Sidebar -->

            <div class="main-content-wrapper">
                <div class="main-content like-dislike">
                    <div class="like">
                        <?php include(ROOT_PATH.'/like/home.php') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //Page Wrapper -->

    <!-- Footer -->

    <?php
    // include(ROOT_PATH . "/app/includes/footer.php");
    ?> 

    <!-- //Footer -->

    <!-- JQUERY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- SLIDER -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->

    <!-- <script src = "jquery-3.1.1.js"></script>	 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type = "text/javascript">
        $(document).ready(function(){
		$(document).on('click', '.like', function(){
			var id=$(this).val();
			var $this = $(this);
			$this.toggleClass('like');
          	if($this.hasClass('like')){
				$this.text('Like'); 
			} else {
				$this.text('Unlike');
				$this.addClass("unlike"); 
			}
				$.ajax({
					type: "POST",
					url: "",
					data: {
						id: id,
						like: 1,
					},
					success: function(){
						showLike(id);
					}
				});
		});
		
		$(document).on('click', '.unlike', function(){
			var id=$(this).val();
			var $this = $(this);
            $this.toggleClass('unlike');
 			if($this.hasClass('unlike')){
				$this.text('Unlike');
			} else {
				$this.text('Like');
				$this.addClass("like");
			}
				$.ajax({
					type: "POST",
					url: "singleLike.php",
					data: {
						id: id,
						like: 1,
					},
					success: function(){
						showLike(id);
					}
				});
		});
		
	});
	
	function showLike(id){
		$.ajax({
			url: 'singleLike.php',
			type: 'POST',
			async: false,
			data:{
				id: id,
				showlike: 1
			},
			success: function(response){
				$('#show_like'+id).html(response);
				
			}
		});
    }
    </script>
</body>
</html>