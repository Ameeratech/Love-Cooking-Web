//TODO

showCategories();//Showing all the existing chefs

//Deleting an existing category
$(document).on('click','.delete_chef',function(){
	$.post('../classes/Categories.php',{'delete_category':$(this).attr('data-id')},function(data){ alert(data);
		showCategories();
	});
});	

//Adding a new chef
$(document).on('click','.manage_chef',function(){
	$.post('../classes/Categories.php',{'add_category':1,'image':$('#cat_image').val(),'name':$('#cat_name').val()},function(data){ 
		if(data!='success')//Displaying all the errors
			$('.catErr').html(data);
		else
		{
			showCategories();//Showing the list of all categories			
			
			alert('הנתונים נוספו בהצלחה');		
		}
	})
});

//Opening the insert chef modal
$(document).on('click','#open_modal',function(){
	$('.cat_form').toggle();
});

//Function that displays all the existing chefs
function showCategories()
{
	//Displaying all existing chefs at a table
	$.post('../classes/Categories.php',{'show_categories_list':1},function(data){ 
		$('.categories').html(data);
	});
}