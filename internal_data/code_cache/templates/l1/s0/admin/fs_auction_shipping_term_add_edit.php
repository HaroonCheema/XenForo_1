<?php
// FROM HASH: 3c27e4f55c6f4c7174b808013a16c676
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__compilerTemp1 = '';
	if ($__vars['data']['term_id']) {
		$__compilerTemp1 .= ' ' . 'Edit Term' . '
  ';
	} else {
		$__compilerTemp1 .= ' ' . 'Add Term' . ' ';
	}
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('
  ' . $__compilerTemp1 . '
');
	$__finalCompiled .= '
' . $__templater->form('
  <div class="block-container">
    <div class="block-body">
      ' . $__templater->formTextBoxRow(array(
		'name' => 'shipping_term',
		'value' => $__vars['data']['shipping_term'],
		'autosize' => 'true',
	), array(
		'label' => 'Shipping Term',
	)) . '
    </div>
    ' . $__templater->formSubmitRow(array(
		'submit' => '',
		'icon' => 'save',
	), array(
	)) . '
  </div>
', array(
		'action' => $__templater->func('link', array('ship-terms/save', $__vars['data'], ), false),
		'ajax' => 'true',
		'class' => 'block',
		'data-force-flash-message' => 'true',
	));
	return $__finalCompiled;
}
);