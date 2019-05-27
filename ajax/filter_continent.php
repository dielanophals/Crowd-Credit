<?php
  require_once("../bootstrap.php");
  Session::check();

  if(isset($_POST['continents'])){
    $continent = $_POST['continents'];

    $continent = implode('-', $continent);

    echo $continent;
  }else{
    echo "";
  }
