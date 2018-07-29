/*************************
	PLUGIN COMPOSER
*************************/
$.fn.JiTiComposer = function(data = null)
{var $this = $(this);

	//Init current block edit var
	if(curEdit == undefined)var curEdit;
	
	//Init workspace id
	if(data && data.workspace)var workspace = data.workspace;
	else if($this.attr('id'))var workspace = '#'+$this.attr('id');
	else var workspace = '#jiti-workspace';
	
	//Init incremental
	var idTinyMCE = 0;
	
	//Init tab for verif
	var isDrag = {};
	
	//Recover all var system
	var 
		prefixeBlock = data && data.prefixeBlock ? data.prefixeBlock : 'jiti-',
		prefixeForm = data && data.prefixeForm ? data.prefixeForm : 'jiti-form-',
		
		btnAddDefault = data && data.btnAddDefault ? data.btnAddDefault : '.jiti-default-block',
		
		attrPanelEdit = data && data.attrPanelEdit ? data.attrPanelEdit : 'jiti-panel',
		attrPanelInpTarget = data && data.attrPanelInpTarget ? data.attrPanelInpTarget : 'jiti-target-input',
		panelRowInput = data && data.panelRowInput ? data.panelRowInput : '.jiti-row-group',
		panelTitle = data && data.panelTitle ? data.panelTitle : 'JiTi paramétrage',
		targetPanelTitle = data && data.targetPanelTitle ? data.targetPanelTitle : '#jiti-panel-title',
		targetPanel = data && data.targetPanel ? data.targetPanel : '#jiti-panel-body',
		showPanel = data && data.showPanel ? data.showPanel : function(){$('#jiti-modal').modal('show');},
		
		block = data && data.block ? data.block : {},
		
		tinyMCE = data && data.tinyMCE ? data.tinyMCE : false,
		tinySelector = data && data.tinySelector ? data.tinySelector : 'textarea',
		
		onAddStart = data && data.event.onAddStart ? data.event.onAddStart : function(){},
		onAdd = data && data.event.onAdd ? data.event.onAdd : function(){},
		onAddEnd = data && data.event.onAddEnd ? data.event.onAddEnd : function(){},
		
		onEditStart = data && data.event.onEditStart ? data.event.onEditStart : function(){},
		onEdit = data && data.event.onEdit ? data.event.onEdit : function(){},
		onEditEnd = data && data.event.onEditEnd ? data.event.onEditEnd : function(){},
		
		onRefreshStart = data && data.event.onRefreshStart ? data.event.onRefreshStart : function(){},
		onRefreshLoop = data && data.event.onRefreshLoop ? data.event.onRefreshLoop : function(){},
		
		onRefreshForm = data && data.event.onRefreshForm ? data.event.onRefreshForm : function(){},
		
		onRemove = data && data.event.onRemove ? data.event.onRemove : function(){},
	end;
	
	//Initialisation workspace
	$(function()
	{
		composerInit();
	});
	
	//Initialisation btn for blocks workspace
	$(btnAddDefault).on('click',addBlock);
	//On submit form
	$(workspace).closest('form').on('submit',submitForm);
	
	
	
	
	
	/***************************
		INIT WORKSPACE FUNCTION
	***************************/
	function composerInit()
	{
		var $this = $(workspace);
		
		var blockOptions = block.default,
			htmlBlock = $(blockOptions['html']($(workspace))),
			nameBlock = htmlBlock.extractNameBlockInClass(),
			blocksWorkspace = $this.find('.'+prefixeBlock+''+nameBlock);
		
		blocksWorkspace.actionInit('default');
		
	}
	
	$.fn.actionInit = function(name)
	{
		var $this = $(this);
		
		$this.each(function()
		{
			//récupération du name
			var $those = $(this),
				thoseName = $those.extractNameBlockInClass(),
				blockOptions = block[thoseName];
					
			//Ajout des actions sur le bloc
			$those.addAction(name,$those);
				
			if(blockOptions)
			{
				var htmlBlock = $(blockOptions['html']($those)),
					nameBlock = htmlBlock.extractNameBlockInClass(),
					blockInBlock = $those.find('.'+prefixeBlock+''+nameBlock);
			
				blockInBlock.actionInit(thoseName);
			}
		})
	}
	
	$.fn.addAction = function(name,container)
	{
		var $this = $(this),
			action = block[name] != undefined 
					&& block[name].action != undefined ? block[name].action : true;
		
		if( action )
		{
			//Initialisation action
			var add = block[name] != undefined
						&& block[name].add != undefined ? block[name].add : '.jiti-add',
				edit = block[name] != undefined
						&& block[name].edit != undefined ? block[name].edit : '.jiti-edit',
				remove = block[name] != undefined
						&& block[name].remove != undefined ? block[name].remove : '.jiti-remove';
				
			//DRAGGABLE
			if(block[name].drag)
			{
				var container = container != undefined ? container : $(workspace);
				$this.jitiDraggable( container , name);
			}
			//ADD
			$this.find(add).first().on('click',addBlock);
			//EDIT
			$this.find(edit).first().on('click',editBlock);
			//REMOVE
			$this.find(remove).first().on('click',removeBlock);
		}
	}
	/***************************
		END INIT WORKSPACE FUNCTION
	***************************/
	
	
	
	
	
	
	
	
	
	/***************************
		ADD BLOCK FUNCTION
	***************************/
	function addBlock()
	{
		var $this = $(this),
			container = $this.closest('[class*='+prefixeBlock+']');
		
		curEdit = container;
		
		onAddStart($this);
		
		if(container.is('[class*='+prefixeBlock+']'))
		{
			var html = container.extractNameBlockInClass(),
				newBlock = block[html] != undefined
							&& block[html].html != undefined ? block[html].html(container) : '';
			
			newBlock = $(newBlock);
			var newBlockB = onAdd(newBlock,html,$this);
			newBlock = newBlockB ? newBlockB : newBlock;
			
			if(newBlock) container.append(newBlock);
		}
		else
		{
			var html = 'default',
				newBlock = block[html] != undefined
							&& block[html].html != undefined ? block[html].html($(workspace)) : '';
			
			newBlock = $(newBlock);
			var newBlockB = onAdd(newBlock,html,$this);
			newBlock = newBlockB ? newBlockB : newBlock;
			
			if(newBlock) $(workspace).append(newBlock);
		}
		
		newBlock.addAction(html,container);
		
		var newBlockC = onAddEnd(newBlock,html,$this);
		newBlock = newBlockC ? newBlockC : newBlock;
		
		curEdit = newBlock;
	}
	/******************************
		END ADD BLOCK FUNCTION
	******************************/
	
	
	
	
	
	
	
	
	
	/*******************
		EDIT FUNCTION
	******************/
	function editBlock()
		{
			var $this = $(this),
				dataPanel = $this.attr(attrPanelEdit),
				block = $this.closest('[class*='+prefixeBlock+']'),
				panel = $($('#'+dataPanel).html()),
				panelB = onEditStart($this, panel, block);
			
			panel = panelB ? panelB : panel;
			
			curEdit = block;
			
			panel.refreshPanel();
			
			var panelC = onEdit($this, panel, block);
			panel = panelC ? panelC : panel;
			
			$(targetPanelTitle).text(panelTitle);
			$(targetPanel).html(panel);
			
			showPanel(panel);
			
			onEditEnd($this, panel, block);
			
			if(tinyMCE)
			{
				var selector = tinySelector;
				
				panel.find(selector).each(function()
				{
					var tinyId = 'jiti-tiny-'+idTinyMCE++,
						$this = $(this);
					
					$this.attr('id',tinyId);
					initTinyMCE('#'+tinyId);
				});
			}
		}
		
		
	/** Refresh edit panel
	
		initialize fields form of panel
		in block form with value
	
	********************/
	$.fn.refreshPanel = function()
	{
		var $this = $(this),
			form = curEdit.find('[class*='+prefixeForm+']').last(),
			formB = onRefreshStart($this,form);
		
		form = formB ? formB : form;
		
		$this.find('['+attrPanelInpTarget+']').each(function()
		{
			var $that = $(this),
				target = $that.attr(attrPanelInpTarget),
				inp = form.find('[id$='+target+']'),
				val = inp.val();
						
			if( inp.is('[id$='+target+']') )
			{
				var valB = onRefreshLoop($that,inp,val);
				
				val = valB ? valB : val;
				
				if(inp.is('select'))
					$that.html(inp.html());
					
				$that.val(val);
				
				$that.on('change',refreshForm);
			}
			else 
			{
				$that.closest(panelRowInput).remove();
			}
		});
	}
	
	/** Refresh hidden form
	
		Refresh value in form of block
		from panel in 'change'
	
	*********************/
	function refreshForm()
	{
		var $this = $(this),
			form = curEdit.find('[class*='+prefixeForm+']').last(),
			target = $this.attr(attrPanelInpTarget),
			inp = form.find('[id$='+target+']'),
			val = $this.val(),
			valB = onRefreshForm($this, inp, val);
			
		val = valB ? valB : val;
			
		inp.val(val);
	}
	/*************************
		END EDIT FUNCTION
	*************************/

	
	
	
	
	
	
	
	
	
	
	
	
	/*************************
		SUBMIT FUNCTION
	*************************/
	function submitForm(e)
	{
		//e.preventDefault();
		
		$(workspace).reOrderName();
		
	}
	
	//Rename field with order
	$.fn.reOrderName = function()
	{
		var $this = $(this),
			count = {};
		
		$this.find('[class*='+prefixeBlock+']').each(function()
		{
			var $that = $(this),
				nameBlock = $that.extractNameBlockInClass();
				
			if(count[nameBlock] == undefined) count[nameBlock] = 0;
			else count[nameBlock]++;
			
			$that.find('.'+prefixeForm+''+nameBlock).find('[name]').each(function()
			{
				var $those = $(this),
					name = $those.attr('name'),
					match = name.match(/(([\d\w]+)|(\[[\d\w]+\]\[(__name__|\d+)\])|(\[[\d\w]+\]))/gi),
					matchLen = match.length,
					newName;
				
				for(var i = 0; i < matchLen; i++)
				{
					if(!i) newName = match[i];
					else if(i == matchLen-1) newName += match[i];
					else
					{	
						var x =0;
						for(c in count)
						{
							if(x == i-1) newName += match[i].replace(/\[(__name__|\d*)\]/,'['+count[c]+']');
							x++;
						}
					}
				}
				
				$those.attr('name',newName);
			});
		});
	}
	/*************************
		END SUBMIT FUNCTION
	*************************/
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/**************************
		TINYMCE FUNCTION
	**************************/
	function initTinyMCE(selector)
	{
		var $this = $(this),
			baseSel;
		
		if(tinyMCE)
		{
			var tinyOption = tinyMCE !== true && tinyMCE ? tinyMCE :
				{
				  selector: tinySelector,//$selector,  // change this value according to your HTML
				  branding : false,
				  menubar: false,
				  height : 300,
				  plugins: [
					'advlist autolink lists link charmap print preview anchor textcolor',
					'insertdatetime table hr contextmenu paste code help'
				  ],
				  toolbar1 : "newdocument | alignleft aligncenter alignright alignjustify | bullist numlist | link unlink | table",
				  toolbar2 : "hr | backcolor textcolor bold italic underline strikethrough subscript superscript | formatselect fontselect fontsizeselect",
				  init_instance_callback: function (editor) {
					editor.on('change', function (e) {
						var val = specialsHtmlFilter( $(this)[0].getContent() ),
							input = $('#'+e.target.id);
							
						input.val(val);
						input.trigger('change');
					});
				  }
				};
			
			baseSel = tinyOption.selector;
			tinyOption.selector = selector;
							
			tinymce.init(tinyOption);
			
			tinyOption.selector = baseSel;
		}
	};
	/**************************
		END TINYMCE FUNCTION
	**************************/
	
	
	
	
	/**************************
		DRAGGABLE FUNCTION
	***************************/
	$.fn.jitiDraggable = function(container,nameContainer)
	{	
		
		var $this = $(this),
			name = nameContainer,
			nameBloc = $this.extractNameBlockInClass(),
			drag = block[name].drag ? true : false;
		
		if(drag)
		{			
			var
				dropZone = block[name].drop ? block[name].drop : ( name == 'default' ? workspace : '.'+prefixeBlock+''+name ),
				dragHandle = block[name].drag !== true ? block[name].drag : false,
				blocClass = '.'+prefixeBlock+''+nameBloc,
				dragOption = block[name].dragOption && block[name].dragOption !== true ? block[name].dragOption :
					{
						connectToSortable : workspace,//dropZone,
						scope : 'item',//name,
						cursor: 'move',
						zIndex : 10000,
						distance : 5,
						opacity : 0.7,
						revert: 'invalid'
					},
				dropOption = block[name].dropOption && block[name].dropOption !== true ? block[name].dragOption : 
					{
						accept : '.cpr-item'//blocClass
					};
				
			if(dragHandle) dragOption.handle = '.jiti-drag';//dragHandle;
						
			
			//if(!isDrag[blocClass])
			//{
				/*console.log('name : ',name);
				console.log('blocClass : ',blocClass);
				console.log('nameBloc : ',nameBloc);
				console.log('dragHandle : ',dragHandle);
				console.log('dropZone : ',dropZone);*/
					
				isDrag[blocClass] = true;
				//console.log(isDrag);
			
				$(blocClass).draggable(
					{
						connectToSortable : dropZone,//dropZone,
						scope : nameBloc,//name,
						cursor: 'move',
						zIndex : 10000,
						distance : 5,
						opacity : 0.7,
						handle: dragHandle,
						revert: 'invalid'
					}
				);
				$(dropZone).droppable({accept : blocClass});//dropOption);//dropZone*/
				$(dropZone).sortable(
					{
						handle : dragHandle,//dragHandle,
						conectWith : blocClass,//blocClass//.cpr-item',//dropZone,
						items : '>'+blocClass//.cpr-item'//+blocClass
					}
				);//dropZone
			//}
		
		
		
		
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			/*
			$('.cpr-item').draggable(
				{
					connectToSortable : workspace,//dropZone,
					scope : 'item',//name,
					cursor: 'move',
					zIndex : 10000,
					distance : 5,
					opacity : 0.7,
					handle: '.jiti-drag',
					revert: 'invalid'
				}
			);
			$(workspace).droppable({accept : '.cpr-item'});//dropOption);//dropZone
			$(workspace).sortable(
				{
					handle : '.jiti-drag',//dragHandle,
					conectWith : '.cpr-item',//blocClass//.cpr-item',//dropZone,
					items : '>.cpr-item'//.cpr-item'//+blocClass
				});//dropZone
		
		
		
		
		$('.cpr-dropdown').draggable(
				{
					connectToSortable : '.cpr-item',//workspace,//dropZone,
					scope : 'dropdown',//name,
					cursor: 'move',
					zIndex : 10000,
					distance : 5,
					opacity : 0.7,
					handle: '.jiti-drag',
					revert: 'invalid'
				}
			);
			$('.cpr-item').droppable({accept : '.cpr-dropdown'});//dropOption);//dropZone
			$('.cpr-item').sortable(
				{
					handle : '.jiti-drag',//dragHandle,
					conectWith : '.cpr-dropdown',//blocClass//.cpr-item',//dropZone,
					items : '>.cpr-dropdown'//.cpr-item'//+blocClass
				});//dropZone
				
				
			
			
			$('.cpr-subdropdown').draggable(
				{
					connectToSortable : '.cpr-dropdown',//workspace,//dropZone,
					scope : 'subdropdown',//name,
					cursor: 'move',
					zIndex : 10000,
					distance : 5,
					opacity : 0.7,
					handle: '.jiti-drag',
					revert: 'invalid'
				}
			);
			$('.cpr-dropdown').droppable({accept : '.cpr-subdropdown'});//dropOption);//dropZone
			$('.cpr-dropdown').sortable(
				{
					handle : '.jiti-drag',//dragHandle,
					conectWith : '.cpr-subdropdown',//blocClass//.cpr-item',//dropZone,
					items : '>.cpr-subdropdown'//.cpr-item'//+blocClass
				});//dropZone
			*/
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		}
	}
	/**************************
		END DRAGGABLE FUNCTION
	***************************/
	
	
	
	
	
	/**********************
		REMOVE FUNCTION
	**********************/
	function removeBlock()
	{
		var $this = $(this),
			container = $this.closest('[class*='+prefixeBlock+']'),
			containerB = onRemove($this,container);
		
		container = containerB ? containerB : container;
		
		container.remove();
	} 
	/*************************
		END REMOVE FUNCTION
	*************************/
	
	
	
	
	
	
	
	/*************************
		LIBRARY FUNCTION
	*************************/
	function specialsHtmlFilter(str)
	{
		return str.replace(/&lt;\/?(script|link|meta|title)[\w\d\s\/ _.,="'-]{0,}&gt;/ig,' ');
	}
	
	$.fn.extractNameBlockInClass = function()
	{
		var $this = $(this),
			block = $this;
		
		if(!block.is('[class*='+prefixeBlock+']'))block = block.closest('[class*='+prefixeBlock+']');
		
		if(!block.is('[class*='+prefixeBlock+']')) return 'default';
		
		var css = block.attr('class'),
			src = css.search(prefixeBlock),
			cssBlock = css.substr(src).replace(/[ ].*./,''),
			name = cssBlock.replace(prefixeBlock,'');
			
		return name;
		
	}
	/*************************
		END LIBRARY FUNCTION
	*************************/

}


