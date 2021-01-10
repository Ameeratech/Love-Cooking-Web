<?php
session_start();

//Getting the classes we are going to use
require_once "PDOHandler.php";
if(!class_exists('PDOHandler'))
    die("PDOHandler class is missing");

require_once "Validate.php";
if(!class_exists('Validate'))
    die("Validate class is missing");

/*
Class handles admin profile
*/
class Profile extends PDOHandler
{
	public function __construct($host,$db,$user,$pass,$charset)
	{
		parent::__construct($host,$db,$user,$pass,$charset);
	}
	
	//displays the admin info
	public function displayAdminInfo($info)
	{		
	?>
	 <div class="col-md-3 px-1">
		<div class="form-group">
			<label>Employee name</label>
			<input type="text" id="employee_name" class="form-control" value="<?php echo $info[0]['employee_name']; ?>" placeholder="Username">
		</div>
	</div>	
	<div class="col-md-4 pl-1">
		<div class="form-group">
			<label for="exampleInputEmail1">Password</label>
			<input type="password" id="password" class="form-control" placeholder="Password">
		</div>
	</div>
	<?php
	}
	
	//updating the admin's information
	public function updateAdminInfo($info)
	{
		$arr=array();//Error array. Is empty by default
        
        Validate::removeForbidden($info);
        Validate::validateUsername($info['employee_name'],$arr);   
        if(!empty($info['password'])) Validate::validatePassword($info['password'],$arr);
		
		if(empty($arr))//If there aren't any errors
		{
			$information=array($info['employee_name'],$info['email']);
			
			if(!empty($info['password']))
			{
				$information[1]=$info['password'];		
				$information[2]=$info['email'];	
				
				$_SESSION['admin123dsfdfdsf']['password']=$info['password'];
			}				
			
			//Updating the admin information
			$this->executeQuery("UPDATE employes SET employee_name=?".(!empty($info['password']) ? ",password=?":"")." WHERE email=?",$information);
			
			$_SESSION['admin123dsfdfdsf']['employee_name']=$info['employee_name'];			
			echo '1';
		}
		else//Displaying all the errors as a HTML list 
        {
            echo "<ul>";
            foreach($arr as $e)
            {
                echo "<li>".$e."</li>";
            }
            echo "</ul>";
        }
	}	
}

$profile=new Profile('localhost','love_cooking','root','','utf8mb4');

//Showing admin information
if(isset($_POST['showInfo']))
{
	$profile->displayAdminInfo($profile->getInfo("SELECT * FROM employes WHERE email=?",array($_POST['showInfo'])));
}
//Updating an existing admin
elseif(isset($_POST['updateInfo']))
{
	$profile->updateAdminInfo(array("email"=>$_POST['email'],"password"=>$_POST['password'],"employee_name"=>$_POST['employee_name']));
}
?>