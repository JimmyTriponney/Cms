class Modal
{
	constructor(data)
	{
		this.idModal = data && data.idModal ? data.idModal : '#modal';
		this.idContent = data && data.idContent ? data.idContent : '#modal-body';
		this.idTitle = data && data.idTitle ? data.idTitle : '#modal-title';
		this.title = data && data.title ? data.title : '';
		this.content = data && data.content ? data.content : '';		
	}
	
	setTitle(title)
	{
		this.title = title;
		$(this.idModal+' '+this.idTitle).html(title);
	}
	
	setContent(content)
	{
		this.content = content;
		$(this.idModal+' '+this.idContent).html(content);
	}
	
	show()
	{
		$(this.idModal).modal('show');
	}
	
	hide()
	{
		$(this.idModal).modal('hide');
	}
};



