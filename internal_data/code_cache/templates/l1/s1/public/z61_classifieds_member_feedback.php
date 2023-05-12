<?php
// FROM HASH: 5f7564b14f1a8de7c642d3683cea08b4
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('User feedback' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['user']['username']));
	$__finalCompiled .= '
';
	$__templater->breadcrumb($__templater->preEscaped($__templater->escape($__vars['user']['username'])), $__templater->func('link', array('members', $__vars['user'], ), false), array(
	));
	$__finalCompiled .= '
<div class="block block--messages">
	<div class="block-container">
		<div class="block-body">
			';
	if (!$__templater->test($__vars['feedback'], 'empty', array())) {
		$__finalCompiled .= '
				';
		if ($__templater->isTraversable($__vars['feedback'])) {
			foreach ($__vars['feedback'] AS $__vars['feedback']) {
				$__finalCompiled .= '
					' . $__templater->callMacro('z61_classifieds_feedback_macros', 'feedback', array(
					'feedback' => $__vars['feedback'],
				), $__vars) . '
				';
			}
		}
		$__finalCompiled .= '
				';
	} else {
		$__finalCompiled .= '
				<div class="block-row js-replyNoMessages">' . '' . $__templater->escape($__vars['user']['username']) . ' has not received any feedback yet.' . '</div>
			';
	}
	$__finalCompiled .= '
		</div>
	</div>
</div>';
	return $__finalCompiled;
}
);