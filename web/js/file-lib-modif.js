$($fileContainer).on('click',function(){$(this).fileModif();});
$($formModifContainer).find('.close').on('click',function(){hideFileModif()});

$.fn.fileModif = function()
{
	var $this = $(this),
		id = $this.attr('data-id-file'),
		title = $this.find($fileView).attr('title'),
		alt = $this.find($fileView).attr('alt');
	
	curFileModif = $this;
	
	$($fileContainer).removeClass('file-active');
	$this.addClass('file-active');
	$($inpFileId).val(id);
	$($inpFileTitle).val(title);
	$($inpFileAlt).val(alt);
	
	showFileModif();
}

function showFileModif()
{
	$($formModifContainer).css('display','block');
	$($formModifContainer).animate({'opacity' : 1},300);
}

function hideFileModif()
{
	$($formModifContainer).animate({'opacity' : 0,'display':'none'},300,
		function(){
			$(this).css('display','none');
		});
	$($fileContainer).removeClass('file-active');
}