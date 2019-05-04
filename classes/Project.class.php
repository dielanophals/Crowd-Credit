<?php
  class Project{
    public function getHomeProjects(){
      $conn = Db::getInstance();
      $statement = $conn->prepare("SELECT * FROM projects ORDER BY id DESC LIMIT 6");
      $statement->execute();
      $project = $statement->fetchAll();
      return $project;
    }

    public function getProjects(){
      $conn = Db::getInstance();
      $statement = $conn->prepare("SELECT * FROM projects");
      $statement->execute();
      $project = $statement->fetchAll();
      return $project;
    }

    public function getLocation($location){
      $conn = Db::getInstance();
      $statement = $conn->prepare("SELECT * FROM locations WHERE id = $location");
      $statement->execute();
      $location = $statement->fetch(PDO::FETCH_ASSOC);
      return $location;
    }
  }
