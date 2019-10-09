<?php
session_start();
if(!session_is_registered(username)){
    header("location:/admin/login.php");
}
?>
<!DOCTYPE html>
<?php include '../db-connect.php';
$id = $_GET['id'];
if($_GET['m'] == 'safe'){
    $message = 'Post Updated';
}
?>
<html>
    <head>
        <title>Edit Post - Dash Admin</title>

        <meta charset="UTF-8">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700|Droid+Sans+Mono' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/normalize.css" />
        <link rel="stylesheet" href="../css/admin.css" />
        <link rel="stylesheet" href="../js/css/pikaday.css" />
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

            <div class="row">
                <span class="page-title twelve columns">Edit Post</span>
            </div>

            <?php
                if($message){?>
                    <div class="row">
                        <span class="message twelve columns"><?php echo $message; ?></span>
                    </div>
                <?php }
            ?>

            <div id="main" class="row">

                <div class="six columns left">
                    <div class="post-md">
                        <?php
                        $query = "SELECT * FROM posts WHERE id = $id";
                        $result = mysql_query($query) or die(mysql_error());

                        while($row = mysql_fetch_array($result)){
                            $id = $row['id'];
                            $title = $row['title'];
                            $slug = $row['slug'];
                            $date = strtotime($row['date']);
                            $date = date('d/m/Y', $date);
                            $statusId = $row['status'];
                            $content_md = $row['content_md'];
                            $content_html = $row['content_html'];
                            if($statusId == 1){$status = 'Draft'; $statusClass = 'draft';}else if($statusId == 2){$status = 'Live'; $statusClass = 'live';}
                            ?>
                            <span class="md-heading twelve columns">
                                <span class="left">markdown</span>
                                <div class="post-slug right">
                                    <span>Slug: </span><input type="text" name="postSlug" class="edit-slug" value="<?php echo $slug; ?>" />
                                </div>
                            </span>
                            <article class="post row">
                                <span class="twelve columns">
                                    <h2><input type="text" class="edit-title" value="<?php echo $title; ?>" /></h2>
                                </span>
                                <div class="twelve columns post-body">
                                <?php
                                    include '../inc/markdown.php';
                                    echo "<textarea>".$content_md."</textarea>";
                                ?>
                                </div>
                            </article>
                        <?php }
                        mysql_close($con); ?>
                    </div><!-- END .post-list -->
                </div>

                <div class="six columns right">
                    <div id="postBody" class="post-content">
                    <form method="POST" action="save-post.php?id=<?php echo $id; ?>">
                        <div class="edit-actions twelve columns">
                            <span class="html-heading">Live Preview</span>
                            <div class="buttons text-right">
                                <span>Publish date: </span><input type="text" name="postDate" class="edit-date" value="<?php echo $date; ?>" />
                                <select id="status" class="status-select" name="status">
                                    <option value="1" <?php if($statusId == 1){ echo "selected"; } ?>>Draft</option>
                                    <option value="2" <?php if($statusId == 2){ echo "selected"; } ?>>Live</option>
                                </select>
                                <input type="submit" class="button" value="Save">
                            </div>
                        </div>
                        <article>
                            <h2 class="html-title"></h2>
                            <div class="post-html"></div>
                        </article>
                    </form>
                    </div>
                </div>

            </div><!-- END #main -->

        </div><!-- END #conatiner -->

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="../js/jquery.flexibleArea.js"></script>
        <script src="../js/showdown.js"></script>
        <script src="../js/moment.js"></script>
        <script src="../js/pikaday.js"></script>
        <script src="../js/admin.js"></script>
    </body>
</html>		