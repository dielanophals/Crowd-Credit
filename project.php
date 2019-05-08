<?php
  require_once("bootstrap.php");

  Session::check();

  if(isset($_GET['project'])){
    $project_id = $_GET['project'];
    $project = new Project;
    $project = $project->getProject($project_id);
  }else{
    header("Location: index.php");
  }
?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Crowd Credit</title>
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700|Roboto" rel="stylesheet">
    <script src="js/dropdowns.js"></script>
    <script src="js/projects.js"></script>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <?php require_once("inc/header.php"); ?>
    <main class="main_project">
    <div class="container project">
      <div class="banner_wrapper">
        <div class="banner_image" style="background:url(<?php echo $project['banner']; ?>); background-size:cover; background-position:center;"></div>
      </div>
    </div>
    </main>
  </body>
</html>
