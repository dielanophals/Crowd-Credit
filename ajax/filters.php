<?php
  require_once("../bootstrap.php");
  Session::check();

  if(isset($_POST['continents'])){
    $page = $_POST['continents'];

    $page = implode('-', $page);

    echo $page;
  }else{
    echo "";
  }
