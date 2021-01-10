<?php
session_start();

//Getting the files we are going to use
require_once "PDOHandler.php";
if(!class_exists('PDOHandler'))
    die("PDOHandler class is missing");

require_once "Validate.php";
if(!class_exists('Validate'))
    die("Validate class is missing");

require_once "MailsHandler.php";
if(!class_exists('MailsHandler'))
    die("Mailsclass is missing");

/*
Class handles recipes
*/
class Recipes extends PDOHandler
{
	public function __construct($host,$db,$user,$pass,$charset)
	{
		parent::__construct($host,$db,$user,$pass,$charset);
	}
	
	/*
	Method that shows the existing recipes
	*/
	public function showMangeRecipeForm($recipe_id)
	{
		if($recipe_id)//If we are getting the existing recipe information
		{
			$recipe_info=$this->getInfo("SELECT * FROM recipes WHERE recipe_id=?",array($recipe_id))[0];
		}
	?>
<div class="col-md-12 px-1">
    <div class="form-group">
        <label>Recipe name</label>
        <input type="text" id="recipe_name" class="form-control" value="<?php echo (isset($recipe_info['recipe_name'])? $recipe_info['recipe_name'] : ''); ?>" placeholder="Recipe name">
    </div>
</div>

<div class="col-md-12 px-1">
    <div class="form-group">
        <label>Recipe ingredients</label>
        <textarea id="recipe_ingredients" style="height:70px!important" class="form-control" placeholder="Recipe ingredients"><?php echo (isset($recipe_info['ingredients'])? $recipe_info['ingredients'] : '');?></textarea>
    </div>
</div>

<div class="col-md-12 px-1">
    <div class="form-group">
        <label>Recipe preparation</label>
        <textarea id="recipe_preparation" style="height:70px!important" class="form-control" placeholder="Recipe preparation"><?php echo (isset($recipe_info['preparation'])? $recipe_info['preparation'] : '');?></textarea>
    </div>
</div>

<div class="col-md-12 px-1">
    <div class="form-group">
        <label>Recipe equipment</label>
        <textarea id="recipe_equipment" style="height:70px!important" class="form-control" placeholder="Recipe equipment"><?php echo (isset($recipe_info['equipment'])? $recipe_info['equipment'] : ''); ?></textarea>
    </div>
</div>

<div class="col-md-12 px-1">
    <div class="form-group">
        <label>Recipe preparation time</label>
        <textarea id="recipe_time" style="height:70px!important" class="form-control" placeholder="Recipe preparation time"><?php echo (isset($recipe_info['time'])? $recipe_info['time'] : ''); ?></textarea>
    </div>
</div>

<div class="col-md-12 px-1">
    <div class="form-group">
        <label>Recipe description</label>
        <textarea id="recipe_descr" style="height:70px!important" class="form-control" placeholder="Recipe description"><?php echo (isset($recipe_info['description'])? $recipe_info['description'] : ''); ?></textarea>
    </div>
</div>

<div class="col-md-12 px-1">
    <div class="form-group">
        <label>Recipe people quantity</label>
        <textarea id="people_quantity" style="height:70px!important" class="form-control" placeholder="Recipe people quantity"><?php echo (isset($recipe_info['people_quantity'])? $recipe_info['people_quantity'] : ''); ?></textarea>
    </div>
</div>

<div class="col-md-12 px-1">
    <div class="form-group">
        <label>Recipe type</label>
        <select class="form-control" id="recipe_type">
            <?php
					$get_recipes=$this->getInfo("SELECT * FROM recipe_types",array());					
					foreach($get_recipes as $recipe)//All existing recipes list
					{
					?>
            <option <?php echo (isset($recipe_info['recipe_type'])? ($recipe_info['recipe_type']==$recipe['recipe_type_id'] ?'selected="selected"':'') : '');?> value="<?php echo $recipe['recipe_type_id']; ?>">
                <?php echo $recipe['recipe_type_name']; ?>
            </option>
            <?php
					}
					?>
        </select>
    </div>
</div>

<div class="col-md-12 px-1">
    <div class="form-group">
        <label>Kitchen type</label>
        <select class="form-control" id="kitchen_type">
            <?php
					$get_kitchens=$this->getInfo("SELECT * FROM kitchen_types",array());					
					foreach($get_kitchens as $kitchen)//All existing kitchens list
					{
					?>
            <option <?php echo (isset($recipe_info['kitchen_type'])? ($recipe_info['kitchen_type']==$kitchen['kitchen_type_id'] ?'selected="selected"':'') : '');?> value="<?php echo $kitchen['kitchen_type_id']; ?>">
                <?php echo $kitchen['kitchen_type_name']; ?>
            </option>
            <?php
					}
					?>
        </select>
    </div>
</div>

<div class="col-md-12 px-1">
    <div class="form-group">
        <label>Recipe image</label>
        <input type="text" id="recipe_image" class="form-control" value="<?php echo (isset($recipe_info['picture'])? $recipe_info['picture'] : ''); ?>" placeholder="Recipe image link http://www.yourlink.com">
    </div>
</div>

<div class="col-md-12 px-1">
    <div class="form-group">
        <label>Recipe video</label>
        <input type="text" id="recipe_video" class="form-control" value="<?php echo (isset($recipe_info['video'])? $recipe_info['video'] : ''); ?>" placeholder="Recipe video link https://www.youtube.com/embed/EMBEDCODE">
    </div>
</div>

<div class="col-md-12 px-1">
    <div class="form-group">
        <label>Chef name</label>
        <select class="form-control" id="chef">
            <?php
					$get_chefs=$this->getInfo("SELECT * FROM chefs",array());					
					foreach($get_chefs as $chef)//All existing chefs list
					{
					?>
            <option <?php echo (isset($recipe_info['chef_id'])? ($recipe_info['chef_id']==$chef['chef_id'] ?'selected="selected"':'') : '');?> value="<?php echo $chef['chef_id']; ?>">
                <?php echo $chef['chef_name']; ?>
            </option>
            <?php
					}
					?>
        </select>
    </div>
</div>

<div class="col-md-12 px-1">
    <div class="form-group">
        <?php
					$levels=array(1=>"Beginner",2=>"Medium",3=>"Professional");
					?>
        <label>Difficulty level</label>
        <select id="level" class="form-control">
            <?php
						foreach($levels as $key=>$value)
						{
						?>
            <option <?php echo (isset($recipe_info['level'])? ($recipe_info['level']==$key ?'selected="selected"':'') : '');?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
						<?php
						}
						?>
					</select>
				</div>
			</div>
			
			<img src="../images/loader.gif" class="load_recipe" style="display:none">
			
			<div class="recipeErr"></div>
			
			<button type="button" class="btn btn-info btn-fill pull-right manage_recipe" data-id="<?php echo $recipe_id; ?>"><?php echo(($recipe_id!=0)?' Update':'Add'); ?> Recipe</button>
                <div class="clearfix"></div>
                <?php
	}

