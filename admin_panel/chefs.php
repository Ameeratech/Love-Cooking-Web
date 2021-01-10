<?php
require_once "includes/header.php";
?>
 <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class=" container-fluid  ">
				<div class="container">
					<div class="row">	
							<input type="button" id="open_modal" value="Add Chef">	
					</div>
				</div>
					<style>
					a.btn:hover {
					 -webkit-transform: scale(1.1);
					 -moz-transform: scale(1.1);
					 -o-transform: scale(1.1);
				 }
						.container{
							left: auto;
							margin-top: 20px;
						}
				 a.btn {
					 -webkit-transform: scale(0.8);
					 -moz-transform: scale(0.8);
					 -o-transform: scale(0.8);
					 -webkit-transition-duration: 0.5s;
					 -moz-transition-duration: 0.5s;
					 -o-transition-duration: 0.5s;
				 }</style>                    
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
                </div>
            </nav>			
            <!-- End Navbar -->
	
	 	<div class="row">
		<div class="col-md-offset-4 col-md-4 recipe_form" style="display:none">		
			<div class="col-md-12 px-1">
				<div class="form-group">
					<label>Chef name</label>
					<input type="text" id="chef_name" class="form-control" value="" placeholder="Chef name">	
				</div>
			</div>	

			<div class="col-md-12 px-1">
				<div class="form-group">
					<label>Chef image</label>
					<input type="text" id="chef_image" class="form-control" value="" placeholder="Chef image link http://www.yourlink.com">					
				</div>
			</div>				
										  
			<div class="chefErr"></div>
			
			<button type="button" class="btn btn-info btn-fill pull-right manage_chef" data-id="0">Add Chef</button>
		<div class="clearfix"></div>
		</div>
	</div>
	
    <div class="row">
		<div class="col-md-4 chefs" style="margin:auto">
		</div>
          
    </div>
</div>
	     
  
 <script src="../js/chefs.js"></script>
</body>

</html>