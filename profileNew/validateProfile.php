<?php 

function validateProfile($user)
{
    global $conn;
    $errors = array();

    if(isset($user['username']) && (empty($user['username']))) {
        array_push($errors, "Username is required");
    }

    if (isset($user['email']) && empty($user['email'])) {
        array_push($errors, "Email is required");
    }


    // if (empty($user['password'])) {
    //     array_push($errors, "Password is required");
    // }

    if (isset($user['password']) && isset($user['passwordConf']) && $user['passwordConf'] !== $user['password']) {
        array_push($errors, "Passwords do not match");
    }

    if(isset($user['gender']) && empty($user['gender'])){
        array_push($errors, "Please specify your gender");
    }

    if(isset($user['birthday']) && empty($user['birthday'])){
        array_push($errors, "Please specify your birthday");
    }

    if(isset($user['bio']) && empty($user['bio'])){
        array_push($errors, "Please type in your bio");
    }

    if(isset($user['interests']) && empty($user['interests'])){
        array_push($errors, "Please specify your interests");
    }

    if(isset($user['email'])){
        $existingUser = selectOne('users', ['email' => $user['email']]);
        $loggedInUser = selectOne('users', ['id'=>$_SESSION['id']]);
        if ($existingUser){
            if (isset($user['update-user']) && $existingUser['id'] != $user['id']) {
                array_push($errors, "Email Already Exists");
            }

            if (isset($user['register-btn'])) {
                array_push($errors, "Email Already Exists");
            }
            
            if (isset($user['create-admin'])){
                array_push($errors, "Email Already Exists");
            }

            if(isset($user['submitDetails']) && $existingUser['id'] != $loggedInUser['id']){
                array_push($errors, "Email Already Exists");
            }
        }
        
        return $errors;
    }
}
