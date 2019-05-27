<?php
  require_once("bootstrap.php");

  Session::check();

  $organisation = new Organisation;

  if(isset($_GET['search'])){
    $search = $_GET['search'];
  }else{
    $search = "";
  }

?><!DOCTYPE html>
<html lang="en" dir="ltr">
<?php require_once("inc/head.php"); ?>
  <body>
    <?php require_once("inc/header.php"); ?>
    <main class="container main_organisations">
      <?php foreach($organisation->getOrganisations() as $o): ?>
        <div class="organisation_tile">
          <div class="image_wrapper"><div class="image" style="background: url(<?php echo $o['banner']; ?>); background-position:center; background-size:cover;"></div></div>
          <article>
            <h3 class="red"><?php echo $o['name']; ?></h3>
            <a class="btn red_btn" href="#">More info</a>
          </article>
        </div>
      <?php endforeach; ?>
    </main>
  </body>
</html>
