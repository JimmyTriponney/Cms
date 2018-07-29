var cprHtmlColumn = function(curRow)
{
	var html = '',
		$this = curRow;
		
	html += '<div class="mb-2 '+extractSelector($column)+' bg-white p-2">';
	
	
	html += '<div class="nav-action-right">';
	html += 	'<div class="btn btn-secondary access"><span class="fa fa-bars action"></span></div>';
	html += 	'<div class="btn-group panel-action">';
	html += 		'<div class="btn btn-secondary '+extractSelector($remove)+'"><span class="fa fa-trash action"></span></div>';
	html += 		'<div class="btn btn-secondary '+extractSelector($addBlock)+'"><span class="fa fa-plus-circle action"></span></div>';
	html += 		'<div class="btn btn-secondary '+extractSelector($edit)+'"><span class="fa fa-pencil action"></span></div>';
	html += 		'<div class="btn btn-secondary"><span class="fa fa-arrows action"></span></div>';
	html += 	'</div>';
	html += '</div>';
	
	
	
	html += 	'<div class="'+extractSelector($formHide)+' hidden">';
	html += 	$this.children($formHide).find($protoColumn).attr('data-prototype');
	html += 	'</div>';
		
	html += '</div>';
	
	return html;
}