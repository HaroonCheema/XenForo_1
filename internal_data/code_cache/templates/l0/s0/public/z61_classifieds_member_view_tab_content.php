<?php
// FROM HASH: 089c7fe02b0073e37f608895350c0e8a
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['xf']['visitor'], 'canViewClassifiedsFeedback', array())) {
		$__finalCompiled .= '
	<li data-href="' . $__templater->func('link', array('members/feedback', $__vars['user'], ), true) . '" role="tabpanel" aria-labelledby="feedback">
		<div class="blockMessage">' . 'Loading' . $__vars['xf']['language']['ellipsis'] . '</div>
	</li>
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['xf']['visitor'], 'canViewClassifieds', array())) {
		$__finalCompiled .= '
	<li data-href="' . $__templater->func('link', array('classifieds/authors', $__vars['user'], ), true) . '" role="tabpanel" aria-labelledby="listings">
		<div class="blockMessage">' . 'Loading' . $__vars['xf']['language']['ellipsis'] . '</div>
	</li>
';
	}
	return $__finalCompiled;
}
);