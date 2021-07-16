<?php
include('path.php');
include('app/database/db.php');
include('app/helpers/middleware.php');
include(ROOT_PATH . "/profile/profile.php");

// dd($user);
$latest_posts = orderByLatest();
// dd($user['image']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/faa1fe5a90.js" crossorigin="anonymous"></script>

    <!-- Custom Styling -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Admin Styling -->
    <link rel="stylesheet" href="assets/css/admin.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <title>Admin Section - Dashboard</title>
</head>

<body>

    <?php include(ROOT_PATH . '/app/includes/header.php'); ?>

    <!-- Admin Page Wrapper -->
    <div class="admin-wrapper">

        <!-- Left Sidebar -->

        <?php include(ROOT_PATH . '/profile/profileSidebar.php'); ?>

        <!-- //Left Sidebar -->

        <!-- Admin Content -->
        <div class="admin-content">
            <div class="content">
                <h1 class="page-title">Profile</h1>

                <?php include(ROOT_PATH . '/app/includes/messages.php'); ?>
                <br><br>
                <form method="post" action="profile.php" enctype="multipart/form-data">

                    <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

                    <div class="profile-picture-div">
                        <div id="profile-container">
                            <image id="profileImage" src="<?php echo BASE_URL . '/assets/images/' . $user['image']; ?>">
                        </div>
                        <input id="imageUpload" type="file" name="profile-picture" placeholder="Photo" capture>
                    </div>

                    <div class="profile-details">
                        <h3 class="username">USERNAME: </h3>
                        <input type="text" name="username" class="profile-text-input" value="<?php echo $user['username']; ?>">
                        <br><br>
                        <h3 class="username">BIO:</h3>
                        <input type="text" name="bio" class="profile-text-input" value="<?php echo $user['bio']; ?>">
                    </div>

                    <br><br><br><br><br>
                    <hr class="hl">
                    <!-- <div class="latest-posts-container"> -->
                    <div class="latest-posts">
                        <h1>Latest Posts</h1>
                        <br>
                        <?php foreach ($latest_posts as $post) : ?>
                            <div class="post clearfix">
                                <h2><a class="profile-link" href="<?php echo BASE_URL . "/profile/profilePost.php"; ?>"><?php echo $post['title']; ?></a></h2>
                                <br>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- </div> -->


                    <div class="vl"></div>

                    <div class="about-me">
                        <h1 style="text-align: center;">About Me</h1><br>

                        <div class="profile-div">
                            <h3 class="username">EMAIL:</h3>
                            <input type="text" name="email" class="about-me-text-input" value="<?php echo $user['email']; ?>">
                            <br><br>
                            <h3 class="username">GENDER:</h3>
                            <?php if ($user['gender'] == "1") : ?>
                                <input type="radio" name="gender" value="1" checked>Male
                                <input type="radio" name="gender" value="2">Female
                            <?php elseif ($user['gender'] == "2") : ?>
                                <input type="radio" name="gender" value="1">Male
                                <input type="radio" name="gender" value="2" checked>Female
                            <?php else : ?>
                                <input type="radio" name="gender" value="1" required>Male
                                <input type="radio" name="gender" value="2" required>Female
                            <?php endif; ?>
                            <br><br>
                            <h3 class="username">BIRTHDAY:</h3>
                            <input type="date" name="birthday" min="2001-01-01" max="2010-01-31" value="<?php echo $user['birthday']; ?>">
                            <br><br>
                            <h3 class="username">INTERESTS:</h3>
                            <input type="text" name="interests" class="about-me-text-input" value="<?php echo $user['interests']; ?>">
                        </div>

                        <br><br>

                        <div class="profile-password">
                            <button type="button" name="password-ask" class="btn btn-big" onclick="myFunction()">Change Password</button>
                            <br><br>
                            <h3 class="username" id="password1" hidden>PASSWORD</h3>
                            <input type="password" name="password" class="about-me-text-input" id="password2" hidden>
                            <br><br>
                            <h3 class="username" id="password3" hidden>CONFIRM PASSWORD</h3>
                            <input type="password" name="passwordConf" class="about-me-text-input" id="password4" hidden>
                        </div>

                    </div>

                    <div class="submit-div">
                        <input type="submit" name="save-profile" class="btn btn-big" value="Save">
                    </div>

                </form>
            </div>
        </div>
        <!-- //Admin Content -->


    </div>
    <!-- //Page Wrapper -->

    <!-- JQUERY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- CKEditor 5 (For Blog Writing) -->
    <script src="https://cdn.ckeditor.com/ckeditor5/19.1.1/classic/ckeditor.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script>
        $("#profileImage").click(function(e) {
            $("#imageUpload").click();
        });

        function fasterPreview(uploader) {
            if (uploader.files && uploader.files[0]) {
                $('#profileImage').attr('src',
                    window.URL.createObjectURL(uploader.files[0]));
            }
        }
        $("#imageUpload").change(function() {
            fasterPreview(this);
        });

        function myFunction() {
            var passwordHeader1 = document.getElementById("password1");
            var password = document.getElementById("password2");
            var passwordHeader2 = document.getElementById("password3");
            var passwordConf = document.getElementById("password4");

            if (passwordHeader1.style.display === "none") {
                passwordHeader1.style.display = "block";
            } else {
                passwordHeader1.style.display = "none";
            }

            if (password.style.display === "none") {
                password.style.display = "block";
            } else {
                password.style.display = "none";
            }

            if (passwordHeader2.style.display === "none") {
                passwordHeader2.style.display = "block";
            } else {
                passwordHeader2.style.display = "none";
            }

            if (passwordConf.style.display === "none") {
                passwordConf.style.display = "block";
            } else {
                passwordConf.style.display = "none";
            }
        }
    </script>
</body>

</html>