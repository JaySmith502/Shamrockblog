<?php

require('includes/connect.php');
include("includes/header.php");

?>


<div id="wrapper">

<h1>Recent Posts</h1>
<hr />

<?php


try {

    $statement = $db->query('SELECT ID, pTitle, pDesc, pDate FROM tposts ORDER BY ID DESC');
    while ($row = $statement->fetch()) {

        echo '<div>';
        echo '<h1><a href="blog.php?id=' . $row['ID'] . '">', $row['pTitle'] . '
                </a></h1>';

        echo '<p>Posted on ' . date('jS M Y H:i:s', strtotime($row['pDate'])) . '</p>';

        echo '<p>' . $row['pDesc'] . '</p>';

        echo '<p><a href="blog.php?id=' . $row['ID'] . '">Read More</a></p>';

        echo '</div>';


    }

}
catch (PDOException $e) {

    echo $e->getMessage();
}


?>

</div>
<?php
include("includes/footer.php");
?>
</body>
</html>