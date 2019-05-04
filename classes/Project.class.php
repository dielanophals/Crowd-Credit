<?php
  class Project{
    public function getProjects($off){
      $conn = Db::getInstance();
      $statement = $conn->prepare("SELECT * FROM projects WHERE active = 1 ORDER BY id ASC LIMIT 9 OFFSET $off");
      $statement->execute();
      $project = $statement->fetchAll();
      return $project;
    }

    public function getTotalProjects(){
      $conn = Db::getInstance();
      $statement = $conn->prepare("SELECT * FROM projects WHERE active = 1");
      $statement->execute();
      $statement->fetchAll();
      $total_projects = $statement->rowCount();
      return $total_projects;
    }

    public function getLocation($location){
      $conn = Db::getInstance();
      $statement = $conn->prepare("SELECT * FROM locations WHERE id = $location");
      $statement->execute();
      $location = $statement->fetch(PDO::FETCH_ASSOC);
      return $location;
    }
  }
