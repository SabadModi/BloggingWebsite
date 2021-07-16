<?php

include(ROOT_PATH . '/app/database/db.php');
include(ROOT_PATH . '/app/helpers/middleware.php');
include(ROOT_PATH . '/app/helpers/validatePost.php'); 

$table = 'posts';
$errors = array(); 

$id = "";
$title = "";
$body = "";
$topic_id = "";
$published = "";

$topics = selectAll('topics');
$posts = selectAll($table, ['user_id'=>$_SESSION['id']]);

if (isset($_GET['id'])) {
    $post = selectOne($table, ['id'=> $_GET['id']]);

    $id = $post['id'];
    $title = $post['title'];
    $body = $post['body'];
    $topic_id = $post['topic_id'];
    $published = $post['published'];
}

if (isset($_GET['delete_id'])) {
    usersOnly();
    $count = delete($table, $_GET['delete_id']);

    $_SESSION['message'] = "Post Deleted Successfully";
    $_SESSION['type'] = "success";

    header("location: ". BASE_URL . "/profileNew/posts/index.php");
    exit();
}

if(isset($_GET['published']) && isset($_GET['p_id'])){
    usersOnly();
    $published = $_GET['published'];
    $p_id = $_GET['p_id'];

    $count = update($table, $p_id, ['published'=> $published]);


    $_SESSION['message'] = "Post Published State Changed";
    $_SESSION['type'] = "success";

    header("location: ". BASE_URL . "/profileNew/posts/index.php");
    exit();

}

if(isset($_POST['add-post'])){
    usersOnly();

    $errors = validatePost($_POST);

    if(!empty($_FILES['image']['name'])){
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/assets/images/". $image_name;
        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

        if ($result) {
            $_POST['image'] = $image_name;
        } else {
            array_push($errors, "Failed to upload image");
        }
        

    } else{
        array_push($errors, "Post Image Required");
    }
    

    if (count($errors) == 0) {
        unset($_POST['add-post']);
        $_POST['user_id'] = $_SESSION['id']; 
        $_POST['published'] = isset($_POST['published']) ? 1 : 0; //Short way to write an If Else statement;

        $_POST['body'] = htmlentities($_POST['body']);
    
        $post_id = create($table, $_POST);

        $_SESSION['message'] = "Post Created Successfully";
        $_SESSION['type'] = "success";

        header("location: ". BASE_URL . "/profileNew/posts/index.php");
    } else {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $topic_id = $_POST['topic_id'];
        $published = isset($_POST['published']) ? 1 : 0;
    }
    
}

if (isset($_POST['update-post'])) {
    usersOnly();
    $errors = validatePost($_POST);

    if(!empty($_FILES['image']['name'])){
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/assets/images/". $image_name;
        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

        if ($result) {
            $_POST['image'] = $image_name;
        } else {
            array_push($errors, "Failed to upload image");
        }
    
    } else{
        array_push($errors, "Post Image Required");
    }
    
    if (count($errors) == 0) {
        $id = $_POST['id'];
        unset($_POST['update-post'], $_POST['id']);
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['published'] = isset($_POST['published']) ? 1 : 0; //Short way to write an If Else statement;

        $_POST['body'] = htmlentities($_POST['body']);
        
        $post_id = update($table, $id, $_POST);

        $_SESSION['message'] = "Post Updated Successfully"; 
        $_SESSION['type'] = "success";

        header("location: ". BASE_URL . "/profileNew/posts/index.php");
    } else {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $topic_id = $_POST['topic_id'];
        $published = isset($_POST['published']) ? 1 : 0;
    }
}