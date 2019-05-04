<?php
  require_once("bootstrap.php");

  Session::check();

?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Crowd Credit</title>
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script src="js/nav_dropdown.js"></script>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <?php require_once("inc/header.php"); ?>
    <section class="banner_image">
      <div class="info center">
        <h1>Crowdfund a dream</h1>
        <p>We are a crowdfunding platform for developing countries in the South. We want to give every person an equal chance</p>
      </div>
      <a class="btn red_btn" href="#">Crowdfund a dream</a>
    </section>
    <main>
      <h2 class="grey">Latest projects</h2>
      <div class="container project_tiles">

        <?php foreach(Project::getHomeProjects() as $p): ?>
          <?php $location = Project::getLocation($p['location_id']); ?>
          <div class="project_tile">
            <figure class="project_banner" style="background: url(<?php echo $p['banner']; ?>); background-size: cover; background-position:center;"></figure>
            <article class="project_info">
              <h3><?php echo $p['name']; ?></h3>
              <h4 class="lightgrey"><?php echo $location['continent']; ?></h4>
              <a class="red_btn btn" href="#">View project</a>
            </article>
          </div>

        <?php endforeach; ?>

      </div>
      <div class="see_more">
        <a class="red_btn btn" href="#">See all projects</a>
      </div>
    </main>
  </body>
</html>
