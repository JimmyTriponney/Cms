/*******************
*
*	Add action to event
*
*******************/
//Adjust row

//Remove
$($row+','+$column+','+$block).each(function()
{
	var $this = $(this);
	
	//Action for row
	if($this.is($row))
	{
		$this.crpRowAdjust();//Adjust
	}
	//Action for column
	else if($this.is($column))
	{
		$this.cprAddBlock();//Add new block
	}
	
	//Action for all
	$this.cprRemove();//Remove
	$this.cprEdit();//Edit
});