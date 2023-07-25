<?php
// FROM HASH: 98425847a07698954b249dc80f59996f
return array(
'macros' => array('like_snippet' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'liker' => '!',
		'post' => '!',
		'date' => '!',
		'fallbackName' => 'Unknown member',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	<div class="contentRow-title">
		';
	$__vars['ptitle'] = ($__vars['post']['Parent']['title'] ? $__vars['post']['Parent']['title'] : $__vars['post']['title']);
	$__finalCompiled .= '
		';
	if ($__vars['post']['user_id'] == $__vars['xf']['visitor']['user_id']) {
		$__finalCompiled .= '
			' . '' . $__templater->func('username_link', array($__vars['liker'], false, array('defaultname' => $__vars['fallbackName'], ), ), true) . ' liked your post in the group discussion ' . (((('<a href="' . $__templater->func('link', array('group_discussions/post', $__vars['post'], array('id' => $__vars['post']['discussion_id'], ), ), true)) . '">') . $__templater->escape($__vars['ptitle'])) . '</a>') . '.' . '
		';
	} else {
		$__finalCompiled .= '
			' . '' . $__templater->func('username_link', array($__vars['liker'], false, array('defaultname' => $__vars['fallbackName'], ), ), true) . ' liked <a ' . (('href="' . $__templater->func('link', array('group_discussions/post', $__vars['post'], array('id' => $__vars['post']['discussion_id'], ), ), true)) . '"') . '>' . $__templater->escape($__vars['post']['username']) . '\'s post</a> in the group discussion ' . (((('<a href="' . $__templater->func('link', array('group_discussions', $__vars['post'], ), true)) . '">') . $__templater->escape($__vars['ptitle'])) . '</a>') . '.' . '
		';
	}
	$__finalCompiled .= '
	</div>

	<div class="contentRow-snippet">' . $__templater->func('snippet', array($__vars['post']['message'], $__vars['xf']['options']['newsFeedMessageSnippetLength'], array('stripQuote' => true, ), ), true) . '</div>

	<div class="contentRow-minor">' . $__templater->func('date_dynamic', array($__vars['date'], array(
	))) . '</div>
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

' . $__templater->callMacro(null, 'like_snippet', array(
		'liker' => $__vars['like']['Liker'],
		'post' => $__vars['content'],
		'date' => $__vars['like']['like_date'],
	), $__vars);
	return $__finalCompiled;
}
);