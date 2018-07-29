$.fn.cprAddBlock = function()
{
	var $this = $(this);

	$this.find($addBlock).on('click',cprAddBlock);
}

//Adding block
var cprAddBlock = function()
{
	var newBlock = $(htmlBlock()),
		htmlBlocksList = $($($blockContainer).html());
	
	$(this).closest('[class*=cpr]').append(newBlock);
	
	$($modalTitle).html('Sélection de bloque');
	$($modalBody).html( htmlBlocksList );
	$($modal).modal('show');
	
	//Edit action
	//$($workspace+' '+$row+':last-child '+$editBlock).on('click',edit);
	newBlock.cprEdit();
	newBlock.cprRemove();
	htmlBlocksList.find( $blockSelect ).on('click',function(){$(this).addSelectedBlock(newBlock)});
}

