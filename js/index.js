//Getting all the categories
$.post('classes/Categories.php',{'show_categories': 1}, function(data) {
	$('.Categories_container').html(data);
});

//Showing the site statistics
$.post('classes/Statistics.php',{'show_statistics':1},function(data){
	$('.statistics').html(data);
});


$(document).on('click','#forgot_password',function(){ 
	if($('#log_email').val()!='')
	{
		$('#preload').show();//Showing the loading image
		
		$.post('classes/Auth.php',{'recover_pass':$('#log_email').val()},function(data){ 
			$('#preload').hide();//Hiding the loading image
			
			if(data=='success')//If the mail was sent to the current email			
				alert('Your password was sent to the current email address');			
			else//If this email doesn't exist at our database			
				alert("This email doesn't exist or email couldn't be sent");			
		});
	}
	else
		alert('Please enter your email to get the password to!');
});	
	
$(document).on('change keyup paste','.searchInput',function(){
	if($('.searchCategory option:selected').val()=='0')
		alert('Please choose what to search for first');
	else
	{
		$.post('classes/Search.php',{'search':$('.searchInput').val(),'option':$('.searchCategory option:selected').val()},function(data){
			$('.searchResults').html(data);
		});
	}
});
