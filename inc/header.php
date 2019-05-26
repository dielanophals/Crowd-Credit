<?php
  $link = $_SERVER['PHP_SELF'];
  $link_array = explode('/',$link);
  $page = end($link_array);
?><header>
  	<img class="logo" src="sign/logo.png" alt="Crowd Credit Logo">
  <nav>
    <ul>
      <li><a <?php if($page == 'index.php'){ echo' class="red"'; } ?> href="index.php">Home</a></li>
      <li><a <?php if($page == 'organisations.php'){ echo' class="red"'; } ?> href="organisations.php">Organisations</a></li>
      <li><a <?php if($page == 'about.php'){ echo' class="red"'; } ?> href="about.php">About us</a></li>
    </ul>

    <span class="nav_line">|</span>

    <?php
      if(!isset($_SESSION["id"]) && $page == 'login.php'){
        echo "<a class='red' href='login.php'>Login</a>";
      }else if(!isset($_SESSION["id"])){
        echo "<a href='login.php'>Login</a>";
      }else{
    ?>
      <div class="nav_profile">
        <a id="profile" class="nav_profile_dropdown_btn" href="#">
          <div class="nav_profile_img">
            <?php
              $user = new User();
              $userData = $user->getUserData($_SESSION['id']);
            ?>
            <img id="profile_image" src="<?php echo $userData['image']; ?>">
          </div>
          <p id="name"><?php echo $userData['firstname'] . " " . $userData['lastname']; ?></p>
        </a>
        <div id="profile_dropdown" class="nav_profile_dropdown hide">
          <div id="wallet" class="wallet">
            <img id="credit_card" src="sign/credit_card.png" alt="Credit card">
            <h4 id="wallet_data">€ <?php echo $userData['wallet']; ?></h4>
          </div>
          <ul id="wallet_ul">
            <li id="li_projects"><a href="#">My projects</a></li>
            <li id="li_transactions"><a href="#">Transactions</a></li>
            <li id="li_settings"><a href="#">Settings</a></li>
            <li id="li_logout" class="logout"><a class="red" href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    <?php
      }
    ?>

  </nav>
</header>