	/*
	Method that shows all the existing recipes
	*/
	public function showRecipes()
	{
		$recipesList=$this->getInfo("SELECT * FROM recipes",array());
		
		echo '<table class="table"><tr><td colspan="3"><center><h3>Recipes</h3></td></center><tr><td><b>Recipe Name</b></tr>';
		if(!empty($recipesList))//If there ae some existing recipes
		{	
			foreach($recipesList as $r)//Displaying HTML for every recipe
			{
			?>
                <tr>
                    <td>
                        <?php echo $r['recipe_name'];?>
                    </td>
                    <td><input type="button" class="update_button btn btn-primary" value="Update" data-id="<?php echo $r['recipe_id'];?>"></td>
                    <td><input type="button" class="delete_button btn btn-primary" value="Delete" data-id="<?php echo $r['recipe_id'];?>"></td>
                </tr>
                <?php
			}
		}
		else//If there aren't any recipes
			echo '<tr><td colspan="3"><center>No recipes were found</center></td></tr>';
			
		echo '</table>';
	}
	
	/*
	Method deletes an existing recipe by its id
	*/
	public function deleteRecipe($recipeId)
	{		
		//Deleting all information for the current recipe	
		$this->executeQuery("DELETE FROM comment WHERE recipe_id=?",array($recipeId));
		$this->executeQuery("DELETE FROM likes WHERE recipe_id=?",array($recipeId));
		$this->executeQuery("DELETE FROM recipes WHERE recipe_id=?",array($recipeId));
	}
	
