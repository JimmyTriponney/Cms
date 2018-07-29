/*******************
	MASTER
****************/
var $seoInfo = '#seo-info',
	$seoTitle = '#seo-title',
	$seoDescription = '#seo-description',
	$seoGeneralInfo = ".seo-content",
	$seoKeywordOpti = '.seo-keyword-opti',
	$seoDescriptionOpti = '.seo-description-opti',
	$seoTitleInfo = '.seo-info-title',
	$seoTitleInPage = '.seo-title-in-page-opti';


	
	
/********************
	Show panel SEO
******************/
$($btnShowSeo).on('click',function(e)
{
	e.preventDefault();
	
	//Recover DOM of panel SEO
	var htmlPanel = $($($panelSeo).html());
	
	//Initialization menu
	htmlPanel.find('[data-target]').removeClass('active');
	htmlPanel.find('[data-target=".seo-param-panel"]').addClass('active');
	htmlPanel.find('.seo-param-panel').show();
	htmlPanel.find('.seo-assist-panel').hide();
	
	//Initialization of panel
	htmlPanel.find('input,select,textarea').each(function(){
		var $that = $(this),
			targetInp = $that.attr('data-target-input'),
			val = $('[id$=_'+targetInp+']').val();
		
		$that.val(val);
	});
	
	//Refresh auto tag
	refreshTag();
	
	//Modify panel info
	htmlPanel.refreshGeneralSeoContent();
	htmlPanel.refreshGeneralSeoKeyword();
	htmlPanel.refreshGeneralSeoTitle();
	htmlPanel.refreshSeoTitle();
	htmlPanel.refreshSeoDescription();
	
	//Add html and show modal
	$($modalBody).html(htmlPanel);
	
	//On change panel
	htmlPanel.find('input,textarea,select').each(function()
	{
		$(this).on('change',function(){
			var $this = $(this),
				val = $this.val(),
				targetInp = $this.attr('data-target-input');
						
			$( '[id$='+targetInp+']' ).val(val);
		});
	});
	
	
	
	
	$($modal).modal('show');
});

/*******************
	Refresh general
	SEO panel
*****************/
//Top word in content
$.fn.refreshGeneralSeoContent = function()
{
	var $this = $(this),//Full panel
		block = $this.find('.seo-info-content');

	block.append(refreshStats());	
}



var refreshStats = function(tabWord = false, topWord = false, totalWord = false)
{
	var totalWord = totalWord === false ? countWordContent() : totalWord,
		tabWord = tabWord === false ? wordPresent() : tabWord,
		topWord = topWord === false ? topWordContent(tabWord) : topWord,
		bloc = $('<ul class="list-group"></ul>');
		
	//Show all percent of word top 10
	$.each(topWord,function(k,word){
		var percent = Math.round((tabWord[word]/totalWord)*100),
			html = '<li class="list-group-item d-flex justify-content-between align-items-center">';
			
		html += word;
		html += '<span class="badge badge-primary badge-pill">'+(isNaN(percent)?0:percent)+' %</span>';
		html += '</div>';
		
		bloc.append(html);
	});
	
	return bloc;
}

$.fn.refreshSeoDescription = function()
{
	var $this = $(this),//Full panel
		val = $('textarea[id$="_description"]').val(),
		totalWord = val.split(' '),
		tabWord = wordPresent(val),
		topWord = topWordContent(tabWord),
		block = $this.find($seoDescriptionOpti+' .info');
		
	block.html(refreshStats(tabWord,topWord,totalWord));	
}





//Top word in content
$.fn.refreshGeneralSeoKeyword = function()
{
	var $this = $(this),//Full panel
		totalWord = countWordContent(),
		tabWord = wordPresent(),
		tabWordVerify = $('textarea[id$=keyword]').val().split(','),
		block = $this.find($seoKeywordOpti+' .info');
		
	block.prepend(refreshStats(tabWord,tabWordVerify,totalWord));	
}

/*****************
	SEO info title
*****************/
$.fn.refreshGeneralSeoTitle = function()
{
	var $this = $(this),
		blockTitle = $block+'[data-block-name=Header]',
		title = 'textarea[id$=contentText]',
		levelTitle = 'input[id$=otherInfo]',
		blocContent = $this.find($seoTitle+' '+$seoTitleInPage+' .info'),
				
		countTotalContent = countWordContent();
		content = '',
		countWord = 0,
		level = [],
		tabWordTitle = {},
		topWordTitle = [],
		orgTitle = {};
	
	//Check all header block	
	$(blockTitle).each(function()
	{
		var $this = $(this),
			valTitle = $this.find(title).val(),
			lev = $this.find(levelTitle).val();
		
		content += ' '+valTitle;
		
		level.push({ 
			title : valTitle,
			level : lev });	
	});
	
	//Recover all word in content
	countWord = countWordContent(content);
	tabWordTitle = wordPresent(content);
	tabWord = wordPresent();
	topWordTitle = topWordContent(tabWordTitle);
	
	//Save title with HX
	for(var i = 1; i <= 6 ; i++)
	{
		$.each(level,function(k,v)
		{
			
			if(v.level == i)
			{
				if(!orgTitle[i])orgTitle[i] = [];
				orgTitle[i].push(v.title);
			}
		});
	}
		
	//Show bloc title
	var bloc = $('<ul class="float-left col-12 col-md-6 list-group"></ul>');
	$.each(orgTitle,function(level,tabTitle)
	{
		$.each(tabTitle,function(k,title)
		{
			var html = '<li class="list-group-item d-flex justify-content-between align-items-center">';
			html += 'H'+level+' : '+title;
			html += '</div>';
			bloc.append(html);
		});
	});
	blocContent.append(bloc);
	
	blocContent.append(refreshStats(tabWordTitle,topWordTitle,countWord));
}
