<?php
$dbhost = '213.171.200.65';
$dbuser = 'A5hR0bb1n5';
$dbpass = 'Cadbury5';

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

$dbname = 'ashrobbinsDB';
mysql_select_db($dbname);
?>