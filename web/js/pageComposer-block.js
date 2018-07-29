
//Adding block
$.fn.addBlock = function()
{
	var newBlock = $(htmlBlock()),
		htmlBlocksList = $($($blockContainer).html());
	
	$(this).append(newBlock);
	
	$($modalTitle).html('Sélection de bloque');
	$($modalBody).html( htmlBlocksList );
	$($modal).modal('show');
	
	//Edit action
	//$($workspace+' '+$row+':last-child '+$editBlock).on('click',edit);//Remove action function
	newBlock.cprRemove();
	//Edit action
	newBlock.cprEdit();
	//newBlock.find($editBlock).on('click',edit);
	htmlBlocksList.find( $blockSelect ).on('click',function(){$(this).addSelectedBlock(newBlock)});
}

//Nav action of block composer
var htmlActionBlock = function()
{
	var html = '<div class="nav-action">';
		html += 	'<span class="fa fa-pencil action btn-edit-block mr-2 '+extractClassSelector($edit)+'"></span>';
		html += 	'<span class="fa fa-trash action btn-trash-edit '+extractClassSelector($remove)+'"></span>';
		html += '</div>';
	return html;
}

//Html of block composer
var htmlBlock = function()
{
	var	html = '<div class="col-12 p-1 m-auto '+extractClassSelector($block)+' text-center">';
		
		html += 	htmlActionBlock();
		
		html += 	'<div class="'+extractClassSelector($formBlock)+' hidden">';
		html += 	$($column).find($formColumn).find('[id$=_block]').attr('data-prototype');
		html += 	'</div>';
		
		html += 	'<div class="row">';
		html += 		'<div class="col-12 text-center">';
		html += 			'<span class="cpr-block-icon"></span>';
		html += 		'</div>';
		html += 	'</div>';
				
		html += 	'<div class="row">';
		html += 		'<div class="col-12 text-center text-capitalize">';
		html += 			'<span class="cpr-block-title">empty</span>';
		html += 		'</div>';
		html += 	'</div>';
		
		html += 	'<div class="row">';
		html += 		'<div class="col-12 cpr-block-row">';
		html += 		'</div>';
		html += 	'</div>';
			
		html += '</div>';
		
	return html;
}







/*************************************
*
*
*		BLOCKS
*
*
**************************************/

/**************************************
*
*
*	Add selected block
*
*
****************************************/
$.fn.addSelectedBlock = function(block)
{
	var $this = $(this),
		id = $this.attr('data-block-id'),
		content = $this.attr('data-block-content'),
		name = $this.attr('data-block-name'),
		icon = $this.attr('data-block-icon'),
		title = $this.find('.block-name').text();
			
	console.log(block);
			
	if(content == 'row')
	{
		block.find( $blockTitle ).remove('');
		block.find( $blockIcon ).remove('');
		//block.children($formBlock).clone();
		block.addRowBlock();
	}
	else
	{
		block.attr('data-block-content',content);
		block.attr('data-block-name',name);
		block.find( $blockTitle ).text(title);
		block.find( $blockIcon ).addClass(icon);
	}
	
	block.find('select[id$=_block]').val(id);
	
	$($modal).modal('hide');
}

/*************************************
*
*
*		Add and initialize a new row block
*
*
**************************************/
//Adding new row in composer
$.fn.addRowBlock = function()
{
	//$(this).html('');
	
	$(this).append(htmlRow());
	
	$(this).children($row).addColumn(12);
	
	//Add action function
	$(this).children($row).find($cutRow).on('click',cutRow);
	//Remove action function
	$(this).children($row).find($removeRow).on('click',removeRow);
}