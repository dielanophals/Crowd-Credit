<?php
 require_once("bootstrap.php");
 Session::check();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require_once("inc/head.php"); ?>
  <body>
  <?php require_once("inc/header.php"); ?>
  <main>
    <div class="container profile">
      <section class="profile_information">
        <div class="profile_image_wrapper">
          <div class="profile_image" style="background: url(<?php echo $userData['image']; ?>); background-size:cover; background-position:center;"></div>
        </div>
        <h3 class="name"><?php echo $userData['firstname'] . ' ' . $userData['lastname']; ?></h3>
        <a class="btn red_btn" href="#">My wallet</a>
        <a class="btn grey_btn" href="#">Settings</a>
        <h3 class="funded">Funded projects</h3>
      </section>
      <div class="project_tiles">
      <?php
        $project = new Project;
        foreach(User::getUserTransactions() as $t):
          $p = $project->getProject($t['project_id']);
          $location = $project->getLocation($p['locations_id']);
          ?>
          <div class="project_tile">
            <figure class="project_banner" style="background: url(<?php echo $p['banner']; ?>); background-size: cover; background-position:center;"></figure>
            <article class="project_info">
              <h3><?php echo $p['name']; ?></h3>
              <h4 class="lightgrey"><?php echo $location['continent']; ?></h4>
              <a class="red_btn btn" href="project.php?project=<?php echo $p['id']; ?>">View project</a>
            </article>
          </div>
        <?php endforeach; ?>
      </div>
      
    </div>
  </main>
  </body>

  </html>