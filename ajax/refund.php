<?php
  require_once("../bootstrap.php");
  Session::check();

  if(isset($_POST['userid'])){
    $userid = $_POST['userid'];
    $projectid = $_POST['projectid'];
    $amount = $_POST['amount'];

    $user = new User;
    $data = $user->getUserData($userid);
    $wallet = $data['wallet'];
    $wallet += $amount;

    $pro = new Project;
    $pro->insertFundUser($userid, $wallet);
    $pro->insertFund($projectid, $userid, $amount, $data['organisation_id'], 1);
  }else{
    echo "nope";
  }
