<?php

require('includes/connect.php')
// displays a post that has been clicked on.
    ;
?>

<?php

$statement = $db->prepare('SELECT ID, pTitle, pContents, pDate FROM tposts WHERE ID = :ID');

$statement->execute(array(
    ':ID' => $_GET['id']
));
$row = $statement->fetch();

// error handler pushes user back to index.php
if ($row['ID'] == '') {
    header('Location: ./');
    exit;
}
?>

<?php
include("includes/header.php");
?>

<div id="wrapper">

<?php
// display selected blog post
echo '<div>';
echo '<h1>' . $row['pTitle'] . '</h1>';
echo '<p>Posted on ' . date('jS M Y', strtotime($row['pDate'])) . '</p>';
echo '<p>' . $row['pContents'] . '</p>';
echo '</div>';

?>

</div>
<?php
include('includes/footer.php');
?>
</body>
<html>