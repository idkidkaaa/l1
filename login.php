<!DOCTYPE html>
<html lang="en"> 
	<head>
        <meta charset="utf-8">
        <title>Sign-in</title>
        <link href="css/style.css" media="screen" rel="stylesheet">
    </head> 
    
    <?php require_once("includes/connection.php"); ?>

    <?php
    	session_start();
	?>
	
    <?php
	    if (isset($_SESSION["session_username"])) {
	    header("Location: intropage.php");
	}
	?>
    
    <body>
        <div class="container mlogin">
            <div id="login">
                <h1>Sign-in</h1>
                <form action="" id="loginform" method="post" name="loginform">
                    <p><label>Username<br>
                    <input class="input" id="username" name="username"size="20" type="text" value=""></label></p>
                    <p><label>Password<br>
                    <input class="input" id="password" name="password"size="20" type="password" value=""></label></p> 
	                <p class="submit"><input class="button" name="login" type="submit" value="Log In"></p>
	                <p class="regtext"><a href= "register.php">Sign-up</a></p>
                </form>
            </div>
        </div>
    </body>

    <?php
	    if (isset($_POST["login"])) {

	        if (!empty($_POST['username']) && !empty($_POST['password'])) {
	            $u = htmlspecialchars($_POST['username']);
	            $p = htmlspecialchars($_POST['password']);
	            $query = mysqli_query($link, "SELECT * FROM account WHERE username='".$u."'");
	            $numrows = mysqli_num_rows($query);

	            if ($numrows != 0) {
                    while ($row = mysqli_fetch_assoc($query)) {
	                    $dbusername = $row['username'];
                        $dbpassword = $row['password'];
                    }

                    if ($u == $dbusername && hash_equals($dbpassword, crypt($p, $dbpassword))) {
	                    $_SESSION['session_username'] = $u;
						header("Location: intropage.php");
	                } else {
	                    $message = "Invalid userdata";
                    }
                } else {
	                $message = "Invalid userdata";
                }
	        } else {
                $message = "Some fields are empty";
	        }
	    }
	?>
	
	<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>

</html>
