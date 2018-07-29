// On uploaded files
uploader.bind('FileUploaded', function(up,files,res){
	
	var json = $.parseJSON(res.response),
		stat = json.ok,
		id = files.id,
		time = fileInProgress[id].time,
		message = json.message;
	
	if(stat)
	{
		var newFileHtml = $(fileNewHtml(json.url,json.title,json.alt,json.id,json.name,json.size));
		jtAlert(message,'success');
		$($libraryContainer).prepend(newFileHtml);
		newFileHtml.on('click',function(){$(this).fileModif();});
	}
	else
	{
		jtAlert(message,'danger');
		$('#'+id).remove();		
	}
	
	if(fileInProgress[id] != undefined)
	{
		clearInterval(counter[id]);
		delete fileInProgress[id];
	}
	
	$('#'+id+' .'+$upTimeContainer).remove();
	$('#'+id+' .'+$upRemove).remove();
	$('#'+$upDrop).removeClass($upDropHover);
	
	uploader.refresh();
	
});

// On uploaded chunk
uploader.bind('ChunkUploaded', function(up,file,res){
	
	var json = $.parseJSON(res.response),
		id = file.id,
		stat = json.ok,
		chunk = json.chunk,
		chunks = json.chunks,
		time = fileInProgress[id].time,
		remainingTime = (time/chunk+1)*(chunks-(chunk+1)),
		message = json.message;
	
	$('#'+id+' .'+$upTimeContainer).removeClass('hidden');
	$('#'+id+' .'+$upTime).html( viewTime(time) );
	$('#'+id+' .'+$upRemainTime).html( viewTime(remainingTime) );
	
	if(!stat)
	{
		uploader.removeFile(file);
		jtAlert(message,'danger');
		$('#'+id).remove();		
	}
	
	if(!stat && fileInProgress[id] != undefined)
	{
		clearInterval(counter[id]);
		delete fileInProgress[id];
	}	
});

var viewTime = function(time)
{
	var sec = Math.floor(time%60),
		sec = sec < 10 ? '0'+sec : sec;
		min = Math.floor(((time-sec)/60)%60),
		hour = Math.floor(((time-sec)/60)/60);
	
	return (hour>0?hour+':':'')+(min>0?min+':':'')+(time<60?time+' sec':sec );
}

