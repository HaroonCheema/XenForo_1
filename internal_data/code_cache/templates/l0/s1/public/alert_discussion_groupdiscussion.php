<?php
// FROM HASH: 9dee766567b3a4b64682139217704470
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '' . $__templater->func('username_link', array($__vars['user'], false, array('defaultname' => $__vars['alert']['username'], ), ), true) . ' created a new discussion in ' . (((('<a href="' . $__templater->func('link', array('group_discussions/view', $__vars['content']['Group'], array('id' => $__vars['content']['discussion_id'], ), ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->escape($__vars['content']['Group']['name'])) . '</a>') . '';
	return $__finalCompiled;
}
);