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
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <?php require_once("inc/header.php"); ?>
    <form action="#" method="post">
      <input type="email" name="email">
      <input type="password" name="password">
      <input type="submit" name="submit" value="Login">
      <?php
      if(isset($err)){
        echo "Je gegevens kloppen niet.";
      }
      ?>
    </form>
  </body>
</html>
