$($btnSaveFileModif).on('click',function(e){saveFileModif(e);});

function saveFileModif(e)
{
	e.preventDefault();
	
	var url = $($fileFormModif).attr('action');
	
	$.post(url,$($fileFormModif).serialize())
		.done(function(data){successSaveFileModif(data)});
	
	
}

function successSaveFileModif(data)
{
	var json = $.parseJSON(data);
	
	if(json.ok)
	{
		$(curFileModif).find($fileView).attr('alt',json.alt);
		$(curFileModif).find($fileView).attr('title',json.title);
	}
	
	hideFileModif();
	$($inpFileId).val('');
	$($inpFileTitle).val('');
	$($inpFileAlt).val('');
	
	jtAlert(json.message,!json.ok ? 'danger' : 'success');
}