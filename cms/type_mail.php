<?php
    require_once("session.php");
    confirm_logged_in();
?>
<html>
    <head>
        <title>Type your Message</title>
    </head>
    <body>
        <form action="send_mail.php" method="post">
            Subject: <input type="text" name="subject" value=""  style="width : 300px;"/> </br>
            Body: <input type="text" name="body" value=""  style="width : 1000px;"/> </br>
            <input type="submit" name="send" value="send" />
        </form>
         <form action="logout.php" method="post">
            <input type="submit" name="logout" value="logout">
        </form>
    </body>
</html>