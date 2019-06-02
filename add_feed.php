<?php
	require_once("bootstrap.php");
	Session::check();

	if(isset($_GET['project'])){
		$project_id = $_GET['project'];
  	}else{
    	header("Location: index.php");
	}

	if(!empty($_POST)){
		if($_POST['description'] != ""){
		  Project::insertFeed($project_id, $_POST['description'], 'https://www.dielanophals.be/images/me.jpg');
		  header("Location: project.php?project=" . $project_id);
		}else{
		  $error = "Please fill in all the fields";
		}
	}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require_once("inc/head.php"); ?>
	<body id="page_feed">
 	<?php require_once("inc/header.php"); ?>
    	<form class="center" action="#" method="post">
			<?php
				if(isset($error)){
					echo "<p class='error_message'>$error</p>";
				}
			?>
			<textarea name="description" class="add_desc" placeholder="Description"></textarea>
			<input type="file" name="feedpic" value="image" accept="image/*">
			<input class="red_btn btn" type="submit" name="submit" value="add to feed">
			<a href="project.php?project=<?php echo $project_id ?>" class="btn darkgrey_btn">cancel</a>
		</form>
	</body>
</html>