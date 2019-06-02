<?php
  require_once("bootstrap.php");

  Session::check();

  if(isset($_GET['organisation'])){
    $organisation_id = $_GET['organisation'];
    $org = new Organisation;
    $organisation = $org->getorganisation($organisation_id);
  }else{
    header("Location: index.php");
  }
?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require_once("inc/head.php"); ?>
  <body>
    <?php require_once("inc/header.php"); ?>
    <?php if($organisation_id == $userData['organisation_id']): ?>
      <a class="btn red_btn edit" href="edit_organisation.php">Edit page</a>
    <?php endif; ?>
    <main class="main_detail">
    <div class="container">
      <div class="banner_wrapper">
        <div class="banner_image" style="background:url(<?php echo $organisation['banner']; ?>); background-size:cover; background-position:center;"></div>
      </div>
      <section class="detail_information">
        <div class="center">
          <h3 class="red"><?php echo htmlspecialchars($organisation['name']); ?></h3>
          <h5 class="lightgrey">Active since</h5>
          <?php $year = substr($organisation['timestamp'], 0, 4); ?>
          <h4><?php echo htmlspecialchars($year); ?></h4>
          <h5 class="lightgrey">Projects</h5>
          <h4><?php echo Project::getTotalProjects("", "organisation_id = $organisation_id &&"); ?></h4>
        </div>
      </section>
    </div>
    </main>
    <section>
      <div class="container">
        <article class="about_organisation">
          <h3>About this organisation</h3>
          <p><?php echo htmlspecialchars($organisation['description']); ?></p>
          <h3>Active projects</h3>
        </article>
      </div>
        <div class="project_tiles container">
          <?php
            foreach(Project::getAllActiveProjectsOrg($organisation_id) as $p):
            $location = Project::getLocation($p['locations_id']);
          ?>
            <div class="project_tile">
              <figure class="project_banner" style="background: url(<?php echo $p['banner']; ?>); background-size: cover; background-position:center;"></figure>
              <article class="project_info">
                <h3><?php echo $p['name']; ?></h3>
                <h4 class="lightgrey"><?php echo htmlspecialchars($location['continent']); ?></h4>
                <a class="red_btn btn" href="project.php?project=<?php echo $p['id']; ?>">View project</a>
              </article>
            </div>
          <?php endforeach; ?>
        </div>
    </section>
  </body>
</html>
