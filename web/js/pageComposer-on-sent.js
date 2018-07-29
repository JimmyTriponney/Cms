var tst = '';

$($formulaire).on('submit',function(e)
{
	//e.preventDefault();
	
	var $this = $(this),//This formulaire
		rowCount = 0,
		order = 0;
	
	//Refresh auto tag
	refreshTag();
	
	order = $this.find($workspace).updateOrderRow(order);
	
	$('#jt_pagecomposerbundle_cprpage_countElem').val(order);
	
	
});

$.fn.updateOrderBlock = function(rowCount,columnCount,order)
{
	var blockCount = -1;
	//console.log('block find in column',$(this).children($block).length);
	if($(this).children($block).length)
	{
		//Modify all block from this column
		$(this).children($block).each(function()
		{
			blockCount++;
			
			tst += '>block';
			//console.log(tst,order);
			var block = $(this);
			
			//Update name input with blockCount
			block.children($formBlock).find('input,select,textarea').each(function()
			{
				var field = $(this),
					name = field.attr('name').replace(/\[row\]\[(__name__|\d*)\]\[column\]\[(__name__|\d*)\]\[block\]\[(__name__|\d*)\]/,'[row]['+rowCount+'][column]['+columnCount+'][block]['+blockCount+']');
				field.attr('name',name);
			});
			//Update order_page
			block.children($formBlock).find('input[id$=pageOrder]').val(order++);
						
			order = block.updateOrderRow(order,rowCount);
		});
	}
	return order;
}

$.fn.updateOrderColumn = function(rowCount,order)
{
	var columnCount = -1;
	//console.log('column find from row',$(this).children($column).length);
	if($(this).children($column).length)
	{
		//Modify all column from this row
		$(this).children($column).each(function()
		{
			columnCount++;
			tst += '>column';
			//console.log(tst,order);
			var column = $(this);
			
			//Update name input with columnCount
			column.children($formColumn).find('input,select,textarea').each(function()
			{
				var field = $(this),
					name = field.attr('name').replace(/\[row\]\[(__name__|\d*)\]\[column\]\[(__name__|\d*)\]/,'[row]['+rowCount+'][column]['+columnCount+']');
				field.attr('name',name);
			});
			
			//Update order_page
			column.children($formColumn).find('input[id$=pageOrder]').val(order++);
			
			order = column.updateOrderBlock(rowCount,columnCount,order);
			
			
		});
	}
	return order;
}

$.fn.updateOrderRow = function(order,rowCount)
{
	var $this = $(this),
		rowCount = rowCount == undefined ? -1 : rowCount;
	
	if($this.children($row).length > 0)
	{
		//Modify all row in this form
		$(this).children($row).each(function()
		{
			rowCount++;
			
			//console.log(tst,order);
			var row = $(this);
			
			
			//Update name with rowCount
			row.children($formRow).find('input,select,textarea').each(function()
			{
				var field = $(this),
					name = field.attr('name').replace(/\[row\]\[(__name__|\d*)\]/,'[row]['+rowCount+']');
				field.attr('name',name);
				
			});
			
			
			//Update order_page
			row.children($formRow).find('input[id$=pageOrder]').val(order++);
			
			
			
			order = row.updateOrderColumn(rowCount,order);
			
		});
	}
	return order;
}