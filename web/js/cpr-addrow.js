//Adding new row in composer
$.fn.cprAddRow = function()
{
	var $this = $(this);
	
	$this.on('click', cprAddRow);
}

var cprAddRow = function()
{
	var $this = $(this),
		html = $(cprHtmlRow());
	
	// Add action
	html.cprAddColumn();
	
	// Add DOM
	$this.closest($workspace).append(html);
}