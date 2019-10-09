<?php
session_start();
if(!session_is_registered(username)){
    header("location:/admin/login.php");
}
?>
<!DOCTYPE html>
<?php include 'db-connect.php'; ?>
<html>
    <head>
        <title>Dash Admin</title>

        <meta charset="UTF-8">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/normalize.css" />
        <link rel="stylesheet" href="css/admin.css" />
    </head>
    <body>
        <div id="container">

            <header class="toolbar">
                <div class="row">
                    <h1 class="three columns">Dash Admin</h1>
                    <ul class="header-menu four columns">
                        <li>
                            <a href="/admin/" class="selected">Posts</a>
                        </li>
                        <li>
                            <a href="/admin/page/">Pages</a>
                        </li>
                        <li>
                            <a href="/admin">Config</a>
                        </li>
                    </ul>
                    <div class="user five columns right">
                        <span class="logout right"><a href="/admin/logout.php">Log Out</a></span>
                    </div>
                </div>
            </header>

            <div id="main" class="row">

                <div class="six columns left">
                    <div class="post-list">
                        <span class="list-heading">Posts
                            <a href="post/add.php" class="right" title="Add a new post">Add New</a>
                        </span>
                        <?php
                        // Make a MySQL Connection
                        $query = "SELECT * FROM posts ORDER BY date desc";
                        $result = mysql_query($query) or die(mysql_error());

                        while($row = mysql_fetch_array($result)){
                            $id = $row['id'];
                            $title = $row['title'];
                            $date = strtotime($row['date']);
                            $date = date('d/m/Y', $date);
                            $status = $row['status'];
                            if($status == 1){$status = 'Draft'; $statusClass = 'draft';}else if($status == 2){$status = 'Live'; $statusClass = 'live';}
                            ?>

                            <article class="post">
                                <a href="#" class="post-link row" id="<?php echo $id; ?>" title="Edit <?php echo $title; ?>" onclick="getPage(this.id)">
                                    <span class="ten columns">
                                        <h4><?php echo $title; ?></h4>
                                        <small class="post-date">Publish date: <?php echo $date; ?></small>
                                    </span>
                                    <span class="status-<?php echo $statusClass; ?> two columns"><?php echo $status; ?></span>
                                </a>
                            </article>
                        <?php }
                        mysql_close($con); ?>
                    </div><!-- END .post-list -->
                </div>

                <div class="six columns right">
                    <div id="postBody" class="post-body">
                        <!-- AJAX GENERATED CONTENT HERE -->
                    </div>
                </div>

            </div><!-- END #main -->

        </div><!-- END #conatiner -->

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="js/admin.js"></script>
    </body>
</html>		