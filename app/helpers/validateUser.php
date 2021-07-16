<?php 

function validateUser($user){
    
    global $conn;
    $errors = array();
    
    if (empty($user['username'])) {
        array_push($errors, "Username is required");
    }
    
    if (empty($user['email'])) {
        array_push($errors, "Email is required");
    }
    
    
    if (empty($user['password'])) {
        array_push($errors, "Password is required");
    }

    if ($user['passwordConf'] !== $user['password']) {
        array_push($errors, "Passwords do not match");
    }
    

    if(isset($user['email'])){
        $existingUser = selectOne('users', ['email' => $user['email']]);
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
        }
        
        return $errors;
    }
}

    
function validateLogin($user){
    
    global $conn;
    $errors = array();
    
    if (empty($user['username'])) {
        array_push($errors, "Username is required");
    }
   
    if (empty($user['password'])) {
        array_push($errors, "Password is required");
    }

    return $errors;
}

?>