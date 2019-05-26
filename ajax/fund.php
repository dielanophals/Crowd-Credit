<?php
  require_once("../bootstrap.php");
  Session::check();

  if(isset($_POST['project'])){
    $project = $_POST['project'];
    $amount = $_POST['amount'];

    $user = new User;
    $data = $user->getUserData($_SESSION['id']);
    $wallet = $data['wallet'];
    if($wallet < $amount || $amount <= 0){
      echo "Gelieve een geldig bedrag in te voegen.";
    }else{
      $wallet -= $amount;
      $pro = new Project;
      $pro->insertFundUser($_SESSION['id'], $wallet);
      $pro->insertFund($project, $_SESSION['id'], $amount);
    }
  }else{
    echo "nope";
  }
