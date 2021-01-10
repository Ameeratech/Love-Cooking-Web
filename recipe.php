<?php
if(!isset($_GET['recipe']))
	header('location:index.php');
?>
<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <title>Recipe Page</title>
    <link rel="shortcut icon"  alt="go Home"  type="image/x-icon" href="images/LOGO.png">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" />
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,700,300italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="css/animat/animate.min.css" />
    <link rel="stylesheet" href="css/fancybox/jquery.fancybox.css" />
    <link rel="stylesheet" href="css/nivo-lightbox/nivo-lightbox.css" />
    <link rel="stylesheet" href="css/themes/default/default.css" />
    <link rel="stylesheet" href="css/owl-carousel/owl.carousel.css" />
    <link rel="stylesheet" href="css/owl-carousel/owl.theme.css" />
    <link rel="stylesheet" href="css/owl-carousel/owl.transitions.css">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/responsive.css" />

    <script src="js/jquery-3.3.1.min.js"></script>

    <script>
        $(document).ready(function(){
			//Show main recipe information according to its id
			$.post('classes/Recipe.php',{'show_recipe_by_id':<?php echo $_GET['recipe']; ?>},function(data){
				$('.recipeInfo').html(data);
			});
			
			//Show recipe ingredients according to its id
			$.post('classes/Recipe.php',{'show_ingredients':<?php echo $_GET['recipe']; ?>},function(data){
				$('.ingr').html(data);
			});
			
			//Show recipe preperation steps according to its id
			$.post('classes/Recipe.php',{'show_prep_steps':<?php echo $_GET['recipe']; ?>},function(data){
				$('.prep').html(data);
			});
			
			//Adding a new comment for the current recipe
			$('.addComment').click(function(){
				$.post('classes/Comments.php',{'add_comment':$('#new_comment').val(),'recipe_id':<?php echo $_GET['recipe']; ?>},function(){ 
					$('#new_comment').val('');
				});
			});		

			//Displaying all the existing comments for the specific recipe
			setInterval(function(){
				$.post('classes/Comments.php',{'show_comments_list':<?php echo $_GET['recipe']; ?>},function(data){
					$('.comments').html(data);
				});				
			},500);
			
			//Giving like to the specific recipe
			$(document).on('click','.like',function(){
				this_id=$(this);
				$.post('classes/Recipe.php',{'like':this_id.attr('data-id')},function(data){
					this_id.removeClass('like').addClass('unlike').attr('src','images/unlike.png');					
				});
			});
			
			//Removing like from the specific recipe
			$(document).on('click','.unlike',function(){
				this_id=$(this);
				$.post('classes/Recipe.php',{'unlike':this_id.attr('data-id')},function(data){
					this_id.removeClass('unlike').addClass('like').attr('src','images/like.png');					
				});
			});
			
			//Showing video/image
			$(document).on('click','#show',function(){
				this_id=$(this);
				$.post('classes/Recipe.php',{'show':this_id.attr('data-id'),'type':this_id.attr('data-type')},function(data){
					this_id.removeClass(this_id.attr('data-type')=='video' ? 'glyphicon-film':'glyphicon-picture').addClass(this_id.attr('data-type')=='video' ? 'glyphicon-picture':'glyphicon-film').attr('data-type',this_id.attr('data-type')=='video' ?'image' :'video');
					$('.show_info').html(data);
				});
			});
		});
	</script>
</head>

<body>
    <div class="box-logo" style="margin:10px;">
        <center><a href="index.php"><img src="images/LOGO.png" width="80" alt="Logo"></a></center>
    </div>
    <div class="recipeInfo"></div>
    <section id="menus" class="menus sections">
        <div id="share"></div>
        <div class="container">
            <div class="row">
                <div class="main_menus">
                    <div class="head_title text-center wow slideInDown" data-wow-duration="2s">
                        <h2>Ingredients & Preperation</h2>
                        <div class="separetor"></div>
                    </div>
                    <!--Preperation list---->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="single_menus wow slideInLeft" data-wow-duration="1.5s">
                            <ul class="ingr">


                            </ul>
                        </div>
                    </div>
                    <!--Ingredients list---->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="single_menus wow slideInRight" data-wow-duration="1.5s">
                            <ul class="prep">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Comments Section -->
    <section id="abouts" class="abouts sections">
        <div class="container">
            <section id="abouts" class="abouts sections">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="widget-area no-padding blank">
                                <div class="status-upload">
                                    <form>
                                        <textarea style="text-align:right" id="new_comment" placeholder="Did you like this recipe?"></textarea>
                                        <button type="button" class="btn btn-primary addComment"> Add Comment <i class="fa fa-share"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--Displaying Comments that users write -->
                        <div class="col-md-6">
                            <div class="comments">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <!-- STRAT SCROLL TO TOP -->

    <div class="scrollup">
        <a href="#"><i class="fa fa-chevron-up"></i></a>
    </div>

    <script type="text/javascript" src="js/jquery/jquery.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/fancybox/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="js/nivo-lightbox/nivo-lightbox.min.js"></script>
    <script type="text/javascript" src="js/owl-carousel/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/jquery-easing/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/wow/wow.min.js"></script>

</body>

</html>
