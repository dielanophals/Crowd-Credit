<?php
  class User{
    public function login($mail, $pass){
      try{
          $conn = Db::getInstance();
          $statement = $conn->prepare("SELECT * FROM users WHERE email = :email");
          $statement->bindParam(":email", $mail);
          $statement->execute();
          $user = $statement->fetch(PDO::FETCH_ASSOC);

          if(password_verify($pass, $user['password'])){
            $_SESSION["id"] = $user["id"];
            return true;
          }
          else{
              return false;
          }
      }
      catch(Throwable $t){
          return false;
      }
    }

    public function getUserData($id){
      $conn = Db::getInstance();
      $statement = $conn->prepare("SELECT * FROM users WHERE id = $id");
      $statement->execute();
      $user = $statement->fetch(PDO::FETCH_ASSOC);

      return $user;
    }
  }
