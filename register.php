<?php
  require_once("bootstrap.php");

  if(Session::check()){
    header("Location: index.php");
  }

  if(!empty($_POST)){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $check_mail = User::checkMail($email);

    if($check_mail == 0){
      if($password == $confirm_password){
        $hash_password = Security::hash($password);
        User::register($firstname, $lastname, $email, $hash_password);
        User::login($email, $password);
        header("Location: index.php");
      }else{
        $error = "Your passwords don't match.";
      }
    }else{
      $error = "That email address is already in use.";
    }
  }

?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <?php require_once("inc/header.php"); ?>
    <form class="center" action="#" method="post">
      <?php
      if(isset($error)){
        echo "<p class='error_message'>$error</p>";
      }
      ?>
      <input type="text" name="firstname" placeholder="First name" required>
      <input type="text" name="lastname" placeholder="Last name" required>
      <input type="email" name="email" placeholder="Email Address" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="password" name="confirm_password" placeholder="Confirm password" required>
      <input class="red_btn btn" type="submit" name="submit" value="Register">
      <p>Already have an account?</p>
      <a href="login.php">Sign in here</a>
    </form>
  </body>
</html>
