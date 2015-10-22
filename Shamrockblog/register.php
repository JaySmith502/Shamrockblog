<?php
	require('connect.php');
	//if values are posted, insert into mysql db.
	if isset($_POST['username']) && isset($_POST['password'])){
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$query = "INSERT INTO 'tusers' (username, password, email) VALUES ('$username', '$password', '$email')";
		$result = mysql_query($query);
		if($result){
			$msg = "User Created Successfully!";
		}
}

?>


<?php

//following form info style learned at http://codingcyber.com
include("includes/header.php");

?>

<div class="register-form">

    <h1>Register</h1>

    <form action="" method="POST">

        <p>
            <label>User Name : </label>

            <input id="username" type="text" name="username" placeholder="username" />
        </p>

        <p>
            <label>E-Mail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </label>

            <input id="password" type="email" name="email" />
        </p>

        <p>
            <label>Password&nbsp;&nbsp; : </label>

            <input id="password" type="password" name="password" placeholder="password" />
        </p>

        <a class="btn" href="login.php">Login</a>

        <input class="btn register" type="submit" name="submit" value="Register" />

    </form>

</div>
