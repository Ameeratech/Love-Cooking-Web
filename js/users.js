showUsers();

//If we want to delete an existing user
$(document).on('click','.delete_user',function(){
	$.post('../classes/Users.php',{'delete_user':$(this).attr('data-id')},function(data){ alert(data);
		if(data=='fail')//If the user couldn't be deleted
		{
			alert("Couldn't delete a user");
		}
		else
		{
			showUsers();
		}
	});
});

//Function that shows all the existing users
function showUsers()
{
	$.post('../classes/Users.php',{'show_users':1},function(data){
		$('.users').html(data);
	});
}