<?php
// FROM HASH: 6efaeea5c45669378d26e5b20d29fb42
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '' . ($__templater->escape($__vars['user']['username']) ?: $__templater->escape($__vars['alert']['username'])) . ' posted a comment for your photo in ' . $__templater->escape($__vars['content']['Group']['name']) . '' . '
<push:url>' . $__templater->func('link', array('canonical:group_photos/view', $__vars['content']['Group'], array('photo_id' => $__vars['content']['Photo']['photo_id'], ), ), true) . '</push:url>';
	return $__finalCompiled;
}
);