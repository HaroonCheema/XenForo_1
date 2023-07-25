<?php
// FROM HASH: c36e40872fb9f9ac6e48a640fe454709
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '' . $__templater->func('username_link', array($__vars['user'], false, array('defaultname' => $__vars['alert']['username'], ), ), true) . ' mentioned you in a post in the discussion ' . (((('<a href="' . $__templater->func('link', array('group_discussions/post', $__vars['content']['Group'], array('id' => $__vars['content']['discussion_id'], ), ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->escape($__vars['content']['title'])) . '</a>') . '.';
	return $__finalCompiled;
}
);