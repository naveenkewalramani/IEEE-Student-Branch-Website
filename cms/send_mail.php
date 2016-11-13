<?php
    require_once("includes/header.php");
    require_once("includes/functions.php");
    require_once("ContentSanitize.class.php");
    require_once("PHP_Mailer/class.phpmailer.php");
    require("includes/email_constants.php");
?>

<html>
    <head>
        <title>Sending Mails</title>
    </head>
    <body>
        <?php
	    $san = new Sanitize();
        $subject = $_POST['subject'];
	$subject = $san->cleanString($subject);
	$subject = $san->cleanHtml($subject);
	$subject = $san->cleanJs($subject);
        $body = $_POST['body'];
	$body = $san->cleanString($body);
	$body = $san->cleanHtml($body);
	$body = $san->cleanJs($body);
        $query = "SELECT email_id from user_records";
        $stmt = $dbh->prepare($query);
	$stmt->execute();
	$err = $stmt->errorInfo();
	print_r($err);
    	$timezone = "Asia/Calcutta";
        date_default_timezone_set($timezone);
    	$mail  = new PHPMailer();
        //$mail->CharSet = 'UTF-8';
    	$mail->IsSMTP();    // set mailer to use SMTP
        $mail->Host = "smtp.gmail.com";  // specify main and backup server
	$mail->Port = $port;
	$mail->SMTPAuth = true;  // turn on SMTP authentication
        
    	$mail->Username = $E_user;    // Gmail username for smtp.gmail.com -- CHANGE --
        $mail->Password = $E_password;
	$mail->SMTPSecure = ''; // SMTP password -- CHANGE --
    	    // SMTP Port
        $mail->Subject = $subject;
    	$mail->MsgHTML($body);
        $mail->IsHTML(true);
    	$mail->SetFrom($E_from, 'Subscribe IEEE');
        $mail->From = $E_from;    //From Address -- CHANGE --
	$mail->FromName = "IEEE-Subscriptions";    //From Name -- CHANGE --
            //To Address -- CHANGE --
        while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $subscriberEmail = $r['email_id'];
            $mail->AddAddress($subscriberEmail, "");
            if ($mail->Send()) {
                echo "Success". '</br>';
            } else {
                echo "Failed." . $mail->ErrorInfo . '</br>';
            }
        }
        ?>
        <?php
            /*$subject = $_POST['subject'];
            $body = $_POST['body'];
            $query = "SELECT email_id from user_records";
            $elist = mysql_query($query, $connection);
            confirm_query($elist);

            $from = $E_from; 
            $host = "smtp.gmail.com"; 
            $username = $E_user; 
            $password = $E_password; 
    
            if(mysql_num_rows($elist) > 0) {
                while($elist_result = mysql_fetch_array($elist)) {
                    $headers = array ('From' => $from, 
                    'To' => $elist_result['email_id'], 
                    'Subject' => $subject); 
                    $smtp = Mail::factory('smtp', 
                    array ('host' => $host, 
                    'auth' => true, 
                    'username' => $username, 
                    'password' => $password)); 
        
                    $mail = $smtp->send($to, $headers, $body);
                    //echo "Successfully sent to" . {$elist_result['email_id']} . '</br>';
                }
            }*/
        ?>
    </body>
</html>
