//$('form').append( $('[id$=_response]').attr('data-prototype') );
var countRep = 0;

var showPanelResponse = function(e)
{
	e.preventDefault();
	
	$curEdit = undefined;
	
	var html = $($('#formRespones').html());
	
	//Add new response
	html.find('#add-response').on('click',addFormResponse);
	
	html.find('input,textare').each(onChangeRepParam);
	
	$($modalTitle).text('Paramétrage des retours');
	$($modalBody).html(html);
	
	initRepParam();
	
	$($modal).modal('show');
}

var addFormResponse = function()
{
	countRep++;
	
	var html = $('<div class="form-response-'+countRep+'"><div class="row"><div class="col-12 text-center"><h3>Reponse '+countRep+'</h3><div class="btn btn-secondary remove"><span class="fa fa-trash action"></span></div></div></div>'+$('#form-response-theme').html()+'</div>'),
		proto = $('<div id="form-response-'+countRep+'">'+$('[id$=_response]').attr('data-prototype')+'</div>');
	
	proto.find('[name]').each(changeName);
	
	html.find('input,textarea').on('change',onChangeRepParam);
	
	$(cssResponseContainer).append(proto);
	
	html.find('.remove').on('click',removeResponse);
	
	$($modalBody).find('.container-fluid').append(html);
	
	$($modalBody).find('.pagination').addItemNavRep();
}

var removeResponse = function(e)
{
	e.preventDefault();
	
	var $this = $(this),
		panel = $this.closest('[class*=form-response-]'),
		selector = panel.attr('class');
	
	panel.closest('.container-fluid').find('[data-target=".'+selector+'"]').remove();
	$(cssResponseContainer).find('#'+selector).remove();
	panel.remove();
}

var onChangeRepParam = function()
{
	var $this = $(this),
		targetInput = $this.attr('data-target-input'),
		val = $this.val();
			
	$curEdit.find('[id$='+targetInput+']').val(val);
}

var initRepParam = function()
{
	$(cssResponseContainer).find('[id*=form-response-]').each(function()
	{
		var $that = $(this),
			id = $that.attr('id'),
			index = id.replace(/[a-z-]*/i,''),
			html = $('<div class="'+id+'"><div class="row"><div class="col-12 text-center"><h3>Reponse '+index+'</h3><div class="btn btn-secondary remove"><span class="fa fa-trash action"></span></div></div></div>'+$('#form-response-theme').html()+'</div>'),
			countRep = index >= countRep ? index+1 : countRep;

		$curEdit = $(cssResponseContainer).find('#'+id);
		
		html.initRepParam();
		
		html.find('input,textarea').on('change',onChangeRepParam);
		
		html.find('.remove').on('click',removeResponse);
		
		//Add form param in param panel
		$($modalBody).find('.container-fluid').append(html);
		//Add button in nav
		$($modalBody).find('.pagination').addItemNavRep(id);
				
	});
}

var changeName = function()
{
	var $this = $(this),
		name = $this.attr('name'),
		newName = name.replace(/(\[\d*\]|\[__name__\])/,'['+countRep+']');
	$this.attr('name',newName);
}

$.fn.initRepParam = function()
{
	var $this = $(this);
	$this.find('input,textarea').each(function()
	{
		var $that = $(this),
			targetInput = $that.attr('data-target-input'),
			val = $curEdit.find('[id$=_'+targetInput+']').val();
		
		$that.val(val);
	});
}

$.fn.addItemNavRep = function(id)
{
	var $this = $(this),
		html = $('<li class="page-item" data-edit="'+(id != undefined ? '#'+id : '#form-response-'+countRep )+'" data-target="'+(id != undefined ? '.'+id : '.form-response-'+countRep )+'"><a class="page-link" href="#">Reponse '+(id != undefined ? id.replace(/^[a-z-]*/i,'') : countRep )+'</a></li>');
	
	$this.children().last().before(html);
	html.on('click',function()
	{
		var $this = $(this),
			edit = $this.attr('data-edit'),
			targetEdit = $(cssResponseContainer).find(edit);
			
		$curEdit = targetEdit;
	});
	
	html.initNavBtn();
	
	html.trigger('click');
}

$(cssFormBtnAddRep).on('click',showPanelResponse);