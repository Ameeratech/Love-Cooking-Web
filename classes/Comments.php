<?php
session_start();

require_once "PDOHandler.php";
if(!class_exists('PDOHandler'))
    die("PDOHandler class is missing");

require_once "Validate.php";
if(!class_exists('Validate'))
    die("Validate class is missing");

/*
Class handles comments processes
*/
class Comments extends PDOHandler
{
	public function __construct($host,$db,$user,$pass,$charset)
	{
		parent::__construct($host,$db,$user,$pass,$charset);
	}
	
	/*
	Showing the existing comments
	*/
	public function showComments()
	{
		//Only a connected user can see comments and can reply
		if(isset($_SESSION['admin123dsfdfdsf']) || (count($this->getInfo("SELECT user_name FROM user WHERE email=?",array($_SESSION['user123dsfdfdsf']['email']))[0]['user_name'])))
		{
			$comments=$this->getInfo("SELECT comment_id,comment_content,user_name,recipe_name FROM comment c INNER JOIN recipes r ON c.recipe_id=r.recipe_id",array());
			
			echo '<table class="table"><tr><td colspan="5"><center><h3>Comments</h3></td></center><tr><td><b>Recipe Name</b><td><b>User Name</b><td><b>Comment Content</b></tr>';
			
			if(!empty($comments))//If there are some comments
			{	
				foreach($comments as $comment)//Showing all the existing users
				{
					echo '<tr><td>'.$comment['recipe_name'].'</td><td>'.$comment['user_name'].'</td><td data-content="'.$comment['comment_content'].'" data-id="'.$comment['comment_id'].'" class="edit_content" contenteditable="true">'.substr($comment['comment_content'],0,10).'...</td><td><input type="button" class="update_comment btn btn-primary" value="Update" data-id="'.$comment['comment_id'].'"></td><td><input type="button" class="delete_comment btn btn-primary" value="Delete" data-id="'.$comment['comment_id'].'"></td></tr>';
				}
			}
			else
				echo '<tr><td colspan="5"><center>No comments were found</center></td></tr>';
				
			echo '</table>';
		}
	}
	
	/*
	Deleting an existing comment
	*/
	public function deleteComment($comment_id)
	{
		$this->executeQuery("DELETE FROM comment WHERE comment_id=?",array($comment_id));
		
		//Checking that the comment was deleted successfully
		if(count($this->getInfo("SELECT * FROM comment WHERE comment_id=?",array($comment_id))))		
			die('fail');
				
		die('success');
	}	
	
	/*
	Updating an existing comment
	*/
	public function updateComment($comment_id,$content)
	{
		$this->executeQuery("UPDATE comment SET comment_content=? WHERE comment_id=?",array($content,$comment_id));//Updating the specific comment
		
		//Checking that the comment was updated successfully
		if(count($this->getInfo("SELECT * FROM comment WHERE comment_content=? AND comment_id=?",array($content,$comment_id))))
			die('success');
			
		die('fail');
	}
	
	/*
	Method that adds a new comment for the specific recipe
	*/
	public function addComment($recipe_id,$add_comment)
	{
		$this->executeQuery("INSERT INTO comment(comment_content,recipe_id,user_name) VALUES(?,?,?)",array($add_comment,$recipe_id,$this->getInfo("SELECT user_name FROM user WHERE email=?",array($_SESSION['user123dsfdfdsf']['email']))[0]['user_name']));
	}
	
	/*
	Method that displays all comments for the specific recipe
	*/
	public function displayCommentsList($recipe_id)
	{
		$comments=$this->getInfo("SELECT * FROM comment WHERE recipe_id=? ORDER BY comment_id DESC",array($recipe_id));
		foreach($comments as $comment)//Displaying HTML for every comment
		{
		?>
<div class="jumbotron">
    <p><b>
            <?php echo $comment['user_name']; ?></b> says:</p>
    <hr>
    <p style="word-wrap: break-word">
        <?php echo $comment['comment_content']; ?>
    </p>

</div>
<?php			
		}
	}
}

$comments=new Comments('localhost','love_cooking','root','','utf8mb4');

//Showing all the existing comments
if(isset($_POST['show_comments']))
{
	$comments->showComments();
}
//Deleting an existing comment
elseif(isset($_POST['delete_comment']))
{
	$comments->deleteComment($_POST['delete_comment']);
}
//Updating an existing comment
elseif(isset($_POST['update_comment']))
{
	$comments->updateComment($_POST['update_comment'],$_POST['content']);
}
//Add a new comment
elseif(isset($_POST['add_comment']))
{
	$comments->addComment($_POST['recipe_id'],$_POST['add_comment']);
}
//Showing all the existing comments
elseif(isset($_POST['show_comments_list']))
{
	$comments->displayCommentsList($_POST['show_comments_list']);
}
?>
