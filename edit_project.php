<?php
  require_once("bootstrap.php");

  Session::check();

  $user = new User();
  $userData = $user->getUserData($_SESSION['id']);

  if(isset($userData['organisation_id']) && $userData['organisation_id'] != 1){
    $organisation_id = $userData['organisation_id'];
  }else{
    header("Location: index.php");
  }

  if(isset($_GET['project'])){
    $project_id = $_GET['project'];
    $pro = new Project;
    $project = $pro->getProject($project_id);
    if($project['organisation_id'] == $userData['organisation_id']){
      $location = $pro->getLocation($project['locations_id']);
      $organisation = $pro->getOrganisation($project['organisation_id']);
    }else{
      header("Location: index.php");
    }
  }else{
    header("Location: index.php");
  }
?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require_once("inc/head.php"); ?>
  <body class="edit_project">
    <?php require_once("inc/header.php"); ?>
    <main class="main_detail">
    <div class="container">
      <div class="banner_wrapper">
        <div class="banner_image" style="background:url(<?php echo $project['banner']; ?>); background-size:cover; background-position:center;"></div>
      </div>
      <section class="detail_information">
        <div class="center">
        <form action="#" method="post">
          <h3 class="red"><?php echo $project['name']; ?></h3>
          <select>
          <option value="<?php echo $location['id']; ?>"><?php echo $location['continent']; ?></option>
          <?php foreach($pro->getEditContinents($location['id']) as $co): ?>
            <option value="<?php echo $co['id'] ?>"><?php echo $co['continent']; ?></option>
          <?php endforeach; ?>
          </select>
          <h5 class="lightgrey">End date</h5>
          <input type="date" value="<?php echo substr($project['date_end'], 0, 10); ?>">
          <h5 class="lightgrey">Goal</h5>
          <input type="number" value="<?php echo $project['goal']; ?>">
        </form>
        </div>
      </section>
    </div>
    </main>
    <section>
      <div class="container">
      <article class="about_project">
        <h3>About this project</h3>
        <form action="#" method=post>
        <textarea name="" id="" cols="30" rows="10"><?php echo $project['description']; ?></textarea>
        <input class="red_btn" type="submit" value="Save">
        </form>
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
        <a class="btn grey_btn" href="#">Add feed</a>
      </div>
      </div>
    </section>
  </body>
</html>
