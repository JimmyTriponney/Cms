var removeField = function()
{
	$(this).closest('[class*=cpr-]').remove();
}
	
var addTypeSelected = function()
{
	var $this = $(this),
		name = $this.attr('data-name'),
		type = $this.attr('data-type'),
		id = $this.attr('data-id'),
		icon = $this.attr('data-icon');
	
	$curEdit.attr('data-name',name);
	$curEdit.attr('data-type',type);
	$curEdit.find('.cpr-field-icon').addClass(icon);
	$curEdit.find('select[id$=fieldType]').val(id);
		
	$(modal).modal('hide');
}
	
var showFieldList = function()
{
	var $panel = $($(cssFieldList).html());
	$($modalBody).html($panel);
	$($modalTitle).text('Choix de champ');
	$($modal).modal('show');
	return $panel;
}

var addBlock = function()
{
	var html = '<div class="col-12 col-md-12 cpr-form-field">'
					+'<div class="nav-action-left">'
						+'<div class="btn btn-secondary access"><span class="fa fa-bars action"></span></div>'
						+'<div class="btn-group panel-action">'
							+'<div class="btn btn-secondary"><span class="fa fa-arrows action"></span></div>'
							+'<div class="btn btn-secondary edit"><span class="fa fa-pencil action"></span></div>'
							+'<div class="btn btn-secondary remove"><span class="fa fa-trash action"></span></div>'							
						+'</div>'
					+'</div>'
					+'<div class="row">'
						+'<div class="form-hidden col-12 hidden">'
							+$('#jt_formcomposerbundle_cprform_fields').attr('data-prototype')
							+'<div class="field-options">'
							+'</div>'
							+'<div class="field-conditions">'
							+'</div>'
						+'</div>'
					+'</div>'
					+'<div class="row">'
						+'<div class="col-12 text-center p-3">'
							+'<span class="cpr-field-icon"></span> '
							+'<span class="field-name-view">Nouveau</span>'
						+'</div>'
					+'</div>'
				+'</div>';
				
	$curEdit = $(html);
	
	//Remove
	$curEdit.find('.remove').on('click',removeField);
	//Edit
	$curEdit.find('.edit').on('click',editField);
	
	$(cssFormWorkspace).append($curEdit);
	
	var panel = showFieldList();
	
	
	panel.find(cssFieldType).on('click',addTypeSelected);
}


//Add new field
$(cssFormBtnAdd).on('click',addBlock);


