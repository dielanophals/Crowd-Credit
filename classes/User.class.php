<?php
  class User{
    public function login($mail, $pass){
      try{
          $conn = Db::getInstance();
          $statement = $conn->prepare("SELECT * FROM users WHERE email = :email && active = 1");
          $statement->bindParam(":email", $mail);
          $statement->execute();
          $user = $statement->fetch(PDO::FETCH_ASSOC);

          if(password_verify($pass, $user['password'])){
            $_SESSION["id"] = $user["id"];
            return true;
          }else{
              return false;
          }
      }
      catch(Throwable $t){
          return false;
      }
    }

    public function checkMail($mail){
      $conn = Db::getInstance();
      $statement = $conn->prepare("SELECT * FROM users WHERE email = :email && active = 1");
      $statement->bindParam(":email", $mail);
      $statement->execute();
      $statement->fetch(PDO::FETCH_ASSOC);
      return $statement->rowCount();
    }

    public function register($firstname, $lastname, $email, $password){
      try{
        date_default_timezone_set("Europe/Brussels");
        $timestamp = date('Y-m-d H:i:s');

        $conn = Db::getInstance();
        $statement = $conn->prepare("INSERT INTO users (firstname, lastname, email, password, role_id, organisation_id, timestamp, active) VALUES (:firstname, :lastname, :email, :password, 1, 1, '$timestamp', 1)");
        $statement->bindParam(":firstname", $firstname);
        $statement->bindParam(":lastname", $lastname);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":password", $password);
        $result = $statement->execute();
        return $result;
      }catch(Throwable $t){
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

    public function getUserTransactions(){
      $id = $_SESSION['id'];
      $conn = Db::getInstance();
      $statement = $conn->prepare("SELECT * FROM transactions WHERE user_id = $id ORDER BY timestamp DESC");
      $statement->execute();
      $transactions = $statement->fetchAll();

      return $transactions;
    }
	  
    public function getSearchUsers(){
      $conn = Db::getInstance();
      $statement = $conn->prepare("SELECT * FROM users");
      $statement->execute();
      $users = $statement->fetchAll();

      return $users;
    }
	
	public function moveImage(){
		$fileName = $_FILES["file"]["name"];
		$fileTmpName = $_FILES["file"]["tmp_name"];
		$imagepath = "images/profile/" . $_SESSION['user']."-" . time().".jpg";
		$fileExt = explode(".",$fileName);
		$fileActualExt = strtolower(end($fileExt));
		$allowed = array('jpg','jpeg','png');
		if(in_array($fileActualExt,$allowed)){
			move_uploaded_file($fileTmpName, $imagepath);
        	$this->imagepath = $imagepath;
    	}
    	else{
			return false;
    	}    
	}
	  
}