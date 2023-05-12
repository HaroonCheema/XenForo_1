<?php
// FROM HASH: f7bf390f0c384ac05bf5c6e999030b3d
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__vars['feedbackLink'] = $__templater->preEscaped($__templater->func('link', array('members/feedback', $__vars['alert']['Receiver'], ), true));
	$__finalCompiled .= '
' . '' . $__templater->func('username_link', array($__vars['alert']['User'], false, array('defaultname' => $__vars['alert']['username'], ), ), true) . ' has left feedback on your listing ' . (((('<a href="' . $__templater->func('link', array('classifieds', array('listing_id' => $__vars['alert']['content_id'], ), ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->escape($__vars['extra']['title'])) . '</a>') . '. Click <a href="' . $__templater->escape($__vars['feedbackLink']) . '">here</a> to view it.';
	return $__finalCompiled;
}
);