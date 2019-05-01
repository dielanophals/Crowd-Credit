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

    public function profilePicture($id){
      $conn = Db::getInstance();
      $statement = $conn->prepare("SELECT img FROM users WHERE id = $id");
      $statement->execute();
      $user = $statement->fetch(PDO::FETCH_ASSOC);

      return $user["img"];
    }

    public function name($id){
      $conn = Db::getInstance();
      $statement = $conn->prepare("SELECT firstname, lastname FROM users WHERE id = $id");
      $statement->execute();
      $user = $statement->fetch(PDO::FETCH_ASSOC);

      return $user["firstname"] . " " . $user["lastname"];
    }
  }
