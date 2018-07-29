// Adjust media to carre
var ajustMedia = function($this)
{
	var $img = $this.find('img'),
		thisW = $this.width(),
		thisH = $this.height(),
		imgW = $img.width(),
		imgH = $img.height(),
		height,width;
	
	$img.css('position','relative');
		
	if(imgW>imgH)//If more width than height
	{
		height = thisW;
		width  =  imgW * ((imgH/thisW)+1);
		$img.css('left','-'+((width-thisW)/2)+'px');
	}
	else if(imgW<imgH)//If more height than width
	{
		height = imgH * ((imgW/thisH)+1);
		width  = thisH;	
		$img.css('top','-'+((height-thisH)/2)+'px');	
	}
	
	$img.height(height);
	$img.width(width);
}

//Initialize adjust media
$($blockMedia).each(function(){ajustMedia($(this));});