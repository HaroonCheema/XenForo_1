<?php
// FROM HASH: 7fe082872ee97c34f5f7c26d097aec80
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '' . ($__templater->escape($__vars['user']['username']) ?: $__templater->escape($__vars['alert']['username'])) . ' uploaded a new photo to ' . $__templater->escape($__vars['content']['Group']['name']) . '' . '
<push:url>' . $__templater->func('link', array('canonical:group_photos/view', $__vars['content']['Group'], array('photo_id' => $__vars['content']['photo_id'], ), ), true) . '</push:url>';
	return $__finalCompiled;
}
);