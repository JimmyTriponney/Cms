var inpImg;

$.fn.viewLibrary = function()
{
	var $this = $(this);
	
	inpImg = $(this).closest('.form-group').find('input');
	
	// Recover library
	$.get(pathLibrary)
		.done(function(data)
		{
			$($modalOnBody).html('');
			
			$($modalOnTitle).text('Librairie');
			$($modalOnBody).html(data);
			$($modalOn).modal('show');
			
			// Init img
			$($fileContainer+'[data-id-file='+(inpImg.val()?inpImg.val():'0')+']').addClass('file-active');
			
			$($fileContainer).on('click',function(){
				$(this).addFileIdOptionPanel();
			});
		});
}

$.fn.addFileIdOptionPanel = function()
{
	var $this = $(this),
		val = $this.attr('data-id-file');
	
	inpImg.val(val);
	inpImg.trigger('change');
	
	$($modalOn).modal('hide');
}