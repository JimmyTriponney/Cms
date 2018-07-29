$(document).ajaxStart(function()
{
	var loader = '<div class="jiti-loader"><div class="loader">Patienter ...</div></div>';
	
	loader = $(loader);	
	
	$('body').append(loader);
	
	loader.css(
		{
			'background-color' : 'rgba(0,0,0,0.7)',
			'text-align' : 'center',
			'color' : '#fff',
			'font-weight' : 'bold',
			'font-size' : '1.5em',
			'opacity' : '0',
			'position' : 'fixed',
			'z-index' : '100000000',
			'top' : '0',
			'left' : '0',
			'width' : '100%',
			'height' : '100%'
		});
		
	loader.children().css(
		{
			'position' : 'fixed',
			'top' : '45%',
			'left' : '0',
			'width' : '100%',
			'text-align' : 'center'
		});
	
				
	loader.animate(
		{
			'opacity' : '1'
		},0500);
	
	$('body>*:not(.jiti-loader)').css(
		{
			'transition' : 'filter 0.3s',
			'filter' : 'blur(2px)'
		});
	
});


$(document).ajaxComplete(function()
{
	var loaderClass = '.jiti-loader';
	$(loaderClass).animate({'opacity':'0'},0500);
	$(loaderClass).remove();
	$('body>*:not('+loaderClass+')').css(
		{
			'filter' : 'blur(0px)'
		});
});