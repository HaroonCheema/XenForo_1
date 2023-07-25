<?php
// FROM HASH: 1fffacc54197d014bad5ec3688375470
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->callMacro('snog_groups_photo_comment_macros', 'photo_post', array(
		'photoPost' => $__vars['photoPost'],
		'group' => $__vars['group'],
	), $__vars);
	return $__finalCompiled;
}
);