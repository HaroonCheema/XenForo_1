<?php
// FROM HASH: 40a726cd4b6e2d474ae99fbab9a88c05
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<mail:subject>
	' . '' . ($__templater->func('prefix', array('classifieds_listing', $__vars['listing'], 'escaped', ), true) . $__templater->escape($__vars['listing']['title'])) . ' has been updated' . '
</mail:subject>

' . '<p>' . $__templater->func('username_link_email', array($__vars['listing']['User'], $__vars['listing']['username'], ), true) . ' updated a listing you are watching at ' . (((('<a href="' . $__templater->func('link', array('canonical:index', ), true)) . '">') . $__templater->escape($__vars['xf']['options']['boardTitle'])) . '</a>') . '.</p>' . '

<h2><a href="' . $__templater->func('link', array('canonical:classifieds', $__vars['listing'], ), true) . '">' . $__templater->func('prefix', array('classifieds_listing', $__vars['listing'], 'escaped', ), true) . $__templater->escape($__vars['listing']['title']) . '</a></h2>

';
	if ($__vars['xf']['options']['emailWatchedThreadIncludeMessage']) {
		$__finalCompiled .= '
	<div class="message">' . $__templater->func('bb_code_type', array('emailHtml', $__vars['update']['message'], 'classifieds_listing', $__vars['update'], ), true) . '</div>
';
	}
	$__finalCompiled .= '

' . $__templater->callMacro('z61_classifieds_listing_macros', 'go_listing_bar', array(
		'listing' => $__vars['listing'],
		'watchType' => 'classifieds_listing',
	), $__vars) . '

' . $__templater->callMacro('z61_classifieds_listing_macros', 'watched_listing_footer', array(
		'listing' => $__vars['listing'],
	), $__vars);
	return $__finalCompiled;
}
);