<?php
  class Project{
    public function getHomeProjects(){
      $conn = Db::getInstance();
      $statement = $conn->prepare("SELECT * FROM project ORDER BY id DESC LIMIT 6");
      $statement->execute();
      $project = $statement->fetchAll();
      return $project;
    }

    public function getProjects(){
      $conn = Db::getInstance();
      $statement = $conn->prepare("SELECT * FROM project");
      $statement->execute();
      $project = $statement->fetchAll();
      return $project;
    }
  }
