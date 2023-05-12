<?php
// FROM HASH: 5dec5a4cb34921f196c1069836196de7
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->button('
		' . 'Add listing' . '
', array(
		'href' => $__templater->func('link', array('classifieds/add', null, array('node_id' => $__vars['forum']['node_id'], ), ), false),
		'class' => 'button--cta',
		'icon' => 'write',
		'overlay' => 'true',
	), '', array(
	));
	return $__finalCompiled;
}
);