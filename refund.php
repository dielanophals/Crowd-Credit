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

?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require_once("inc/head.php"); ?>
  <body class="edit_project">
    <?php require_once("inc/header.php"); ?>
    <main class="main_detail">
      <div class="container">
        <form action="#" method="post" class="center refund">
          <h2>Refund</h2>
          <section class="search_persons">
            <div class="dropdown-per">
              <div class="myDropdown dropdown-content">
                <input type="text" placeholder="Search person..." class="myInput" required>
                <?php foreach(User::getSearchUsers() as $u): ?>
                  <a class="name" data-id="<?php echo htmlspecialchars($u['id'])?>" href="#"><?php echo htmlspecialchars($u['firstname']) . " " . htmlspecialchars($u['lastname']); ?></a>
                <?php endforeach; ?>
              </div>
            </div>
          </section>
          <section class="search_project">
            <div class="dropdown-pro">
              <div class="myDropdown-project dropdown-project">
                <input type="text" placeholder="Search project..." class="myInput-project" required>
                <?php foreach(Project::getAllProjectsOrg($organisation_id) as $u): ?>
                  <a class="pro" data-id="<?php echo htmlspecialchars($u['id'])?>" href="#"><?php echo htmlspecialchars($u['name']); ?></a>
                <?php endforeach; ?>
              </div>
            </div>
          </section>
          <input type="number" name="amount" class="amount" placeholder="amount" required>
          <input class="red_btn transfer" type="submit" value="Transfer">
        </form>      
      </div>
    </main>
    <script>
    </script>
  </body>
</html>
