<?php

include 'db-connect.php';
$tbl_name="admin"; // Table name

// Connect to server and select database.
mysql_connect("$dbhost", "$dbuser", "$dbpass")or
die("cannot connect");
mysql_select_db("$dbname")or die("cannot select DB");

// username and password sent from form
$username=$_POST['username'];
$password=$_POST['password'];

// To protect MySQL injection (more detail about MySQL injection)
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

$sql="SELECT * FROM $tbl_name WHERE username='$username' and
password='$password'";
$result=mysql_query($sql);

$count=mysql_num_rows($result);

if($count==1){
    session_register("username");
    session_register("password");
    header("location:/admin/");
}
else {
    header("location:/admin/login.php?m=no");
}
?>