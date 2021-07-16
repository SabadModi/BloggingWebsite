<?php

include(ROOT_PATH . "/profileNew/validateProfile.php");
usersOnly();

$user = selectOne('users', ['id' => $_SESSION['id']]);

$social = "Not Specified";
// if(!isset())
$socialData = selectOne('socials', ['user_id'=>$_SESSION['id']]);
if(!$socialData){
    $socialsCreate = create('socials',['user_id'=>$_SESSION['id']]);
}

$errors = array();

$table = 'users';

$userBio = html_entity_decode($user['bio']);
$converted = html_entity_decode($user['bio'], ENT_COMPAT, 'UTF-8');

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

if (isset($_POST['profile-submit'])) {

    // dd($_FILES);

    if (!empty($_FILES['profile-picture']['name'])) {
        $image_name = time() . '_' . $_FILES['profile-picture']['name'];
        $destination = ROOT_PATH . "/assets/images/" . $image_name;
        $result = move_uploaded_file($_FILES['profile-picture']['tmp_name'], $destination);

        if ($result) {
            $image_name = $image_name;
        } else {
            array_push($errors, "Failed to upload image");
        }
    } else {
        $image_name = $user['image'];
    }

    $updated_image = update('users', $user['id'], ['image' => $image_name]);
}

if(isset($_POST['bioSubmit'])){
    $bioUpdated = update('users', $user['id'], ['bio'=>htmlentities($_POST['bio'])]);
    $bio = selectOne('users', ['id'=>$user['id']]);
    $userBio = $bio['bio'];
}


if (isset($_POST['submitDetails'])) {
    // unset($_POST['submitDetails']);
    $errors = validateProfile($_POST);
    if (count($errors) == 0) {
        $updated_data = update('users', $user['id'], ['username' => $_POST['username'], 'email' => $_POST['email'], 'interests' => $_POST['interests']]);
        // dd($user);
    }
}

if(isset($_POST['submitSocials'])){
    // dd($socialData['id']);
    $socialsUpdated = update('socials',$socialData['id'],['user_id'=>$_SESSION['id'], 'website'=>$_POST['website'], 'twitter'=>$_POST['twitter'], 'instagram'=>$_POST['instagram']]);
    $socialData = selectOne('socials', ['user_id'=>$_SESSION['id']]);
}