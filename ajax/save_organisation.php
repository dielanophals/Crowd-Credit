<?php
  require_once("../bootstrap.php");
  Session::check();

  if(isset($_POST['description'])){
    $description = $_POST['description'];

    echo $description;
  }else{
    echo "nope";
  }
