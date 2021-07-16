<?php include("path.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/users.php");
// guestOnly();
// if(!isset($_SESSION['registerSuccessfull'])) {
//     adminOnly();
// } else{
//     unset($_SESSION['registerSuccessfull']);
// }
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

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    
    <!-- CKEditor 5 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>

    <title>Register</title>
</head>

<body>
    
    <?php include(ROOT_PATH . "/app/includes/header.php"); ?>

    <div class="auth-content">

    <?php include(ROOT_PATH . '/app/includes/messages.php'); ?>

        <form action="infoRegister.php" method="post" enctype="multipart/form-data">

            <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
            
            <p>Profile Picture</p>
            <?php if ($image_name === ''): ?>
                <div id="profile-register-container">
                    <image id="profileImage" src="/profile/download.png">
                </div>
                <input id="imageUpload" type="file" name="profile-picture" placeholder="Photo" capture>
            <?php else: ?>
                <div id="profile-container">
                    <image id="profileImage" src="<?php echo BASE_URL . '/assets/images/' . $image_name; ?>">
                </div>
                <input id="imageUpload" type="file" name="profile-picture" placeholder="Photo" capture>
            <?php endif; ?>
            
            <br>
            <div>
                <label>Gender</label><br>
                <?php if ($gender === "1"): ?>
                    <input type="radio" name="gender" value="1" checked>Male
                    <input type="radio" name="gender" value="2">Female
                <?php elseif ($gender === "2"): ?>
                    <input type="radio" name="gender" value="1">Male
                    <input type="radio" name="gender" value="2" checked>Female
                <?php else: ?>
                    <input type="radio" name="gender" value="1" required>Male
                    <input type="radio" name="gender" value="2" required>Female
                <?php endif; ?>
                
            </div>
            <div>
                <label>Birthday</label>
                <input type="date" name="birthday" min="2001-01-01" max="2010-01-31" value="<?php echo $birthday; ?>">
            </div>
            <div>
                <label>Bio</label>
                 <textarea name="bio" id="body"><?php echo $bio; ?></textarea>
            </div>

            <div>
                <label>Your Interests</label>
                 <input type="text" name="interests" class="register-text-input" value="<?php echo $interests; ?>">
            </div>
            <div>
                <button type="submit" name="infoRegister-btn" class="btn btn-big">Confirm</button>
            </div>
        </form>
    </div>

    <!-- JQUERY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script>
        $("#profileImage").click(function(e) {
            $("#imageUpload").click();
        });
        function fasterPreview( uploader ) {
            if ( uploader.files && uploader.files[0] ){
                $('#profileImage').attr('src', 
                window.URL.createObjectURL(uploader.files[0]) );
            }
        }
        $("#imageUpload").change(function(){
            fasterPreview( this );
        });
    </script>
</body>
</html>