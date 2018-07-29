$.fn.crpRowAdjust = function()
{
	var $this = $(this);
	
	$this.find($cutRow).on('click', cprRowAdjust);
}

/*************************************
*
*
*		Ajuste column action in row
*
*
**************************************/
//Adjuste row
var cprRowAdjust = function()
{
	var $this = $(this);
	$this.closest('[class*=cpr-]').addColumn(12);
	//Html input
	//var input = '<button class="btn btn-secondary add-cut-row"><span>Sectionner la ligne </span><input type="text" value="" placeholder="3+6+3 (max. 12)"/></button>';
	
	//add input for cut row
	//$this.parent($panelAction).append(input);
	
	//Complete input with value in composer
	//$this.parents($panelAction).find('.add-cut-row input').cutRowValue();
	
	//Focus on new input
	//$this.parents($panelAction).find('.add-cut-row input').focus();
		
	//remove .add on mouseleave
	/*$this.parents($panelAction).on('mouseleave',function()
		{
			
			var val = $(this).find('.add-cut-row').find('input').val(),
				nodeRow = $(this).closest($row);
				
			if(val) nodeRow.updateCutRow(val);
			
			$(this).find('.add-cut-row').remove();
		});*/
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