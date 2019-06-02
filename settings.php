<?php
	require_once("bootstrap.php");
	Session::check();

	if(!empty($_POST)){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];

		$check_mail = User::checkMail($email);

		if($check_mail == 0){
			User::update($firstname, $lastname, $email, $hash_password);
			header("Location: profile.php");
		}else{
			$error = "Unable to use this email";
		}
	}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require_once("inc/head.php"); ?>
	<body id="page_settings">
 	<?php require_once("inc/header.php"); ?>
    	<form class="center" action="#" method="post">
			<?php
				if(isset($error)){
					echo "<p class='error_message'>$error</p>";
				}
			?>
			<input type="text" name="firstname" value="First name" required>
			<input type="text" name="lastname" value="Last name" required>
			<input type="file" name="profilepic" value="image" required>
			<input class="red_btn btn" type="submit" name="submit" value="save changes">
			<a href=profile.php class="btn grey">cancel</a>
		</form>
	</body>
</html>