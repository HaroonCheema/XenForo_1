<?php
// FROM HASH: 460402fa79105e49f8bfe8bd178d5ac1
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__vars['feedbackLink'] = $__templater->preEscaped($__templater->func('link', array('classifieds/give-feedback', array('listing_id' => $__vars['alert']['content_id'], ), ), true));
	$__finalCompiled .= '
' . 'You have been listed as the aquirer of an item listed by user ' . $__templater->func('username_link', array($__vars['alert']['User'], false, array('defaultname' => $__vars['alert']['username'], ), ), true) . '. You can now leave <a href="' . $__templater->escape($__vars['feedbackLink']) . '"> feedback</a> about the transaction.';
	return $__finalCompiled;
}
);