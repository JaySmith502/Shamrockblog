<?php

require_once('../includes/connect.php');


include('header.php');

?>

<div id="wrapper">

	<?php
include('menu.php');
?>
	<p><a href="users.php">User Admin Index</a></p>

	<h2>Add User</h2>

	<?php

if (isset($_POST['submit'])) {

    extract($_POST);

    if ($username == '') {
        $error[] = 'Please select a username.';
    }

    if ($password == '') {
        $error[] = 'Please enter your password.';
    }

    if ($passwordConfirm == '') {
        $error[] = 'Please confirm your password.';
    }

    if ($password != $passwordConfirm) {
        $error[] = 'Invalid Password, please try again.';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error[] = "Please enter a valid email";
    }

    if (!isset($error)) {
        $hashedpassword = $user->password_hash($password, PASSWORD_BCRYPT);
        //username checker
        $uname_check = $db->prepare("SELECT username FROM tusers WHERE username = :username");
        $uname_check->bindParam(':username', $username);
        $uname_check->execute();

        if($uname_check->rowCount() > 0){
        $error[] = "Username already exists, please choose another.";
        }  else {
        try {

            $statement = $db->prepare('INSERT INTO tusers (username,password,email) VALUES (:username,:password,:email)');
            $statement->execute(array(
                ':username' => $username,
                ':password' => $hashedpassword,
                ':email' => $email
            ));

            header('Location: users.php?action=added');
            exit;
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    }
}

if (isset($error)) {
    foreach ($error as $error) {
        echo '<p class="error">'. $error . '</p>';
    }
}
// TODO: Add form at bottom for signing in
?>

	<form action='' method='post'>

		<p><label>Username</label><br />
		<input type='text' name='username' value='<?php
if (isset($error)) {
    echo $_POST['username'];
}
?>'</p>

		<p><label>Password</label><br />
		<input type='password' name='password' value='<?php
if (isset($error)) {
    echo $_POST['password'];
}
?>'</p>

		<p><label>Confirm Password</label><br />
		<input type='password' name='passwordConfirm' value='<?php
if (isset($error)) {
    echo $_POST['passwordConfirm'];
}
?>'</p>

		<p><label>Email</label><br />
		<input type='text' name='email' value='<?php
if (isset($error)) {
    echo $_POST['email'];
}
?>'</p>

		<p><input type='submit' name='submit' value='Add User'></p>


	</form>

	</div>

	</body>
	</html>
