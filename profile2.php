<?php
include('path.php');
include('app/database/db.php');
include('app/helpers/middleware.php');
include(ROOT_PATH . "/profileNew/profile.php");

// dd($user);
$latest_posts = orderByLatest();
// dd($_SESSION);
$sql = "SELECT * FROM posts WHERE user_id=34 AND published=1 ORDER BY created_at DESC LIMIT 3";
$result = mysqli_query($conn, $sql);
// $latest_posts = [];
$latestAffected = mysqli_fetch_assoc($result);
$affectedLatestPosts = mysqli_affected_rows($conn);
// dd($latest_posts);

$sql2 = "SELECT * FROM posts";
$result2 = mysqli_query($conn, $sql2);
$test = mysqli_fetch_assoc($result2);
// dd($test);
// dd($latest_posts);

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

  <!-- Bootstrap -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->

  <title>Profile</title>

</head>

<body>

  <?php include(ROOT_PATH . '/app/includes/header.php'); ?>

  <!-- Admin Page Wrapper -->
  <div class="admin-wrapper">

    <!-- Left Sidebar -->

    <?php include(ROOT_PATH . '/profileNew/profileSidebar.php'); ?>

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

                <!-- Profile -->

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
                        <div id="submit-profile" style="display: none;">
                          <button type="submit" name="profile-submit" class="btn btn-outline-primary">Save Profile Picture</button>
                        </div>
                      </form>
                      <br><br>
                      <div class="mt-3">
                        <h4 style="font-size: 1.5rem;"><?php echo $user['username'] ?></h4>
                        <p class="text-secondary mb-1" style="text-decoration: underline; ">Bio</p>

                        <i class="far fa-edit edit-icon" id="bio"></i>

                        <form method="POST" action="profile2.php">
                          <div class="bioClass">
                            <input type="text" name="bio" class="text-input bioClass bio" readonly value="<?php echo $converted; ?>">
                          </div>
                          <div id="bioSubmit" style="display: none;">
                            <button type="submit" name="bioSubmit" class="btn btn-outline-primary">Submit</button>
                          </div>
                        </form>

                        <br><br><br><br>
                        <button class="btn btn-outline-primary"><a href="usersChat/samples/chat/index.php" target="_blank">Message</a></button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- //Profile -->

              </div>
              <div class="col-md-8">

                <!-- Details -->

                <div class="card mb-3">
                  <div class="card-body details">
                    <form method="POST" action="profile2.php">
                      <div class="row">
                        <div class="col-sm-3">
                          <h3 class="mb-0">Full Name</h6>
                        </div>
                        <i class="far fa-edit edit-icon" id="username"></i>
                        <div class="col-sm-9 text-secondary">
                          <input type="text" name="username" class="text-input username" value="<?php echo $user['username']; ?>" readonly>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h3 class="mb-0">Email</h6>
                        </div>
                        <i class="far fa-edit edit-icon" id="email"></i>
                        <div class="col-sm-9 text-secondary">
                          <input type="text" name="email" class="text-input email" value="<?php echo $user['email']; ?>" readonly>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h3 class="mb-0">Interests</h6>
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
                  </div>
                </div>

                <!-- //Details -->

                <!-- Socials  -->

                <div class="card mt-3 mainDetails">
                  <form method="POST" action="profile2.php">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0 social-name"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="2" y1="12" x2="22" y2="12"></line>
                            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                          </svg>&nbsp;&nbsp;Website</h6>
                        <!-- <span class="text-secondary social"><a href="https://bootdey.com" target="_blank">https://bootdey.com</a></span> -->
                        <i class="far fa-edit edit-icon" id="website"></i>

                        <?php if ($socialData['website'] == null) : ?>
                          <input type="text" name="website" class="text-input website" value="Not Specified" readonly>
                          <br>
                          <button class="btn btn-outline-primary"><a href="#" target="_blank">Go To Website</a></button>

                        <?php else : ?>
                          <input type="text" name="website" class="text-input website" value="<?php echo $socialData['website'] ?>" readonly>
                          <br>
                          <button class="btn btn-outline-primary"><a href="https://<?php echo $socialData['website'] ?>" target="_blank">Go To Website</a></button>

                        <?php endif; ?>
                      </li>
                      <br>
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0 social-name"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info">
                            <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                          </svg>&nbsp;&nbsp;Twitter</h6>
                        <!-- <span class="text-secondary social"><a href="https://twitter.com/bootdey" target="_blank">@bootdey</a></span> -->
                        <i class="far fa-edit edit-icon" id="twitter"></i>

                        <?php if ($socialData['twitter'] == null) : ?>
                          <input type="text" name="twitter" class="text-input twitter" value="Not Specified" readonly>
                          <br>
                          <button class="btn btn-outline-primary"><a href="#" target="_blank">Go To Twitter</a></button>
                        <?php else : ?>
                          <input type="text" name="twitter" class="text-input twitter" value="<?php echo $socialData['twitter']; ?>" readonly>
                          <br>
                          <button class="btn btn-outline-primary"><a href="https://twitter.com/<?php echo $socialData['twitter'] ?>" target="_blank">Go To Twitter</a></button>
                        <?php endif; ?>


                      </li>
                      <br>
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0 social-name"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                          </svg>&nbsp;&nbsp;Instagram</h6>

                        <!-- <span class="text-secondary social"> -->
                        <i class="far fa-edit edit-icon" id="instagram"></i>
                        <?php if ($socialData['instagram'] == null) : ?>
                          <input type="text" name="instagram" class="text-input instagram" value="Not Specified" readonly>
                          <br>
                          <button class="btn btn-outline-primary"><a href="#" target="_blank">Go To Instagram</a></button>

                        <?php else : ?>
                          <input type="text" name="instagram" class="text-input instagram" value="<?php echo $socialData['instagram']; ?>" readonly>
                          <br>
                          <button class="btn btn-outline-primary"><a href="https://instagram.com/<?php echo $socialData['instagram'] ?>" target="_blank">Go To Instagram</a></button>

                        <?php endif; ?>

                        <!-- </span> -->
                      </li>
                      <br><br><br><br>
                      <button type="submit" name="submitSocials" class="btn btn-outline-primary" id="submitSocials" style="display: none;">Save Socials</button>
                    </ul>
                  </form>
                </div>

                <!-- //Socials  -->

                <!-- Latest Posts -->

                <div class="row gutters-sm">
                  <div class="col-sm-6 mb-3">
                    <div class="card h-100">
                      <div class="card-body">
                        <h1 class="d-flex align-items-center mb-3" style="text-align: center;">Latest Posts</h6>
                          <br>
                          <?php if ($latest_posts == null) : ?>
                            <h2 style="text-align: center;">No Recent Posts</h2>
                          <?php else : ?>

                            <?php if ($affectedLatestPosts > 1) : ?>
                              <?php foreach ($latest_posts as $post) : ?>
                                <?php
                                // dd($latest_posts);
                                ?>
                                <div class="post clearfix">
                                  <h2><a class="profile-link" href="<?php echo BASE_URL . "/single.php?id=" . $post['id'] . ""; ?>"><?php echo $post['title']; ?></a></h2>
                                  <br>
                                </div>
                              <?php endforeach; ?>

                            <?php else : ?>
                              <div class="post clearfix">
                                <h2><a class="profile-link" href="<?php echo BASE_URL . "/single.php?id=" . $latest_posts[0]['id'] . ""; ?>"><?php echo $latest_posts[0]['title']; ?></a></h2>
                                <br>
                              </div>

                            <?php endif; ?>

                          <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Latest Posts -->

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
  <!-- <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script> -->
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
      $("#submit-profile").toggleClass("messageDisplay")
    });

    $('#username,#email,#interests').on('click', function() {
      $clicked_btn = $(this);
      var input;

      if ($($clicked_btn).attr('id') == "username") {
        input = document.getElementsByClassName("username")
      } else if ($($clicked_btn).attr('id') == "email") {
        input = document.getElementsByClassName("email")
      } else if ($($clicked_btn).attr('id') == "interests") {
        input = document.getElementsByClassName("interests")
      }

      $(input).toggleClass("inputDisplay")

      if ($(input).attr("readonly")) {
        $(input).removeAttr("readonly")
      } else {
        $(input).attr("readonly", "true");
      }

      $(input).on(!("input", function() {
        $('#submitDetails').css("display", " none")
      }));

      $(input).on("input", function() {
        $('#submitDetails').css("display", " block")
      });

      console.log($(input).attr('class'))

    })

    $('#website,#twitter,#instagram').on('click', function() {
      $clicked_btn = $(this);
      var input;

      if ($($clicked_btn).attr('id') == "website") {
        input = document.getElementsByClassName("website")
      } else if ($($clicked_btn).attr('id') == "twitter") {
        input = document.getElementsByClassName("twitter")
      } else if ($($clicked_btn).attr('id') == "instagram") {
        input = document.getElementsByClassName("instagram")
      }

      $(input).toggleClass("inputDisplay")

      if ($(input).attr("readonly")) {
        $(input).removeAttr("readonly")
      } else {
        $(input).attr("readonly", "true");
      }

      $(input).on(!("input", function() {
        $('#submitSocials').css("display", " none")
      }));

      $(input).on("input", function() {
        $('#submitSocials').css("display", " block")
      });

      console.log($(input).attr('class'))
    })

    $('#bio').on('click', function() {
      $clicked_btn = $(this);
      var input;

      input = document.getElementsByClassName("bio")

      $(input).toggleClass("inputDisplay")

      if ($(input).attr("readonly")) {
        $(input).removeAttr("readonly")
      } else {
        $(input).attr("readonly", "true");
      }

      $(input).on(!("input", function() {
        $('#bioSubmit').css("display", " none")
      }));

      $(input).on("input", function() {
        $('#bioSubmit').css("display", " block")
      });

      console.log($(input).attr('class'))
    })

    // console.log($("username").val )
    // });
  </script>
</body>

</html>