<?php
// FROM HASH: 7f6fe34c67d7d754b4cf994123741380
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<hr class="formRowSep" />

' . $__templater->formNumberBoxRow(array(
		'name' => 'options[limit]',
		'value' => $__vars['options']['limit'],
		'min' => '1',
	), array(
		'label' => 'Maximum entries',
	)) . '

' . $__templater->formRadioRow(array(
		'name' => 'options[style]',
		'value' => ($__vars['options']['style'] ?: 'simple'),
	), array(array(
		'value' => 'simple',
		'label' => 'Simple',
		'hint' => 'A simple view, designed for narrow spaces such as sidebars.',
		'_type' => 'option',
	),
	array(
		'value' => 'full',
		'label' => 'Full',
		'hint' => 'A full size view, displaying as a standard classifieds list.',
		'_type' => 'option',
	)), array(
		'label' => 'Display style',
	)) . '

';
	$__compilerTemp1 = array(array(
		'value' => '0',
		'label' => 'All categories',
		'_type' => 'option',
	));
	$__compilerTemp2 = $__templater->method($__vars['categoryTree'], 'getFlattened', array(0, ));
	if ($__templater->isTraversable($__compilerTemp2)) {
		foreach ($__compilerTemp2 AS $__vars['treeEntry']) {
			$__compilerTemp1[] = array(
				'value' => $__vars['treeEntry']['record']['category_id'],
				'label' => '
			' . $__templater->filter($__templater->func('repeat', array('&nbsp;&nbsp;', $__vars['treeEntry']['depth'], ), false), array(array('raw', array()),), true) . $__templater->escape($__vars['treeEntry']['record']['title']) . '
		',
				'_type' => 'option',
			);
		}
	}
	$__finalCompiled .= $__templater->formSelectRow(array(
		'name' => 'options[category_ids][]',
		'value' => ($__vars['options']['category_ids'] ?: 0),
		'multiple' => 'multiple',
		'size' => '7',
	), $__compilerTemp1, array(
		'label' => 'Category limit',
	));
	return $__finalCompiled;
}
);