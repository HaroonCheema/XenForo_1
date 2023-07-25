<?php
// FROM HASH: 6fdf0fdf0e6a6c0ab49fd8e82fd74de8
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if (!$__templater->test($__vars['group'], 'empty', array()) AND $__vars['group']['hasalbum']) {
		$__finalCompiled .= '
	';
		if (($__vars['group']['albumview'] OR $__vars['xf']['visitor']['is_admin']) OR ((!$__vars['group']['albumview']) AND $__templater->func('in_array', array($__vars['group']['groupid'], $__vars['xf']['visitor']['SocialGroups']['groups'], ), false))) {
			$__finalCompiled .= '
		' . $__templater->callback('Snog\\Groups\\Callbacks\\Latestphotos', 'getLatest', '', array($__vars['group']['groupid'], $__vars['group'], )) . '
	';
		}
		$__finalCompiled .= '
';
	}
	return $__finalCompiled;
}
);