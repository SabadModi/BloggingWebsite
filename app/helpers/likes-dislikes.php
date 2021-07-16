<?php

$user = isset($_SESSION['id']) ? selectOne('users', ['id' >$_SESSION['id']]) : 0;
global $user;
// $likeRating = 0;
// dd($user);

if(isset($_POST['action'])){
    $rating_action = $_POST['action'];
    $post_id = $_POST['post_id'];
    // dd("Hi");
    if($rating_action == "like"){
        $likeRating = create('rating_info', ['user_id'=>$user['id'], 'post_id'=>$_GET['id'], 'rating_action'=>$rating_action]);
        exit(getLikes($_GET['id']));
    } else{
        global $likeRating;
        global $user;
        // global $conn;
        $user_id = $user['id'];
        $sql = "SELECT * FROM rating_info WHERE user_id=$user_id AND post_id=$id AND rating_action='like' ORDER BY id DESC LIMIT 1";
        $rs = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($rs);
        $unlikeRating = delete('rating_info', $result['id']);
        // dd($unlikeRating);
        exit(getLikes($_GET['id']));
    }

}

if(isset($_POST['actionDislike'])){
    $rating_action = $_POST['actionDislike'];
    $post_id = $_POST['post_id'];
    // dd("Hi");
    if($rating_action == "dislike"){
        $likeRating = create('rating_info', ['user_id'=>$user['id'], 'post_id'=>$_GET['id'], 'rating_action'=>$rating_action]);
        exit(getLikes($_GET['id']));
    } else{
        global $likeRating;
        global $user;
        // global $conn;
        $user_id = $user['id'];
        $sql = "SELECT * FROM rating_info WHERE user_id=$user_id AND post_id=$id AND rating_action='dislike' ORDER BY id DESC LIMIT 1";
        $rs = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($rs);
        $unlikeRating = delete('rating_info', $result['id']);
        // dd($unlikeRating);
        exit(getLikes($_GET['id']));
    }

}
// if(isset($_POST['action'])){
//     $post_id = $_POST['post_id'];
//     $action = $_POST['action'];
//     switch ($action) {
//         case 'like':
//             $sql = "INSERT INTO rating_info(user_id, post_id, rating_action)
//                     VALUES($user_id, $post_id, 'like') ON DUPLICATE KEY UPDATE rating_action='like";
//             break;
//         case 'dislike':
//             $sql = "INSERT INTO rating_info(user_id, post_id, rating_action)
//                     VALUES($user_id, $post_id, 'dislike') ON DUPLICATE KEY UPDATE rating_action='dislike' ";
//             break;
//         case 'unlike':
//             $sql = "DELETE FROM rating_info WHERE user_id=$user_id AND post_id=$post_id";
//             break;
//         case 'undislike':
//             $sql = "DELETE FROM rating_info WHERE user_id=$user_id AND post_id=$post_id";
//             break;
//         default:
//             break;
//     }

//     mysqli_query($conn, $sql);
//     echo getRating($post_id);
//     exit(0);
// }

// function getRating($id){
//     global $conn;
//     $rating = array();

//     $likes_query = "SELECT COUNT(*) FROM rating_info WHERE post_id=$id AND rating_action='like' ";
//     $dislikes_query = "SELECT COUNT(*) FROM rating_info WHERE post_id=$id AND rating_action='dislike' ";

//     $likes_rs = mysqli_query($conn, $likes_query);
//     $dislikes_rs = mysqli_query($conn, $dislikes_query);

//     $likes = mysqli_fetch_array($likes_rs);
//     $dislikes = mysqli_fetch_array($dislikes_rs);

//     $rating = [
//         'likes'=>$likes[0],
//         'dislikes'=>$dislikes[0]
//     ];

//     return json_encode($rating);
// }

function getLikes($id){
    global $conn;
    global $user;
    $user_id = $user['id'];
    $sql = "SELECT COUNT(*) FROM rating_info WHERE user_id=$user_id AND post_id=$id AND rating_action='like'";
    $rs = mysqli_query($conn, $sql);
    // dd($rs);
    $result = mysqli_fetch_array($rs);
    // dd($result);

    return $result[0];
}

function getDislikes($id){
    global $conn;
    global $user;
    $user_id = $user['id'];
    $sql = "SELECT COUNT(*) FROM rating_info WHERE user_id=$user_id AND post_id=$id AND rating_action='dislike'";
    $rs = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($rs);

    return $result[0];
}

function userLike($id){
    global $user;
    global $conn;
    $user_id = $user['id'];

    $sql = "SELECT * FROM rating_info WHERE user_id=$user_id AND post_id=$id AND rating_action='like'";
    $rs = mysqli_query($conn, $sql);

    if(mysqli_affected_rows($conn)>0){
        return true;
    } else{
        return false;
    }
}

function userDislike($id){
    global $user;
    global $conn;
    $user_id = $user['id'];

    $sql = "SELECT * FROM rating_info WHERE user_id=$user_id AND post_id=$id AND rating_action='dislike'";
    $rs = mysqli_query($conn, $sql);

    if(mysqli_affected_rows($conn)>0){
        return true;
    } else{
        return false;
    }
}


// $sql = "SELECT * FROM posts";
// $result = mysqli_query($conn, $sql);
// $postLikes = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>