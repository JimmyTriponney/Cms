// NODE
var $workspace = '.workspace',
	$formulaire = '#pageComposer_formulaire',
	$row = '.cpr-row',
	$formRow = '.form-row',
	$column = '.cpr-column',
	$editColumn = '.edit-column',
	$formColumn = '.form-column',
	$block = '.cpr-block',
	$blockIcon = '.cpr-block-icon',
	$blockTitle = '.cpr-block-title',
	$blockRow = '.cpr-block-row',
	$editBlock = '.edit-block',
	$formBlock = '.form-block',
	$addRow = '.add-row',
	$editRow = '.edit-row',
	$addBlock = '.add',
	$cutRow = '.cut-row',
	$removeColumn = '.remove-column',
	$removeRow = '.remove-row',
	$panelAction = '.panel-action',
	$selectBlock = '.select-block',
	$modal = '#modal',
	$modalOn = '#modal-on',
	$modalTitle = '#modal-title',
	$modalOnTitle = '#modal-on-title',
	$modalBody = '#modal-body',
	$modalOnBody = '#modal-on-body',
	$panelOptions = '#panel-options',
	$panelSeo = '.panel-seo',
	$panelDesign = '.panel-design',
	$panelContent = '.panel-content',
	$panelResponsive = '.panel-responsive',
	$panelSeoAssist = '.seo-assist-panel',
	$panelSeoParam = '.seo-param-panel',
	$tinyMCE = '.tinymce',
	$reset = '.reset',
	$blockContainer = '#block-container',
	$blockSelect = '.block-select',
	$btnShowSeo = '#show-seo',
	
	$remove = '.remove',
	$edit = '.edit',
	$curEdit,
	$curHideForm,
	
	$addImg = '.add-img',
	tinyMCECount = 0,
	dynamicFields = 0,
	$inpPanelFile = '#input-file-id',
	$valdPanelInpFile = '#valid-file-id';
		

		
var extractClassSelector = function(selector)
{
	return selector.match(/[a-z1-9_-]+/i);
}