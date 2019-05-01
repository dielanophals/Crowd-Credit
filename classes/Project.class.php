<?php
  class Project{
    public function getProjects(){
      $conn = Db::getInstance();
      $statement = $conn->prepare("SELECT * FROM project");
      $statement->execute();
      $project = $statement->fetchAll();
      return $project;
    }
  }
