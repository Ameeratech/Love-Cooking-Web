  <?php
  ob_start();
  session_start();
  
  if(isset($_GET['logout']))//If the logged in user/admin wants to log out
	unset($_SESSION['user123dsfdfdsf'],$_SESSION['admin123dsfdfdsf']);
  ?>
  <!-- box header -->
   
   <div class="box-header">
                <div class="box-logo">
                    <a href="index.php"><img src="assets/img/logo.png" width="80" alt="Logo"></a>
                </div>
                <!-- box-nav -->
                <a class="box-primary-nav-trigger" href="#0">
								<span class="box-menu-icon"></span>
						</a>
                <!-- box-primary-nav-trigger -->
            </div>
            <!-- end box header -->

            
        </div>
<!-- side-nav -->
             
                <!--side-nav -->
            </div>
            <!-- end box header -->

            <!-- nav -->
           <nav>
                <ul class="box-primary-nav">
                     <li class="fa fa-home" aria-hidden="true"><a href="index.php">Home</a> </li> <br>
                    <li class="fa fa-list-alt" aria-hidden="true"><a href="index.php#ctg">Categoris</a></li><br>
                     <li class="fa fa-hand-rock-o" aria-hidden="true"><a href="chefs.php">Our Chefs</a></li><br>
                    <li class="fa fa-users" aria-hidden="true"><a href="index.php#team1">About us</a></li><br>
                    <li class="fa fa-envelope-o" aria-hidden="true"><a href="contact.php">Contact us</a></li><br>

					 <?php
					 if(isset($_SESSION['user123dsfdfdsf']))//If the user is logged in
					 {
						 echo ' <li  class="fa fa-user " aria-hidden="true"><a href="user/examples/User-Profile.php">My Panel</a></li><br>';
						 echo ' <li  class="fa fa-power-off " aria-hidden="true"><a href="index.php?logout=1">Exit</a></li><br>';
					 }
					 else//If the user is not logged in
					 {
					 ?>
                    <li  class="fa fa-user " aria-hidden="true"><a href="index.php#login1">Login/Signup</a></li><br>
					<?php
					 }
					 ?>
                 

                    
                </ul>
            </nav>
            <!-- end nav -->
			
			
			