<?php
// FROM HASH: a0a87d90a0e197a4f3b17decfdc00959
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['content']['parent_id'] > 0) {
		$__finalCompiled .= '
	';
		$__vars['title'] = $__vars['content']['Parent']['title'];
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__vars['title'] = $__vars['content']['title'];
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['content']['parent_id'] > 0) {
		$__finalCompiled .= '
	';
		$__vars['id'] = $__vars['content']['Parent']['discussion_id'];
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__vars['id'] = $__vars['content']['discussion_id'];
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

' . '
' . '' . $__templater->func('username_link', array($__vars['user'], false, array('defaultname' => $__vars['alert']['username'], ), ), true) . ' liked your post in the discussion ' . (((((('<a href="' . $__templater->func('link', array('group_discussions/view', array('groupid' => $__vars['alert']['extra_data']['groupid'], ), array('id' => $__vars['id'], 'page' => $__vars['alert']['extra_data']['page'], ), ), true)) . '#discussion-') . $__templater->escape($__vars['content']['discussion_id'])) . '" class="fauxBlockLink-blockLink">') . $__templater->escape($__vars['title'])) . '</a>') . '';
	return $__finalCompiled;
}
);