<header>
  <nav>
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">Projects</a></li>
      <li><a href="#">Organisations</a></li>
      <li><a href="#">About us</a></li>
    </ul>

    <span class="nav_line">|</span>

    <?php
      if(!isset($_SESSION["id"])){
        echo "<a href='login.php'>Login</a>";
      }else{
    ?>
      <div class="nav_profile">
        <a class="nav_profile_dropdown_btn" href="#">
          <div class="nav_profile_img">
            <?php
              $user = new User();
              $userData = $user->getUserData($_SESSION['id']);
            ?>
            <img src="<?php echo $userData['img']; ?>">
          </div>
          <p><?php echo $userData['firstname'] . " " . $userData['lastname']; ?></p>
        </a>
        <div class="nav_profile_dropdown hide">
          <ul>
            <li><a href="#">Projects</a></li>
            <li><a href="#">Transactions</a></li>
            <li class="logout"><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    <?php
      }
    ?>

  </nav>
</header>
