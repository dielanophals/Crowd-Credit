<?php
  require_once("bootstrap.php");

  Session::check();

  $user = new User();
  $userData = $user->getUserData($_SESSION['id']);

  if($userData['organisation_id'] != 1){
    header("Location: index.php");
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require_once("inc/head.php"); ?>
  <body>
  <?php require_once("inc/header.php"); ?>
  <main>
    <div class="container transactions">
      <h3 class="transaction_wallet">Wallet total: €<?php echo $userData['wallet']; ?></h3>
      <a href="#" class="red add_money">+ Add money</a>
      <div class="transaction_title">
        <h5>Project</h5>
        <h5>Amount</h5>
        <h5>Date</h5>
      </div>
    <?php foreach(User::getUserTransactions() as $t): ?>
      <?php $date = substr($t['timestamp'], 0, 10); ?>
      <?php $project = Project::getProject($t['project_id']) ?>

      <div class="transaction">
        <h4><?php echo htmlspecialchars($project['name']); ?></h4>
        <h4>- €<?php echo htmlspecialchars($t['amount']); ?></h4>
        <h4><?php echo $date; ?></h4>
      </div>
    <?php endforeach; ?>
    </div>
  </main>
  </body>

  </html>