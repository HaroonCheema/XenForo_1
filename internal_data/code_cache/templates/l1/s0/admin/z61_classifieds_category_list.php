<?php
// FROM HASH: 8ed52cc189d36e69b86d767d48aed378
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Classifieds categories');
	$__finalCompiled .= '

' . $__templater->callMacro('category_tree_macros', 'page_action', array(
		'linkPrefix' => 'classifieds/categories',
	), $__vars) . '

' . $__templater->callMacro('category_tree_macros', 'category_list', array(
		'categoryTree' => $__vars['categoryTree'],
		'filterKey' => 'classifieds-categories',
		'linkPrefix' => 'classifieds/categories',
	), $__vars);
	return $__finalCompiled;
}
);