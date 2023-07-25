<?php
// FROM HASH: 3d4124080fdb9625a82e1f650d08108d
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '' . ($__templater->escape($__vars['user']['username']) ?: $__templater->escape($__vars['alert']['username'])) . ' created a new discussion in ' . $__templater->escape($__vars['content']['Group']['name']) . '' . '
<push:url>' . $__templater->func('link', array('canonical:group_discussions/view', $__vars['content']['Group'], array('id' => $__vars['content']['discussion_id'], ), ), true) . '</push:url>';
	return $__finalCompiled;
}
);