$.fn.resetImgColor = function()
{
	var $this = $(this),
		input = $this.closest('.form-group').find('input'),
		target = input.attr('data-target-input'),
		targetInput = $('[id$='+target);
		
	//Reset input
	input.val('#000000');
	targetInput.val('');
};