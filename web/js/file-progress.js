uploader.bind('UploadProgress', function(up, file){
	$('#'+file.id).find('.'+$upPorgress).attr('value',file.percent);
});