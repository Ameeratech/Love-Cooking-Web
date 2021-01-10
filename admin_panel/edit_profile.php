<?php
require_once "includes/header.php";
?>

        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class=" container-fluid  ">
                    <a class="navbar-brand"> Admin </a>
                   
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Profile</h4>
                                </div>
                                <div class="card-body">
                                   
                                        <div class="row adminInfo">
                                           
                                           
                                        </div>                                       
                                        <div class="updateErr"></div>
                                        <button type="button" class="btn btn-info btn-fill pull-right update_profile">Update Profile</button>
                                        <div class="clearfix"></div>
                                   
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
          
        </div>
    </div>
   
<script type="text/javascript">
	$(document).ready(function(){
		showAdminInfo();
		
		//If the administrator is trying to update a profile
		$(document).on('click','.update_profile',function(){
			$.post('../classes/Profile.php',{'updateInfo':1,'email':'<?php echo $_SESSION['admin123dsfdfdsf']['email']; ?>','employee_name':$('#employee_name').val(),'password':$('#password').val()},function(data){
				if(data=='1')//If data was updated successfully
				{
					alert('Your information was updates successfully');
					showAdminInfo();//Showing the admin information
				}
				else//If there were some errors while updating the information
					$('.updateErr').html(data);
			});
		});
	});
	
	//function shows information of the current admin (according to the SESSION variable)
	function showAdminInfo()
	{
		$.post('../classes/Profile.php',{'showInfo':'<?php echo $_SESSION['admin123dsfdfdsf']['email']; ?>'},function(data){
			$('.adminInfo').html(data);			
		});
	}
</script>
</body>
</html>