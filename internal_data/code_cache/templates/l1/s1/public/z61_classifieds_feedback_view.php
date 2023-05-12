<?php
// FROM HASH: 4df6bf4220c104ed0197b2ad9fa27a59
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Transaction feedback' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['feedback']['Listing']['title']));
	$__finalCompiled .= '
';
	$__templater->breadcrumb($__templater->preEscaped($__templater->escape($__vars['feedback']['ToUser']['username'])), $__templater->func('link', array('members', $__vars['feedback']['ToUser'], ), false), array(
	));
	$__finalCompiled .= '
';
	$__templater->breadcrumb($__templater->preEscaped('Feedback'), $__templater->func('link', array('members/feedback', $__vars['feedback']['ToUser'], ), false), array(
	));
	$__finalCompiled .= '
' . $__templater->form('
	<div class="block-container">
		<div class="block-header">
			' . $__templater->formInfoRow('
				' . 'Feedback by ' . $__templater->func('username_link', array($__vars['feedback']['FromUser'], false, array('defaultname' => $__vars['feedback']['from_username'], ), ), true) . ' about transaction with ' . $__templater->func('username_link', array($__vars['feedback']['ToUser'], false, array('defaultname' => $__vars['feedback']['to_username'], ), ), true) . '.' . '
            ', array(
	)) . '
        </div>
        <div class="block-body">
			' . $__templater->callMacro('z61_classifieds_feedback_macros', 'feedback', array(
		'feedback' => $__vars['feedback'],
	), $__vars) . '
		</div>
	</div>
', array(
		'action' => '#',
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);