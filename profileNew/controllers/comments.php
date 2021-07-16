<?php

include(ROOT_PATH . '/app/database/db.php');
include(ROOT_PATH . '/app/helpers/middleware.php');
include(ROOT_PATH . '/app/helpers/validatePost.php'); 

$table = 'comments';

// $posts = selectAll('posts');
$comments = selectAll('comments', ['user_id'=>$_SESSION['id']]);

if (isset($_GET['delete_id'])) {
    adminOnly();
    $count = delete($table, $_GET['delete_id']);

    $_SESSION['message'] = "Comment Deleted Successfully";
    $_SESSION['type'] = "success";

    header("location: ". BASE_URL . "/profileNew/comments/index.php");
    exit();
}

?>