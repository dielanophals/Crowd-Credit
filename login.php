<?php
  require_once("bootstrap.php");

  if(Session::check()){
    header("Location: index.php");
  }

  if(!empty($_POST)){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $login = User::login($email, $password);

    if($login){
      header("Location: index.php");
    }else{
      $error = "Your data is incorrect.";
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
    <form action="#" method="post">
      <?php
      if(isset($error)){
        echo "<p class='error_message'>$error</p>";
      }
      ?>
      <input type="email" name="email" placeholder="Email Adress" required>
      <input type="password" name="password" placeholder="Password" required>
      <input class="red_btn btn" type="submit" name="submit" value="Login">
      <p>Not an account yet?</p>
      <a href="register.php">Sign up here</a>
    </form>
  </body>
</html>
