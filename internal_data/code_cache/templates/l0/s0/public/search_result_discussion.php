<?php
// FROM HASH: f6e47d335c63c7d04c6803fd630b5cb6
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<li class="block-row block-row--separated js-inlineModContainer" data-author="' . ($__templater->escape($__vars['discussion']['User']['username']) ?: $__templater->escape($__vars['discussion']['username'])) . '">
	<div class="contentRow">
		<span class="contentRow-figure">
			' . $__templater->func('avatar', array($__vars['discussion']['User'], 's', false, array(
		'defaultname' => $__vars['discussion']['username'],
	))) . '
		</span>
		<div class="contentRow-main">
			<h3 class="contentRow-title">
				';
	if (!$__vars['discussion']['parent_id']) {
		$__finalCompiled .= '
					<a href="' . $__templater->func('link', array('group_discussions/view', $__vars['discussion']['Group'], array('id' => $__vars['discussion']['discussion_id'], ), ), true) . '">' . $__templater->func('highlight', array($__vars['discussion']['title'], $__vars['options']['term'], ), true) . '</a>
				';
	} else {
		$__finalCompiled .= '
					<a href="' . $__templater->func('link', array('goto/discussion', $__vars['discussion']['Group'], array('id' => $__vars['discussion']['discussion_id'], ), ), true) . '">' . $__templater->func('highlight', array($__vars['discussion']['Parent']['title'], $__vars['options']['term'], ), true) . '</a>
				';
	}
	$__finalCompiled .= '
			</h3>

			<div class="contentRow-snippet">' . $__templater->func('snippet', array($__vars['discussion']['message'], 300, array('term' => $__vars['options']['term'], 'stripQuote' => true, ), ), true) . '</div>

			<div class="contentRow-minor contentRow-minor--hideLinks">
				<ul class="listInline listInline--bullet">
					<li>' . $__templater->func('username_link', array($__vars['discussion']['User'], false, array(
		'defaultname' => $__vars['discussion']['username'],
	))) . '</li>
					<li>' . $__templater->func('date_dynamic', array($__vars['discussion']['date'], array(
	))) . '</li>
					<li>' . 'Group' . $__vars['xf']['language']['label_separator'] . ' <a href="' . $__templater->func('link', array('group/info', $__vars['discussion']['Group'], ), true) . '">' . $__templater->escape($__vars['discussion']['Group']['name']) . '</a></li>
				</ul>
			</div>
		</div>
	</div>
</li>';
	return $__finalCompiled;
}
);