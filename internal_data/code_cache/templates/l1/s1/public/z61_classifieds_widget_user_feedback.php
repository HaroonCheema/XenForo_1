<?php
// FROM HASH: 227ed38cb43314fc7116824f69c50fca
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if (!$__templater->test($__vars['feedbackItems'], 'empty', array())) {
		$__finalCompiled .= '
	<div class="block"' . $__templater->func('widget_data', array($__vars['widget'], ), true) . '>
		<div class="block-container">
			<h3 class="block-minorHeader">
				<a href="' . $__templater->func('link', array('members/feedback', $__vars['user'], ), true) . '" rel="nofollow">' . $__templater->escape($__vars['title']) . ': ' . $__templater->func('username_link', array($__vars['user'], false, array(
		))) . '</a>
			</h3>
			<div class="block-body">
				';
		if ($__templater->isTraversable($__vars['feedbackItems'])) {
			foreach ($__vars['feedbackItems'] AS $__vars['feedback']) {
				$__finalCompiled .= '
						<div class="block-row">
							' . $__templater->callMacro('z61_classifieds_feedback_macros', 'simple', array(
					'feedback' => $__vars['feedback'],
					'limitHeight' => true,
				), $__vars) . '
						</div>
				';
			}
		}
		$__finalCompiled .= '
			</div>
			<div class="block-footer">
					<span class="block-footer-controls">
						' . $__templater->button('View more' . $__vars['xf']['language']['ellipsis'], array(
			'href' => $__templater->func('link', array('members/feedback', $__vars['user'], ), false),
			'rel' => 'nofollow',
		), '', array(
		)) . '
					</span>
			</div>
		</div>
	</div>
';
	}
	return $__finalCompiled;
}
);