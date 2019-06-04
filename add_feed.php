<?php
	require_once("bootstrap.php");
	Session::check();

	if(isset($_GET['project'])){
		$project_id = $_GET['project'];
  	}else{
    	header("Location: index.php");
	}

	if(!empty($_POST)){
		if($_POST['description'] != "" && $_FILES['fileToUpload']["name"] != ""){
			$imagePost = $_FILES['fileToUpload'];
			$post = new Upload();
			if ($post->checkType($imagePost) === false) {
        $error = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
      } else {
          if ($post->fileSize($imagePost) === false) {
            $error = 'Sorry, your file is too big.';
          } else {
              $post->createDirectory('feed');
              if ($post->fileExists() === false) {
                  $feedback = 'Sorry, this file already exists. Please try again.';
              } else {
                  $photo = $post->uploadImage();
                  Project::insertFeed($project_id, $_POST['description'], $photo);
		  						header("Location: edit_project.php?project=" . $project_id);
              }
          }
      }

		  
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
    	<form class="center" action="#" method="post"  enctype="multipart/form-data">
			<?php
				if(isset($error)){
					echo "<p class='error_message'>$error</p>";
				}
			?>
			<textarea name="description" class="add_desc" placeholder="Description"></textarea>
			<input type="file" name="fileToUpload">
			<input class="red_btn btn" type="submit" name="submit" value="add to feed">
			<a href="edit_project.php?project=<?php echo $project_id; ?>" class="btn darkgrey_btn">cancel</a>
		</form>
	</body>
</html>