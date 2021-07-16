<?php

include(ROOT_PATH . '/app/database/db.php');
include(ROOT_PATH . '/app/helpers/middleware.php');
include(ROOT_PATH . '/app/helpers/validatePost.php'); 

$table = 'replies';

// $posts = selectAll('posts');
$replies = selectAll('replies', ['user_id'=>$_SESSION['id']]);

if (isset($_GET['delete_id'])) {
    adminOnly();
    $count = delete($table, $_GET['delete_id']);

    $_SESSION['message'] = "Reply Deleted Successfully";
    $_SESSION['type'] = "success";

    header("location: ". BASE_URL . "/profileNew/replies/index.php");
    exit();
}

?>