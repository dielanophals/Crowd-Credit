<?php
  require_once("../bootstrap.php");
  Session::check();

  if(isset($_POST['description'])){
    $id = $_POST['id'];
    $description = $_POST['description'];

    Organisation::updateDescription($id, $description);
  }else{
    echo "nope";
  }
