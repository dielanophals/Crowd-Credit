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
    if($_POST['title'] != "" && $_POST['text'] != "" && $_POST['date'] != "" && $_POST['goal'] != "" && $_POST['cont'] != "" && $_FILES['fileToUpload']){
      $imagePost = $_FILES['fileToUpload'];
      $post = new Upload();
      if ($post->checkType($imagePost) === false) {
        $error = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
      } else {
          if ($post->fileSize($imagePost) === false) {
            $error = 'Sorry, your file is too big.';
          } else {
              $post->createDirectory('project');
              if ($post->fileExists() === false) {
                  $feedback = 'Sorry, this file already exists. Please try again.';
              } else {
                  $photo = $post->uploadImage();
                  $pro->insertProject($_POST['title'], $_POST['text'], $_POST['date'], $_POST['goal'], $_POST['cont'], $organisation_id, $photo);
                  $last_project = $pro->getLastProject();
                  //header("Location: project.php?project=" . $last_project['id']);
              }
          }
      }
        
    }else{
      $error = "Please fill in all the fields";
    }
  }
?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require_once("inc/head.php"); ?>
  <body class="edit_project">
    <?php require_once("inc/header.php"); ?>
    <form action="#" method="post" enctype="multipart/form-data">
    <main class="main_detail">
    <div class="container">
      <?php
      if(isset($error)){
        echo "<p class='error_message'>$error</p>";
      }
      ?>
      <div class="banner_wrapper">
      <input type="file" name="fileToUpload">
      </div>
      <section class="detail_information">
        <div class="center">
          <h5 class="red">Title</h5>
          <input type="text" name="title" required>
          <h5 class="lightgrey">Continent</h5>
          <select name="cont" required>
          <?php foreach($pro->getContinents() as $co): ?>
            <option value="<?php echo htmlspecialchars($co['id']); ?>"><?php echo htmlspecialchars($co['continent']); ?></option>
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
