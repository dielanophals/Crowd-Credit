<?php
  require_once("../bootstrap.php");
  Session::check();

  if(isset($_POST['page'])){
    $page = $_POST['page'];

    echo $page;
  }else{
    echo "nope";
  }
