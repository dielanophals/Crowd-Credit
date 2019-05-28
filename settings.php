    
<?php
    require_once 'bootstrap.php';
    $s = Session::check();
    if ($s === false) {
        header('Location: login.php');
    }
    if (!empty($_POST)) {
        if (!empty($_POST['currentPassword'])) {
            $check = new User();
            $check->setPassword($_POST['currentPassword']);
            if ($check->passwordCheck($_SESSION['userID']) == true) {
                $update = new Post();
                if (!empty($_POST['email'])) {
                    $check->setEmail($_POST['email']);
                } else {
                    $feedback = 'email cannot be empty.';
                }
                if (!empty($_POST['name'])) {
                    $check->setUsername($_POST['name']);
                } else {
                    $feedback = 'username cannot be empty.';
                }
                if (!empty($_POST['bio'])) {
                    $check->setDescription($_POST['bio']);
                } else {
                    $feedback = 'description cannot be empty.';
                }
                $check->updateInfo($_SESSION['userID']);
                if (!empty($_POST['newPassword'])) {
                    if (!empty($_POST['confirmPassword'])) {
                        if ($_POST['newPassword'] == $_POST['confirmPassword']) {
                            $check->setPassword($_POST['newPassword']);
                            $check->updatePassword($_SESSION['userID']);
                        } else {
                            $feedback = 'Your new password is not confirmed correctly.';
                        }
                    } else {
                        $feedback = 'You need to confirm your password.';
                    }
                }
                if (!empty($_FILES['profileImage'])) {
                    $imagePost = $_FILES['profileImage'];
                    $update = new Post();
                    if ($update->checkType($imagePost) === false) {
                        $feedback = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
                    } else {
                        if ($update->fileSize($imagePost) === false) {
                            $feedback = 'Sorry, your file is too big.';
                        } else {
                            $update->createDirectory('profile');
                            if ($update->fileExists() === false) {
                                $feedback = 'Sorry, this file already exists. Please try again.';
                            } else {
                                $update->insertProfilePictureIntoDB($update->uploadProfileImage(), $_SESSION['userID']);
                            }
                        }
                    }
                }
                $feedback = 'Account updated.';
            } else {
                $feedback = 'Password is incorrect.';
            }
        } else {
            $feedback = 'Password cannot be empty.';
        }
    }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <title>InstaPet - Profile</title>
       <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700|Roboto" rel="stylesheet">
    <script src="js/dropdowns.js"></script>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<?php require_once 'inc/header.php'; ?>
    <?php if (isset($feedback)): ?>
        <div class="feedback">
            <p><?php echo $feedback; ?></p>
        </div>
    <?php endif; ?>
    <div class="container">
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="profile__information">
                
                <div class="information">
                    <?php foreach (User::getUserInfoSettings($_SESSION['userID']) as $info): ?>
                        <label for="name">Name</label><br>
                        <textarea name="name" id="name"><?php echo htmlspecialchars($info['username']); ?></textarea><br>
                        <label for="bio">Biography</label>
                        <textarea name="bio" id="bio"><?php echo htmlspecialchars($info['description']); ?></textarea>
                    <?php endforeach; ?>

                    <?php foreach (User::getUserInfoSettings($_SESSION['userID']) as $info): ?>
                        <label for="email">Email</label><br>
                        <textarea name="email" id="email"><?php echo htmlspecialchars($info['email']); ?></textarea>
                    <?php endforeach; ?>
                    <label for="newPassword">New password</label><br>
                    <input type="password" name="newPassword" id="newPassword" class="passwords" placeholder="New password"><br>
                    <label for="confirmPassword">Confirm password</label><br>
                    <input type="password" name="confirmPassword" id="confirmPassword" class="passwords" placeholder="Confirm password"><br>
                    <label for="currentPassword" id="required">Current password <span style="color:red">*</span></label><br>
                    <input type="password" name="currentPassword" id="currentPassword" class="passwords" placeholder="Current password"><br>

                    <label for="image">Upload profile image</label><br>
                    <input type="file" name="profileImage" id="profileImage"><br>

                    <input type="submit" value="Save"><br>
                </div>
            </div>
        </form>
    </div>
</body>
</html>