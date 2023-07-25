<?php
// FROM HASH: f988ddafa70d9cece897299b63831ed9
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if (!$__templater->test($__vars['group'], 'empty', array()) AND $__vars['group']['hasevent']) {
		$__finalCompiled .= '
	';
		if (($__vars['group']['eventview'] OR $__vars['xf']['visitor']['is_admin']) OR ((!$__vars['group']['eventview']) AND $__templater->func('in_array', array($__vars['group']['groupid'], $__vars['xf']['visitor']['SocialGroups']['groups'], ), false))) {
			$__finalCompiled .= '
		' . $__templater->callback('Snog\\Groups\\Callbacks\\Events', 'getLatest', '', array($__vars['group']['groupid'], $__vars['group'], )) . '
	';
		}
		$__finalCompiled .= '
';
	}
	return $__finalCompiled;
}
);