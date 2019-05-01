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
        echo "woops";
      }else{
    ?>
      <div class="nav_profile">
        <div class="nav_profile_img">
          <?php
            $user = new User();
            $profilePicture = $user->profilePicture($_SESSION['id']);
            $name = $user->name($_SESSION['id']);
          ?>
          <img src="<?php echo $profilePicture; ?>">
        </div>
        <a href="#"><?php echo $name; ?></a>
        <a href="logout.php">Logout</a>
      </div>
    <?php
      }
    ?>

  </nav>
</header>
