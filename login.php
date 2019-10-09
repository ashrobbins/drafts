<!DOCTYPE html>
<?php include 'db-connect.php'; ?>
<html>
    <head>
        <title>Log In - Dash Admin</title>

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
                            <a href="/admin/">Posts</a>
                        </li>
                        <li>
                            <a href="/admin/page">Pages</a>
                        </li>
                        <li>
                            <a href="/admin">Config</a>
                        </li>
                    </ul>
                    <div class="user five columns"></div>
                </div>
            </header>

            <?php if($_GET['m'] == "no"){?>
                <div class="row">
                    <span class="message error twelve columns">
                        <?php echo "You're not coming in, wrong username or password."; ?>
                    </span>
                </div>
            <?php } ?>

            <div id="main" class="row">
                <div class="four columns"></div>

                <div class="four columns">
                    <div class="post-list">
                        <form class="login" method="POST" action="login-check.php">
                            <fieldset>
                                <div class="field">
                                    <input type="text" name="username" placeholder="Username" value="" />
                                </div>
                                <div class="field">
                                    <input type="password" name="password" placeholder="Password" value="" />
                                </div>
                                <div class="field">
                                    <input type="submit" class="button" value="Log In" />
                                </div>
                            </fieldset>
                        </form>
                    </div><!-- END .post-list -->
                </div>

                <div class="four columns"></div>
            </div><!-- END #main -->

        </div><!-- END #conatiner -->

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="js/admin.js"></script>
    </body>
</html>			