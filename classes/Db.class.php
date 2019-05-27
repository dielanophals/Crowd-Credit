<?php
  abstract class Db {
    private static $conn;

    public static function getConfig(){
      // get the config file
        return parse_ini_file(__DIR__ . "/../config/config.ini");
    }

    public static function getInstance(){
      if(self::$conn != null){
        //connection found! return connection
        return self::$conn;
      }else{
        $config = self::getConfig();

        //no connection found
        self::$conn = new PDO('mysql:host=localhost;dbname='.$config['database'], $config['user'], $config['password']);
        return self::$conn;
      }
    }
  }
