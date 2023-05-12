<?php
// FROM HASH: f5960503001bc97be36c9e627b29b9d7
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__compilerTemp1 = $__vars;
	$__compilerTemp1['extraOptions'] = $__templater->preEscaped('
		' . $__templater->callMacro('z61_classifieds_listing_prefix_edit_macros', 'category_ids', array(
		'categoryIds' => $__vars['prefix']['category_ids'],
		'categoryTree' => $__vars['categoryTree'],
	), $__vars) . '
	');
	$__finalCompiled .= $__templater->includeTemplate('base_prefix_edit', $__compilerTemp1);
	return $__finalCompiled;
}
);