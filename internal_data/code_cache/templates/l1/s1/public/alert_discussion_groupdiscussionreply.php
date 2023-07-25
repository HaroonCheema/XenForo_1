<?php
// FROM HASH: eea53d83aeff41de33ff5bf5002e4e19
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '' . $__templater->func('username_link', array($__vars['user'], false, array('defaultname' => $__vars['alert']['username'], ), ), true) . ' replied to the group discussion ' . (((('<a href="' . $__templater->func('link', array('group_discussions/post', $__vars['content']['Group'], array('id' => $__vars['content']['discussion_id'], ), ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->escape($__vars['content']['Parent']['title'])) . '</a>') . '. There may be more posts after this.';
	return $__finalCompiled;
}
);