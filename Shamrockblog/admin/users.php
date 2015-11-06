<?php

// page lists bloggers with admin rights

require_once('../includes/connect.php');

if (!$user->is_logged_in()) {
    header('Location: login.php');
}

if (isset($_GET['deleteUser'])) {

    if ($_GET['deleteUser'] != '1') {

        $statement = $db->prepare('DELETE FROM tusers WHERE user_id = :user_id');
        $statement->execute(array(
            ':user_id' => $_GET['deleteUser']
        ));

        header('Location: users.php?action=deleted');
        exit;
    }

}
?>
<?php

include("header.php");

?>

<script language="JavaScript" type="text/javascript">
function deleteUser(id,title) {

	if (confirm("Are you sure?")) {
		window.location.href = 'users.php?deleteUser=' + id;
	}
}
</script>
	<div id="wrapper">

	<?php
include('menu.php');
?>

	<?php

if (isset($_GET['action'])) {
    echo '<h3>User ' . $_GET['action'] . '</h3>';
}
?>

	<table>
	<tr>
		<th>Username</th>
		<th>Email</th>

	</tr>
	<?php
try {

    $statement = $db->query('SELECT user_id, username, email FROM tusers ORDER BY username');
    while ($row = $statement->fetch()) {

        echo '<tr>';
        echo '<td>' . $row['username'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
?>

				<?php
        echo '</tr>';
    }

}
catch (PDOException $e) {
    echo $e->getMessage();
}
?>
	</table>

	<p><a href='add_user.php'>Add User</a></p>

	</div>

	</body>

	</html>