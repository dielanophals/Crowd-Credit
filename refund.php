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
        <form action="#" method="post">
          <section class="search_persons">
            <div class="dropdown">
              <div class="myDropdown dropdown-content">
                <input type="text" placeholder="Search person..." class="myInput">
                <?php foreach(User::getSearchUsers() as $u): ?>
                  <a data-id="<?php echo htmlspecialchars($u['id'])?>" href="#"><?php echo htmlspecialchars($u['firstname']) . " " . htmlspecialchars($u['lastname']); ?></a>
                <?php endforeach; ?>
            </div>
            
            </div>
          </section>
          <input type="number" placeholder="amount">
        </form>      
      </div>
    </main>
    <script>
    </script>
  </body>
</html>
