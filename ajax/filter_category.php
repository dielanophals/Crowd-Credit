<?php
  require_once("../bootstrap.php");
  Session::check();

  if(isset($_POST['category'])){
    $category = $_POST['category'];

    $category = implode('-', $category);

    echo $category;
  }else{
    echo "";
  }
