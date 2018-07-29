function fileNewHtml(url,title,alt,id,name,size)
{
	var html = '';
	
	html += '<div class="file-container col-4 col-md-2" data-id-file="'+id+'">';
	html +=				'<div class="row action">';
	html +=					'<span class="fa fa-trash-o trash btn"></span>';
	html +=				'</div>';
	html +=				'<div class="row">';
	html +=					'<figure class="file-preview col-10 m-auto">';
	html +=						'<img src="'+url+'" class="file-view" alt="'+alt+'" title="'+title+'"/>';
	html +=						'</figure>';
	html +=					'</div>';
	html +=					'<div class="row">';
	html +=						'<div class="col-11 m-auto">';
	html +=							'<p>'
	html +=								name+' ('+size+' o)';
	html +=							'</p>';
	html +=						'</div>';
	html +=					'</div>';
	html +=				'</div>';
	
	return html;
}