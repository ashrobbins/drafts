<?php

include '../db-connect.php';

/* Get Variables */
$id = $_GET['id'];
$title = mysql_real_escape_string($_POST[newTitle]);
$slug = mysql_real_escape_string($_POST[newSlug]);
$status = $_POST['status'];
$newDate = $_POST['postDate'];
$date = date( 'Y-m-d', strtotime( $newDate ) );
$markdown = mysql_real_escape_string($_POST[newMd]);
$html = mysql_real_escape_string($_POST[newHtml]);

/*
echo $id." ".$title." ".$status."<br>";
echo $markdown."<br>";
echo $html;
*/


$query = "UPDATE posts SET title = '$title', slug = '$slug', status = $status, date = '$date', content_md = '$markdown', content_html = '$html' WHERE id = $id";
$result = mysql_query($query) or die(mysql_error());

header('Location: edit.php?id='.$id.'&m=safe');

?>