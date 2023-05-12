<?php
// FROM HASH: 002ccb28cf21ad0d3122789f73311a1a
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Confirm action');
	$__finalCompiled .= '

' . $__templater->callMacro('category_tree_macros', 'category_delete_form', array(
		'linkPrefix' => 'classifieds/categories',
		'category' => $__vars['category'],
	), $__vars);
	return $__finalCompiled;
}
);