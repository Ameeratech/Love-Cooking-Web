showComments();

//If we want to delete an existing user
$(document).on('click','.delete_comment',function(){
	$.post('../classes/Comments.php',{'delete_comment':$(this).attr('data-id')},function(data){
		if(data=='fail')//If the user couldn't be deleted
		{
			alert("Couldn't delete a comment");
		}
		else
		{
			showComments();
		}
	});
});

$(document).on('click','.update_comment,.edit_content',function(){
	editable=$(this).closest('tr').find('.edit_content');
	editable.focus();
	
	editable.html(editable.attr('data-content'));
});

$(document).on('focusout','.edit_content',function(){	
		editable=$(this);
	$.post('../classes/Comments.php',{'update_comment':editable.attr('data-id'),'content':editable.html()},function(data){
		if(data=='success')
		{
			alert('Comment contents was updated successfully');
			editable.attr('data-content',editable.html());
			editable.html(editable.html().substring(0,10)+"...");				
		}
		else
		{
			alert('Comment contents can not be updated');
			showComments();
		}
	});
});


//Function that shows all the existing users
function showComments()
{
$.post('../classes/Comments.php',{'show_comments':1},function(data){
	$('.comments').html(data);
});
}