	/*
	Method adds a new recipe
	*/
	public function manageRecipe($recipe_info)
	{
		$arr=array();//Error array. Is empty by default
        
		//Validating recipe's information
        Validate::removeForbidden($recipe_info);
        Validate::validateRecipeName($this,$recipe_info['recipe_name'],$arr,(!isset($recipe_info['recipe_id']) ? 0 : 1));          
		Validate::validateNotEmpty($recipe_info['recipe_ingredients'],$arr,'Recipe ingredients');  
		Validate::validateNotEmpty($recipe_info['recipe_preparation'],$arr,'Recipe preparation'); 
		Validate::validateNotEmpty($recipe_info['recipe_equipment'],$arr,'Recipe equipment'); 
		Validate::validateNotEmpty($recipe_info['recipe_people_quantity'],$arr,'Recipe people quantity'); 	
		Validate::validateNotEmpty($recipe_info['recipe_description'],$arr,'Recipe description'); 
		Validate::validateNotEmpty($recipe_info['recipe_time'],$arr,'Recipe preparation time'); 		
		Validate::validateNotEmpty($recipe_info['recipe_video'],$arr,'Recipe video'); 
		
		if(!empty($recipe_info['recipe_image']))//Only if the admin wants to update an image
			Validate::validateUrl($recipe_info['recipe_image'],$arr,'Image');
		
		if(empty($arr))//If there aren't any errors
		{	
			$info=array($recipe_info['recipe_time'],$recipe_info['recipe_description'],$recipe_info['recipe_people_quantity'],$recipe_info['recipe_video'],
			$recipe_info['recipe_name'],$recipe_info['recipe_ingredients'],$recipe_info['recipe_preparation'],$recipe_info['recipe_equipment'],$recipe_info['recipe_type'],$recipe_info['kitchen_type'],$recipe_info['recipe_image'],$recipe_info['chef'],$recipe_info['level']);
			
			if(isset($recipe_info['recipe_id']) && $recipe_info['recipe_id']!=0)//If we want to update an existing recipe
			{
				$info[]=$recipe_info['recipe_id'];
				$this->executeQuery("UPDATE recipes SET time=?,description=?,people_quantity=?,video=?,`recipe_name`=?,
				`ingredients`=?,`preparation`=?,`equipment`=?,`recipe_type`=?,`kitchen_type`=?,
				`picture`=?,`chef_id`=?,`level`=? WHERE recipe_id=?",$info);
			}
			else//If we want to add a new recipe
			{
				$this->executeQuery("INSERT INTO recipes(time,description,people_quantity,video,`recipe_name`,`ingredients`,`preparation`,`equipment`,`recipe_type`,`kitchen_type`,`picture`,`chef_id`,`level`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)",$info);
				
				//Getting the new recipe id
				$get_recipe_id=$this->getInfo("SELECT recipe_id FROM recipes WHERE recipe_name=?",array($recipe_info['recipe_name']));
				if(isset($get_recipe_id) && count($get_recipe_id))//Only if we could add a new recipe
				{
					$m=new MailsHandler();//Creating a new mailer object
				
					$users=$this->getInfo("SELECT email FROM user",array());//Getting all the users' list
				
					//Sending email to all users
					$m->sendAll($users,"lovecooking18@gmail.com","Love Cooking Site Notification","Hello,<br>A new recipe was added to the list<br>Please check this recipe: <a href='localhost/web/recipe.php?recipe=".$get_recipe_id[0]['recipe_id']."'>View recipe</a>");			
				}
			}
			
			//Checking if this recipe exists
			if(count($this->getInfo("SELECT * FROM recipes WHERE recipe_name=?",array($recipe_info['recipe_name']))))
				echo 'success';
			else
				echo "Couldn't add a new recipe";
		}
		else//Displaying all errors
        {
            echo "<ul>";
            foreach($arr as $e)
            {
                echo "<li>".$e."</li>";
            }
            echo "</ul>";
        }
	}
	
	/*
	Method that gets recipe information according to id
	*/
	public function getRecipeById($recipe_id)
	{
		//Getting an information of the specific recipe (according to its id)
		$get_info=$this->getInfo("SELECT recipe_id,recipe_name,description,level,time,equipment,people_quantity,chef_name,kitchen_type_name,picture FROM recipes r LEFT OUTER JOIN chefs c ON c.chef_id=r.chef_id INNER JOIN kitchen_types kt ON r.kitchen_type=kt.kitchen_type_id WHERE recipe_id=?",array($recipe_id))[0];
		
		if(isset($_SESSION['user123dsfdfdsf']))//If a user is logged in, we are checking if he has already "liked" the current recipe
			$like=$this->getInfo("SELECT count(*) as cnt FROM likes WHERE recipe_id=? AND user_name=?",array($recipe_id,$this->getInfo("SELECT user_name FROM user WHERE email=?",array($_SESSION['user123dsfdfdsf']['email']))[0]['user_name']))[0]['cnt'];
		
		
		echo '<!-----Recipe INFO (Name-Chef-) ---->
			<section id="features" class="features sections">

				<div class="features_content text-center">
					<div class="col-md-2">
						<div class="sinle_features wow slideInUp" data-wow-duration="0.5s">
							<img src="images/bar-chart.png" alt="" />
							<h5>Hard Level</h5>
							<p>'.$get_info['level'].'</p>
						</div>
					</div>
					<div class="col-md-2">
						<div class="sinle_features wow slideInUp" data-wow-duration="1s">
							<img src="images/clock.png" alt="" />
							<h5>Time</h5>
							<p>'.$get_info['time'].'</p>
						</div>
					</div>
					<div class="col-md-2">
						<div class="sinle_features wow slideInUp" data-wow-duration="1.5s">
							<img src="images/equ.png" alt="" />
							<h5>equipment</h5>
							<p>'.$get_info['equipment'].'</p>
						</div>
					</div>
					<div class="col-md-2">
						<div class="sinle_features wow slideInUp" data-wow-duration="2s">
							<img src="images/people.png" alt="" />
							<h5>quantitiy of people </h5>
							<p>'.$get_info['people_quantity'].'</p>
						</div>
					</div>
					<div class="col-md-2">
						<div class="sinle_features wow slideInUp" data-wow-duration="2.5s">
							<img src="images/cooker.png" alt="" />
							<h5>Chef Name</h5>
							<p>'.$get_info['chef_name'].'</p>
						</div>
					</div>
					<div class="col-md-2">
						<div class="sinle_features wow slideInUp" data-wow-duration="3s">
							<img src="images/kitchen.png" alt="" />
							<h5>Kitchen </h5>
							<p>'.$get_info['kitchen_type_name'].'</p>
						</div>
					</div>
				</div>
			</section>
			<!-- End of Abouts Section -->
		  
			<section id="abouts" class="abouts sections">
				<div class="container">				
					<div class="row">						
						<div class="main_abouts">
							<div class="col-md-6 col-sm-6 col-xs-12">								
								<div class="single_abouts wow slideInLeft" data-wow-duration="2s">
									<div class="head_title text-center">	
										<h2>'.$get_info['recipe_name'].'</h2>'.(isset($like) ?
									'<img style="cursor:pointer" src="images/'.($like!=0 ? 'un':'').'like.png" data-id="'.$get_info['recipe_id'].'" class="'.($like!=0 ? 'un':'').'like">' :'').'
<br>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "https://connect.facebook.net/he_IL/sdk.js#xfbml=1&version=v3.1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, "script", "facebook-jssdk"));</script>
	
	<div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
																				
										<div class="separetor"></div>
									</div>									

									<p>'.$get_info['description'].'</p>
								</div>
							</div>
							<!-------Recipe image --->
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="single_abouts wow slideInRight" data-wow-duration="2s">
									<div class="show_info">
										<img src="'.(!empty($get_info['picture']) ? $get_info['picture'] :'images/no_image.png').'" alt="'.$get_info['recipe_name'].'" title="'.$get_info['recipe_name'].'">									
									</div>
									<span class="glyphicon glyphicon-film" id="show" data-id="'.$recipe_id.'" data-type="video"></span>
								</div>

							</div>
						</div>
					</div>
				</div>
				
			</section>
			<!-- End of Abouts Section -->';		
	}
	
