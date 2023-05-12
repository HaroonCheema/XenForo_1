<?php
// FROM HASH: b622400b56f4f6e8d5f20a83ae917cdd
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['condition'], 'isInsert', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Add listing condition');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Edit listing condition' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['condition']['title']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['condition'], 'isUpdate', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('', array(
			'href' => $__templater->func('link', array('classifieds/conditions/delete', $__vars['condition'], ), false),
			'icon' => 'delete',
			'overlay' => 'true',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formTextBoxRow(array(
		'name' => 'title',
		'value' => ($__templater->method($__vars['condition'], 'isUpdate', array()) ? $__vars['condition']['title'] : ''),
	), array(
		'label' => 'Title',
	)) . '

			' . $__templater->callMacro('display_order_macros', 'row', array(
		'value' => $__vars['condition']['display_order'],
	), $__vars) . '
			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'label' => 'Enabled',
		'selected' => $__vars['condition']['active'],
		'name' => 'active',
		'_type' => 'option',
	)), array(
	)) . '
			' . $__templater->formSubmitRow(array(
		'icon' => 'save',
		'sticky' => 'true',
	), array(
	)) . '
		</div>
	</div>
', array(
		'action' => $__templater->func('link', array('classifieds/conditions/save', $__vars['condition'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);