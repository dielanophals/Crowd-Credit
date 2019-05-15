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
  <?php
    if(isset($_GET['fund']) && $_GET['fund'] == true):
  ?>
  <div class="popup">
      <div class="center fund">
        <h4 class="grey">Fund a dream</h4>
        <h5 class="lightgrey">Project</h5>
        <h3 class="red"><?php echo $project['name'] ?></h3>
        <h5 class="lightgrey">Amount</h5>
        <form action="#">
          <input type="text" value="100">
          <h5 class="lightgrey">Terms</h5>
          <input type="checkbox" id="accept">
          <p class="terms"><label for="accept">I know & understand the <a href="#">risks</a> of funding this project</label></p>
          <input class="btn red_btn" type="submit" value="Fund">
          <a class="btn darkgrey_btn" href="?project=<?php echo $project_id; ?>">Cancel</a>
        </form>
      </div>
  </div>
  <?php
    endif;
  ?>
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
          <h4 class="red">&euro;<?php echo $project['goal']; ?></h4>
          <?php $total_transactions_procent = $pro->getTotalProjectTransactions($project_id, $project['goal']); ?>
          <div class="bar">
            <div class="progress" style="width: <?php echo $total_transactions_procent ?>%"></div>
          </div>
          <p class="lightgrey"><?php echo $total_transactions_procent; ?> %</p>
          <a class="btn red_btn" href="?project=<?php echo $project_id; ?>&fund=true">Fund today</a>
        </div>
      </section>
    </div>
    </main>
    <section>
      <div class="container">
      <article class="about_project">
        <h3>About this project</h3>
        <p><?php echo $project['description']; ?></p>
      </article>
      <div class="project_feed">
        <h3>Project feed</h3>
        <?php foreach($pro->getProjectFeed3($project_id) as $f): ?>
          <article class="feed_block">
            <div class="feed_image_wrapper">
              <div class="feed_image" style="background: url(<?php echo $f['image'] ?>); background-size:cover; background-position:center;"></div>
            </div>
            <p><?php echo $f['description']; ?></p>
          </article>
        <?php endforeach; ?>
        <a class="btn grey_btn" href="#">More news</a>
      </div>
      </div>
    </section>
  </body>
</html>
