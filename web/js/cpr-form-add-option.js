/*****************
	OPTION ACTION
*****************/
$(modal).on('hide.bs.modal',function()
{
	var optBlock = $(this).find('.cpr-option');
	
	
	if($curEdit != undefined)
	{
		$curEdit.find(cssHideOptions).html('');
		
		optBlock.find('.option').each(function()
		{
			var $this = $(this),
				newOption = $($curEdit.find('[id$=_fieldOptions]').attr('data-prototype')),
				label = $this.find('.option-label').val(),
				value = $this.find('.option-value').val();
			
			if(label && value)
			{
				newOption.addClass('option');
				newOption.find('input[id$=_optLabel]').val(label);
				newOption.find('input[id$=_optValue]').val(value);
				
				$curEdit.find(cssHideForm).find(cssHideOptions).append(newOption);
			}
		});
	}
});

var htmlOption = function(label,value)
{
	var label = label != undefined ? label : '',
		value = value != undefined ? value : '',
		html = '';
	
	html += '<div class="row option">'
				+'<div class="col-5 form-group">'
					+'<label>Libellé : </label>'
					+'<input type="text" class="form-control option-label" value="'+label+'" />'
				+'</div>'
				+'<div class="col-5 form-group">'
					+'<label>Valeur : </label>'
					+'<input type="text" class="form-control option-value" value="'+value+'" />'
				+'</div>'
				+'<div class="col-2 form-group">'
					+'<div class="btn btn-secondary remove"><span class="fa fa-trash action"></span></div>'	
				+'</div>'
			+'</div>';
			
	html = $(html);
	
	html.find('.remove').on('click',function()
	{
		$(this).closest('.option').remove();
	});
	
	return html;	
}

var addOptionParam = function()
{
	//Add in panel view
	var $this = $(this),
		panel = $this.closest('.container-fluid'),
		optBlock = panel.find('.cpr-option');
		
	optBlock.append(htmlOption());
	
}