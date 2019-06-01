<?php
  require_once("bootstrap.php");

  Session::check();

  $user = new User();
  $userData = $user->getUserData($_SESSION['id']);

  if(isset($userData['organisation_id']) && $userData['organisation_id'] != 1){
    $organisation_id = $userData['organisation_id'];
    $org = new Organisation;
    $organisation = $org->getorganisation($organisation_id);
  }else{
    header("Location: index.php");
  }
?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require_once("inc/head.php"); ?>
  <body class="edit_organisation">
    <?php require_once("inc/header.php"); ?>
    <main class="main_detail">
    <div class="container">
      <div class="banner_wrapper">
        <div class="banner_image" style="background:url(<?php echo $organisation['banner']; ?>); background-size:cover; background-position:center;"></div>
      </div>
      <section class="detail_information">
        <div class="center">
          <h3 class="red"><?php echo $organisation['name']; ?></h3>
          <h5 class="lightgrey">Active since</h5>
          <?php $year = substr($organisation['timestamp'], 0, 4); ?>
          <h4><?php echo $year; ?></h4>
          <h5 class="lightgrey">Active projects</h5>
          <h4><?php echo Project::getTotalProjects("", "organisation_id = $organisation_id &&"); ?></h4>
        </div>
      </section>
    </div>
    </main>
    <section>
      <div class="container">
        <article class="about_organisation">
          <h3>About this organisation</h3>
          <form action="#" method="post">
            <textarea class="description" name="description"><?php echo $organisation['description']; ?></textarea>
            <input class="red_btn save_desc" data-id="<?php echo $organisation_id ?>" type="submit" value="Save">
          </form>
        </article>
      </div>
      <div class="container project_title">
        <h3>Projects</h3>
        <a href="new_project.php" class="btn red_btn">Add new</a>
      </div>
      <div class="project_tiles container">
        <?php
          foreach(Project::getAllProjectsOrg($organisation_id) as $p):
          $location = Project::getLocation($p['locations_id']);
        ?>
          <div class="project_tile">
            <figure class="project_banner" style="background: url(<?php echo $p['banner']; ?>); background-size: cover; background-position:center;"></figure>
            <article class="project_info">
              <h3><?php echo $p['name']; ?></h3>
              <h4 class="lightgrey"><?php echo $location['continent']; ?></h4>
              <a class="red_btn btn" href="edit_project.php?project=<?php echo $p['id']; ?>">Edit project</a><br>
              <label class="switch">
                <input type="checkbox" <?php if($p['active'] == 1){echo "checked";} ?>>
                <span data-id="<?php echo $p['id'] ?>" class="slider round<?php if($p['active'] == 1){echo " checked";} ?>"></span>
              </label>
              <?php
                if($p['active'] == 1){
                  echo "<p>Active</p>";
                }else{
                  echo "<p>Inactive</p>";
                }
              ?>
            </article>
          </div>
        <?php endforeach; ?>
      </div>
    </section>
  </body>
</html>