	/*
	Method that gets all the recipes,according to the category
	*/
	public function getAllRecipes($category_id)
	{
		$recipes=$get_info=$this->getInfo("SELECT recipe_id,picture,recipe_name FROM recipes WHERE recipe_type=?",array($category_id));
		if(!count($recipes))//If there aren't any recipes for the current recipe category
		{
			echo '<center>No recipes were found</center>';
		}
		else//If there is at least one recipe for the current recipe category
		{
			foreach($recipes as $recipe)//Displaying all the recipes
			{
				echo '<div><a href="recipe.php?recipe='.$recipe['recipe_id'].'">
						<img style="width:200px;" src="'.(!empty($recipe['picture']) ? $recipe['picture'] :'images/no_image.png').'" />
						<div class="centered" style="background:black;color:white;font-size:1em;padding:3px">'.$recipe['recipe_name'].'</div></a>
					</div>';
			}
		}
	}
	
	/*
	Method that adds like to the specific recipe
	*/
	public function like($recipe_id)
	{
		$this->executeQuery("INSERT INTO likes(recipe_id,user_name) VALUES(?,?)",array($recipe_id,$this->getInfo("SELECT user_name FROM user WHERE email=?",array($_SESSION['user123dsfdfdsf']['email']))[0]['user_name']));
	}
	
