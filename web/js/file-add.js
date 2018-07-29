// On added files
uploader.bind('FilesAdded', function(up,files){
	
	var fileList = $('#'+$upList);
	
	$.each(files, function(k,v){
		var id = v.id;
		fileList.addFileList(v);
		fileInProgress[id] = { 'time' : 0};
		
		counter[id] = setInterval(function(){fileInProgress[id].time++;},1000);		
	});
	
	$('#'+$upDrop).removeClass($upDropHover);
	
	uploader.start();
	uploader.refresh();
	
});

// Add new file in upload-list
var htmlNewFile = function(file)
{
	var id = file.id,
		name = file.name,
		size = plupload.formatSize(file.size),
		html = '';
	
	html += '<div id="'+id+'" class="'+$upFile+'">';
	
	html += name+' <span class="'+$upSize+'">('+size+')</span> <span class="'+$upTimeContainer+' hidden">| Temps écoulé : <span class="'+$upTime+'">0</span> | Temps restant : <span class="'+$upRemainTime+'">0</span></span>';
	html += '<div class="col-12">'+addProgressBar()+'</div>';
	html += '<div class="col-1 '+$upRemove+'"><span aria-hidden="true" class="btn '+$upRemove+'" data-id="'+id+'">&times;</span></div>';
	
	html += '</div>';
	
	return html;
}

var addProgressBar = function()
{
	var html = '';
	
	html += '<progress class="upload-progress" value="0" max="100">';
	html += '</progress>';
	
	return html;
}

$.fn.addFileList = function(file)
{
	var $this = $(this),
		html = $(htmlNewFile(file))
		
	$this.prepend(html);
	
	html.find('.'+$upRemove).on('click', function(){
		var id = $(this).attr('data-id');
		uploader.removeFile(file);
		$('#'+id).remove();
		clearInterval(counter[id]);
		delete fileInProgress[id];
	});
}