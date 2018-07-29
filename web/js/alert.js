var $alertContainer = '.jt-alert-container',
	$alertOne = '.jt-alert',
	$alertClose = '.jt-alert-close',
	zIndex = 0;

var jtAlert = function(message,notice = 'light')
{
	
	if(!$($alertContainer).is($alertContainer)) $('body').append(alertContainerHtml);
	
	var container = $($alertContainer),
		newAlert = $(alertHtml(notice));
	
	newAlert.css('top','-700px');
	newAlert.css('z-index',zIndex+=10);
	newAlert.find($alertClose).on('click', function(){$(this).closest($alertOne).jtAlertClose();});
	
	container.prepend(newAlert.append(message));
	newAlert.animate({top:0},250);
	
	setTimeout(function(){newAlert.jtAlertClose();},10000);
};

$.fn.jtAlertClose = function()
{
	$(this).animate({top:'-'+($(this).height()+100)+'px'},750,function(){
		$(this).remove();
		if(!$($alertOne).is($alertOne))$($alertContainer).remove();
	});
}

/******************************
*
*	Html of alert
*
******************************/
var alertHtml = function(notice)
{
	var html = '';
	
	html += '<div class="jt-alert text-muted jt-alert-'+notice+'">';
	html += '<div class="close jt-alert-close"><span aria-hidden="true">&times;</span></div>';
	html += '</div>';
	
	return html;
}
var alertContainerHtml = function()
{
	var html = '';
	
	html += '<div class="jt-alert-container">';
	html += '</div>';
	
	return html;
}
