<?php
session_start();

require_once "PDOHandler.php";
if(!class_exists('PDOHandler'))
    die("PDOHandler class is missing");

/*
Class handles categories processes
*/
class Categories extends PDOHandler
{
	public function __construct($host,$db,$user,$pass,$charset)
	{
		parent::__construct($host,$db,$user,$pass,$charset);
	}

	//Method that shows all categories	
	public function showCategories()
	{
		$categories=$this->getInfo("SELECT * FROM recipe_types",array());
		foreach($categories as $category)//Displaying HTML for every recipe
		{
			echo   '<div class="col-md-4">
                        <a href="meals.php?id='.$category['recipe_type_id'].'" class="Categories_item work-grid">
							<img src="assets/img/categories/'.$category['image'].'">
							<div class="Categories_item_hover">
								<div class="item_info">
									<span>'.$category['recipe_type_name'].'</span>
                                    <br>
									<em>View more</em>
								</div>
							</div>
						</a>
                    </div>';
		}
	}	

	//Method that shows a category name by its id
	public function getCategoryName($category_id)
	{
		echo $this->getInfo("SELECT recipe_type_name FROM recipe_types WHERE recipe_type_id=?",array($category_id))[0]['recipe_type_name'];
	}
}

$category=new Categories('localhost','love_cooking','root','','utf8mb4');

//Showing all categories
if(isset($_POST['show_categories']))
{
	die($category->showCategories());
}
//Getting a category name by its id
elseif(isset($_POST['get_category_by_id']))
{
	die($category->getCategoryName($_POST['get_category_by_id']));
}
?>