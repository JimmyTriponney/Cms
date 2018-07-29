$('#toggleCheck').bootstrapToggle(
{
	on : 'Publié',
	off : 'Non publier',
	onstyle : 'success',
	offstyle : 'warning'
});
$('#toggleCheck').change(function() {
  var $this = $(this),
	  checked = $(this).prop('checked');
	  
  if(checked)
  {
	  $this.attr('checked','true');
  }
  else
  {
	  $this.attr('checked','false');
  }
});
	