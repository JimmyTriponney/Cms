/*****************
	MASTER
*******************/
var $inputTitle = 'input[id$=title]',
	$seoTitlePage = '.seo-title-opti .info';
	

/******************
	Refresh title
******************/
$.fn.refreshSeoTitle = function()
{
	var $this = $(this),
		title = $($inputTitle).val(),
		bloc = $this.find($seoTitlePage);
		
	bloc.html('"'+title+'"</br>'+(title.split('').length-1)+'/65 caractères.');
}