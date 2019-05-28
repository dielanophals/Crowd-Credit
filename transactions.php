<?php
 require_once("bootstrap.php");
 Session::check();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require_once("inc/head.php"); ?>
  <body>
  <?php require_once("inc/header.php"); ?>
  <main>
    <div class="container">
    <?php foreach(User::getUserTransactions() as $t): ?>
      <div class="transaction">
        <?php echo $t['amount']; ?>
      </div>
    <?php endforeach; ?>
    </div>
  </main>
  </body>

  </html>