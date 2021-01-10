<?php
/*
Class that is responsive to send an email message
*/
class MailsHandler
{
	//Method that sends an email to the specific user
	public function sendEmail($to,$from,$subject,$message)
	{		
		//To send HTML mail, the Content-type header must be set
		$headers[]='MIME-Version: 1.0';
		$headers[]='Content-type: text/html; charset=utf-8';
		$headers[]='To: '.$to.' <'.$to.' >';
		$headers[]='From: '.$from.' <'.$from.'>';

		//Mail it
		return mail($to,$subject,$message,implode("\r\n",$headers));
	}
	
	//Method that sends mails to all users (users are passed as array) 
	public function sendAll($sendList,$from,$subject,$message)
	{
		foreach($sendList as $send)
		{
			$this->sendEmail($send['email'],$from,$subject,$message);
		}
	}
}
?>