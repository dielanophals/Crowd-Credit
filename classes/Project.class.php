<?php
  class Project{
    public function getProjects($off, $search, $continent){
      $date = date('Y-m-d');
      $conn = Db::getInstance();
      $statement = $conn->prepare("SELECT * FROM projects WHERE $continent active = 1 && name LIKE '%$search%' && date_end >= :date ORDER BY id DESC LIMIT 9 OFFSET $off");
      $statement->bindParam(':date', $date);
      $statement->execute();
      $project = $statement->fetchAll();
      return $project;
    }

    public function getAllProjectsOrg($org){
      $conn = Db::getInstance();
      $statement = $conn->prepare("SELECT * FROM projects WHERE organisation_id = $org ORDER BY id DESC");
      $statement->execute();
      $project = $statement->fetchAll();
      return $project;
    }

    public function getAllActiveProjectsOrg($org){
      $date = date('Y-m-d');
      $conn = Db::getInstance();
      $statement = $conn->prepare("SELECT * FROM projects WHERE organisation_id = :org && active = 1  && date_end >= :date ORDER BY id DESC");
      $statement->bindParam(':org', $org);
      $statement->bindParam(':date', $date);
      $statement->execute();
      $project = $statement->fetchAll();
      return $project;
    }

    public function getTotalProjects($search, $continent){
      $date = date('Y-m-d');
      $conn = Db::getInstance();
      $statement = $conn->prepare("SELECT * FROM projects WHERE $continent active = 1 && name LIKE '%$search%' && date_end >= :date");
      $statement->bindParam(':date', $date);
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

    public function getOrganisation($organisation){
      $conn = Db::getInstance();
      $statement = $conn->prepare("SELECT * FROM organisations WHERE id = $organisation");
      $statement->execute();
      $organisation = $statement->fetch(PDO::FETCH_ASSOC);
      return $organisation;
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

    public function getEditContinents($id){
      $conn = Db::getInstance();
      $statement = $conn->prepare("SELECT * FROM locations WHERE id != $id");
      $statement->execute();
      $continent = $statement->fetchAll();
      return $continent;
    }

    public function setContinent($continent){
      $loc = "locations_id IN(" . str_replace('-', ', ', $continent);
      $loc .= ") &&";
      return $loc;
    }

    public function setCategory($category){
      $loc = "locations_id IN(" . str_replace('-', ', ', $category);
      $loc .= ") &&";
      return $loc;
    }

    public function getProject($id){
      $conn = Db::getInstance();
      $statement = $conn->prepare("SELECT * FROM projects WHERE id = $id");
      $statement->execute();
      $project = $statement->fetch(PDO::FETCH_ASSOC);
      return $project;
    }

    public function getTotalProjectTransactions($id, $goal){
      $conn = Db::getInstance();
      $statement = $conn->prepare("SELECT * FROM transactions WHERE project_id = $id && refund = 0");
      $statement->execute();
      $transactions = $statement->fetchAll();

      $total_transactions = 0;
      foreach($transactions as $t){
        $total_transactions += $t['amount'];
      }
      $total_transactions_procent = round($total_transactions / $goal * 100);
      return $total_transactions_procent;
    }

    public function getProjectFeed3($id){
      $conn = Db::getInstance();
      $statement = $conn->prepare("SELECT * FROM project_feed WHERE project_id = $id ORDER BY id DESC LIMIT 3");
      $statement->execute();
      $feed = $statement->fetchAll();
      return $feed;
    }

    public function insertFund($project_id, $id, $value, $organisation, $ref){
      date_default_timezone_set("Europe/Brussels");
      $timestamp = date('Y-m-d H:i:s');

      $conn = Db::getInstance();
      $statement = $conn->prepare("INSERT INTO transactions (amount, user_id, project_id, timestamp, organisation_id, refund) VALUES (:value, :id, :project_id, '$timestamp', '$organisation', '$ref')");
      $statement->bindParam(':value', $value);
      $statement->bindParam(':id', $id);
      $statement->bindParam(':project_id', $project_id);
      $result = $statement->execute();
      return $result;
    }

    public function insertFundUser($id, $wallet){
      $conn = Db::getInstance();
      $statement = $conn->prepare("UPDATE users SET wallet = :wallet WHERE id = '$id'");
      $statement->bindParam(':wallet', $wallet);
      $result = $statement->execute();
      return $result;
    }

    public function updateProject($id, $title, $text, $date, $goal, $loc){
      $conn = Db::getInstance();
      $statement = $conn->prepare("UPDATE projects SET name = :title, locations_id = '$loc', description = :desc, date_end='$date', goal = '$goal' WHERE id = '$id'");
      $statement->bindParam(':title', $title);
      $statement->bindParam(':desc', $text);
      $result = $statement->execute();
      return $result;
    }

    public function insertProject($title, $text, $date, $goal, $loc, $org, $img){
      date_default_timezone_set("Europe/Brussels");
      $timestamp = date('Y-m-d H:i:s');
      $startdate = date('Y-m-d');

      $conn = Db::getInstance();
      $statement = $conn->prepare("INSERT INTO projects (name, locations_id, description, date_start, date_end, goal, banner, timestamp, active, organisation_id) VALUES ('$title', '$loc', '$text', '$startdate', '$date', '$goal', '$img', '$timestamp', 1, $org)");
      $result = $statement->execute();
      return $result;
    }

    public function getLastProject(){
      $conn = Db::getInstance();
      $statement = $conn->prepare("SELECT * FROM projects ORDER BY id DESC LIMIT 1");
      $statement->execute();
      $project = $statement->fetch(PDO::FETCH_ASSOC);

      return $project;
    }

    public function insertFeed($id, $desc, $image){
      date_default_timezone_set("Europe/Brussels");
      $timestamp = date('Y-m-d H:i:s');

      $conn = Db::getInstance();
      $statement = $conn->prepare("INSERT INTO project_feed (project_id, description, image, timestamp, active) VALUES (:id, :desc, :img, '$timestamp', 1)");
      $statement->bindParam(':id', $id);
      $statement->bindParam(':desc', $desc);
      $statement->bindParam(':img', $image);
      $result = $statement->execute();
      return $result;
    }
  }
