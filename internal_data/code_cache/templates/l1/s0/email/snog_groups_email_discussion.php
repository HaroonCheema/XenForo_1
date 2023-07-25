<?php
// FROM HASH: 7e6cfdc174ef848ffd7abd7602fff627
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<mail:subject>' . 'New discussion in ' . $__templater->escape($__vars['discussion']['Group']['name']) . '' . '</mail:subject>

<p>' . '' . $__templater->escape($__vars['discussion']['username']) . ' created a new discussion in ' . $__templater->escape($__vars['discussion']['Group']['name']) . '
' . '</p>

<p><a href="' . $__templater->func('link', array('canonical:group_discussions/view', $__vars['discussion']['Group'], array('id' => $__vars['discussion']['discussion_id'], ), ), true) . '" class="button">' . 'View discussion' . '</a></p>

' . '<p class="minorText">This message was sent to you because your preferences are set to receive email when a new discussion is started in a group you belong to. <a href="' . $__templater->func('link', array('canonical:email-stop/discussions', $__vars['xf']['toUser'], ), true) . '">Stop receiving these emails</a>.</p>';
	return $__finalCompiled;
}
);