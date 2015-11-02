<?php require_once('../includes/connect.php');

if(!$user->is_logged_in()){ header('Location: login.php'); }

?>
<?php

include('header.php');

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
	include('menu.php');?>
	<p><a href="./">Blog Admin Index</a></p>

	<h2>Edit Post</h2>

<?php

	if(isset($_POST['submit'])){

		$_POST = array_map( 'stripslashes', $_POST);

		extract($_POST);

		if($ID == ''){
			$error[] = 'No valid Post located';
		}

		if ($pTitle == ''){
			$error[] = 'Please enter the Title';
		}

		if ($pDesc == ''){
			$error[] = 'Please enter a Descripton';
		}

		if ($pContents == ''){
			$error[] = "Your Post needs some Content";
		}

		if(!isset($error)){

			try {
				$statement = $db->prepare('UPDATE tposts SET pTitle = :pTitle, pDesc = :pDesc, pContents = :pContents WHERE ID = :ID') ;
				$statement->execute(array(
					':pTitle' => $pTitle,
					':pDesc' => $pDesc,
					':pContents' => $pContents,
					':ID' => $ID
					));
				header('Location: index.php?action=updated');
			} catch(PDOException $e) {
				echo $e->getMessage();
			}
		}

	} ?>

	<?php

	if(isset($error)){
		foreach($error as $error){
			echo $error.'<br />';
		}
	}

		try {

			$statement = $db->prepare('SELECT ID, pTitle, pDesc, pContents FROM tposts WHERE ID = :ID') ;
			$statement->execute(array(':ID' => $_GET['id']));
			$row = $statement->fetch();
		} catch (PDOException $e) {
			echo $e->getMessage();
		}

	?>

	<form action='' method='post'>
		<input type='hidden' name='ID' value='<?php echo $row['ID'];?>'>

		<p><label>Title</label><br />
		<input type='text' name='pTitle' value='<?php echo $row['pTitle'];?>'></p>

		<p><label>Description</label><br />
		<textarea name='pDesc' cols='60' rows='2'><?php echo $row['pDesc'];?></textarea></p>

		<p><label>Post</label><br />
		<textarea name='pContents' cols='60' rows='10'><?php echo $row['pContents'];?></textarea></p>

		<p><input type='submit' name='submit' value='Update'></p>

	</form>

</div>
</body>
</html>