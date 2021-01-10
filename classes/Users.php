<?php
session_start();

//Getting all classes we are going to use
require_once "PDOHandler.php";
if(!class_exists('PDOHandler'))
    die("PDOHandler class is missing");

class Users extends PDOHandler
{
	public function __construct($host,$db,$user,$pass,$charset)
	{
		parent::__construct($host,$db,$user,$pass,$charset);
	}
	
	/*
	Showing the existing users
	*/
	public function showUsers()
	{
		$users=$this->getInfo("SELECT * FROM user",array());
		
		echo '<table class="table"><tr><td colspan="3"><center><h3>Users</h3></td></center><tr><td><b>User Name</b><td><b>Email</b></tr>';
		
		if(!empty($users))//If there are some users to display
		{	
			foreach($users as $user)//Showing all the existing users
			{
				echo '<tr><td>'.$user['user_name'].'</td><td>'.$user['email'].'</td><td><input type="button" class="delete_user btn btn-primary" value="Delete" data-id="'.$user['user_name'].'"></td></tr>';
			}
		}
		else//No users were found
			echo '<tr><td colspan="3"><center>No users were found</center></td></tr>';
			
		echo '</table>';
	}
	
	/*
	Deleting an existing user
	*/
	public function deleteUser($user_name)
	{
		//Deleting all the user information (from likes table and user table)
		$this->executeQuery("DELETE FROM likes WHERE user_name=?",array($user_name));
		$this->executeQuery("DELETE FROM user WHERE user_name=?",array($user_name));
		
		//Checking if the user was deleted successfully
		if(count($this->getInfo("SELECT * FROM user WHERE user_name=?",array($user_name))))		
			die('fail');		
		
		die('success');
	}	
	
	/*
	Updating the user's password 
	*/
	public function UpdatePassword($password)
	{
		require_once "Validate.php";//Getting the validation utility class
		
		$err=array();//Array to contai nall errors
		
		Validate::validatePassword($password,$err);//Checking if the password is valid
		
		if(empty($err))//If a new password format is correct
		{
			//Updating the current user's password
			$this->executeQuery("UPDATE user SET password=? WHERE email=?",array($password,$_SESSION['user123dsfdfdsf']['email']));
			
			//Checking if the password was updated successfully
			if(count($check=$this->getInfo("SELECT * FROM user WHERE password=? AND email=?",array($password,$_SESSION['user123dsfdfdsf']['email']))))
				die('success');
			
			die('fail');
		}
		else//Displaying an error
			die($err[0]);
	}
}

$users=new Users('localhost','love_cooking','root','','utf8mb4');//Creating a new users object

//Showing the existing users' list
if(isset($_POST['show_users']))
{
	die($users->showUsers());
}
//Deleting an existing user
elseif(isset($_POST['delete_user']))
{
	die($users->deleteUser($_POST['delete_user']));
}
//If the user wants to update his password
elseif(isset($_POST['update_pass']))
{	
	die($users->UpdatePassword($_POST['update_pass']));//Updating the user's password
}
?>