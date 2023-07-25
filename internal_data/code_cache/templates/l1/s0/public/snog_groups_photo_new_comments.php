<?php
// FROM HASH: c064b454247d4c9eebfb4a42f8154069
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['morePosts']) {
		$__finalCompiled .= '
	';
		if ($__templater->isTraversable($__vars['photoPosts'])) {
			foreach ($__vars['photoPosts'] AS $__vars['photoPost']) {
				$__finalCompiled .= '
		' . $__templater->callMacro('snog_groups_photo_comment_macros', 'photo_post', array(
					'photoPost' => $__vars['photoPost'],
					'group' => $__vars['group'],
				), $__vars) . '
	';
			}
		}
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	' . $__templater->callMacro('snog_groups_photo_comment_macros', 'photo_post', array(
			'photoPost' => $__vars['photoPost'],
			'group' => $__vars['group'],
		), $__vars) . '
';
	}
	return $__finalCompiled;
}
);