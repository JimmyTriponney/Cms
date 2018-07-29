var specialsHtmlFilter = function(str)
{
	return str.replace(/&lt;\/?(script|link|meta|title)[\w\d\s\/ _.,="'-]{0,}&gt;/ig,' ');
}

var addTinyMCE = function($node = 'textarea')
{
	return tinymce.init({
	  selector: $node,  // change this value according to your HTML
	  branding : false,
	  menubar: false,
	  height : 300,
	  plugins: [
		'advlist autolink lists link charmap print preview anchor textcolor',
		'insertdatetime table hr contextmenu paste code help'
	  ],
	  toolbar1 : "newdocument | alignleft aligncenter alignright alignjustify | bullist numlist | link unlink | table",
	  toolbar2 : "hr | backcolor forecolor bold italic underline strikethrough subscript superscript | formatselect fontselect fontsizeselect",
	  init_instance_callback: function (editor) {
		editor.on('change', function (e) {
			var val = specialsHtmlFilter( $(this)[0].getContent() ),
				targetInp = $('#'+e.target.id).attr('data-target-input');
			
			console.log(val);
					
			$curHideForm.find( '[id$='+targetInp+']' ).val(val);
		});
	  }
	});
};
