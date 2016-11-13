<?php
    ob_start();
?>
<?php
    require_once("session.php");
    require_once("includes/header.php");
    confirm_logged_in();
?>

<html>
    <head>
        <title>Welcome !</title>
    </head>
    <body>
        Welcome <?php echo $_SESSION['username']; ?>;
        <table>
            <tr>
                <td><a href="add_events.php">Add Events</a></td>
            </tr>
            <tr>
                <td><a href="add_details.php">Add Student Team Member</a></td>
            </tr>
            <tr>
                <td><a href="type_mail.php">Send Mail</a></td>
            </tr>
            <tr>
                <td><a href="message.php">View Responses</a></td>
            </tr>
        </table>
        <form action="logout.php" method="post">
            <input type="submit" name="logout" value="logout">
        </form>
    </body>
</html>

<?php
    ob_end_flush();
?>