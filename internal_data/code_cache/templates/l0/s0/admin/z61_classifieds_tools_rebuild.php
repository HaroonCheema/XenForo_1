<?php
// FROM HASH: 6fba4e0091ec9a72915944bb70af9e70
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->callMacro('tools_rebuild', 'rebuild_job', array(
		'header' => 'Classifieds: ' . 'Rebuild user listing count',
		'job' => 'Z61\\Classifieds:UserListingCount',
	), $__vars) . '
' . '

' . $__templater->callMacro('tools_rebuild', 'rebuild_job', array(
		'header' => 'Classifieds: ' . 'Rebuild listing categories',
		'job' => 'Z61\\Classifieds:Category',
	), $__vars) . '
';
	return $__finalCompiled;
}
);