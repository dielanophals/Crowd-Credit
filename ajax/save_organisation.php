<?php
  require_once("../bootstrap.php");
  Session::check();

  if(isset($_POST['description'])){
    $id = $_POST['id'];
    $description = $_POST['description'];

    Organisation::updateDescription($id, $description);
  }else if(isset($_POST['project_id'])){
    $pjo_id =  $_POST['project_id'];
    $active = $_POST['state'];
    Organisation::updateActive($pjo_id, $active);
  }else{
    echo "nope";
  }
