<?php
// FROM HASH: faec0188ae87cf45f2147c4a96cb6eaf
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '' . ($__templater->escape($__vars['user']['username']) ?: $__templater->escape($__vars['alert']['username'])) . ' mentioned you in a post in the discussion ' . $__templater->escape($__vars['content']['title']) . '.' . '
<push:url>' . $__templater->func('link', array('canonical:group_discussions/post', $__vars['content']['Group'], array('id' => $__vars['content']['discussion_id'], ), ), true) . '</push:url>';
	return $__finalCompiled;
}
);