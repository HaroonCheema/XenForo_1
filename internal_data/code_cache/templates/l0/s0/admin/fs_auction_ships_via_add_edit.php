<?php
// FROM HASH: 509d06f8dfad59501e8564fee785218c
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__compilerTemp1 = '';
	if ($__vars['data']['ship_via']) {
		$__compilerTemp1 .= ' ' . 'Edit Via' . '
  ';
	} else {
		$__compilerTemp1 .= ' ' . 'Add Via' . ' ';
	}
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('
  ' . $__compilerTemp1 . '
');
	$__finalCompiled .= '
' . $__templater->form('
  <div class="block-container">
    <div class="block-body">
      ' . $__templater->formTextBoxRow(array(
		'name' => 'ship_via',
		'value' => $__vars['data']['ship_via'],
		'autosize' => 'true',
	), array(
		'label' => 'Ship Via',
	)) . '
    </div>
    ' . $__templater->formSubmitRow(array(
		'submit' => '',
		'icon' => 'save',
	), array(
	)) . '
  </div>
', array(
		'action' => $__templater->func('link', array('ship-via/save', $__vars['data'], ), false),
		'ajax' => 'true',
		'class' => 'block',
		'data-force-flash-message' => 'true',
	));
	return $__finalCompiled;
}
);