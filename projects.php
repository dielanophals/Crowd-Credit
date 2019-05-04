<?php
  require_once("bootstrap.php");

  Session::check();

  if(isset($_GET['page'])){
    $current_page = $_GET['page'];
  }else{
    $current_page = 1;
  }

?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Crowd Credit</title>
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700|Roboto" rel="stylesheet">
    <script src="js/nav_dropdown.js"></script>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <?php require_once("inc/header.php"); ?>
    <main>
      <h2 class="grey">Projects</h2>
      <div class="container project_tiles">
        <?php
          $get_total = $current_page * 9 - 9;
        ?>
        <?php foreach(Project::getProjects($get_total) as $p): ?>
          <?php $location = Project::getLocation($p['locations_id']); ?>
          <div class="project_tile">
            <figure class="project_banner" style="background: url(<?php echo $p['banner']; ?>); background-size: cover; background-position:center;"></figure>
            <article class="project_info">
              <h3><?php echo $p['name']; ?></h2>
              <h4 class="lightgrey"><?php echo $location['continent']; ?></h3>
              <a class="red_btn btn" href="#">View project</a>
            </article>
          </div>

        <?php endforeach; ?>
        <div class="project_pages">
          <?php
            $total_projects = Project::getTotalProjects();
            $total = $total_projects / 9;

            if($total >= 2 && $current_page != 1){
              $back = $current_page - 1;
              echo "<a href=?page=$back>Back</a>";
            }

            if($total_projects <= 9){
              for ($i=0; $i < $total; $i++) {
                $page = $i+1;
                if ($i == $current_page - 1) {
                  echo "<a class='current_page' href='?page=$page'>$page</a>";
                }else{
                  echo "<a href='?page=$page'>$page</a>";
                }
              }
            }

            if($total >= $current_page){
              $next = $current_page + 1;
              echo "<a href=?page=$next>Next</a>";
            }
          ?>
        </div>
      </div>
    </main>
  </body>
</html>
