<?php
    ob_start();
?>
<?php
    session_start();
    
    $_SESSION = array();
    
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time()-645326, '/');
    }
    
    session_destroy();
    
    header("Location: login.php?logout=1");
?>

<?php
    ob_end_flush();
?>