<?php
// FROM HASH: 3a346a882ac449b0423a7ed01a4278d2
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '' . $__templater->func('username_link', array($__vars['user'], false, array('defaultname' => $__vars['alert']['username'], ), ), true) . ' posted a comment for your photo in ' . (((('<a href="' . $__templater->func('link', array('group_photos/view', $__vars['content']['Group'], array('photo_id' => $__vars['content']['Photo']['photo_id'], ), ), true)) . '" class="fauxBlockLink-blockLink">') . $__templater->escape($__vars['content']['Group']['name'])) . '</a>') . '';
	return $__finalCompiled;
}
);