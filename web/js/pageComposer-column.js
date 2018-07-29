//Nav action of column composer
/*************************************
*
*
*		Add and initialize a new column
*
*
**************************************/
//Adding column
$.fn.addColumn = function(size)
{
	var $this = $(this),
		html = $(htmlColumn(size));
				
	$(this).append(html);
	
	html.find('[id$=_colMd]').val(size);
	
	//Edit action
	html.cprEdit();
	//Remove action function
	html.cprRemove();
	// Add block action
	html.cprAddBlock();
	
}


/*************************************
*
*
*		Html column
*
*
**************************************/
var htmlActionColumn = function()
{
	var html = '';
		html += '<div class="nav-action-right">';
		html += 	'<div class="btn btn-secondary access"><span class="fa fa-bars action"></span></div>';
		html += 	'<div class="btn-group panel-action">';
		html += 		'<div class="btn btn-secondary '+extractClassSelector($remove)+'"><span class="fa fa-trash action"></span></div>';
		html += 		'<div class="btn btn-secondary '+extractClassSelector($addBlock)+'"><span class="fa fa-plus-circle action"></span></div>';
		html += 		'<div class="btn btn-secondary '+extractClassSelector($edit)+'"><span class="fa fa-pencil action"></span></div>';
		html += 		'<div class="btn btn-secondary"><span class="fa fa-arrows action"></span></div>';
		html += 	'</div>';
		html += '</div>';
	return html;
}

//Html of column composer
var htmlColumn = function(size)
{
	var size = size != undefined ? size : 12,
	html = '<div class="col-md-'+size+' mb-2 '+extractClassSelector($column)+' bg-white p-2">';
	
	html += 	htmlActionColumn();
	html += 	'<div class="'+extractClassSelector($formColumn)+' hidden">';
	html += 		$($row).find($formRow).find('[id$=_column]').attr('data-prototype');
	html += 	'</div>';
		
	html += '</div>';
	return html;
}





/*************************************
*
*
*		Ajust size of column 
*
*
**************************************/
//Change size column in composer $(row).changeColumnSize(size)
$.fn.changeColumnSize = function(size)
{
	var $this = $(this),
		thisClass = $this.attr('class'),
		pregColMd = /col\-md\-\d{1,2}/g,//Pattern for search the col-md-xx class in thisClass
		pregCol = /col\-\d{1,2}/g;//Pattern for search the col-md-xx class in thisClass
	
	if(thisClass != undefined)
	{
		if(match = thisClass.match(pregColMd))
		{
			$this.attr('class', thisClass.replace(match[0], 'col-md-'+size));
		}
		else if(match = thisClass.match(pregCol))
		{
			$this.attr('class', thisClass.replace(match[0], 'col-'+size));
		}
		else
		{
			$this.attr('class', thisClass+' col-'+size);
		}
	}
}



/*************************************
*
*
*		Add block action, call block list for view
*
*
**************************************/
var callBlockList = function()
{
	$(this).closest($column).addBlock();
}