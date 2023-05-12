<?php
// FROM HASH: e29750dee60a0201e63b15aa4ff81cd4
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__compilerTemp1 = $__vars;
	$__compilerTemp1['extraOptions'] = $__templater->preEscaped('
		' . $__templater->formCheckBoxRow(array(
		'name' => 'apply_category_ids',
	), array(array(
		'label' => 'classifieds_apply_category_options',
		'_dependent' => array('
					' . $__templater->callMacro('z61_classifieds_listing_prefix_edit_macros', 'category_ids', array(
		'categoryIds' => $__vars['prefix']['category_ids'],
		'categoryTree' => $__vars['categoryTree'],
		'withRow' => false,
	), $__vars) . '
				'),
		'_type' => 'option',
	)), array(
		'label' => 'Applicable categories',
	)) . '
	');
	$__finalCompiled .= $__templater->includeTemplate('base_prefix_quickset_editor', $__compilerTemp1);
	return $__finalCompiled;
}
);