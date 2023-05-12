<?php
// FROM HASH: 7408ecd8a3e5c14940d8f29a32775e82
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->callMacro('prefix_macros', 'select', array(
		'name' => 'na',
		'prefixes' => $__vars['prefixes'],
		'type' => 'classifieds_listing',
	), $__vars);
	return $__finalCompiled;
}
);