<?php
//Getting the classes we are going to use
require_once "PDOHandler.php";
if(!class_exists('PDOHandler'))
    die("PDOHandler class is missing");

/*
Class is resposible for displaying site main statistics
*/
class Statistics extends PDOHandler
{
	/*
	Method that displays the site statistics
	*/
	public function getStatistics()
	{
		$statistics=array();
		
		//Getting information about chefs,kitchen types,recipes and users
		$statistics[]=array('Chefs',$this->getInfo("SELECT count(*) as cnt FROM chefs",array())[0]['cnt']);
		$statistics[]=array('Kitchen Types',$this->getInfo("SELECT count(*) as cnt FROM kitchen_types",array())[0]['cnt']);
		$statistics[]=array('Recipes',$this->getInfo("SELECT count(*) as cnt FROM recipes",array())[0]['cnt']);
		$statistics[]=array('Users',$this->getInfo("SELECT count(*) as cnt FROM user",array())[0]['cnt']);

		$icons=array("lnr-users","lnr-dinner","lnr-book","lnr-user");//Array that contains background icons
		
		//Displaying all the site statistics
		for($i=0;$i<4;++$i)
		{
		?>
		 <div class="col-xs-12 col-lg-3 col-md-3">
			<div class="count-item">
				<i class="lnr <?php echo $icons[$i]; ?>"></i>
				<div class="numscroller" data-slno='1' data-min='0' data-max='<?php echo $statistics[$i][1]; ?>' data-delay='10' data-increment="10"><?php echo $statistics[$i][1]; ?></div>
				<div class="count-name-intro"><?php echo $statistics[$i][0]; ?></div>
			</div>
		</div>
		<?php
		}
	}
}

$statistics=new Statistics('localhost','love_cooking','root','','utf8mb4');

//Getting site statistics
if(isset($_POST['show_statistics']))
{
	die($statistics->getStatistics());
}
?>