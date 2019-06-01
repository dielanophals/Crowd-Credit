<?php
  require_once("bootstrap.php");

  Session::check();

  $user = new User();
  $userData = $user->getUserData($_SESSION['id']);

  if(isset($userData['organisation_id']) && $userData['organisation_id'] != 1){
    $organisation_id = $userData['organisation_id'];
    $pro = new Project();
  }else{
    header("Location: index.php");
  }

  if(!empty($_POST)){
    if($_POST['title'] != "" && $_POST['text'] != "" && $_POST['date'] != "" && $_POST['goal'] != "" && $_POST['cont'] != ""){
      $pro->insertProject($_POST['title'], $_POST['text'], $_POST['date'], $_POST['goal'], $_POST['cont'], $organisation_id);
      $pro->getLastProject();
      header("Location: project.php?project=" . $project_id);
    }else{
      $error = "Please fill in all the fields";
    }
  }
?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require_once("inc/head.php"); ?>
  <body class="edit_project">
    <?php require_once("inc/header.php"); ?>
    <form action="#" method="post">
    <main class="main_detail">
    <div class="container">
      <?php
      if(isset($error)){
        echo "<p class='error_message'>$error</p>";
      }
      ?>
      <div class="banner_wrapper">
        <div class="banner_image" style="background:url('http://2.bp.blogspot.com/-WnRZOGyOwMM/TrpA6oATSMI/AAAAAAAADJg/wRp9Cx54qdg/s1600/donkeys.jpg'); background-size:cover; background-position:center;"></div>
      </div>
      <section class="detail_information">
        <div class="center">
          <h5 class="red">Title</h5>
          <input type="text" name="title" required>
          <h5 class="lightgrey">Continent</h5>
          <select name="cont" required>
          <?php foreach($pro->getContinents() as $co): ?>
            <option value="<?php echo $co['id'] ?>"><?php echo $co['continent']; ?></option>
          <?php endforeach; ?>
          </select>
          <h5 class="lightgrey">End date</h5>
          <input name="date" type="date" required>
          <h5 class="lightgrey">Goal</h5>
          <input type="number" name="goal" required>
        </div>
      </section>
    </div>
    </main>
    <section>
      <div class="container">
      <article class="about_project">
        <h3>About this project</h3>
        <textarea name="text"></textarea>
        <input class="red_btn" type="submit" value="Save" required>
      </article>
      <div class="project_feed">
        <h3>Project feed</h3>
        <a class="btn grey_btn" href="#">Add feed</a>
      </div>
      </div>
    </section>
    </form>
  </body>
</html>
