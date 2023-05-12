<?php
// FROM HASH: ade80bd16c5ce9ecb26f32ddafd7dac5
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['listingType'], 'isInsert', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Add listing type');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Edit listing type' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['listingType']['title']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	$__templater->breadcrumb($__templater->preEscaped('Classifieds listing types'), $__templater->func('link', array('classifieds/listing-types', ), false), array(
	));
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['listingType'], 'isUpdate', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('', array(
			'href' => $__templater->func('link', array('classifieds/listing-types/delete', $__vars['listingType'], ), false),
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
		'value' => ($__templater->method($__vars['listingType'], 'isInsert', array()) ? '' : $__vars['listingType']['title']),
	), array(
		'label' => 'Title',
	)) . '

			' . $__templater->callMacro('display_order_macros', 'row', array(
		'value' => $__vars['listingType']['display_order'],
	), $__vars) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'css_class',
		'value' => $__vars['listingType']['css_class'],
	), array(
		'label' => 'Display styling',
		'explain' => 'Use this field to specify CSS classes for this listing type.',
	)) . '

			' . $__templater->formSubmitRow(array(
		'icon' => 'save',
		'sticky' => 'true',
	), array(
	)) . '
		</div>
	</div>
', array(
		'action' => $__templater->func('link', array('classifieds/listing-types/save', $__vars['listingType'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);