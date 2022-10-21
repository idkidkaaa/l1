<!DOCTYPE html>
<html lang="en">
	<?php require_once("includes/connection.php"); ?>
	
	<?php
    	session_start();
    	if(!isset($_SESSION["session_username"])):
			header("location:login.php");
		else:
	?>
	
	<head>
		<meta charset="utf-8"> 
		<title>Sign-up</title>
		<link href="css/style.css" media="screen" rel="stylesheet">
	</head>
	
	<body>
        <div id="welcome">
            <h2>Welcome, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
            <p><a href="logout.php">Logout</a></p>
        	<p><a href="changepassword.php">Change password</a></p>
        </div>
    </body>
    
    <?php endif; ?>
</html>
