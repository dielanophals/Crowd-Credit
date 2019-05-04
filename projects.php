<?php
  require_once("bootstrap.php");

  Session::check();

?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Crowd Credit</title>
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700|Roboto" rel="stylesheet">
    <script src="js/nav_dropdown.js"></script>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <?php require_once("inc/header.php"); ?>
    <main>
      <h2 class="grey">Projects</h2>
      <div class="container project_tiles">

        <?php foreach(Project::getProjects() as $p): ?>
          <?php $location = Project::getLocation($p['location_id']); ?>
          <div class="project_tile">
            <figure class="project_banner" style="background: url(<?php echo $p['banner']; ?>); background-size: cover; background-position:center;"></figure>
            <article class="project_info">
              <h3><?php echo $p['name']; ?></h2>
              <h4 class="lightgrey"><?php echo $location['continent']; ?></h3>
              <a class="red_btn btn" href="#">View project</a>
            </article>
          </div>

        <?php endforeach; ?>

      </div>
    </main>
  </body>
</html>
