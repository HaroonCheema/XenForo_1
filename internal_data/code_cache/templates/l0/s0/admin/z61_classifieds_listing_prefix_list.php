<?php
// FROM HASH: ec6fe91f80eef16c835d50e329d132f3
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Listing prefixes');
	$__finalCompiled .= '

' . $__templater->includeTemplate('base_prefix_list', $__vars);
	return $__finalCompiled;
}
);