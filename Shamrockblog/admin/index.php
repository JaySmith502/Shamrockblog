<?php

require_once('../includes/connect.php');

if (!$user->is_logged_in()) {
    header('Location: ../index.php');
}

if (isset($_GET['deleteIt'])) {

    $statement = $db->prepare('DELETE FROM tposts WHERE ID = :ID');
    $statement->execute(array(
        ':ID' => $_GET['deleteIt']
    ));

    header('Location: index.php?action=deleted');
    exit;
}
// use www.danstools.com//php-beautify/ for structure prettify
?>
<!-- see if javascript language and type necessary otherwise leave as it -->
<script language="JavaScript" type="text/javascript">
    function deleteIt(id, title) {

        if (confirm("Are you sure you wish to delete '" + title + "'")) {
            window.location.href = 'index.php?deleteIt=' + id;
        }
    }
</script>
<?php
include('header.php');
?>

<div id="wrapper">

    <?php
include('menu.php');
?>

    <?php
if (isset($_GET['action'])) {
    echo '
<h3>
Post ' . $_GET['action'] . '.
</h3>
';
}
?>

    <table>
        <tr>
            <th>
                Title
            </th>
            <th>
                Date
            </th>
            <th>
                Action
            </th>
        </tr>
        <?php
//injects session user into WHERE sort to ensure that current logged in user only sees his/her posts
//I'm very proud of figuring out this one!
$user = $_SESSION['author'];
try {
    $statement = $db->query('SELECT ID, pTitle, pDate FROM tposts WHERE pAuthor = "' . $user . '" ORDER BY ID DESC');
    while ($row = $statement->fetch()) {
        echo '
        <tr>
            ';
        echo '
            <td>
                ' . $row['pTitle'] . '
            </td>
            ';
        echo '
            <td>
                ' . date('jS M Y', strtotime($row['pDate'])) . '
            </td>
            ';
?>

            <td>
                <a href="edit_post.php?id=
<?php
        echo $row['ID'];
?>
">
  Edit
              </a> |
                <a href="javascript:deleteIt('
<?php
        echo $row['ID'];
?>
','
<?php
        echo $row['pTitle'];
?>
')">
  Delete
              </a>
            </td>

            <?php
        echo '
</tr>
';
    }
}
catch (PDOException $e) {
    echo $e->getMessage();
}
?>

    </table>

    <p><a href='add_post.php'>Add Post</a></p>

</div>
<?php
include("footer.php");
?>
</body>

</html>