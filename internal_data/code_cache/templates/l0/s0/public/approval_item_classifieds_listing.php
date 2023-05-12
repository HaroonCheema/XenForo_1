<?php
// FROM HASH: 897bc6961f6b68d5c01c86fbbad8cffb
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formRow('
	<a href="' . $__templater->func('link', array('classifieds', $__vars['content'], ), true) . '">' . $__templater->escape($__vars['content']['title']) . '</a>
', array(
		'label' => 'Classifieds listing',
	)) . '

' . $__templater->formRow('
	<a href="' . $__templater->func('link', array('classifieds/categories', $__vars['content']['Category'], ), true) . '">' . $__templater->escape($__vars['content']['Category']['title']) . '</a>
', array(
		'label' => 'Category',
	)) . '

' . $__templater->formRow('
	' . $__templater->func('username_link', array($__vars['content']['User'], true, array(
		'defaultname' => $__vars['content']['username'],
	))) . '
', array(
		'label' => 'Author',
	)) . '

' . $__templater->formRow('
	' . $__templater->func('date_dynamic', array($__vars['content']['listing_date'], array(
	))) . '
', array(
		'label' => 'Post date',
	)) . '

' . $__templater->callMacro('approval_queue_macros', 'spam_log', array(
		'spamDetails' => $__vars['spamDetails'],
	), $__vars) . '

' . $__templater->formRow('
	' . $__templater->func('bb_code', array($__vars['content']['content'], 'classifieds_listing', $__vars['content'], ), true) . '
', array(
		'label' => 'Content',
	)) . '

' . $__templater->callMacro('approval_queue_macros', 'action_row', array(
		'unapprovedItem' => $__vars['unapprovedItem'],
		'handler' => $__vars['handler'],
	), $__vars);
	return $__finalCompiled;
}
);