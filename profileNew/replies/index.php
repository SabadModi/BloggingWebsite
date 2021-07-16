<?php
include('../../path.php');

include(ROOT_PATH . "/profileNew/controllers/replies.php");
usersOnly();
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

    <title>Manage Replies</title>
</head>

<body>

    <?php include(ROOT_PATH . '/app/includes/header.php'); ?>

    <!-- Admin Page Wrapper -->
    <div class="admin-wrapper">

        <!-- Left Sidebar -->

        <?php include(ROOT_PATH . '/profileNew/profileSidebar.php'); ?>

        <!-- //Left Sidebar -->

        <!-- Admin Content -->

        <div class="admin-content">

            <div class="content">

                <h2 class="page-title">Manage Replies</h2>

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
                        <?php foreach ($replies as $key => $reply) : ?>
                            <tr>
                                <td><?php echo $key + 1 ?></td>

                                <?php
                                $comment = selectOne('comments', ['id' => $reply['comment_id']]);
                                $post = selectOne('posts', ['id' => $comment['post_id']])
                                // dd($post);
                                ?>

                                <td><?php echo $post['title'] ?></td>

                                <?php
                                $users = selectOne('users', ['id' => $reply['user_id']]);
                                ?>

                                <td><?php echo $users['username']; ?></td>
                                <?php
                                // $reply = selectOne('comments', ['post_id'=>$post['id']]);
                                ?>
                                <td><?php echo $reply['body']; ?></td>
                                <td><a href="index.php?delete_id=<?php echo $reply['id']; ?>" class="delete">Delete</td>
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