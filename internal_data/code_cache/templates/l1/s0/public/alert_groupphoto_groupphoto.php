<?php
// FROM HASH: 85b1cf38bd1d23ee8d30b2bc15715516
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '' . $__templater->func('username_link', array($__vars['user'], false, array('defaultname' => $__vars['alert']['username'], ), ), true) . ' uploaded a new photo to ' . (((('<a href="' . $__templater->func('link', array('group_photos/view', $__vars['content']['Group'], array('photo_id' => $__vars['content']['photo_id'], ), ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->escape($__vars['content']['Group']['name'])) . '</a>') . '';
	return $__finalCompiled;
}
);