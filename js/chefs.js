$.post('classes/Chefs.php',{'show_chefs':1},function(data){ 
	$('.chefs').html(data);
});


showChefs();//Showing all the existing chefs

//Deleting an existing chef
$(document).on('click','.delete_chef',function(){
	$.post('../classes/Chefs.php',{'delete_chef':$(this).attr('data-id')},function(data){ alert(data);
		showChefs();
	});
});	

//Adding a new chef
$(document).on('click','.manage_chef',function(){
	$.post('../classes/Chefs.php',{'manage_chef':$(this).attr('data-id'),'image':$('#chef_image').val(),'name':$('#chef_name').val()},function(data){ 
		if(data!='success')//Displaying all the errors
			$('.chefErr').html(data);
		else
		{
			showChefs();//Showing the list of all chefs
			
			if($(this).attr('data-id')==0)//If we added a new chef
				alert('הנתונים נוספו בהצלחה');
			else//If we updated an existing chef
				alert('הנתונים עודכנו בהצלחה');
		}
	})
});

//Opening the insert chef modal
$(document).on('click','#open_modal',function(){
	$('.recipe_form').toggle();
});

//If we want to open a form that contains the specific chef's information
$(document).on('click','.update_chef',function(){
	$.post('../classes/Chefs.php',{'show_chef_by_id':$(this).attr('data-id')},function(data){
		$('.recipe_form').show().html(data);
	});
});



//Function that displays all the existing chefs
function showChefs()
{
//Displaying all existing chefs at a table
$.post('../classes/Chefs.php',{'show_chefs_list':1},function(data){ 
	$('.chefs').html(data);
});
	}