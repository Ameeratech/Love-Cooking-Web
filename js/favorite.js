setInterval(function(){
	//Getting the favorite reipes for the current user
	$.post('../../classes/Recipe.php',{'show_favorite':1},function(data){ 
		$('.liked').html(data);
	});
},500);	