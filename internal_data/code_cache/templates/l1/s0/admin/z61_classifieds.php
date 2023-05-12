<?php
// FROM HASH: ad1d80cf2ed07afd228edfe52d878f25
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Classifieds');
	$__finalCompiled .= '

' . $__templater->callMacro('section_nav_macros', 'section_nav', array(
		'section' => 'classifieds',
	), $__vars);
	return $__finalCompiled;
}
);