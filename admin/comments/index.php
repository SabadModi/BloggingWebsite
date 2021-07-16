<?php
include('../../path.php'); 

include(ROOT_PATH . "/app/controllers/comments.php");
adminOnly();
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
    <link rel="stylesheet" href="../../assets/css/style.css">

    <!-- Admin Styling -->
    <link rel="stylesheet" href="../../assets/css/admin.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    
    <title>Admin Section - Manage Comments</title>
</head>

<body>
    
    <?php include(ROOT_PATH . '/app/includes/adminHeader.php'); ?>

    <!-- Admin Page Wrapper -->
    <div class="admin-wrapper">
        
        <!-- Left Sidebar -->
        
        <?php include(ROOT_PATH . '/app/includes/adminSidebar.php'); ?> 
        
        <!-- //Left Sidebar -->
        
        <!-- Admin Content -->
        
        <div class="admin-content">

            <div class="content">

                <h2 class="page-title">Manage Comments</h2>
                
                <?php include(ROOT_PATH . '/app/includes/messages.php'); ?>

                <table>
                    <thead>
                        <th>#</th>
                        <th>Post Title</th>
                        <th>Author</th>
                        <th>Comment</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php foreach ($comments as $key => $comment): ?>
                            <tr>
                                <td><?php echo $key + 1 ?></td>

                                <?php
                                $post = selectOne('posts', ['id'=>$comment['post_id']]);
                                // dd($post);
                                ?>

                                <td><?php echo $post['title'] ?></td>

                                <?php
                                $users = selectOne('users',['id'=>$comment['user_id']]);
                                ?>
                                
                                <td><?php echo $users['username']; ?></td>
                                <?php
                                // $comment = selectOne('comments', ['post_id'=>$post['id']]);
                                ?>
                                <td><?php echo $comment['body']; ?></td>
                                <td><a href = "index.php?delete_id=<?php echo $comment['id']; ?>" class="delete">Delete</td>
                            </tr>
                        <?php endforeach; ?>
                        
                    </tbody>
                </table>
            </div>
        </div> 

        <!-- //Admin Content -->


    </div>
    <!-- //Page Wrapper -->

    <!-- JQUERY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- CKEditor 5 (For Blog Writing) -->
    <script src="https://cdn.ckeditor.com/ckeditor5/19.1.1/classic/ckeditor.js"></script>

    <script src="../../assets/js/scripts.js"></script>
    <!-- <script src="../../js/scripts.js"></script> -->
</body>
</html>