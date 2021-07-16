<?php include('../../path.php'); ?>
<?php include(ROOT_PATH . "/app/controllers/posts.php");
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
    
    <title>Admin Section - Manage Posts</title>
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
            <div class="button-group">
                <a href="create.php" class="btn btn-big">Add Post</a>
                <a href="index.php" class="btn btn-big">Manage Posts</a>
            </div>

            <div class="content">

                <h2 class="page-title">Manage Posts</h2>
                
                <?php include(ROOT_PATH . '/app/includes/messages.php'); ?>

                <table>
                    <thead>
                        <th>#</th>
                        <th>Title of The Post</th>
                        <th>Author</th>
                        <th colspan="3">Action</th>
                    </thead>
                    <tbody>
                        <?php foreach ($posts as $key => $post): ?>
                            <tr>
                                <td><?php echo $key + 1 ?></td>
                                <td><?php echo $post['title'] ?></td>

                                <?php
                                $users = selectOne('users',['id'=>$post['user_id']]);
                                ?>
                                
                                <td><?php echo $users['username']; ?></td>
                                <td><a href = "edit.php?id=<?php echo $post['id']; ?>" class="edit">Edit</td>
                                <td><a href = "edit.php?delete_id=<?php echo $post['id']; ?>" class="delete">Delete</td>
                                <?php if ($post['published']): ?>
                                    <td><a href = "edit.php?published=0&p_id=<?php echo $post['id']; ?>" class="unpublish">Un-Publish</td>
                                <?php else: ?>
                                    <td><a href = "edit.php?published=1&p_id=<?php echo $post['id']; ?>" class="publish">Publish</td>
                                <?php endif;?>
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