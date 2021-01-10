<!DOCTYPE html>
<html lang="en">

<head>
    <title>Love Cooking </title>
    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/LOGO.png">

    <!-- STYLES -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/flexslider.css">
    <link rel="stylesheet" href="assets/css/animsition.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.theme.css">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
	</head>
	<body>
<?php require_once './includes/sidenav.php';?>
<link rel="stylesheet" href="assets/css/style.css">
<section id="team" class="team mbr-box mbr-section mbr-section--relative">
    <svg preserveAspectRatio="none" viewBox="0 0 100 102" height="100" width="100%" version="1.1" xmlns="http://www.w3.org/2000/svg">
			<path d="M0 0 L50 100 L100 0 Z" fill="#ffeedb" stroke="#ffeedb"></path>
		</svg>
    <div class="container">
        <div class="col-md-8 col-md-offset-2 col-sm-12">
            <div class="row center">
                <div class="section-title mb-100">
                    <h2 id="ctg"></h2>                    
                </div>
            </div>

            <div class="gallery cf meals">              

            </div>
        </div>
        <!-- categories  -->

        <!-- all works end -->
    </div>
    <div class="bottom-separator hidden-xs"></div>
</section>
	
		
<script>
	$(document).ready(function(){
		//Getting all recipes for the current category
		$.post('classes/Recipe.php',{'get_recipes':<?php echo $_GET['id']; ?>},function(data){ 
			$('.meals').html(data);
		});
		
		//Getting the category name
		$.post('classes/Categories.php',{'get_category_by_id':<?php echo $_GET['id']; ?>},function(data){
			$('#ctg').html(data);
		});
	});
</script>
<?php require_once "includes/includes.php"; ?>
<style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans:300');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font: 14px/1 'Open Sans', sans-serif;
        color: #555;
        background: #e5e5e5;
    }

    .gallery {
        width: 640px;
        margin: 0 auto;
        padding: 5px;
        background: #fff;
        box-shadow: 0 1px 2px rgba(0, 0, 0, .3);
    }

    .gallery>div {
        position: relative;
        float: left;
        padding: 5px;
    }

    .gallery>div>img {
        display: block;
        width: 200px;
        transition: .1s transform;
        transform: translateZ(0);
        /* hack */
    }

    .gallery>div:hover {
        z-index: 1;
    }

    .gallery>div:hover>img {
        transform: scale(1.7, 1.7);
        transition: .3s transform;
    }

    .cf:before,
    .cf:after {
        display: table;
        content: "";
        line-height: 0;
    }

    .cf:after {
        clear: both;
    }

    .centered {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: black;
    }

    h1 {
        margin: 40px 0;
        font-size: 30px;
        font-weight: 300;
        text-align: center;
    }

</style>
</body>

</html>