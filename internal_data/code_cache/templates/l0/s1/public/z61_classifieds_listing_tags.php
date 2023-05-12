<?php
// FROM HASH: 7fc76b2c1afa3f90727ccb4955952031
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Edit tags');
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['listing'], 'getBreadcrumbs', array()));
	$__finalCompiled .= '

' . $__templater->callMacro('tag_macros', 'edit_form', array(
		'action' => $__templater->func('link', array('classifieds/tags', $__vars['listing'], ), false),
		'uneditableTags' => $__vars['uneditableTags'],
		'editableTags' => $__vars['editableTags'],
	), $__vars);
	return $__finalCompiled;
}
);