//Recipe managment page
$(document).on('click','.delete_button',function(){
	$.post('../classes/Recipe.php',{'delete_recipe':$(this).attr('data-id')},function(data){			
		showRecipes();
	});
});

//Recipe form
$(document).on('click','#open_modal,.update_button ',function(){				
	$.post('../classes/Recipe.php',{'show_recipe_form':1,'recipe_id':($(this).attr("class")=='update_button btn btn-primary' ? $(this).attr('data-id') :'0')},function(data){	
		$('.recipe_form').show('slow');
		$('.recipes_inner').html(data);
	});
});

//Adding a new recipe
$(document).on('click','.manage_recipe',function(){
	$('.load_recipe').show('slow');
	$.post('../classes/Recipe.php',{'manage_recipe':1,'recipe_name':$('#recipe_name').val(),'recipe_ingredients':$('#recipe_ingredients').val(),
	'recipe_preparation':$('#recipe_preparation').val(),'recipe_equipment':$('#recipe_equipment').val(),'recipe_time':$('#recipe_time').val(),
	'recipe_people_quantity':$('#people_quantity').val(),'recipe_description':$('#recipe_descr').val(),'recipe_video':$('#recipe_video').val(),
	'recipe_type':$('#recipe_type option:selected').val(),'kitchen_type':$('#kitchen_type option:selected').val(),
	'recipe_image':$('#recipe_image').val(),'chef':$('#chef option:selected').val(),'level':$('#level option:selected').val(),'recipe_id':$(this).attr('data-id')},function(data){			
		$('.load_recipe').hide('slow');
		if(data=='success')
		{
			$('.recipe_form').hide('slow');
			showRecipes();
		}
		else
		{
			$('.recipeErr').html(data);
		}				
	});
});					

showRecipes();			

function showRecipes()
{		
	$.post('../classes/Recipe.php',{'show_recipes':1},function(data){			
		$('.recipes').html(data);
	});
}