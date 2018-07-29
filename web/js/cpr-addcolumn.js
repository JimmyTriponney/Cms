//Adding new row in composer
$.fn.cprAddColumn = function(size)
{
	var $this = $(this),//Html of row
		html = cprHtmlColumn($this);
	
	// Init DOM
	$(html).addClass('col-md'+(size==undefined?12:size));
	
	// Add action
	
	
	// Add DOM
	$this.append(html);
}