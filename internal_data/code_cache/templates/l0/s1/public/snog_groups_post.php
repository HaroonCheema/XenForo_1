<?php
// FROM HASH: 0231a2bc06bbe3ccfc07e7845e73d0a7
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['permissions']['inlineMod']) {
		$__finalCompiled .= '
	';
		$__templater->includeJs(array(
			'src' => 'xf/inline_mod.js',
			'min' => '1',
		));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

<div class="block" data-xf-init="' . ($__vars['permission']['inlineMod'] ? 'inline-mod' : '') . '" data-type="group_post" data-href="' . $__templater->func('link', array('inline-mod', ), true) . '">
	<div class="block-container">
		<div class="block-body">
			' . $__templater->callMacro('snog_groups_post_macros', 'post', array(
		'post' => $__vars['post'],
		'group' => $__vars['group'],
		'permissions' => $__vars['permissions'],
	), $__vars) . '
		</div>
	</div>
</div>';
	return $__finalCompiled;
}
);