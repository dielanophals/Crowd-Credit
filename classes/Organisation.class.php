<?php
  class Organisation{
    public function getOrganisations(){
      $conn = Db::getInstance();
      $statement = $conn->prepare("SELECT * FROM organisations WHERE id != 1");
      $statement->execute();
      $organisation = $statement->fetchAll();
      return $organisation;
    }

    public function getOrganisation($id){
      $conn = Db::getInstance();
      $statement = $conn->prepare("SELECT * FROM organisations WHERE id = $id");
      $statement->execute();
      $organisation = $statement->fetch(PDO::FETCH_ASSOC);
      return $organisation;
    }

    public function updateDescription($id, $desc){
      $conn = Db::getInstance();
      $statement = $conn->prepare("UPDATE organisations SET description = :desc WHERE id = '$id'");
      $statement->bindParam(':desc', $desc);
      $result = $statement->execute();
      return $result;
    }
  }
