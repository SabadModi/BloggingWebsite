<?php
include('path.php');
include('app/database/db.php');
include('app/helpers/middleware.php');
include(ROOT_PATH . "/profileNew/profile.php");

// dd($user);
// $latest_posts = orderByLatest() or die(mysqli_error($conn));
$sql = "SELECT * FROM blog.posts WHERE user_id=" . $_SESSION['id'] . " AND published=1 ORDER BY created_at DESC LIMIT 3";
$result = mysqli_query($conn, $sql);
$latest_posts = [];
$latest_posts = mysqli_fetch_assoc($result);
$affectedLatestPosts = mysqli_affected_rows($conn);

// dd($result);
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

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Custom Styling -->
    <link rel="stylesheet" href="profileNew/profile.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Admin Styling -->
    <link rel="stylesheet" href="assets/css/admin.css">

    <title>Profile</title>

    <style>
        a:hover,
        a:focus {
            text-decoration: none;
            outline: none;
        }

        .tab {
            font-family: 'Nunito', sans-serif;
        }

        .tab .nav-tabs {
            background-color: transparent;
            border: none;
        }

        .tab .nav-tabs li a {
            color: #222;
            background: transparent;
            font-size: 18px;
            font-weight: 800;
            letter-spacing: 1px;
            text-align: center;
            text-transform: uppercase;
            padding: 15px 15px 10px;
            margin: 0;
            border: none;
            border-radius: 0;
            overflow: hidden;
            position: relative;
            z-index: 1;
            transition: all 0.3s ease 0s;
        }

        .tab .nav-tabs li:last-child a {
            margin-right: 0;
        }

        .tab .nav-tabs li a:hover,
        .tab .nav-tabs li.active a {
            color: #222;
            background: #fff;
            border: none;
        }

        .tab .nav-tabs li.active a {
            color: #6CBF1C;
        }

        .tab .nav-tabs li a:before,
        .tab .nav-tabs li a:after {
            content: "";
            background-color: #d1d1d1;
            height: 7px;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
            transition: all 0.5s ease 0s;
        }

        .tab .nav-tabs li a:after {
            background-color: #6CBF1C;
            height: 100%;
            opacity: 0;
        }

        .tab .nav-tabs li.active a:before,
        .tab .nav-tabs li a:hover:before {
            height: 100%;
            opacity: 0;
        }

        .tab .nav-tabs li.active a:after,
        .tab .nav-tabs li a:hover:after {
            height: 7px;
            opacity: 1;
        }

        .tab .tab-content {
            color: #555;
            background: #fff;
            font-size: 15px;
            letter-spacing: 1px;
            line-height: 23px;
            padding: 20px;

        }

        .tab .tab-content h3 {
            color: #222;
            font-size: 22px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 0 0 7px 0;
        }

        /* .tab-content-style{
            width: 100%;
        } */

        @media only screen and (max-width: 479px) {
            .tab .nav-tabs li {
                width: 100%;
            }

            .tab .nav-tabs li a {
                margin: 0 0 10px;
            }

            .tab .tab-content h3 {
                font-size: 18px;
            }
        }
    </style>

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

                <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>


                <div class="container">
                    <div class="main-body">
                        <div class="row gutters-sm">
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-column align-items-center text-center" style="text-align:center;">
                                            <form method="post" action="profile2.php" enctype="multipart/form-data">
                                                <!-- <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150"> -->
                                                <div class="profile-picture-div">
                                                    <div id="profile-container">
                                                        <image id="profileImage" src="<?php echo BASE_URL . '/assets/images/' . $user['image']; ?>">
                                                    </div>
                                                    <input id="imageUpload" type="file" name="profile-picture" placeholder="Photo" capture>
                                                </div>
                                                <button type="submit" name="profile-submit" class="btn btn-outline-primary">Save Profile Picture</button>
                                            </form>
                                            <br><br>
                                            <div class="mt-3">
                                                <h4 style="font-size: 1.5rem;"><?php echo $user['username'] ?></h4>
                                                <p class="text-secondary mb-1" style="text-decoration: underline; ">Bio</p>
                                                <p class="text-secondary mb-1"><?php echo html_entity_decode($user['bio']); ?></p>
                                                <!-- <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p> -->
                                                <!-- <button class="btn btn-primary">Follow</button> -->
                                                <br><br>
                                                <button class="btn btn-outline-primary"><a href="usersChat/samples/chat/index.php" target="_blank">Message</a></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br><br><br><br>
                                <div class="card mt-3 tab-content-style">
                                    <div class="tab" role="tabpanel">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab">Socials</a></li>
                                            <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab">Details</a></li>
                                            <li role="presentation"><a href="#Section3" aria-controls="posts" role="tab" data-toggle="tab">Latest Posts</a></li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content tabs">
                                            <!-- Bootstrap -->
                                            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
                                            <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                                                <h3>Socials</h3>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                        <h6 class="mb-0 social-name"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline">
                                                                <circle cx="12" cy="12" r="10"></circle>
                                                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                                                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                                            </svg>&nbsp;&nbsp;Website</h6>
                                                        <span class="text-secondary social"><a href="https://bootdey.com" target="_blank">https://bootdey.com</a></span>
                                                    </li>
                                                    <br>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                        <h6 class="mb-0 social-name"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info">
                                                                <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                                            </svg>&nbsp;&nbsp;Twitter</h6>
                                                        <span class="text-secondary social"><a href="https://twitter.com/bootdey" target="_blank">@bootdey</a></span>
                                                    </li>
                                                    <br>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                        <h6 class="mb-0 social-name"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger">
                                                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                                            </svg>&nbsp;&nbsp;Instagram</h6>
                                                        <span class="text-secondary social"><a href="https://instagram.com/bootdey" target="_blank">bootdey</a></span>
                                                    </li>
                                                </ul>
                                                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce semper, magna a ultricies volutpat, mi eros viverra massa, vitae consequat nisi justo in tortor. Proin accumsan felis ac felis dapibus, non iaculis mi varius.</p> -->
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="Section2">
                                                <div class="details">
                                                    <form method="POST" action="profile2.php">
                                                        <div class="row">
                                                            <div class="col-sm-3 details-heading">
                                                                <h3 class="mb-0" style="font-size:medium;">Full Name</h6>
                                                            </div>
                                                            <i class="far fa-edit edit-icon" id="username"></i>
                                                            <div class="col-sm-9 text-secondary">
                                                                <input type="text" name="username" class="text-input username" value="<?php echo $user['username']; ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <h3 class="mb-0" style="font-size:medium;">Email</h6>
                                                            </div>
                                                            <i class="far fa-edit edit-icon" id="email"></i>
                                                            <div class="col-sm-9 text-secondary">
                                                                <input type="text" name="email" class="text-input email" value="<?php echo $user['email']; ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <hr>



                                                        <!-- <div class="row">
                                                            <div class="col-sm-3">
                                                                <h6 class="mb-0">Phone</h6>
                                                            </div>
                                                            <div class="col-sm-9 text-secondary">
                                                                (239) 816-9029
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <h6 class="mb-0">Mobile</h6>
                                                            </div>
                                                            <div class="col-sm-9 text-secondary">
                                                                (320) 380-4539
                                                            </div>
                                                        </div>
                                                        <hr> -->



                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <h3 class="mb-0" style="font-size:medium;">Interests</h6>
                                                            </div>
                                                            <i class="far fa-edit edit-icon" id="interests"></i>
                                                            <div class="col-sm-9 text-secondary">
                                                                <input type="text" name="interests" class="text-input interests" value="<?php echo $user['interests']; ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <br>

                                                        <button type="submit" name="submitDetails" class="btn btn-outline-primary" id="submitDetails" style="display: none;">Save Details</button>

                                                    </form>
                                                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce semper, magna a ultricies volutpat, mi eros viverra massa, vitae consequat nisi justo in tortor. Proin accumsan felis ac felis dapibus, non iaculis mi varius.</p> -->
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="Section3">
                                                    <!-- <div class="card-body"> -->
                                                    <h1 class="d-flex align-items-center mb-3" style="text-align: center;">Latest Posts</h6>
                                                        <br>
                                                        <?php if ($latest_posts == null) : ?>
                                                            <h2 style="text-align: center;">No Recent Posts</h2>
                                                        <?php else : ?>

                                                            <?php if ($affectedLatestPosts > 1) : ?>

                                                                <?php foreach ($latest_posts as $post) : ?>
                                                                    <div class="post clearfix">
                                                                        <h2><a class="profile-link" href="<?php echo BASE_URL . "/profile/profilePost.php"; ?>"><?php echo $post['title']; ?></a></h2>
                                                                        <br>
                                                                    </div>
                                                                <?php endforeach; ?>

                                                            <?php else : ?>

                                                                <div class="post clearfix">
                                                                    <h2><a class="profile-link" href="<?php echo BASE_URL . "/profile/profilePost.php"; ?>"><?php echo $latest_posts['title']; ?></a></h2>
                                                                    <br>
                                                                </div>

                                                            <?php endif; ?>

                                                        <?php endif; ?>
                                                        <!-- </div> -->
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <!-- <div class="col-md-8">
                <div class="card mb-3">
                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- //Admin Content -->
    </div>
    <!-- //Page Wrapper -->

    <!-- JQUERY -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <!-- CKEditor 5 (For Blog Writing) -->
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/19.1.1/classic/ckeditor.js"></script> -->
    <!-- <script src="assets/js/scripts.js"></script> -->
    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <!-- <script src="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <script>
        // $(document).ready(function() {

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

        $('#username,#email,#interests').on('click', function() {
            // e.preventDefault();
            $clicked_btn = $(this);
            var input;

            if ($($clicked_btn).attr('id') == "username") {
                input = document.getElementsByClassName("username")
            } else if ($($clicked_btn).attr('id') == "email") {
                input = document.getElementsByClassName("email")
            } else if ($($clicked_btn).attr('id') == "interests") {
                input = document.getElementsByClassName("interests")
            }

            // $(input).addClass("inputDisplay")
            $(input).toggleClass("inputDisplay")

            if ($(input).attr("readonly")) {
                $(input).removeAttr("readonly")
            } else {
                $(input).attr("readonly", "true");
            }

            // $(input).prop('disabled', function(i, v) {
            //   return !v;
            // });

            $(input).on(!("input", function() {
                $('#submitDetails').css("display", " none")
            }));

            $(input).on("input", function() {
                $('#submitDetails').css("display", " block")
            });

            // $('#submitDetails').toggleClass("display")

            console.log($(input).attr('class'))

            // $(input).css("border", "1px solid black !important")

            // console.log("Works")
        })

        // console.log($("username").val )
        // });
    </script>
</body>

</html>