	/*
	Method that removes like from the specific recipe
	*/
	public function unlike($recipe_id)
	{
		$this->executeQuery("DELETE FROM likes WHERE recipe_id=? AND user_name=?",array($recipe_id,$this->getInfo("SELECT user_name FROM user WHERE email=?",array($_SESSION['user123dsfdfdsf']['email']))[0]['user_name']));
	}
	
	/*
	Method shows liked recipes for the current user
	*/
	public function showFavorite()
	{
		$get_recipes=$this->getInfo("SELECT recipe_id,recipe_name,picture,description,recipe_type_name FROM recipes r INNER JOIN recipe_types rt ON r.recipe_type=rt.recipe_type_id WHERE recipe_id=ANY(SELECT recipe_id FROM likes WHERE user_name=?)",array($this->getInfo("SELECT user_name FROM user WHERE email=?",array($_SESSION['user123dsfdfdsf']['email']))[0]['user_name']));
		if(!count($get_recipes))//If there aren't any favorite recipes for the current user
		{
			echo '<tr><td></td><td colspan="2"><center>No favorite recipes were found</center></td><td></td></tr>';
		}
		else//If there are some recipes
		{
			foreach($get_recipes as $recipe)//Displaying all favorite recipes for the current user
			{
		?>
                <tr>
                    <td><img style="width:80px" src="<?php echo(!empty($recipe['picture']) ? $recipe['picture'] :'../../images/no_image.png'); ?>"></td>
                    <td><a target="_blank" href="../../recipe.php?recipe=<?php echo $recipe['recipe_id']; ?>">
                            <?php echo $recipe['recipe_name']; ?></a></td>
                    <td>
                        <?php echo $recipe['recipe_type_name']; ?>
                    </td>
                    <td>
                        <?php echo $recipe['description']; ?>
                    </td>
                </tr>
                <?php
			}
		}
	}
	
	/*
	Method shows recipe's video/image
	*/
	public function showImageOrVideo($recipeId,$recipeType)
	{
		$info=$this->getInfo("SELECT recipe_name,video,picture FROM recipes WHERE recipe_id=?",array($recipeId))[0];
		
		if($recipeType=='video')
		{		
			echo '<iframe width="500" height="315" src="'.$info['video'].'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
				
		}
		else	
			echo '<img src="'.(!empty($info['picture']) ? $info['picture'] :'images/no_image.png').'" alt="'.$info['recipe_name'].'" title="'.$info['recipe_name'].'">';			
	}	
	
	/*
	Method gets the ingredients for the specific recipe
	*/
	public function getRecipeIngredients($recipeId)
	{
		$ingredinets=$this->getInfo("SELECT ingredients FROM recipes WHERE recipe_id=?",array($recipeId));//Getting the ingredients of the specific recipe
		
		echo '<li>Ingredients</li>';		
		echo '<li> '.(nl2br($ingredinets[0]['ingredients'])).'</li>'; 		                             
	}
	
	/*
	Method gets the ingredients for the specific recipe
	*/
	public function getRecipePreparationSteps($recipeId)
	{
		$prep_steps=$this->getInfo("SELECT preparation FROM recipes WHERE recipe_id=?",array($recipeId));//Getting the preparation steps of the specific recipe
		
		echo '<li>Preperation</li>';
		echo '<li>'.(nl2br($prep_steps[0]['preparation'])).'</li>';		                            
	}
	
