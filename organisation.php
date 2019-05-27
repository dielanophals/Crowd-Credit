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
    <main class="main_detail">
    <div class="container">
      <div class="banner_wrapper">
        <div class="banner_image" style="background:url(<?php echo $organisation['banner']; ?>); background-size:cover; background-position:center;"></div>
      </div>
      <section class="detail_information">
        <div class="center">
          <h3 class="red"><?php echo $organisation['name']; ?></h3>
          <h5 class="lightgrey">Active since</h5>
          <?php
            $dateProvided="1979-06-13";
            $yearOnly = substr($organisation['timestamp'], 0, 4);
          ?>
          <h4><?php echo  $yearOnly; ?></h4>
        </div>
      </section>
    </div>
    </main>
    <section>
      <div class="container">
        <article class="about_organisation">
          <h3>About this organisation</h3>
          <p><?php echo $organisation['description']; ?></p>
        </article>
      </div>
    </section>
  </body>
</html>
