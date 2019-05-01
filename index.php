<?php
  require_once("bootstrap.php");

  Session::check();

?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Crowd Credit</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <?php require_once("inc/header.php"); ?>
    <main>
      <div class="container">

        <?php foreach(Project::getProjects() as $p): ?>

          <div class="project_tile">
            <figure class="project_banner" style="background: url(<?php echo $p['banner']; ?>); background-size: cover; background-position:center;"></figure>
            <article class="project_info">
              <h2><?php echo $p['name']; ?></h2>
              <h3><?php echo $p['location']; ?></h3>
              <a class="red_btn" href="#">View project</a>
            </article>
          </div>

        <?php endforeach; ?>

      </div>
    </main>
  </body>
</html>
