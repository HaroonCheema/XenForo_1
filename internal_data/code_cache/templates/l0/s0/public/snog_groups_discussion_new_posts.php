<?php
// FROM HASH: 6b1fb5302a8c0a57af9720a2a75b50a0
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->isTraversable($__vars['posts'])) {
		foreach ($__vars['posts'] AS $__vars['post']) {
			$__finalCompiled .= '
	';
			$__vars['position'] = ($__vars['position'] + 1);
			$__finalCompiled .= '
	' . $__templater->callMacro('snog_groups_post_macros', 'post', array(
				'post' => $__vars['post'],
				'position' => $__vars['position'],
				'group' => $__vars['group'],
				'permissions' => $__vars['permissions'],
			), $__vars) . '
';
		}
	}
	return $__finalCompiled;
}
);