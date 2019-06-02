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
  <?php require_once("inc/head.php"); ?>
  <body  id="page_project">
  <div class="popup hide">
      <div class="center fund">
        <h4 class="grey">Fund a dream</h4>
        <h5 class="lightgrey">Project</h5>
        <h3 class="red"><?php echo $project['name'] ?></h3>
        <h5 class="lightgrey">Amount</h5>
        <form action="#" method="post">
          <input type="number" name="value" id="amount" value="100" min="10">
          <h5 class="lightgrey">Terms</h5>
          <input type="checkbox" id="accept">
          <p class="terms"><label for="accept">I know &amp; understand the <a href="#">risks</a> of funding this project</label></p>
          <input class="btn red_btn" id="fund" data-project="<?php echo $project_id; ?>" data-user="<?php echo $_SESSION['id']; ?>" type="submit" name="fund" value="Fund">
          <a class="btn darkgrey_btn" href="?project=<?php echo $project_id; ?>">Cancel</a>
        </form>
      </div>
  </div>
    <?php require_once("inc/header.php"); ?>
    <?php if($project['organisation_id'] == $userData['organisation_id']): ?>
      <a class="btn red_btn edit" href="edit_project.php?project=<?php echo $project_id ?>">Edit project</a>
    <?php endif; ?>
    <main class="main_detail">
    <div class="container">
      <div class="banner_wrapper">
        <div class="banner_image" style="background:url(<?php echo $project['banner']; ?>); background-size:cover; background-position:center;"></div>
      </div>
      <section class="detail_information">
        <div class="center">
          <h3 class="red"><?php echo htmlspecialchars($project['name']); ?></h3>
          <h4><?php echo htmlspecialchars($location['continent']); ?></h4>
          <div class="project-org">
          	<h5 class="lightgrey">Organisation</h5>
            <h4><?php echo htmlspecialchars($organisation['name']); ?></h4>
		  </div>
		  <div class="project-end">
		    <h5 class="lightgrey">End date</h5>
            <h4><?php echo htmlspecialchars(substr($project['date_end'], 8, 2)) . "/" . htmlspecialchars(substr($project['date_end'], 5, 2)) . "/" . htmlspecialchars(substr($project['date_end'], 0, 4)); ?> </h4>
		  </div>
          <div class="project-goal">
            <h5 class="lightgrey">Goal</h5>
            <h4 class="red">&euro;<?php echo htmlspecialchars($project['goal']); ?></h4>
            <?php $total_transactions_procent = $pro->getTotalProjectTransactions($project_id, $project['goal']); ?>
            <div class="bar">
              <div class="progress" style="width: <?php echo $total_transactions_procent ?>%"></div>
            </div>
		  </div>
    	  <p class="lightgrey"><?php echo $total_transactions_procent; ?> %</p>
          <?php if($userData['organisation_id'] == 1 && $project['date_end'] >= date('Y-m-d')): ?>
            <a class="btn red_btn funding_popup" href="#">Fund today</a>
          <?php endif; ?>
        </div>
      </section>
    </div>
    </main>
    <section>
      <div class="container">
      <article class="about_project">
        <h4>About this project</h4>
        <p><?php echo $project['description']; ?></p>
      </article>
      <div class="project_feed">
        <h4>Project feed</h4>
        <?php foreach($pro->getProjectFeed3($project_id) as $f): ?>
          <article class="feed_block">
            <div class="feed_image_wrapper">
              <div class="feed_image" style="background: url(<?php echo $f['image'] ?>); background-size:cover; background-position:center;"></div>
            </div>
            <p><?php echo htmlspecialchars($f['description']); ?></p>
          </article>
        <?php endforeach; ?>
        <a class="btn grey_btn" href="#">More news</a>
      </div>
      </div>
    </section>
  </body>
</html>