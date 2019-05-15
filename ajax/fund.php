<?php
  require_once("../bootstrap.php");
  Session::check();

  if(isset($_POST['project'])){
    $project = $_POST['project'];
    $amount = $_POST['amount'];

    try{
      $pro = new Project;
      $pro->insertFund($project, '1', $amount);
    }
    catch(Throwable $t){
        return false;
    }
  }else{
    echo "nope";
  }
