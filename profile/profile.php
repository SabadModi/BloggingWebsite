<?php
// include(ROOT_PATH . "/app/helpers/validateUserRegister.php");
// include(ROOT_PATH . "/app/helpers/validateUser.php");
include(ROOT_PATH . "/profile/validateProfile.php");
usersOnly();

$user = selectOne('users', ['id'=>$_SESSION['id']]);

$errors = Array();

$table = 'users';

$id = '';
$username = '';
$email = '';
$password = '';
$passwordConf = '';

$admin = '';

$gender = '';
$birthday = '';
$bio = '';
$interests = '';
$image_name = '';

if(isset($_POST['save-profile'])){

    $errors = validateProfile($_POST);

    if(count($errors) === 0){
        unset($_POST['save-profile'], $_POST['passwordConf']);
        
        if(!empty($_FILES['profile-picture']['name'])){
            $image_name = time() . '_' . $_FILES['profile-picture']['name'];
            $destination = ROOT_PATH . "/assets/images/". $image_name;
            $result = move_uploaded_file($_FILES['profile-picture']['tmp_name'], $destination);

            if ($result) {
                $_POST['image'] = $image_name;
            } else {
                array_push($errors, "Failed to upload image");
            }
            

        } else{
            array_push($errors, "Post Image Required");
        }

        if(!isset($_POST['image'])){
            $_POST['image'] = $user['image'];
        }

        $_POST['admin'] = $user['admin'];

        if($_POST['password'] === ""){
            $_POST['password'] = $user['password'];
        } else{
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }

        $profileUsername = $_POST['username'];
        $profileEmail = $_POST['email'];
        $profilePassword = $_POST['password'];
        $profileAdmin = $_POST['admin'];
        $profileBio = $_POST['bio'];
        $profileGender = $_POST['gender'];
        $profileBirthday = $_POST['birthday'];
        $profileInterests = $_POST['interests'];
        $profileImage = $_POST['image'];

        
        unset($_POST['username']);
        unset($_POST['admin']);
        unset($_POST['email']);
        unset($_POST['password']);
        unset($_POST['bio']);
        unset($_POST['gender']);
        unset($_POST['birthday']);
        unset($_POST['interests']);
        unset($_POST['image']);
    
        $_POST['admin'] = $profileAdmin;
        $_POST['username'] = $profileUsername;
        $_POST['email'] = $profileEmail;
        $_POST['password'] = $profilePassword;

        $_POST['bio'] = htmlentities($profileBio);
        $_POST['gender'] = $profileGender;
        $_POST['birthday'] = $profileBirthday;
        $_POST['interests'] = $profileInterests;
        $_POST['image'] = $profileImage;

        $count = update($table, $user['id'], $_POST);
        $user = selectOne($table, ['id'=>$user['id']]);
        // dd($user['username']);
        // $_SESSION['username'] = $user['username'];

        $_SESSION['message'] = 'Profile Updated Successfully';
        $_SESSION['type'] = 'success';

        header('location: '. BASE_URL . '/profile.php');
        exit();
    }
    
}