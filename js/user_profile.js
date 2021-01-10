$(document).on('click','.update_user_profile',function(){
	if($('#password').val()!='')//If an email to recover a password for was entered
		$.post('../../classes/Users.php',{'update_pass':$('#password').val()},function(data){
			if(data=='fail')//There was a problem updating the password
				alert("Couldn't update your password.Please contact the administrator");
			else if(data=='success')//The password was updated successfully
			{
				alert('Your password was updated successfully');
				$('#password').val('');
			}
			else//If a new password format is incorrect
				$('#update_err').html(data);
		});
	else//If there isn't any email
		alert('Please enter a new password');
});