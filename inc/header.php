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
        <a href="#">
          <div class="nav_profile_img">
            <?php
              $user = new User();
              $userData = $user->getUserData($_SESSION['id']);
            ?>
            <img src="<?php echo $userData['img']; ?>">
          </div>
          <p><?php echo $userData['firstname'] . " " . $userData['lastname']; ?></p>
        </a>
      </div>
    <?php
      }
    ?>

  </nav>
</header>
