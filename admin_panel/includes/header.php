<?php
session_start();

if(isset($_GET['logout']))//If the admin wants to log out, the current code is executed
	unset($_SESSION['admin123dsfdfdsf']);

if(!isset($_SESSION['admin123dsfdfdsf']))//Checking if the admin is currently logged in
	header('location:../index.php');//If not logged in, redirecting to the home page
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="images/admin-icon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin Panel</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/light-bootstrap-dashboard.css?v=2.0.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/css/demo.css" rel="stylesheet" />
   	<script src="assets/js/core/jquery.3.2.1.min.js"></script>
</head>
<?php
if(!isset($_SESSION['admin123dsfdfdsf']))//If the admin is not logged in
	header('location:../index.php');
?>
<body>
    <div class="wrapper">
        <div class="sidebar">
   <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="index.php" class="simple-text">
                        Manager Panel 
                    </a>
                </div>
                <ul class="nav">
                    <li >
                        <a class="nav-link" href="comments.php">
                            <i class="nc-icon nc-chat-round"></i>
                            <p>Manage Comments</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="users.php">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Manage Users </p>
                        </a>
                    </li>
					 <li>
                        <a class="nav-link" href="categories.php">
                            <i class="nc-icon nc-notes"></i>
                            <p>Manage Categories</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="recipes.php">
                            <i class="nc-icon nc-notes"></i>
                            <p>Manage Recipes</p>
                        </a>
                    </li>
					 <li>
                        <a class="nav-link" href="chefs.php">
                            <i class="nc-icon nc-badge"></i>
                            <p>Manage chefs</p>
                        </a>
                    </li>
					
                  <li>
                        <a class="nav-link" href="edit_profile.php">
                            <i class="nc-icon nc-settings-gear-64"></i>
                            <p>Edit Profile</p>
                        </a>
                    </li>
                      
                    <li>
                        <a class="nav-link" href="../index.php?logout=1">
                            <i class="nc-icon nc-button-power"></i>
                            <p>Log out</p>
                        </a>
                    </li>
                      
                   
                </ul>
            </div>
        </div>
		   <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                   
                        <ul class="navbar-nav ml-auto">
                           
                            <li class="nav-item">
                                <a class="nav-link" href="includes/header.php?logout=1">
                                    <span class="no-icon">Log out</span>
                                </a>
                            </li>
                        </ul>
                    </div>