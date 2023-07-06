<?php
// FROM HASH: 4729e728d714906f7fa17ff85fd21dd1
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<div class="block-container">
	<div class="block-body">
			' . $__templater->callMacro('fs_escrow_list_macro', 'escrow', array(
		'escrow' => '',
		'containerClass' => 'contentRow-minor',
	), $__vars) . '
	</div>
</div>';
	return $__finalCompiled;
}
);