/*************************************
*
*
*		Add and initialize a new row
*
*
**************************************/
//Adding new row in composer
var addRow = function()
{
	var $this = $($workspace),
		html = $(htmlRow());
	
	$this.append(html);
	
	html.addColumn(12);
	
	//Edit action
	html.cprEdit();
	//Remove action function
	html.cprRemove();
	//Add action function
	html.crpRowAdjust();
}



/*************************************
*
*
*		Html row
*
*
**************************************/

//Nav action of row composer 
var htmlActionRow = function()
{
	var html = '<div class="nav-action-left">';
		html += 	'<div class="btn btn-secondary access"><span class="fa fa-bars action"></span></div>';
		html += 	'<div class="btn-group panel-action">';
		html += 		'<div class="btn btn-secondary"><span class="fa fa-arrows action"></span></div>';
		html += 		'<div class="btn btn-secondary '+extractClassSelector($cutRow)+'"><span class="fa fa-plus-circle action"></span></div>';
		html += 		'<div class="btn btn-secondary '+extractClassSelector($edit)+'"><span class="fa fa-pencil action"></span></div>';
		html += 		'<div class="btn btn-secondary '+extractClassSelector($remove)+'"><span class="fa fa-trash action"></span></div>';
		html += 	'</div>';
		html += '</div>';
	return html;
}

//Html of row composer 
var htmlRow = function()
{
	var html = '<div class="col-12 '+extractClassSelector($row)+' bg-grey-1 p-2 mb-2">';
			html += htmlActionRow();
			html += '<div class="'+extractClassSelector($formRow)+' hidden">';
				html += $('#jt_pagecomposerbundle_cprpage_row').attr('data-prototype');
			html += '</div>';
		html += '</div>';
	return html;
}





/*************************************
*
*
*		Ajuste column action in row
*
*
**************************************/
//Adjuste row
var cutRow = function()
{
	
	var $this = $(this);
	
	
	//Html input
	var input = '<button class="btn btn-secondary add-cut-row"><span>Sectionner la ligne </span><input type="text" value="" placeholder="3+6+3 (max. 12)"/></button>';
	
	//add input for cut row
	$this.parent($panelAction).append(input);
	
	//Complete input with value in composer
	$this.parents($panelAction).find('.add-cut-row input').cutRowValue();
	
	//Focus on new input
	$this.parents($panelAction).find('.add-cut-row input').focus();
		
	//remove .add on mouseleave
	$this.parents($panelAction).on('mouseleave',function()
		{
			
			var val = $(this).find('.add-cut-row').find('input').val(),
				nodeRow = $(this).closest($row);
				
			if(val) nodeRow.updateCutRow(val);
			
			$(this).find('.add-cut-row').remove();
		});
}

//Search default value of column size
$.fn.cutRowValue = function()
{
	var $this = $(this),
		nodeRow = $this.closest($row),
		value = '',
		i = 0;
		
	nodeRow.children($column).each(function()
	{
		var $that = $(this),
			size = $that.attr('class').match(/col-md-(\d{1,2})/)[1];
		
		if(i>0) value += '+';
		
		value += size;
		
		i++;
	});
	
	$this.val(value);
}

//Update view of row
$.fn.updateCutRow = function(val)
{
	var node = $(this),
		tabBlockSize = val.replace(/[ ]/g,'').split('+'),
		nodeColumn = node.children($column),
		countColumn = nodeColumn.length,
		sizeTotal = 0,
		i = 0;
		
	nodeColumn.each(function()
	{
		var $this = $(this),
			size = parseInt(tabBlockSize[i]);
			
		if(!isNaN(size) && size > 0 && size < 13)
		{
			$this.changeColumnSize(size);
			$this.find('[id$=_colMd]').val(size);
		}
		
		i++;
		
	});
	
	//If we've more size than block
	for(i;i<tabBlockSize.length;i++)
	{
		size = tabBlockSize[i];
		
		if(!isNaN(size) && size > 0 && size < 13)
		{
			node.addColumn(size);
		}
	}
}

/*************************************
*
*
*		Remove row
*
*
**************************************/
var removeRow = function()
{
	var node = $(this).closest($row);
	
	if(node.parent($block).is($block))
	{
		node.parent($block).remove();
	}
	else
	{
		node.remove();
	}
}

$($addRow).on('click',addRow);
