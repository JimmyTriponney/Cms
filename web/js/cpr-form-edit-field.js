
var editField = function()
{
	var $this = $(this).closest('[class*=cpr-]'),
		panel = $($(cssFieldParam).html());
	
	$curEdit = $this;
	
	panel.initEditPanelParam();
	
	panel.find('input#name').on('change',initSlug);
	panel.find(cssAddOption).on('click',addOptionParam);
	panel.find(cssAddConditionGroup).on('click',addConditionGroup);
	
	$($modalTitle).text('Paramétrage de champ');
	$($modalBody).html(panel);
	$($modal).modal('show');
	
	
}

var onChangeFieldParam = function()
{
	var $this = $(this),
		targetInput = $this.attr('data-target-input'),
		val = $this.val();
		
	if($this.is('[type=radio],[type=checkbox]'))
	{
		val = $this.is(':checked') ? 1 : 0;
	}
			
	if(targetInput == 'colMd')
	{
		var css = $curEdit.attr('class'),
			newCss = css.replace(/col-md-[0-9]{1,2}/gi,'');
					
		$curEdit.attr('class',newCss);
		$curEdit.addClass('col-md-'+(val != '' ? val : 12));
	}
	
	$curEdit.find('[id$='+targetInput+']').val(val);
}

var initSlug = function()
{
	var $this = $(this),
		oriVal = $this.val()
		val = oriVal.replace(/\W/g,'');

	$curEdit.find('.field-name-view').text(oriVal);
	$($modal).find('input#slug').val(val);
	$($modal).find('input#slug').trigger('change');
}

$.fn.initEditPanelParam = function()
{
	var $this = $(this);
	
	//Init param
	$this.find('input,select,textarea,[type=checkbox]').each(function()
	{
		var $that = $(this),
			targetInput = $that.attr('data-target-input'),
			fromInput = $curEdit.find('[id$='+targetInput+']'),
			val = fromInput.val();
		
		if($that.is('[type=radio],[type=checkbox]'))
		{
			if(val > 0) $that.attr('checked',true);
			else $that.attr('checked',false);			
		}
		else
		{			
			$that.val(val);
		}
		
		$that.on('change',onChangeFieldParam);
	});
	
	//Init option value
	$curEdit.find(cssHideForm).find(cssHideOptions).find('.option').each(function()
	{
		var $that = $(this),
			label = $that.find('input[id$=optLabel]').val(),
			value = $that.find('input[id$=optValue]').val(),
			html = htmlOption(label,value);
			
		$this.find('.cpr-option').append(html);
	});
	
	//Init condition
	$curEdit.find(cssHideForm).find(cssHideConditions).find('.field-condition-group').each(function()
	{
		var $that = $(this),
			html = $(htmlConditionGroup());
			
		$that.find('.field-condition').each(function()
		{
			var $those = $(this),
				action = $those.find('[id$=_action]').val(),
				slugTarget = $those.find('[id$=_fieldTarget]').val(),
				condition = $those.find('[id$=_actionCondition]').val(),
				value = $those.find('[id$=_value]').val(),
				htmlCond = $(htmlCondition(slugTarget,condition,value));
				
			console.log($those.find('[id$=_value]'));
			console.log($those.find('[id$=_value]').val());
				
			$this.find('.cpr-action-condition').find('#action').val(action);
				
			html.append(htmlCond);
			
		});
			
		$this.find('.cpr-condition-group').append(html);
	});
	
}