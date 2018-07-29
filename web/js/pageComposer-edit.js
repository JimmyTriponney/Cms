/**************************************
*
*	On click for edit row
*
**************************************/
$.fn.cprEdit = function()
{
	var $this = $(this);
	
	$this.find($edit).on('click', cprEdit);
}

var cprEdit = function()
{	
	var $this = $(this),
		typeBlock = $this.closest('[class*=cpr]').attr('class').match(/cpr-(\w*)/)[1],
		$panel = typeBlock === 'block' ? $($($panelOptions).html()) : $($($panelDesign).html()),
		classForm;
	
	$curEdit = $this.closest('[class*=cpr]');
	
	switch(typeBlock)
	{
		case 'row':
			classForm = $formRow;
			$panel = $($($panelDesign).html());
			break;
		case 'column':
			classForm = $formColumn;
			$panel = $($($panelOptions).html());
			$panel.find($panelContent).remove();
			$panel.find('.page-item[data-target="'+$panelContent+'"]').remove();
			$panel.find('.page-item').removeClass('active');
			$panel.find('.page-item[data-target="'+$panelDesign+'"]').addClass('active');
			$panel.find($panelResponsive).hide();
			$panel.find($panelDesign).show();
			break;
		case 'block':
			classForm = $formBlock;
			$panel = $($($panelOptions).html());
			$panel.find($panelResponsive).remove();
			$panel.find('.page-item[data-target="'+$panelResponsive+'"]').remove();
			$panel.find('.page-item').removeClass('active');
			$panel.find('.page-item[data-target="'+$panelContent+'"]').addClass('active');
			$panel.find($panelDesign).hide();
			$panel.find($panelContent).show();
			$panel.find($panelContent).initPanelContent(typeBlock);
			break;
		default:
			classForm = $formRow;
	}
	
	$curHideForm = $curEdit.find(classForm);
	
	// Edit select
	$curEdit.find(classForm).find('select').each(function(){
		var $this = $(this),
			targetId = '#'+$this.attr('id').match(/([a-z]*)$/i)[1],
			html = $this.html();
			
		$panel.find(targetId).html(html);
	});
	
	// Initialize all value
	$panel.initPanelOption(classForm);
	
	$($modalTitle).html('Option');
	$($modalBody).html($panel);
	$($modal).modal('show');
	
	initNav();
	
	// Initialize function function
	$panel.find('input,select,textarea').on('change',function(){$(this).onChangeOptionPanel(classForm)});
	$panel.find($addImg).on('click',function(){$(this).viewLibrary();});
	$panel.find($reset).on('click',function(){$(this).resetImgColor();});
	
	$panel.find('.tinymce').each(function(){
		var tinyMCEId = 'tinyMCE'+(tinyMCECount++);
		$(this).attr('id',tinyMCEId);
		addTinyMCE('#'+tinyMCEId);
	});
	
		
}



/**************************************
*
*	On change option in options panel
*
**************************************/
$.fn.onChangeOptionPanel = function(classForm)
{
	var $this = $(this),
		val = $this.val(),
		targetInp = $this.attr('data-target-input'),
		classeForm;
		
	if( targetInp.search(/^col/) > -1 )
	{
		var cssSize = targetInp.toLowerCase().replace(/^[a-z]{3}/,''),
			css = $curEdit.attr('class');
		
		if(cssSize == 'xs') var newCss = css.replace(/col-\d{1,2}/,'');
		else if(cssSize == 'sm') var newCss = css.replace(/col-sm-\d{1,2}/,'');
		else if(cssSize == 'md') var newCss = css.replace(/col-md-\d{1,2}/,'');
		else if(cssSize == 'lg') var newCss = css.replace(/col-lg-\d{1,2}/,'');
		
		$curEdit.attr('class',newCss);
		
		if(cssSize == 'xs') $curEdit.addClass('col-'+val);
		else $curEdit.addClass('col-'+cssSize+'-'+val);
	}
		
	$curEdit.find(classForm).find( '[id$='+targetInp+']' ).val(val);
}




/**************************************
*
*	Initialize panel design with hidden input
*
**************************************/
$.fn.initPanelOption = function(classForm)
{
	var $this = $(this);
		
	$this.find('input,select,textarea').each(function(){
		var $that = $(this),
			targetInp = $that.attr('data-target-input'),
			val = $curHideForm.find('[id$='+targetInp+']').val();
		
		$that.val(val);
	});
}

/**************************************
*
*	Initilization panel content
*
***************************************/
$.fn.initPanelContent = function()
{
	var $this = $(this),//Panel DOM
		name = $curEdit.attr('data-block-name'),
		typeContent = $curEdit.attr('data-block-content');
		
	$this.find('[id^=for-]').hide();
	$this.find('#for-all').show();//Fields for all block
	$this.find('#for-'+typeContent).show();//Fields for this block
	
	if(name = 'header')$this.find('#for-header').show();//Fields for this block
}
