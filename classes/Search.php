<?php
//Getting the classes we are going ot use
require_once "PDOHandler.php";
if(!class_exists('PDOHandler'))
    die("PDOHandler class is missing");

/*
Class is resposible for search process
*/
class Search extends PDOHandler
{
	//Method displays the search results
	public function getSearchResults($search_value,$search_option)
	{
		switch($search_option)//Checking what the user is searching for
		{
			case 1://Looking for a category
				$results=$this->getInfo("SELECT recipe_type_id,recipe_type_name FROM recipe_types WHERE recipe_type_name LIKE ?",array('%'.$search_value.'%'));				
				break;
				
			case 2://Looking for a recipe
				$results=$this->getInfo("SELECT recipe_id,recipe_name FROM recipes WHERE recipe_name LIKE ?",array('%'.$search_value.'%'));
				break;
				
			case 3://Looking for an ingredient
				$results=$this->getInfo("SELECT distinct r.recipe_id,recipe_name FROM recipes r INNER JOIN  ingredients i ON r.recipe_id=i.recipe_id WHERE ingredient_name LIKE ?",array('%'.$search_value.'%'));
				break;
		}	
		
		foreach($results as $result)//Showing the list of all results that fit our search parameters
		{
			if($search_option==1)//Showing the list of categories
			{
				echo '<li><a href="meals.php?id='.$result['recipe_type_id'].'">'.$result['recipe_type_name'].'</a></li>';
			}
			elseif($search_option==2 || $search_option==3)//Showing the list of recipes
			{
				echo '<li><a href="recipe.php?recipe='.$result['recipe_id'].'">'.$result['recipe_name'].'</a></li>';
			}		
		}	
	}
}

$search=new Search('localhost','love_cooking','root','','utf8mb4');

//Getting search results
if(isset($_POST['search']))
{
	die($search->getSearchResults($_POST['search'],$_POST['option']));
}
?>