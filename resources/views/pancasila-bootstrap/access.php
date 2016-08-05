<?php

$password = 'rogerthat';
$password = sha1($password);

session_start();

if (!isset($_SESSION['3Qg85CnALgsa'])) {
	$_SESSION['3Qg85CnALgsa'] = false;
}

if (isset($_POST['user_pass'])) {
	if (sha1($_POST['user_pass']) == $password) {
		$_SESSION['3Qg85CnALgsa'] = true;
	} else {
		die('Incorrect password.');
	}
}

if (!$_SESSION['3Qg85CnALgsa']) :
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Universitas Pancasila</title>

        <!-- favicon -->
        <link rel="icon" type="image/png" href="images/favicon.ico">

        <!-- load stylesheet -->
        <link rel="stylesheet" href="css/themes/default/css/login.css">
    </head>

    <body>
        <div id="page" class="site">
            <div class="overlay">
                <div class="user-form">
                    <div class="user-form-container">
                        <div class="user-form-content">
                            <header class="header">
                                <div class="table-layout">
                                    <div class="table-cell valign-middle auto-width">
                                        <div class="logo">
                                            <a href="index.php" class="site-logo">
                                                <img src="images/logo.png" alt="Logo">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="table-cell valign-middle">
                                        <a href="index.php" class="site-name">
                                            Universitas Pancasila
                                        </a>
                                    </div>
                                </div>
                            </header>
                            <section class="main-form">
                                <form class="custom-form" action="" method="post">
                                    <p>
                                        <span class="custom-textbox">
                                            <span class="icon-wrap">
                                                <i class="icon icon-pass"></i>
                                            </span>
                                            <input type="password" name="user_pass" placeholder="Password" class="input-form">
                                        </span>
                                    </p>
                                    <p>
                                        <input type="submit" value="Login" class="button button-primary wide">
                                    </p>
                                </form>
                            </section>
                            <footer class="footer">
                                <div class="usefull-links">
                                    <a href="forgot-password.php" class="link-item">Forgot Your Password?</a>
                                    <a href="index.php" class="link-item">Back to Home</a>
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>

		<!-- JavaScript -->
		<script src="js/jquery.js"></script>
    </body>
</html>

<?php
exit();
endif;
?>