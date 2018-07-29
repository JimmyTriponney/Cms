$(cssFormWorkspace).find(cssFieldBlock).each(function()
{
	
	var $this = $(this),
		edit = $this.find('.edit'),
		remove = $this.find('.remove');
		
	//Remove
	remove.on('click',removeField);
	//Edit
	edit.on('click',editField);
	
});