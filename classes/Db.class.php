<?php
  abstract class Db {
    private static $conn;

    public static function getInstance(){
      if(self::$conn != null){
        //connection found! return connection
        return self::$conn;
      }else{
        $config = parse_ini_file("config/config.ini");

        //no connection found
        self::$conn = new PDO('mysql:host=localhost;dbname='.$config['database'], $config['user'], $config['password']);
        return self::$conn;
      }
    }
  }
