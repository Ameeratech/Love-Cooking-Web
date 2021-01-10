<?php
require_once "../classes/PDOHandler.php";
$db=new PDOHandler('localhost','love_cooking','root','','utf8mb4');

//If the user wants to register
if(isset($_POST['register']))
{
	require_once "../classes/Auth.php";
	$reg=new Auth();//Creating an authenticate object
	die($reg->Register({"user_name"=>$_POST['reg_username'],"email"=>$_POST['reg_email'],"password"=>$_POST['reg_pass'],"re_password"=>$_POST['reg_repass']},$db));//Registering the user
}
?>