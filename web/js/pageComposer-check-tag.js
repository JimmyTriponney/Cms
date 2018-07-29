//Recoverall word in the workspace
var refreshTag = function()
{
	$('input[id$=tagAuto]').val(topWordContent().join());
}

refreshTag();