<?php
  require_once("bootstrap.php");

  Session::check();

  if(isset($_GET['page'])){
    $current_page = $_GET['page'];
  }else{
    $current_page = 1;
  }

  if(isset($_GET['search'])){
    $search = $_GET['search'];
  }else{
    $search = "";
  }

?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Crowd Credit</title>
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700|Roboto" rel="stylesheet">
    <script src="js/dropdowns.js"></script>
    <script src="js/projects.js"></script>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <?php require_once("inc/header.php"); ?>
    <section class="banner_image">
      <div class="info center">
        <h1>Crowdfund a dream</h1>
        <p>We are a crowdfunding platform for developing countries in the South. We want to give every person an equal chance</p>
        <a class="btn red_btn" href="#">View projects</a>
      </div>
    </section>
    <main>
      <h2 class="grey">Projects</h2>
      <div class="container search_filters">
        <div class="filter">
          <a href="#" class="filter_dropdown_btn" id="continent">Continent <p>&rangle;</p></a>
          <div id="continents" class="dropdown hide">
            <?php foreach(Project::getContinents() as $co): ?>
              <p id="continent<?php $co['id']; ?>"><input type="checkbox" name="continent" value="<?php $co['id']; ?>" id="<?php echo $co['continent']; ?>"><label id="con<?php $co['id']; ?>" for="<?php echo $co['continent']; ?>"><?php echo $co['continent']; ?></label></p>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="filter">
          <a href="#" class="filter_dropdown_btn" id="category">Category <p>&rangle;</p></a>
          <div id="categories" class="dropdown hide">
            <?php foreach(Project::getCategories() as $ca): ?>
              <p id=category"<?php $ca['id']; ?>"><input type="checkbox" name="vehicle" value="<?php $ca['id']; ?>" id="<?php echo $ca['name']; ?>"><label id="cat<?php $ca['id']; ?>" for="<?php echo $ca['name']; ?>"><?php echo $ca['name']; ?></label></p>
            <?php endforeach; ?>
          </div>
        </div>
        <form class="search" action="#" method="post">
          <input class="search_input" type="text" name="search" placeholder="Search..." <?php if(isset($search)){ echo 'value="'.$search.'"'; } ?>>
        </form>
      </div>
      <div class="container project_tiles">
        <?php
          $get_total = $current_page * 9 - 9;
        ?>
        <?php foreach(Project::getProjects($get_total, $search) as $p): ?>
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
            $total_projects = Project::getTotalProjects($search);
            $total = $total_projects / 9;

            if($total >= 2 && $current_page != 1){
              $back = $current_page - 1;
              echo "<a class='number_page' href='?page=$back' data-page='$back'>Back</a>";
            }

            if($total_projects >= 10){
              for ($i=0; $i < $total; $i++) {
                $page = $i+1;
                if ($i == $current_page - 1) {
                  echo "<a class='current_page number_page' href='?page=$page' data-page='$page'>$page</a>";
                }else{
                  echo "<a class='number_page' href='?page=$page' data-page='$page'>$page</a>";
                }
              }
            }

            if($total >= $current_page){
              $next = $current_page + 1;
              echo "<a class='number_page' href='?page=$next' data-page='$next'>Next</a>";
            }
          ?>
        </div>
      </div>
    </main>
  </body>
</html>
