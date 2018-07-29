/***********************
	CALL AJAX HTML PAGE
***********************/
function callAjaxHtml(data)
{
	//Init var
	var
		classOnModal = data && data.classOnModal ? data.classOnModal : 'onModal',
		targetHtml = data && data.targetHtml ? data.targetHtml : '#modal-body',
		urlCall = data && data.urlCall ? data.urlCall : '',
		
		action = data && data.action ? data.action : function(){},
		
		onCall = data && data.event.onCall ? data.event.onCall : function(){},
	end;
	
	ajaxCallPage();
	
	/*******************
		CALL FUNCTION
	*******************/
	function ajaxCallPage()
	{
		$.get(urlCall,'html')
			.done(
				function(html)
				{
					var onModal = $(htmlOnModal(html));
					
					onCall(onModal);
					
					action(onModal);
					
					$(targetHtml).append(onModal);
				}
			)
	}
	
	function htmlOnModal(htmlPage)
	{
		var html = '';
		
		html += '<div class="'+classOnModal+'">'+htmlPage+'</div>';
		
		return html;
	}
	/*******************
		END CALL FUNCTION
	*******************/
	
}