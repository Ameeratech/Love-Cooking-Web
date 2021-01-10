<?php
session_start();

//Requring classes we will be using
require_once "PDOHandler.php";
if(!class_exists('PDOHandler'))
    die("PDOHandler class is missing");

require_once "Validate.php";
if(!class_exists('Validate'))
    die("Validate class is missing");

/*
Class handles registration,login, forgot password processes
*/
class Auth extends PDOHandler
{
	public function __construct($host,$db,$user,$pass,$charset)
	{
		parent::__construct($host,$db,$user,$pass,$charset);
	}

    //Method that commits registration 
    public function Register($info)
    {
        $arr=array();//Error array. Is empty by default
        
		//Validating the given information
        Validate::removeForbidden($info);
        Validate::validateUsername($info['user_name'],$arr);
        Validate::validateEmail($info['email'],$arr);
		Validate::checkEmailExists($this,$info['email'],$arr);
        Validate::validatePassword($info['password'],$arr);
        Validate::validateRePass($info['password'],$info['re_password'],$arr);
		
        if(empty($arr))//No errors were found
        {
            $this->executeQuery("INSERT INTO user(password,user_name,email) VALUES (?,?,?)",array($info['password'],$info['user_name'],$info['email'])); //confirm password ???        
            
            echo 'succeeded';
        }
        else//Displaying all the errors as an HTML list
        {
            echo "<ul>";
            foreach($arr as $e)
            {
                echo "<li>".$e."</li>";
            }
            echo "</ul>";
        }
    }
    
    //Method that commits admin/user login
    public function Login($info,$isAdmin)
    {
        $arr=array();//Error array. Is empty by default
          
        //Validating the given information
		Validate::removeForbidden($info);
		Validate::validateEmail($info['email'],$arr);
        Validate::validatePassword($info['password'],$arr);
	
		//If there aren't any errors and this admin/ user exists at the system
		if(empty($arr) && $this->getInfo("SELECT * FROM ".($isAdmin ? "employes" :"user")." WHERE email=? AND password=?",array($info['email'],$info['password']),1))//No errors were found
		{	
			if($isAdmin!=0)
				$_SESSION['admin123dsfdfdsf']=$info;
			else
				$_SESSION['user123dsfdfdsf']=$info;
				
			echo '1';			
		}
		else//Displaying an error
		{
		   echo 'Wrong email/password';
		}
    }
	//Method sends a password to the current user
	public function Recover($email)
	{
		require_once "MailsHandler.php";
		$m=new MailsHandler();//Creating a new mailer object
	
		$get_pass=$this->getInfo("SELECT password FROM user WHERE email=?",array($email));//GEtting the password for the current user
	
		if(count($get_pass) && $m->sendEmail($email,"lovecooking18@gmail.com","Love Cooking Site Password Recovery","Hello,<br>Your password is:".$get_pass[0]['password']))
			die('success');
		die('fail');
	}
}
$au=new Auth('localhost','love_cooking','root','','utf8mb4');

//If the user wants to register
if(isset($_POST['register']))
{
	die($au->Register(array("user_name"=>$_POST['reg_username'],"email"=>$_POST['reg_email'],"password"=>$_POST['reg_pass'],"re_password"=>$_POST['reg_repass'])));//Registering the user
}
//If the user wants to log in
elseif(isset($_POST['login']))
{
	die($au->Login(array("email"=>$_POST['log_email'],"password"=>$_POST['log_pass']),($_POST['is_admin']!=0 ? 1 : 0)));
}
//recovering the password, according to the given email address
elseif(isset($_POST['recover_pass']))
{
	die($au->Recover($_POST['recover_pass']));
}
?>