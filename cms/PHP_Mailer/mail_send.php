<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/cms/config/constants.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/cms/business/Database_handler.class.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/cms/business/Phpmailer.class.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/cms/actions/mail_send.php");
	
	function send($body, $subject, $subscriberEmail) 
	{
		$timezone = "Asia/Calcutta";
		date_default_timezone_set($timezone);
		$mail  = new PHPMailer();
		$mail->CharSet = 'UTF-8';
		$mail->IsSMTP();    // set mailer to use SMTP
		$mail->Host = MAIL_HOST;    // specify main and backup server
		$mail->SMTPAuth = true;    // turn on SMTP authentication
		$mail->Username = MAIL_FROM;    // Gmail username for smtp.gmail.com -- CHANGE --
		$mail->Password = MAIL_FROM_PWD;    // SMTP password -- CHANGE --
		$mail->Port = MAIL_PORT;    // SMTP Port
		$mail->Subject = $subject;
		$mail->MsgHTML($body);
		$mail->IsHTML(true);
		$mail->SetFrom(MAIL_FROM, 'Subscribe IIITA');
		$mail->From = MAIL_FROM;    //From Address -- CHANGE --
		$mail->FromName = "IIITA-Subscriptions";    //From Name -- CHANGE --
		$mail->AddAddress($subscriberEmail, "");    //To Address -- CHANGE --
		
		if(!$mail->Send()) {
			return 0;
		}
		return 1;
	}
	
	function get_mailtopics_byid($id)
	{
		$qry_fetch_topics = "SELECT * FROM sub_topics WHERE id = :id";
		$params = array(':id' => $id);
		$res_fetch_topics = DatabaseHandler::GetAll($qry_fetch_topics, $params);
		return $res_fetch_topics;
	
	}