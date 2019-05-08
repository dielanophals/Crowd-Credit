<?php
  require_once("bootstrap.php");

  Session::check();

  if(isset($_GET['project'])){
    $project_id = $_GET['project'];
    $pro = new Project;
    $project = $pro->getProject($project_id);
    $location = $pro->getLocation($project['locations_id']);
    $organisation = $pro->getOrganisation($project['organisation_id']);
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
    <div class="container">
      <div class="banner_wrapper">
        <div class="banner_image" style="background:url(<?php echo $project['banner']; ?>); background-size:cover; background-position:center;"></div>
      </div>
      <section class="project_information">
        <div class="center">
          <h3 class="red"><?php echo $project['name']; ?></h3>
          <h4><?php echo $location['continent']; ?></h4>
          <h5 class="lightgrey">Organisation</h5>
          <h4><?php echo $organisation['name']; ?></h4>
          <h5 class="lightgrey">End date</h5>
          <h4><?php echo $project['date_end']; ?></h4>
          <h5 class="lightgrey">Goal</h5>
          <h4>&euro; <?php echo $project['goal']; ?></h4>
          <div class="bar">
            <div class="progress"></div>
          </div>
          <a class="btn red_btn" href="#">Fund today</a>
        </div>
      </section>
    </div>
    </main>
    <section>
      <div class="container">
      <article>
        <p><?php echo $project['description']; ?></p>
      </article>
      </div>
    </section>
  </body>
</html>
