<?php
    ob_start();
?>
<?php
    require_once("session.php");
    require_once("includes/header.php");
    require_once("includes/functions.php");
    require_once("ContentSanitize.class.php");
?>
<?php
    $san = new Sanitize();
    if (isset($_GET['logout']) and $_GET['logout'] == 1) {
        $message = "You have been successfully logout.";
        echo $message;
    }
    if (logged_in()) {
        header("Location: http://localhost/project_x/cms/logged_in.php");
    }
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
	$username = $san->cleanString($username);
	$username = $san->cleanHtml($username);
	$username = $san->cleanJs($username);
        $password = $_POST['password'];
	$password = $san->cleanString($password);
	$password = $san->cleanHtml($password);
	$password = $san->cleanJs($password);

	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);

	$flag = login($username, $password, $dbh);

	if ($flag == 1) {
	    echo $_SESSION['username'] = $username;
            header("Location: http://localhost/project_x/cms/logged_in.php");
	} else {
	    echo "Details entered are wrong. Make sure caps lock is off and try again.";
	    $username = "";
	    $password = "";
	}
    }

?>

<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="form.css">
    </head>
    <body>
        <form name="myform"  action="http://localhost/project_x/cms/login.php" method="post" class="form" id="contactform">
            <p class="contact"><label for="username">Username</label></p>
            <input type="text" name="username" value="" id="username" placeholder="example@domain.com" required="">
                
            <p class="contact"><label for="password">Password</label></p>
            <input type="password" id="password" name="password" required="" type="text"><br>
            <input class="buttom" name="submit" id="submit" value="Get Into Action" type="submit">   
        </form>
    </body>
</html>

<?php
    ob_end_flush();
?>

