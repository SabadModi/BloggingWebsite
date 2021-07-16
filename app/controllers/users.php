<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validateUser.php");
include(ROOT_PATH . "/app/helpers/validateUserRegister.php");
include(ROOT_PATH . '/app/helpers/middleware.php');

$table = 'users';

$admin_users = selectAll($table);

$errors = array();

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

$registerArray = array();

function loginUser($user)
{
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];

    $_SESSION['message'] = 'You are now logged in';
    $_SESSION['type'] = 'success';
    
    // dd($_SESSION);

    if($_SESSION['admin'] == 1){
        header('location: '. BASE_URL . '/admin/dashboard.php');
    }
    else{
        header('location: '. BASE_URL . '/index.php');
    }
    exit();
}


if (isset($_POST['register-btn']) || isset($_POST['create-admin'])) {

    $errors = validateUser($_POST);

    if(count($errors) == 0){
        unset($_POST['register-btn'], $_POST['passwordConf'], $_POST['create-admin']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $_SESSION['registerUsername'] = $username;
        $_SESSION['registerPassword'] = $password;
        $_SESSION['registerEmail'] = $email;


        if (isset($_POST['admin'])) {
            $_POST['admin'] = 1;

            $_SESSION['registerAdmin'] = $_POST['admin'];

            $_SESSION['registerSuccessfull'] = "Yes";

            // dd($_POST);

            header('location: '. BASE_URL . '/infoRegister.php');
            exit(); 
        
        } else {
            
            $_POST['admin'] = 0;
            $_SESSION['registerAdmin'] = $_POST['admin'];
            
            $_SESSION['registerSuccessfull'] = "Yes";
            // dd("Check 2");
            header('location: '. BASE_URL . '/infoRegister.php');

            // loginUser($user);     
        }

    } else{
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
        $admin = isset($_POST['admin']) ? 1 : 0;
    }

}

if(isset($_POST['infoRegister-btn'])){

    $errors = validateUserRegistration($_POST);

    unset($_POST['infoRegister-btn']);

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


    if(count($errors) == 0){

        $registerBio = $_POST['bio'];
        $registerGender = $_POST['gender'];
        $registerBirthday = $_POST['birthday'];
        $registerInterests = $_POST['interests'];
        $registerImage = $_POST['image'];

        unset($_POST['bio']);
        unset($_POST['gender']);
        unset($_POST['birthday']);
        unset($_POST['interests']);
        unset($_POST['image']);
    
        $_POST['admin'] = $_SESSION['registerAdmin'];
        $_POST['username'] = $_SESSION['registerUsername'];
        $_POST['email'] = $_SESSION['registerEmail'];
        $_POST['password'] = $_SESSION['registerPassword'];
        

        $_POST['bio'] = htmlentities($registerBio);
        $_POST['gender'] = $registerGender;
        $_POST['birthday'] = $registerBirthday;
        $_POST['interests'] = $registerInterests;
        $_POST['image'] = $registerImage;

        $user_id = create($table, $_POST);
        $user = selectOne($table, ['id' => $user_id]);

        // dd($user);
            

        loginUser($user);

    } else{
        $gender = $_POST['gender'];
        $birthday = $_POST['birthday'];
        $bio = $_POST['bio'];
        $interests = $_POST['interests'];
    }
}

if (isset($_POST['update-user'])) {
    adminOnly(); 
    $errors = validateUser($_POST);

    if(count($errors) === 0){

        $id = $_POST['id'];

        unset( $_POST['passwordConf'], $_POST['update-user'], $_POST['id']);
        
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        $_POST['admin'] = isset($_POST['admin']) ? 1 : 0;

        $count = update($table, $id, $_POST);

        $_SESSION['message'] = 'Admin User Updated Successfully';
        $_SESSION['type'] = 'success';

        header('location: '. BASE_URL . '/admin/users/index.php');
        exit();

    } else{
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
        $admin = isset($_POST['admin']) ? 1 : 0;
    }
}


if (isset($_GET['id'])) {

    $user = selectOne($table, ['id' => $_GET['id']]);

    $id = $user['id'];
    $username = $user['username'];
    $email = $user['email'];
    $admin = $user['admin'] == 1 ? 1 : 0;
}  

if(isset($_POST['login-btn'])){
    $errors = validateLogin($_POST);

    if(count($errors) == 0){
        $user = selectOne($table, ['username'=>$_POST['username']]);
 
        if ($user && password_verify($_POST['password'], $user['password'])) {

            loginUser($user);
        } else {
            array_push($errors, 'Wrong credentials');
        }
        
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
}

if(isset($_GET['delete_id'])){
    adminOnly();
    $count = delete($table, $_GET['delete_id']);

    $_SESSION['message'] = 'Admin User Deleted Successfully';
    $_SESSION['type'] = 'success';

    header('location: '. BASE_URL . '/admin/users/index.php');
    exit(); 

}

?>