<?php

//this file utilizes TinyMCE CDN for a standardized text area to input to save some dev time
require_once('../includes/connect.php');

if (!$user->is_logged_in()) {
    header('Location: login.php');
}


?>

<?php
include("header.php");
?>

<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script>
	tinymce.init({
		selector: "textarea",
		plugins: [
			"advlist autolink lists link image charmap print preview anchor",
			"searchreplace visualblocks code fullscreen",
			"insertdatetime media table contextmenu paste"
			],
			toolbar:  "insertfile undo redo | styleselect | bold italic | alighleft aligncenter alignright alignjustify | bullist numlist outdent indent| link image"
		});
</script>

<div id="wrapper">

<?php
include('menu.php');
?>
	<p><a href="./">Blog Admin</a></p>

	<h2>Add Post</h2>

	<?php

if (isset($_POST['submit'])) {

    $_POST = array_map('stripslashes', $_POST);

    extract($_POST);
    //require users to input fields
    if ($pTitle == '') {
        $error[] = 'Please enter a Title.';
    }

    if ($pDesc == '') {
        $error[] = 'Please enter a Description.';
    }

    if ($pContents == '') {
        $error[] = 'Please enter some Content.';
    }

    if (!isset($error)) {

        try {


            $statement = $db->prepare('INSERT INTO tposts (pTitle, pDesc, pContents,pDate,pAuthor) VALUES (:pTitle, :pDesc, :pContents, :pDate, :pAuthor)');
            $statement->execute(array(
                ':pTitle' => $pTitle,
                ':pDesc' => $pDesc,
                ':pContents' => $pContents,
                ':pDate' => date('Y-m-d'),
                ':pAuthor' => $_SESSION['author']
            ));

            header('Location: index.php?action=added');
            exit;

        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}

if (isset($error)) {
    foreach ($error as $error) {
        echo '<p class="error">' . $error . '</p>';
    }

}
?>

	<form action ='' method ='post'>

		<p><label>Title</label><br />
		<input type='text' name='pTitle' value='<?php
if (isset($error)) {
    echo $_POST['pTitle'];
}
?>'></p>

		<p><label>Description</label><br />
		<textarea name='pDesc' cols='60' rows='10'><?php
if (isset($error)) {
    echo $_POST['pDESC'];
}
?></textarea></p>

		<p><label>Contents</label><br />
		<textarea name='pContents' cols='60' rows='10'><?php
if (isset($error)) {
    echo $_POST['pContents'];
}
?></textarea></p>

		<p><input type='submit' name='submit' value="Submit"></p>

	</form>

	</div>


	</body>

	</html>