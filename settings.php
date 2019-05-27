<?php
  require_once 'bootstrap.php';
  Session::check();
?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <?php require_once 'inc/header.php'; ?>

    <!--Start ProfPic-->
    <div class="setProfPic">
            <div class="edit">
                <h2>Change profile picture</h2>
                <img class="currentPic" src="images/profilePics/<?php echo $result->img_dir; ?>">
                <br><br>
                <form action="" method="post" enctype="multipart/form-data">
                <input class="addcontent" type="file" name="imageFile" id="file" data-multiple-caption="{count} files selected" multiple onchange="readURL(this);" >
                <label for="file">Choose a file</label>
                    <br>
                    <input type="submit" name="uploadImage" value="Upload image" id="btn">
                </form>
                <hr>
            </div>
        </div>
        <!--End ProfPic-->
        <!--Start Email-->
        <div class="setEmail">
            <div class="edit">
                <h2>Change your email-address</h2>
                <p class="resultEmail">Your current email is:</p>
                <form action="" method="post">
                    <div class="signup">
                    <input type="password" id="password" name="password" placeholder="password">
                    <br><br>
                    <input type="text" id="newEmail" name="newEmail">
                    </div>
                    <input type="submit" name="changeEmail" value="Change Email" placeholder="new mail">
                
                </form>
                <hr>
            </div>
        </div>
        <!--End Email-->
        <!--Start Password-->
        <div class="setPassword">
            <div class="edit">
                <h2>Change your password</h2>
                <form action="" method="post">
                    <div class="signup">
                    <input type="password" id="oldPassword" name="oldPassword" placeholder="Old password">
                    <br><br>
                    <input type="password" id="newPassword" name="newPassword" placeholder="New password">
                    <br><br>
		            <input type="password" id="new_password_confirmation" name="new_password_confirmation" placeholder="Password confirmation">
</div>
                    <br><br>
                    <input type="submit" name="changePassword" value="Change Password">
                </form>
                <hr>
            </div>
        </div>
        <!--End Password-->
    
  </body>
</html>
