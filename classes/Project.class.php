<?php
  class Project{
    public function getProjects($off, $search, $continent){
      $conn = Db::getInstance();
      $statement = $conn->prepare("SELECT * FROM projects WHERE $continent active = 1 && name LIKE '%$search%' ORDER BY id ASC LIMIT 9 OFFSET $off");
      $statement->execute();
      $project = $statement->fetchAll();
      return $project;
    }

    public function getTotalProjects($search, $continent){
      $conn = Db::getInstance();
      $statement = $conn->prepare("SELECT * FROM projects WHERE active = 1 $continent && name LIKE '%$search%'");
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

    public function getCategories(){
      $conn = Db::getInstance();
      $statement = $conn->prepare("SELECT * FROM genres");
      $statement->execute();
      $category = $statement->fetchAll();
      return $category;
    }

    public function getContinents(){
      $conn = Db::getInstance();
      $statement = $conn->prepare("SELECT * FROM locations");
      $statement->execute();
      $continent = $statement->fetchAll();
      return $continent;
    }

    public function setContinent($continent){
      $loc = "locations_id IN(" . str_replace('-', ', ', $continent);
      $loc .= ") &&";
      return $loc;
    }
  }
