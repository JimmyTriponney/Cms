$('#'+$upDrop).bind({
	dragover : function(e)
		{
			$(this).addClass($upDropHover);
		},
	dragleave : function(e)
		{
			$(this).removeClass($upDropHover);
		}
});
