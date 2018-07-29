$(cssformFormulaire).on('submit',function(e)
{
	//e.preventDefault();
	
	var $this = $(this),
		count = 0;
	
	$this.find(cssFieldBlock).each(function()
	{
		var $that = $(this),
			countGroupCond = 0,
			countOption = 0;
		
		//Rename input field
		$that.find('[name]').each(function()
		{
				var $those = $(this),
					name = $those.attr('name'),
					newName = name.replace(/\[fields\](\[\d*\]|\[__name__\])/i,'[fields]['+count+']');
					
				$those.attr('name',newName);
		});
		
		
		//Rename input condition group	
		$that.find('.field-condition-group').each(function()
		{
			var $gc = $(this),
				countCond = 0;
			
			//Rename input condition group
			$gc.find('[name]').each(function()
			{
				var $inp = $(this),
					name = $inp.attr('name'),
					newName = name.replace(/\[fieldConditionGroup\](\[\d*\]|\[__name__\])/i,'[fieldConditionGroup]['+countGroupCond+']');
				
				$inp.attr('name',newName);
			});
			
			//Rename input condition
			$gc.find('.field-condition').each(function()
			{
				var $c = $(this);
				
				$c.find('[name]').each(function()
				{
					var $inp = $(this),
						name = $inp.attr('name'),
						newName = name.replace(/\[conditions\](\[\d*\]|\[__name__\])/i,'[conditions]['+countCond+']');
					
					$inp.attr('name',newName);
				});
					
				countCond++;
			});
			
			countGroupCond++;
		});
		
		
		//Rename input option	
		$that.find('.option').each(function()
		{
			var $o = $(this);
			
			//Rename input option
			$o.find('[name]').each(function()
			{
				var $inp = $(this),
					name = $inp.attr('name'),
					newName = name.replace(/\[fieldOptions\](\[\d*\]|\[__name__\])/i,'[fieldOptions]['+countOption+']');
				
				$inp.attr('name',newName);
			});
						
			countOption++;
		});
		
		$that.find('input[id$=_formOrder]').val(count);
		
		count++;
	});
	
	$this.find('input[id$=_countElem]').val(count);
	
});