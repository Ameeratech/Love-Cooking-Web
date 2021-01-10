<?php

/*
Class is a utility class and contains validation methods
*/
class Validate
{
    //Removing all forbidden symbols to prevent SQL Injection and XSS
    public static function removeForbidden(&$arr)
    {
        foreach($arr as &$val)
        {
            $val=strip_tags(addslashes($val));
        }
    } 	
    
    //Method that validates username
    public static function validateUsername($username,&$errArray)
    {   
         if(!preg_match('/^[A-Z]{1}[a-z]{2,24}$/',$username))
         {
             $errArray[]="Username must start with uppercase letter and contain letters only";
         }
    }
    
    //Method that validates an email
    public static function validateEmail($email,&$errArray)
    {
        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
             $errArray[]="Wrong email format";
        }
    }
    
    //Method that validates password
    public static function validatePassword($password,&$errArray)
    {
         if(!preg_match('/^[0-9A-Za-z]{8}$/',$password))
         {
             $errArray[]="Password must contain letters and numbers no longer than 8";
         }
    }
	
	//Method that checks if the password and the repassword are the same
	public static function validateRePass($password,$repassword,&$errArray)
	{
		if($password!=$repassword)
		{
            $errArray[]="Password and re-password don't match";
        }
	}
	
	//Method that checks if an email already exists
	public static function checkEmailExists($db,$email,&$errArray)
	{		
		$arr=$db->getInfo("SELECT * FROM user WHERE email=?",array($email));
		if(!empty($arr))
			$errArray[]="This email already exists.Choose another one";
	}
	
	//Method that checks the recipe name
	public static function validateRecipeName($db,$recipe_name,&$errArray,$update)
	{
		if(!preg_match('/^[A-Za-z\s]{3,25}$/',$recipe_name))
        {
            $errArray[]="Recipe name must contain 3-25 letters and spaces only";
        }
		elseif($update==0)//If we are adding a new recipe
		{
			if(count($db->getInfo("SELECT * FROM recipes WHERE recipe_name=?",array($recipe_name))))
				$errArray[]="This recipe name already exists";
		}
	}
	
	//Method that checks if our value is empty or not
	public static function validateNotEmpty($value,&$errArray,$fieldName)
	{
		if(empty($value))
			 $errArray[]=$fieldName." can't be empty";
	}
	
	//Method that validates a urldecode
	public static function validateUrl($url,&$errArray,$fieldName)
	{
		if(!filter_var($url,FILTER_VALIDATE_URL))
			 $errArray[]=$fieldName." url is invalid";
	}

	//Method validates a chef name
	public static function validateChef($chef_name,&$errArray)
	{
		if(!preg_match('/^(?=^.{0,25}$)^[a-zA-Z-]+\s[a-zA-Z-]+$/',$chef_name))
		{
			$errArray[]="Chef name can contain 3-25 letters only";
		}
	}		
}
?>