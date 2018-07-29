// Extract class or id for html
var extractSelector = function(selector)
{
	return selector.match(/[a-z1-9_-]+/i);
}

/******************

	Recover max value
	in array

******************/
var sortValueObj = function(obj)
{
	var response = [];
	$.each(obj,function(k,v)
	{
		response.push(v);
	});
	return response.sort(function(a,b){return a - b;});
}

/***************

	Simplify string
	for search engin

***************/
var escapeSpecialChars = function(str)
{
	str = str
			.replace(/<+(\/|!)?[\d\w\s]*\/?>+/gi,'')
			.replace(/&nbsp;/g,' ')
			.replace(/[~_,.?+=*'"%:\/\\!-]/g,' ')
			.replace(/&egrave;/gi,'è')
			.replace(/&eacute;/gi,'é')
			.replace(/&euml;/gi,'ë')
			.replace(/&ecric;/gi,'ê')
			.replace(/&a\w*;/gi,'a')
			.replace(/&y\w*;/gi,'y')
			.replace(/&u\w*;/gi,'u')
			.replace(/&i\w*;/gi,'i')
			.replace(/&o\w*;/gi,'o')
			.replace(/&j\w*;/gi,'j')
			.replace(/&n\w*;/gi,'n')
			.replace(/&c\w*;/gi,'c')
			.toLowerCase();
	return str;
}

var strToSearchEngin = function(str)
{
	str = str
			.replace(/[éèëê]/gi,'e')
			.replace(/[àäâ]/gi,'a')
			.replace(/[ùüû]/gi,'u')
			.replace(/[ìïî]/gi,'i')
			.replace(/[ìïî]/gi,'i')
			.replace(/[ç]/gi,'c')
			.replace(/[ÿ]/gi,'y')
			.replace(/[ñ]/gi,'n')
			.replace(/[õòôö]/gi,'o')
			.replace(/<+(\/|!)?[\d\w\s]*\/?>+/gi,'')
			.replace(/&e\w*;/gi,'e')
			.replace(/&a\w*;/gi,'a')
			.replace(/&y\w*;/gi,'y')
			.replace(/&u\w*;/gi,'u')
			.replace(/&i\w*;/gi,'i')
			.replace(/&o\w*;/gi,'o')
			.replace(/&j\w*;/gi,'j')
			.replace(/&n\w*;/gi,'n')
			.replace(/&c\w*;/gi,'c')
			.replace(/&\w*;/g,' ')
			.replace(/[~_,;.?+=*'"%:\/\\!-]/g,' ')
			.replace(/[^ a-z0-9]/gi,' ')
			.replace(/\d/g,'')
			.replace(/[ ](\d|\w){1,2}[ ]/g,'')
			.toLowerCase();
	return str;
}

var delRepeatLetter = function(index,arr)
{
	if(arr[index] == arr[++index])
	{
		arr.splice(index,1);
	}
	return arr;
}

var strToSingle = function(str)
{
	return str.replace(/s$/,'');
}

var singleLetter = function(str)
{
	var matches = str.match(/\w/g),
		response = str;
		
	if(matches != null)
	{
		$.each(matches,function(k,v)
		{
			matches = delRepeatLetter(k,matches);
		});
		response = matches.join('');
	}
	
	return response;
}

var compareStr = function(str1,str2)
{
	if(str1 == str2)return true;
	if(strToSingle(str1) == strToSingle(str2))return true;
	if(singleLetter(str1) == singleLetter(str2))return true;
	if(strToSingle(singleLetter(str1)) == strToSingle(singleLetter(str2)))return true;
	return false;
}

/******************
	Function SEO
******************/
/********************
	Count word in content
*******************/
var countWordContent = function(str)
{
	var total = 0
	
	if(str == undefined)
	{
		$('input,textarea').each(function()
		{
			var val = $(this).val(),
				tabVal = escapeSpecialChars(val).split(' ');
				
			total += tabVal.length;
		});
	}
	else
	{
		var tabVal = escapeSpecialChars(str).split(' ');
			
		total += tabVal.length;
	}
	return total;
}

var wordPresent = function(str = null,sep = false)
{
	var tabWord = {};
	if(str == null)
	{
		$($workspace).find('input:not([type=number]),textarea').each(function(){
			var $this = $(this),
				val = escapeSpecialChars($this.val()),//.replace(/['"-]/gi,' '),
				tabWordVal = val.split(sep === false ? ' ' : sep);
			
			$.each(tabWordVal,function(k,wordVal){
				if(wordVal)
				{
					var wordExist = false;
					$.each(tabWord,function(wordSave,lengthWordSave)
					{
						if(compareStr(wordVal,wordSave))wordExist = wordSave;
					});
					
					if(wordExist === false)tabWord[wordVal] = 1;
					else tabWord[wordExist] += 1;
				}
			});
				
		});
	}
	else
	{
		var val = escapeSpecialChars(str);
			tabWordVal = val.split(sep === false ? ' ' : sep);
		
		$.each(tabWordVal,function(k,wordVal){
			if(wordVal)
			{
				var wordExist = false;
				$.each(tabWord,function(wordSave,lengthWordSave)
				{
					if(compareStr(wordVal,wordSave))wordExist = wordSave;
				});
				
				if(wordExist === false)tabWord[wordVal] = 1;
				else tabWord[wordExist] += 1;
			}	
		});
	}
	return tabWord;
}

var topWordContent = function(tabWord = null)
{
	if(tabWord == null)tabWord = wordPresent(); 
		
	var topWord = [],
		sortVal = sortValueObj(tabWord),
		tabWordLen = sortVal.length-1,
		wordNotTag = ['la','les','qui','de','que','quoi','quand','est','sur'];
		
	for(var i = tabWordLen; 0<=i; i--)
	{
		var lastInt = sortVal[i],
			delta = tabWordLen-i;
			
		if(delta < 10)
		{
			$.each(tabWord,function(word,len)
			{
				if(len == lastInt 
					&& word.length > 2
					&& delta > topWord.length-1 
					&& $.inArray(word,topWord) < 0
					&& $.inArray(word.toLowerCase(),wordNotTag) < 0)
				{
					topWord.push(word);
				}
			});
		}
		else
		{
			break;
		}
	}
	return topWord;
};
