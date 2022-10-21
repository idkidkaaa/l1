<!DOCTYPE html>
<html lang="en">
	<head>
        <meta charset="utf-8">
        <title>Sign-un</title>
        <link href="css/style.css" media="screen" rel="stylesheet">
    </head> 

	<?php require_once("includes/connection.php"); ?>
	
	<?php
    	session_start();
	?>

	<body>
		<div class="container mregister">
			<div id="login">
				<h1>Sign-up</h1>
				<form action="" id="registerform" method="post" name="registerform">
					<p><label>E-mail<br>
					<input class="input" id="email" name="email" size="32" type="email" value=""></label></p>
					<p><label>Username<br>
					<input class="input" id="username" name="username"size="20" type="text" value=""></label></p>
					<p><label>Password<br>
					<input class="input" id="password" name="password"size="32" type="password" value=""></label></p>
					<p class="submit"><input class="button" id="register" name="register" type="submit" value="Register"></p>
		  			<p class="regtext"><a href= "login.php">Sign-in</a></p>
				</form>
			</div>
		</div>
	</body>
	
	<?php
		if (isset($_POST["register"])) {

			if (!empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
				$e = htmlspecialchars($_POST['email']);
			 	$u = htmlspecialchars($_POST['username']);
			 	$p = htmlspecialchars($_POST['password']);
			 	$query = mysqli_query($link, "SELECT * FROM account WHERE username='".$u."'");
			  	$numrows = mysqli_num_rows($query);

				if ($numrows == 0) {
					$hp = crypt($p);
					$sql = "INSERT INTO account (username, email, password) VALUES ('$u', '$e', '$hp')";
		  			$result = mysqli_query($link, $sql);

		 			if ($result) {
						$_SESSION['session_username'] = $u;
						header("Location: intropage.php");
					} else {
		 				$message = "Account not created";
		  			}
				} else {
					$message = "Try another username";
		   		}
			} else {
				$message = "Some fields are empty";
			}
		}
	?>
	
	<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
	
</html>
