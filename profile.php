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
        <h3 class="name"><?php echo htmlspecialchars($userData['firstname'] . ' ' . $userData['lastname']); ?></h3>
        <?php if($userData['organisation_id'] == 1): ?>
        <a class="btn red_btn" href="transactions.php">My wallet</a>
        <?php endif; ?>
        <a class="btn grey_btn" href="settings.php">Settings</a>
        <?php if($userData['organisation_id'] == 1): ?>
        <h3 class="funded">Funded projects</h3>
        <?php endif; ?>
      </section>
    <?php if($userData['organisation_id'] == 1): ?>
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
              <h3><?php echo htmlspecialchars($p['name']); ?></h3>
              <h4 class="lightgrey"><?php echo htmlspecialchars($location['continent']); ?></h4>
              <a class="red_btn btn" href="project.php?project=<?php echo $p['id']; ?>">View project</a>
            </article>
          </div>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
      
    </div>
  </main>
  </body>

  </html>