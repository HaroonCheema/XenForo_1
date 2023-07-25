<?php
// FROM HASH: e1ba44ecb6572f6d76cece3cac5d39fd
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if (!$__templater->test($__vars['group'], 'empty', array()) AND $__vars['group']['node_id']) {
		$__finalCompiled .= '
		';
		if ($__vars['group']['Settings']['posts']) {
			$__finalCompiled .= '
			';
			if (($__vars['group']['postview'] OR $__vars['xf']['visitor']['is_admin']) OR ((!$__vars['group']['postview']) AND $__templater->func('in_array', array($__vars['group']['groupid'], $__vars['xf']['visitor']['SocialGroups']['groups'], ), false))) {
				$__finalCompiled .= '
				' . $__templater->callback('Snog\\Groups\\Callbacks\\Latestposts', 'getLatest', '', array($__vars['group']['node_id'], )) . '
			';
			}
			$__finalCompiled .= '
		';
		}
		$__finalCompiled .= '
';
	}
	return $__finalCompiled;
}
);