<?php
session_start();
if(!session_is_registered(username)){
    header("location:/admin/login.php");
}
?>
<!DOCTYPE html>
<?php include '../db-connect.php'; ?>
<html>
    <head>
        <title>Add Page - Dash Admin</title>

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
                            <a href="/admin/">Posts</a>
                        </li>
                        <li>
                            <a href="/admin/page/" class="selected">Pages</a>
                        </li>
                        <li>
                            <a href="/admin/ideas">Ideas</a>
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
                <span class="page-title twelve columns">Add New Page</span>
            </div>

            <div id="main" class="row">
                <div class="six columns left">
                    <div class="post-md">
                        <span class="md-heading twelve columns">
                            <span class="left">markdown</span>
                            <div class="post-slug right">
                                <span>Slug: </span><input type="text" name="postSlug" class="edit-slug" value="new-page" />
                            </div>
                        </span>
                        <article class="post row">
                            <span class="twelve columns">
                                <h2><input type="text" class="edit-title" value="Title" /></h2>
                            </span>
                            <div class="twelve columns post-body">
                                <?php include '../inc/markdown.php'; ?>
                                <textarea>Type page content markdown here</textarea>
                            </div>
                        </article>
                    </div><!-- END .post-list -->
                </div>

                <div class="six columns right">
                    <div id="postBody" class="post-content">
                    <form method="POST" action="save-new-page.php">
                        <div class="edit-actions twelve columns">
                            <span class="html-heading">Live Preview</span>
                            <div class="buttons text-right">
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