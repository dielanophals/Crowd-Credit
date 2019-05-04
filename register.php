<?php
  require_once("bootstrap.php");

  if(Session::check()){
    header("Location: index.php");
  }

  if(!empty($_POST)){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $u = new User();
    $isLogged = $u->login($email, $password);

    if($isLogged){
      header("Location: index.php");
    }else{
      $err = true;
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
      if(isset($err)){
        echo "<p class='error_message'>Je gegevens kloppen niet.</p>";
      }
      ?>
      <input type="text" name="firstname" placeholder="First name" required>
      <input type="text" name="lastname" placeholder="Last name" required>
      <input type="email" name="email" placeholder="Email Adress" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="password" name="confirm_password" placeholder="Confirm password" required>
      <input class="red_btn btn" type="submit" name="submit" value="Login">
      <p>Already have an account?</p>
      <a href="login.php">Sign in here</a>
    </form>
  </body>
</html>
