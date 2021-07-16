<?php 

function validateUserRegistration($user){
    
    global $conn;
    $errors = array();

    if(empty($user['gender'])){
        array_push($errors, "Please specify your gender");
    }

    if(empty($user['birthday'])){
        array_push($errors, "Please specify your birthday");
    }

    if(empty($user['bio'])){
        array_push($errors, "Please type in your bio");
    }

    if(empty($user['interests'])){
        array_push($errors, "Please specify your interests");
    }



    return $errors;
}

?>