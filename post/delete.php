<?php

include '../db-connect.php';

/* Get Variables */
$id = $_GET['id'];

/*
echo $id." ".$title." ".$status."<br>";
echo $markdown."<br>";
echo $html;
*/


$query = "DELETE FROM posts WHERE id = $id";
$result = mysql_query($query) or die(mysql_error());

header('Location: /admin');

?>