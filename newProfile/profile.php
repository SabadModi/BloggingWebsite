<?php

include("../path.php"); 
include("profileValidate.php");
include(ROOT_PATH . "/app/helpers/middleware.php");

if(adminOnly() || usersOnly()){

}
$user = selectOne('users', ['id'=>$_SESSION['id']]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
    
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/faa1fe5a90.js" crossorigin="anonymous"></script>

    
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="../assets/css/style.css">

</head>
<body>
    <?php include(ROOT_PATH . "/app/includes/header.php"); ?>
    <div class="container emp-profile">
        <!-- <form> -->
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-picture-div">
                        <div id="profile-container">
                            <image id="profileImage" src="<?php echo BASE_URL . '/assets/images/' . $user['image']; ?>">
                        </div>
                        <input id="imageUpload" type="file" name="profile-picture" placeholder="Photo" capture>
                    </div>

                    <!-- <div class="profile-img">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                        <div class="file btn btn-lg btn-primary">
                            Change Photo
                            <input type="file" name="file"/>
                        </div>
                    </div> -->
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            Kshiti Ghelani
                        </h5>
                        <h6>
                            Web Developer and Designer
                        </h6>
                        <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                        <ul class="nav nav-tabs" id="myTab">
                            <li>
                                <button class="nav-link active" id="homeButton">
                                    About
                                </button>
                            </li>
                            <li>
                                <button class="nav-link" id="profileButton">
                                    Timeline
                                </button>
                            </li>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <p>WORK LINK</p>
                        <a href="">Website Link</a><br/>
                        <a href="">Bootsnipp Profile</a><br/>
                        <a href="">Bootply Profile</a>
                        <p>SKILLS</p>
                        <a href="">Web Designer</a><br/>
                        <a href="">Web Developer</a><br/>
                        <a href="">WordPress</a><br/>
                        <a href="">WooCommerce</a><br/>
                        <a href="">PHP, .Net</a><br/>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tabcontent active" id="home">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $user['username']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $user['email']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <p>To Be filled</p>
                                </div>
                            </div>
                        </div>

                        <div class="tabcontent" id="profile">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Experience</label>
                                </div>
                                <div class="col-md-6">
                                    <p>Expert</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Hourly Rate</label>
                                </div>
                                <div class="col-md-6">
                                    <p>10$/hr</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Total Projects</label>
                                </div>
                                <div class="col-md-6">
                                    <p>230</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>English Level</label>
                                </div>
                                <div class="col-md-6">
                                    <p>Expert</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Availability</label>
                                </div>
                                <div class="col-md-6">
                                    <p>6 months</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Your Bio</label><br/>
                                    <p>Your detail description</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- </form>            -->
    </div>

    <?php include(ROOT_PATH . "/app/includes/footer.php"); ?>
    <script>
        $(document).ready(function (){
            $("#homeButton").on('click', function () {

                $("#homeButton").removeClass("nav-link active")
                
                $("#homeButton").addClass("nav-link active")
                
                $("#home").removeClass("tabcontent active")
                
                $("#home").addClass("tabcontent active")
                

                
                $("#profileButton").removeClass("nav-link active")
                
                $("#profileButton").addClass("nav-link")
                
                $("#profile").removeClass("tabcontent active")
                
                $("#profile").addClass("tabcontent")
            });

            $("#profileButton").on('click', function () {

                
                $("#profileButton").removeClass("nav-link")
                
                $("#profileButton").addClass("nav-link active")
                
                $("#profile").removeClass("tabcontent")
                
                $("#profile").addClass("tabcontent active")
                

                $("#homeButton").removeClass("nav-link active")
                
                $("#homeButton").addClass("nav-link")
                
                $("#home").removeClass("tabcontent active")
                
                $("#home").addClass("tabcontent")
                
            })
        })
    </script>
</body>
</html>
