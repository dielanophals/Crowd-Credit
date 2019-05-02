<?php
  $link = $_SERVER['PHP_SELF'];
  $link_array = explode('/',$link);
  $page = end($link_array);
?><header>
  <nav>
    <ul>
      <li><a <?php if($page == 'index.php'){ echo' class="red"'; } ?> href="#">Home</a></li>
      <li><a <?php if($page == 'projects.php'){ echo' class="red"'; } ?> href="#">Projects</a></li>
      <li><a <?php if($page == 'organisations.php'){ echo' class="red"'; } ?> href="#">Organisations</a></li>
      <li><a <?php if($page == 'about.php'){ echo' class="red"'; } ?> href="#">About us</a></li>
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
            <li><a href="#">My projects</a></li>
            <li><a href="#">Transactions</a></li>
            <li><a href="#">Settings</a></li>
            <li class="logout"><a class="red" href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    <?php
      }
    ?>

  </nav>
</header>
