/*****************
	CONDITION ACTION
*****************/
$(modal).on('hide.bs.modal',function()
{
	var condGBlock = $(this).find('.cpr-condition-group'),
		action = condGBlock.prev('.cpr-action-condition').find('#action').val();
	
	if($curEdit != undefined)
	{
	
		$curEdit.find(cssHideConditions).html('');
		
		condGBlock.find('.condition-group').each(function()
		{
			var $this = $(this),
				etat = false,
				newConditionGroup = $('<div class="field-condition-group">'+$curEdit.find('[id$=_fieldConditionGroup]').attr('data-prototype')+'</div>');
				
			$this.find('.condition').each(function()
			{
				
				var $that = $(this),
					slugTarget = $that.find('#slug-target').val(),
					condition = $that.find('#condition').val(),
					value = $that.find('#value').val();
					
				if(slugTarget  && condition)
				{
					var newCondition = $('<div class="field-condition">'+newConditionGroup.find('[id$=_conditions]').attr('data-prototype')+'</div>');
					
					etat = true;
					
					newCondition.find('[id$=_action]').val(action);
					newCondition.find('[id$=_fieldTarget]').val(slugTarget);
					newCondition.find('[id$=_actionCondition]').val(condition);
					newCondition.find('[id$=_value]').val(value);
					
					newConditionGroup.append(newCondition);
				}
			});
			
			if(etat) $curEdit.find(cssHideConditions).append(newConditionGroup);
		
		});
	}
});




var recoverSlugTarget = function()
{
	var html = '';
	
	$(cssFormWorkspace).find(cssHideForm).each(function()
	{
		var slug = $(this).find('input[id$=_slug]').val(),
			name = $(this).find('input[id$=_name]').val();
		
		html += '<option value="'+slug+'">'+name+'</option>';
	});
	
	return html;
}




var htmlCondition = function(slugTarget,condition,value)
{
	var slugTarget = slugTarget != undefined ? slugTarget : '',
		condition = condition != undefined ? condition : '',
		value = value != undefined ? value : '',
		html = '';
		
	html += '<div class="col-12 condition my-2">'
				+'<div class="row">'
					+'<div class="form-group col-3 p-0">'
						+'<label for="slug-target">Champ surveillé : </lable>'
						+'<select id="slug-target" class="form-control">'
							+recoverSlugTarget()
						+'</select>'
					+'</div>'
				
					+'<div class="form-group col-3 p-0">'
						+'<label for="condition">Condition : </lable>'
						+'<select id="condition" class="form-control">'
							+'<option value="equal">Egal</option>'
							+'<option value="start">Commence</option>'
							+'<option value="end">Fini</option>'
							+'<option value="sup">Supérieur</option>'
							+'<option value="inf">Inférieur</option>'
							+'<option value="like">Contien</option>'
							+'<option value="regex">Expression</option>'
						+'</select>'
					+'</div>'
				
					+'<div class="form-group col-3 p-0">'
						+'<label for="value">Valeur : </lable>'
						+'<input type="text" id="value" class="form-control">'
					+'</div>'
				
					+'<div class="form-group col-3 text-center p-4">'
						+'<div class="btn btn-secondary remove"><span class="fa fa-trash action"></span></div>'
					+'</div>'
				
									
				+'</div>'
					
			+'</div>';
			
	html = $(html);
	
	html.find('#slug-target').val(slugTarget);
	html.find('#condition').val(condition);
	html.find('#value').val(value);
	
	html.find('.remove').on('click',function()
	{
		$(this).closest('.condition').remove();
	});
	
	return html;	
}

var addCondition = function()
{
	//Add in panel view
	var $this = $(this),
		condBlock = $this.closest('.condition-group');
		
	condBlock.append(htmlCondition());
	
}