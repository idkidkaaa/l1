<!DOCTYPE html>
<html lang="en"> 
	<head>
        <meta charset="utf-8">
        <title>Change Password</title>
        <link href="css/style.css" media="screen" rel="stylesheet">
    </head> 
    
    <?php require_once("includes/connection.php"); ?>
    
    <?php
    	session_start();
	?>
    
    <body>
        <div class="container mregister">
            <div id="login">
                <h1>Change password</h1>
                <form action="" id="chpassform" method="post" name="chpassform">
                    <p><label>Old password<br>
                    <input class="input" id="password" name="password" size="20" type="password" value=""></label></p> 
                    <p><label>New password<br>
                    <input class="input" id="p1" name="p1" size="20" type="password" value=""></label></p> 
                    <p><label>Repeat new password<br>
                    <input class="input" id="p2" name="p2" size="20" type="password" value=""></label></p> 
					<p class="submit"><input class="button" id="chpass" name="chpass" type="submit" value="Change password"></p>
					<p class="regtext"><a href="intropage.php">Intro</a></p>
                </form>
            </div>
        </div>
    </body>

    <?php
	    if (isset($_POST["chpass"])) {
	        if (!empty($_POST['password']) && !empty($_POST['p1']) && !empty($_POST['p2'])) {
	            $p1 = htmlspecialchars($_POST['p1']);
	            $p2 = htmlspecialchars($_POST['p2']);
	            
	            if ($p1 != $p2) {
	                $message = "Passwords don't match";
	            } else {
	                $op = htmlspecialchars($_POST['password']);
	                $query = mysqli_query($link, "SELECT * FROM account WHERE username='".$_SESSION["session_username"]."'");
	                $numrows = mysqli_num_rows($query);

	                if ($numrows != 0) {
                        while ($row = mysqli_fetch_assoc($query)) {
                            $dbpassword = $row['password'];
                        }

                        if (hash_equals($dbpassword, crypt($op, $dbpassword))) {
                            $hp = crypt($p1);
	                        $query = "UPDATE account SET password='$hp' WHERE username='".$_SESSION["session_username"]."'";
		                    mysqli_query($link, $query);
		                    $message = "Password changed";
	                    } else {
	                        $message = "Invalid userdata";
                        }
                    } else {
	                    $message = "Invalid userdata";
                    }
                }
	        } else {
                $message = "Some fields are empty";
	        }
	    }
	?>
	
	<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>

</html>
