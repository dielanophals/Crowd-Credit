<?php
  class Organisation{
    public function getOrganisations(){
      $conn = Db::getInstance();
      $statement = $conn->prepare("SELECT * FROM organisations WHERE id != 1");
      $statement->execute();
      $organisation = $statement->fetchAll();
      return $organisation;
    }
  }