	/*
	Method shows the most liked recipes
	*/
	public function mostLiked()
	{
		$recipes=$this->getInfo("SELECT picture,recipe_name,r.recipe_id as recipe_id FROM recipes r INNER JOIN likes l ON r.recipe_id=l.recipe_id GROUP BY l.recipe_id ORDER BY count(*) DESC LIMIT 3",array());
		if(!count($recipes))//If no recipes could be found
		{
			echo '<div class="item"><h5>Having fun Whether you cook for your family, friends or just for yourself, you will always enjoy it. Seeing how different veggies, meat and spices combine to give those gorgeous flavor, makes you really happy. You will enjoy every bit of the process, starting from chopping to baking.</h5></div>';
		}
		else
		{
			foreach($recipes as $r)//Displaying the most liked recipes
			{
				echo '<div class="item">'.$r['recipe_name'].'<a href="recipe.php?recipe='.$r['recipe_id'].'"><img style="height:120px" src="'.$r['picture'].'" alt="'.$r['recipe_name'].'"></a></div>';
			}
		}
	}
}

$recipes=new Recipes('localhost','love_cooking','root','','utf8mb4');

//Getting a recipe info by id
if(isset($_POST['show_recipe_by_id']))
{
	die($recipes->getRecipeById($_POST['show_recipe_by_id']));
}
elseif(isset($_POST['get_recipes']))
{
	die($recipes->getAllRecipes($_POST['get_recipes']));
}
//Getting a recipe ingredients info by id
elseif(isset($_POST['show_ingredients']))
{
	die($recipes->getRecipeIngredients($_POST['show_ingredients']));
}
//Getting a recipe preparation steps info by id
elseif(isset($_POST['show_prep_steps']))
{
	die($recipes->getRecipePreparationSteps($_POST['show_prep_steps']));
}
//Showing the most liked recipes
elseif(isset($_POST['show_liked']))
{
	die($recipes->mostLiked());
}
//Showing recipe video/image
elseif(isset($_POST['show']))
{
	die($recipes->showImageOrVideo($_POST['show'],$_POST['type']));
}

//Only a logged in user can like/unlike recipes
if(isset($_SESSION['user123dsfdfdsf']))
{
	//Like the specific recipe
	if(isset($_POST['like']))
	{
		die($recipes->like($_POST['like']));
	}
	//Unlike the specific recipe
	elseif(isset($_POST['unlike']))
	{
		die($recipes->unlike($_POST['unlike']));
	}
	//Showing favorite recipes for the current user
	elseif(isset($_POST['show_favorite']))
	{
		die($recipes->showFavorite());
	}
}

//If logged in as an admin
if(isset($_SESSION['admin123dsfdfdsf']))
{
	//Showing all recipes
	if(isset($_POST['show_recipes']))
	{
		die($recipes->showRecipes());
	}
	//Showing the form with input fields
	elseif(isset($_POST['show_recipe_form']))
	{
		die($recipes->showMangeRecipeForm($_POST['recipe_id']));
	}
	//Deleting the specific recipe
	elseif(isset($_POST['delete_recipe']))
	{	
		die($recipes->deleteRecipe($_POST['delete_recipe']));
	}
	//Adding a new recipe
	elseif(isset($_POST['manage_recipe']))
	{
		$info=array("recipe_people_quantity"=>$_POST['recipe_people_quantity'],"recipe_description"=>$_POST['recipe_description'],"recipe_time"=>$_POST['recipe_time'],"recipe_video"=>$_POST['recipe_video'],"recipe_name"=>$_POST['recipe_name'],"recipe_ingredients"=>$_POST['recipe_ingredients'],"recipe_preparation"=>$_POST['recipe_preparation'],
		"recipe_equipment"=>$_POST['recipe_equipment'],"recipe_type"=>$_POST['recipe_type'],"kitchen_type"=>$_POST['kitchen_type'],
		"recipe_image"=>$_POST['recipe_image'],"chef"=>$_POST['chef'],"level"=>$_POST['level']);
		
		if(isset($_POST['recipe_id']))//If recipe id exists, we want to update and not to add a recipe
			$info['recipe_id']=$_POST['recipe_id'];
			
		die($recipes->manageRecipe($info));//Updating or adding a recipe
	}
}
?>
