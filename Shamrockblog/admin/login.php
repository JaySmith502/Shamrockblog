<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

require_once('../includes/connect.php');


	include("header.php");

	if( $user->is_logged_in() ){ header('Location: index.php'); }

?>

<div id="login">

	<?php

	if(isset($_POST['submit'])){

		$username = trim($_POST['username']);
		$password = trim($_POST['password']);

		if($user->login($username,$password)){

			//move user to index.php logged in now
			header('Location: index.php');
			$_SESSION['author'] = $username;
			exit;
		} else {
			$message = '<p class="error">Wrong username or password, please resubmit</p>';
		}

	}

	if(isset($message)) { echo $message; }

	?>
<!-- next create the sign in form -->

<form action="" method="post">
<p><label>Username</label><input type="text" name="username" value="" /></p>
<p><label>Password</label><input type="password" name="password" value="" /></p>
<p><label></label><input type="submit" name="submit" value="Login" /></p>
</form>

</div>
</body>
</html>