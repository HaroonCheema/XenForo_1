<?php
// FROM HASH: 423fb46052fab445f949a84724d5f51e
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->callMacro('snog_groups_post_macros', 'post', array(
		'post' => $__vars['post'],
		'group' => $__vars['group'],
		'permissions' => $__vars['permissions'],
		'position' => $__vars['position'],
	), $__vars);
	return $__finalCompiled;
}
);