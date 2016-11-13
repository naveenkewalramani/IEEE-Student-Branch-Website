<?php
    require_once("includes/header.php");
    require_once("ContentSanitize.class.php");
    require_once("session.php");
    confirm_logged_in();
?>

<?php
    if (isset($_POST['submit'])) {
        $query = "DELETE FROM contact WHERE id = :id";
        $stmt = $dbh->prepare($query);
        $stmt->execute();
    }
?>

<?php
    $query = "SELECT * from contact";
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $name = $row['name'];
        $email_id = $row['email_id'];
        $phone = $row['phone'];
        $subject = $row['subject'];
        $message = $row['message'];
        $id = $row['id'];
?>

<html>
    <form action="message.php" method="post" >
        <input name="submit" type="submit" value="Delete" />
    </form>
</html>

<?php
    }
?>

<form action="logout.php" method="post">
        <input type="submit" name="logout" value="logout">
</form>