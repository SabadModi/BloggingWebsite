<?php 

include("path.php");
include(ROOT_PATH . "/app/controllers/posts.php");
include(ROOT_PATH . "/comments_awa/functions.php");

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
    <script src="https://kit.fontawesome.com/faa1fe5a90.js" crossorigin="anonymous"></script>
    
    <!-- Custom Styling -->
    <link rel="stylesheet" href="comments_awa/main.css">
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

            <!-- Comments -->
            <div class="comments-class">
                <div class="main-content-wrapper">
                    <div class="main-content">
                        <div class="container">
                            <div class="row">
                                <!-- <div class="col-md-6 col-md-offset-3 comments-section"> -->
                                    <!-- if user is not signed in, tell them to sign in. If signed in, present them with comment form -->
                                    <?php if (isset($_SESSION['id'])): ?>
                                        <form class="clearfix" action="post_details.php?id=<?php echo $post['id']; ?>" method="post" id="comment_form">
                                            <textarea name="comment_text" id="comment_text" class="form-control" cols="30" rows="3"></textarea>
                                            <button class="btn btn-primary btn-sm pull-right" id="submit_comment">Submit comment</button>
                                        </form>
                                    <?php else: ?>
                                        <div class="well" style="margin-top: 20px;">
                                            <h4 class="text-center"><a href="#">Sign in</a> to post a comment</h4>
                                        </div>
                                    <?php endif ?>
                                    
                                    <!-- Display total number of comments on this post  -->
                                    <h2><span id="comments_count"><?php echo count($comments) ?></span> Comment(s)</h2>
                                    <hr>
                                    <!-- comments wrapper -->
                                    <div id="comments-wrapper">
                                        <?php if (isset($commentsAffected) && $commentsAffected>0): ?>
                                            <!-- Display comments -->
                                            <?php foreach ($comments as $comment): ?>
                                                <!-- comment -->
                                                <div class="comment clearfix">
                                                    <img src="comments_awa/profile.png" alt="" class="profile_pic">
                                                    <div class="deleteCommentClass">
                                                        <div class="comment-details">
                                                            <span class="comment-name"><?php echo getUsernameById($comment['user_id']) ?></span>
                                                            <span class="comment-date"><?php echo date("F j, Y ", strtotime($comment["created_at"])); ?></span>
                                                            <span class="deleteComment" data-id="<?php echo $comment['id']; ?>"><a href="#">Delete</a></span>
                                                            <p id="commentBody"><?php echo $comment['body']; ?></p>
                                                            <a class="reply-btn" href="#" data-id="<?php echo $comment['id']; ?>">reply</a>
                                                            <br><br>
                                                        </div>
                                                    </div>
                                                    <!-- reply form -->
                                                    <form action="post_details.php?id=20" class="reply_form clearfix" id="comment_reply_form_<?php echo $comment['id'] ?>" data-id="<?php echo $comment['id']; ?>">
                                                        <textarea class="form-control" name="reply_text" id="reply_text" cols="30" rows="2"></textarea>
                                                        <button class="btn btn-primary btn-xs pull-right submit-reply">Submit reply</button>
                                                    </form>
                                                    
                                                    <!-- GET ALL REPLIES -->
                                                    <?php $replies = getRepliesByCommentId($comment['id']) ?>
                                                    <div class="replies_wrapper_<?php echo $comment['id']; ?>">
                                                        <?php if (isset($replies)): ?>
                                                            <?php foreach ($replies as $reply): ?>
                                                                <!-- reply -->
                                                                <div class="comment reply clearfix">
                                                                    <img src="comments_awa/profile.png" alt="" class="profile_pic">
                                                                    <div class="comment-details">
                                                                        <span class="comment-name"><?php echo getUsernameById($reply['user_id']) ?></span>
                                                                        <span class="comment-date"><?php echo date("F j, Y ", strtotime($reply["created_at"])); ?></span>
                                                                        <p><?php echo $reply['body']; ?></p>
                                                                        <a class="reply-btn" href="#">reply</a>
                                                                    </div>
                                                                </div>
                                                            <?php endforeach ?>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                                <!-- // comment -->
                                            <?php endforeach ?>
                                        <?php else: ?>
                                            <h2 id="firstComment">Be the first to comment on this post</h2>
                                        <?php endif ?>
                                    </div>
                                    <!-- comments wrapper -->
                                </div>
                                <!-- // all comments -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- // Comments -->
            </div>
        </div>
    <!-- //Page Wrapper -->

    <!-- Footer -->

    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?> 

    <!-- //Footer -->

    <!-- JQUERY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- SLIDER -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
    <script>
    $(document).ready(function(){
        // When user clicks on submit comment to add comment under post
        $(document).on('click', '#submit_comment', function(e) {
            e.preventDefault();
            var comment_text = $('#comment_text').val();
            // var url = $('#comment_form').attr('action');
            var url = "test.php?id=<?php echo $post['id']; ?>"
            // Stop executing if not value is entered
            if (comment_text === "" ) return;
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    comment_text: comment_text,
                    comment_posted: 1,
                    url:url
                },
                success: function(data){
                    var response = JSON.parse(data);
                    console.log(response)
                    if (data === "error") {
                        alert('There was an error adding comment. Please try again');
                    } else {
                        $('#comments-wrapper').prepend(response.comment)
                        $('#comments_count').text(response.comments_count); 
                        $('#comment_text').val('');
                        
                        var firstComment = document.getElementById("firstComment")
                        firstComment.innerText = ""
                    }
                }
            });
        });
        
        // When user clicks on submit reply to add reply under comment
        $(document).on('click', '.reply-btn', function(e){
            alert("test 1")
            e.preventDefault();
            // Get the comment id from the reply button's data-id attribute
            var comment_id = $(this).data('id');
            // show/hide the appropriate reply form (from the reply-btn (this), go to the parent element (comment-details)
            // and then its siblings which is a form element with id comment_reply_form_ + comment_id)
            $(this).parent().siblings('form#comment_reply_form_' + comment_id).toggle(500);
            alert("test 2")
            $(document).on('click', '.submit-reply', function(e){
                alert("test 3")
                e.preventDefault();
                // elements
                var reply_textarea = $(this).siblings('textarea'); // reply textarea element
                var reply_text = $(this).siblings('textarea').val();
                alert("test 4")
                // var url = $(this).parent().attr('action');
                var url = "test.php?id=<?php echo $post['id']; ?>"
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        comment_id: comment_id,
                        reply_text: reply_text,
                        reply_posted: 1,
                        url:url
                    },
                    success: function(data){
                        alert("test 5")
                        if (data === "error") {
                            alert('There was an error adding reply. Please try again');
                        } else {
                            $('.replies_wrapper_' + comment_id).append(data);
                            reply_textarea.val('');
                        }
                    }
                });
            });
        });

        $(document).on('click', '.deleteComment', function (e) {
            e.preventDefault()
            var url = "test.php?id=<?php echo $post['id']; ?>"
            var comment_id = $(this).data('id');
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    deleteComment:1,
                    comment_id:comment_id
                },
                success: function (data) {
                    if(data === "error"){
                        alert("There was an error deleting the message")
                    } else{
                        var commentBody = document.getElementById("commentBody")
                        // var commentDetails = document.getElementsByClassName("deleteCommentClass")
                        // commentDetails.style.display = "none"
                        // $('deleteCommentClass').css('display', 'none');
                        commentBody.innerHTML = "This comment has been deleted"
                        // $('#comments_count').text(response.comments_count);
                        // $('#commentBody').innerText = "This comment has been deleted"
                    }
                }
            });
        })
    });
    </script>
</body>
</html>