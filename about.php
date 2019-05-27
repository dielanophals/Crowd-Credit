<?php
 require_once("bootstrap.php");
 Session::check();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require_once("inc/head.php"); ?>
  <body>
  <?php require_once("inc/header.php"); ?>
  <main class="main_about">
    <div class="container">
      <article class="about-article">
        <h3>Get in Touch</h3>
        <p>We want to offer financial aid to ambitious start-ups in 3rd world countries so they can realize their dreams. This is possible through the crowdfunding of microcredits, which are ultimately repaid to the voluntary funders.</p>
        <p>If you have any questions / complaints, feel free to shoot us a message. Or email us at <a href="mailto:hello@dielanophals.be" class="red">hello@crowdcredit.com</a></p>
        <br>
        <h3>Organizations</h3>
        <p>To make this work, we collaborate with local, national, and international organizations to ensure that the crowdfunded money goes to the right person. They act as a protective network to guide and assist the projects.</p>
        <p>The organizations also create and manage the project pages on our platform. To sign up an organization, please fill in the form below.</p>
      </article>

      <div class="about-form">
        <form action="" method="post" class="form-about">
          <h3>Contact</h3>
          <input name="name" placeholder="name" type= "text">
          <input name="name" placeholder="Email Adress" type= "text">
          <textarea name="message" rows="5" cols="73" placeholder="Message"></textarea>
          <input type="submit" class="btn red_btn" value="submit">
        </form>
      </div>
    </div>
  </main>
  </body>

  </html>