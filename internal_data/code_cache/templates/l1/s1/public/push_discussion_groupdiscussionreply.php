<?php
// FROM HASH: 2c8e601943073b972c2097a3f504e94e
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '' . ($__templater->escape($__vars['user']['username']) ?: $__templater->escape($__vars['alert']['username'])) . ' replied to the group discussion ' . $__templater->escape($__vars['content']['Parent']['title']) . '. There may be more posts after this.' . '
<push:url>' . $__templater->func('link', array('canonical:group_discussions/post', $__vars['content']['Group'], array('id' => $__vars['content']['discussion_id'], ), ), true) . '</push:url>';
	return $__finalCompiled;
}
);