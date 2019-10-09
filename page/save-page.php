<?php

include '../db-connect.php';

/* Get Variables */
$id = $_GET['id'];
$title = mysql_real_escape_string($_POST[newTitle]);
$slug = mysql_real_escape_string($_POST[newSlug]);
$status = $_POST['status'];
$markdown = mysql_real_escape_string($_POST[newMd]);
$html = mysql_real_escape_string($_POST[newHtml]);

/*
echo $id." ".$title." ".$status."<br>";
echo $markdown."<br>";
echo $html;
*/


$query = "UPDATE pages SET title = '$title', slug = '$slug', status = $status, content_md = '$markdown', content_html = '$html' WHERE id = $id";
$result = mysql_query($query) or die(mysql_error());

header('Location: edit.php?id='.$id.'&m=safe');

?>