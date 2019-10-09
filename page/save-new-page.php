<?php

include '../db-connect.php';

/* Get Variables */
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


$query = "INSERT INTO pages (title, slug, status, content_md, content_html) VALUES('$title', '$slug', $status, '$markdown', '$html')";
$result = mysql_query($query) or die(mysql_error());

header('Location: /admin/page');

?>