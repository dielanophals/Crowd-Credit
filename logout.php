<?php
    require_once("bootstrap.php");

    $s = Session::check();
    if($s === false){
        header("location: index.php");
    }
    else{
        Session::destroy();
        header("location: index.php");
    }
