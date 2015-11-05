<?php require_once('../includes/connect.php');

$user->logout();
session_unset();
header('Location: index.php');

?>