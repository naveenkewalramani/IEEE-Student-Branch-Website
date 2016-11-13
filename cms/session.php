<?php
    ob_start();
?>

<?php
    session_start();
    
    function logged_in() {
        return isset($_SESSION['username']);
    }
    
    function confirm_logged_in() {
        if (!logged_in()) {
            header("Location: http://localhost/project_x/cms/login.php");
        }
    }
?>

<?php
    ob_end_flush();
?>