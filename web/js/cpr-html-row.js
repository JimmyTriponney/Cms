var cprHtmlRow = function()
{
	var html;
	
	html = '<div class="col-12 '+extractSelector($row)+' bg-grey-1 p-2 mb-2">';
	
	//Action menu
	html += '<div class="nav-action-left">';
	html += 	'<div class="btn btn-secondary access"><span class="fa fa-bars action"></span></div>';
	html += 	'<div class="btn-group panel-action">';
	html += 		'<div class="btn btn-secondary"><span class="fa fa-arrows action"></span></div>';
	html += 		'<div class="btn btn-secondary '+extractSelector($cutRow)+'"><span class="fa fa-th-large action"></span></div>';
	html += 		'<div class="btn btn-secondary '+extractSelector($edit)+'"><span class="fa fa-pencil action"></span></div>';
	html += 		'<div class="btn btn-secondary remove-row"><span class="fa fa-trash action"></span></div>';
	html += 	'</div>';
	html += '</div>';
	
	html += '<div class="'+extractClassSelector($formHide)+' hidden">';
	html += $($protoRow).attr('data-prototype');
	html += '</div>';
	
	html += '</div>';
	
	return html;
}