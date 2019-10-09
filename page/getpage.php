<?php
$q=$_GET["q"];

$con = mysql_connect('213.171.200.65', 'A5hR0bb1n5', 'Cadbury5');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("ashrobbinsDB", $con);

$sql="SELECT * FROM pages WHERE id = '".$q."'";

$result = mysql_query($sql);

while($row = mysql_fetch_array($result))

  {
  echo "<div class=\"post-content\">";
  echo "<div class=\"post-actions\">";
  echo "<a href=\"/admin/page/edit.php?id=" . $row['id'] . "\" class=\"edit\">Edit</a>";
  echo "<a href=\"#\" class=\"delete\" id=\"" . $row['id'] . "\" onclick=\"deletePage(this.id)\">Delete</a>";
  echo "</div>";
  echo "<article>";
  echo "<h2 class=\"post-title\">" . $row['title'] . "</h2>";
  echo "<div>" . $row['content_html'] . "</div>";
  echo "</article>";
  echo "</div>";
  }

mysql_close($con);
?>