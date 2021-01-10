//If the user wants to log in
$(document).on('click','.admin_login',function(){					
  $.post("../classes/Auth.php",{"login":1,"log_email":$('#log_email').val(),"log_pass":$('#log_pass').val(),'is_admin':'1'},function(data){
		if(data!='1')//If there were some errors												
			$('#errlog').html(data);						
		else 					
			location.href="edit_profile.php";						
	});				
});

//If enter key is pressed, we are trying to enter the system with the given credentials
$(document).keypress(function(e) {
    if(e.which == 13) {
       $('.admin_login').click();
    }
});