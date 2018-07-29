var $btnNavAction = '.pagination .page-item';

var initNav = function()
{
	$($btnNavAction).initNavBtn();
};

$.fn.initNavBtn = function()
{
	$(this).on('click',function(e){
		e.preventDefault();
				
		var $this = $(this),
			target = $this.attr('data-target');
		
		$($btnNavAction).removeClass('active');
		$this.addClass('active');
		
		$(target).show().siblings().not('.nav').hide();
	});
}