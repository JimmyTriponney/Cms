class BlockGalery
{	
	constructor(data)
	{
		this.cssAddBlock = data && data.cssAddBlock ? data.cssAddBlock : 'add-action';
		this.cssBlock = data && data.cssBlock ? data.cssBlock : 'cpr-galery-block';
		this.cssTitle = data && data.cssTitle ? data.cssTitle : 'galery-title';
		this.cssContent = data && data.cssContent ? data.cssContent : 'galery-content';
		
		this.cssForm = data && data.cssForm ? data.cssForm : '';
		this.url = data && data.url ? data.url : '';
		this.title = data && data.title ? data.title : '';
		this.content = data && data.content ? data.content : '';
		this.target = data && data.target ? data.target : '';
		
		this.param = this.htmlParam();
		this.contentForm = $('#'+this.cssForm).attr('data-prototype');
		
		this.addBlock();
	}
	
	//Create html block
	html()
	{
		return '<div class="'+this.cssBlock+' col-4 col-md-3">'
					+'<div class="hide-form hidden">'
						+this.contentForm
					+'</div>'
					+'<figure>'
						+'<img src="'+this.url+'" width="100%" alt="toto"/>'
						+'<figcaption class="text-center">'
							+'<p class="'+this.cssTitle+'">'+this.title+'</p>'
							+'<p class="'+this.cssContent+'">'+this.content+'</p>'
						+'</figcaption>'
					+'</figure>'
				+'</div>';
	}
	//Create html param panel
	htmlParam()
	{
		return '<div class="container-fluid p-5">'
					+'<div class="row">'
						+'<div class="col-12">'
							+'<div class="form-group">'
								+'<label for="title">Titre</label>'
								+'<input class="form-control" id="title"/>'
							+'</div>'
						+'</div>'
					+'</div>'
					+'<div class="row">'
						+'<div class="col-12">'
							+'<div class="form-group">'
								+'<label for="description">Text</label>'
								+'<textarea class="form-control" id="description"></textarea>'
							+'</div>'
						+'</div>'
					+'</div>'
				+'</div>';
	}
	
	//Block action
	click()
	{
		this.block.on('click',this.callParam);
	}
	
	//Action function
	//CLICK
	callParam()
	{
		console.log(this);
		var modal = new Modal(
					{
						title : 'Paramètrage du média',
						content : this.param
					});
		modal.show();
	}
	
	//Generate new block
	getNewBlock()
	{
		this.block = $(this.html());
		this.click();
		
		return this.block;
	}
	
	//Initialize the add block button
	addBlock()
	{
		$('.'+this.cssAddBlock).on('click',function()
		{
			$(this).before(block.getNewBlock());
			
		});
	}
};

