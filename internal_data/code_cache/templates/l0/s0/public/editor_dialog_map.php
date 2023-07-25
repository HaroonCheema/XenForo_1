<?php
// FROM HASH: c03019fdb0e68e4747a2f19bcb8bdc23
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Insert map');
	$__finalCompiled .= '

<div class="block">
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formTextBoxRow(array(
		'id' => 'editor_map_url',
		'type' => 'url',
	), array(
		'label' => 'Enter address or Google embed link',
		'explain' => 'Address example: 1600 Pennsylvania Ave NW, Washington, DC<br />Google embed link is obtained from Google Maps',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Continue',
		'id' => 'editor_map_submit',
	), array(
	)) . '
	</div>
</div>';
	return $__finalCompiled;
}
);