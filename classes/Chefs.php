<?php
require_once "PDOHandler.php";
if(!class_exists('PDOHandler'))
    die("PDOHandler class is missing");

require_once "Validate.php";
if(!class_exists('Validate'))
    die("Validate class is missing");

/*
Class is resposible for handling chefs
*/
class Chefs extends PDOHandler
{
	/*
	Showing the list of all existing chefs as images 
	*/
	public function showChefsList()
	{
		$chefs=$this->getInfo("SELECT chef_id,chef_name,image FROM chefs",array());
		foreach($chefs as $chef)//Displaying HTML for every chef
		{
			echo ' <div>
                    <img style="width:130px" src="'.(!empty($chef['image']) ? $chef['image'] :'images/no_image.png').'" />
                    <div class="centered" style="background:black;color:white;padding:10px">'.$chef['chef_name'].'</div>
                </div>';
		}
	}
	
	/*
	Showing the list of all existing chefs as table
	*/
	public function ShowChefs()
	{
		echo '<table class="table"><tr><td colspan="3"><center><h3>Chefs</h3></td></center><tr><td><b>Chef image</b><td><b>Chef Name</b></tr>';
		
		$chefs=$this->getInfo("SELECT chef_id,chef_name,image FROM chefs",array());
		foreach($chefs as $chef)//Showing all existing chefs
		{
			echo ' <tr>
				<td><img class="img-responsive" style="width:130px" src="'.(!empty($chef['image']) ? $chef['image'] :'images/no_image.png').'"></td><td>'.$chef['chef_name'].'</td>
				<td><span data-id="'.$chef['chef_id'].'" style="cursor:pointer" class="update_chef">Edit<i class="fa fa-edit"></i></span></td>
				<td><span data-id="'.$chef['chef_id'].'" style="cursor:pointer" class="delete_chef">Delete<i class="fa fa-minus-circle"></span></td>
			</tr>';
		}
		
		echo '</table>';
	}
	
	//Deleting an existing chef
	public function deleteChef($chef_id)
	{
		//Recipe is moved to 'no chef'
		$this->executeQuery("UPDATE recipes SET chef_id=NULL WHERE chef_id=?",array($chef_id));
		$this->executeQuery("DELETE FROM chefs WHERE chef_id=?",array($chef_id));
		
		//Checking if the chef was deleted successfully
		if(count($this->getInfo("SELECT * FROM chefs WHERE chef_id=?",array($chef_id))))//If the user couldn't be deleted
			echo 'fail';
		else//If the chef was deleted
			echo 'success';
	}
	
	//Method inserts/updates chef
	public function manageChef($chef_id,$image,$name)
	{
		$arr=array();//Error array. Is empty by default     
		
		//Validating chef information	
		Validate::validateChef($name,$arr);
		Validate::validateUrl($image,$arr,'Chef profile image');
		
		if(empty($arr))//If there aren't any errors
		{	
			$info=array($name,$image);
			
			if(isset($chef_id) && $chef_id!=0)//If we want to update an existing chef
			{
				$info[]=$chef_id;
				$this->executeQuery("UPDATE chefs SET chef_name=?,image=? WHERE chef_id=?",$info);
			}
			else//If we want to add a new chef
			{
				$this->executeQuery("INSERT INTO chefs(chef_name,image) VALUES(?,?)",$info);				
			}
			
			//Checking if this recipe exists
			if(count($this->getInfo("SELECT * FROM chefs WHERE chef_name=? AND image=?",array($name,$image))))
				echo 'success';
			else
				echo "fail";
		}
		else//Displaying errorss
		{
			foreach($arr as $e)
				echo $e."<br>";
		}
	}
	
	/*
	Method displays a form that contains the specific chef's information
	*/
	public function showChefById($chef_id)
	{
		//Getting the chef's info
		$chef=$this->getInfo("SELECT * FROM chefs WHERE chef_id=?",array($chef_id));
		?>
<div class="col-md-12 px-1">
    <div class="form-group">
        <label>Chef name</label>
        <input type="text" id="chef_name" class="form-control" value="<?php echo $chef[0]['chef_name']; ?>" placeholder="Chef name">
    </div>
</div>

<div class="col-md-12 px-1">
    <div class="form-group">
        <label>Chef image</label>
        <input type="text" id="chef_image" class="form-control" value="<?php echo $chef[0]['image']; ?>" placeholder="Chef image link http://www.yourlink.com">
    </div>
</div>

<div class="chefErr"></div>

<button type="button" class="btn btn-info btn-fill pull-right manage_chef" data-id="<?php echo $chef_id; ?>">Update Chef</button>
<?php
	}
}

$chefs=new Chefs('localhost','love_cooking','root','','utf8mb4');

//Showing all the existing chefs
if(isset($_POST['show_chefs']))
{
	die($chefs->showChefsList());
}
//Showing all chefs at a table
elseif(isset($_POST['show_chefs_list']))
{
	die($chefs->ShowChefs());
}
//Deleting an existing chef
elseif(isset($_POST['delete_chef']))
{
	die($chefs->deleteChef($_POST['delete_chef']));
}
//Managing chef (insert/update)
elseif(isset($_POST['manage_chef']))
{
	die($chefs->manageChef($_POST['manage_chef'],$_POST['image'],$_POST['name']));
}
//Showing form with specific chef's information
elseif(isset($_POST['show_chef_by_id']))
{
	die($chefs->showChefById($_POST['show_chef_by_id']));
}
?>
