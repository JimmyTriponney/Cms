$.fn.cprRemove = function()
{
	var $this = $(this);
	$this.find($remove).on('click', cprRemove);
}

var cprRemove = function()
{
	var $this = $(this),
		block = $this.closest($row+','+$column+','+$block);
		
	block.remove();
	
}