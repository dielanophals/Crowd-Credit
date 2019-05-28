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
      <div class="transaction_title">
        <h5>Project</h5>
        <h5>Amount</h5>
        <h5>Date</h5>
      </div>
    <?php foreach(User::getUserTransactions() as $t): ?>
      <?php $date = substr($t['timestamp'], 0, 10); ?>
      <?php $project = Project::getProject($t['project_id']) ?>

      <div class="transaction">
        <h4><?php echo $project['name']; ?></h4>
        <h4>- €<?php echo $t['amount']; ?></h4>
        <h4><?php echo $date; ?></h4>
      </div>
    <?php endforeach; ?>
    </div>
  </main>
  </body>

  </html>