<?php

include '../db-connect.php';

/* Get Variables */
$id = $_GET['id'];

$query = "DELETE FROM pages WHERE id = $id";
$result = mysql_query($query) or die(mysql_error());

header('Location: /admin/page');

?>