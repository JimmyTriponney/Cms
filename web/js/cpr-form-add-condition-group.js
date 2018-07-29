/*****************
	CONDITION ACTION
*****************/


var htmlConditionGroup = function()
{
	var html = '';
	
	html += '<div class="row condition-group my-2 border border-muted rounded pl-4">'
				+'<div class="col-12 p-4">'
					+'<div class="btn btn-secondary remove float-right"><span class="fa fa-trash action"></span></div>'
					+'<button class="btn btn-secondary float-right" id="add-condition">+ Condition (ET)</button>'
				+'</div>'
			+'</div>';
			
	html = $(html);
	
	html.find('#add-condition').on('click',addCondition);
	
	html.find('.remove').on('click',function()
	{
		$(this).closest('.condition-group').remove();
	});
	
	return html;	
}

var addConditionGroup = function()
{
	//Add in panel view
	var $this = $(this),
		panel = $this.closest('.container-fluid'),
		optBlock = panel.find('.cpr-condition-group');
		
	optBlock.append(htmlConditionGroup());
	
}