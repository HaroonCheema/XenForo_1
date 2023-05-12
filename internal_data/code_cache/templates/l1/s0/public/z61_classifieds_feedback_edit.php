<?php
// FROM HASH: d20b214f9b0c976e36c328b175265768
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('
	' . 'Edit feedback for' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['user']['username']) . '
');
	$__finalCompiled .= '
';
	$__templater->breadcrumb($__templater->preEscaped($__templater->escape($__vars['user']['username'])), $__templater->func('link', array('members', $__vars['user'], ), false), array(
	));
	$__finalCompiled .= '

' . $__templater->form('

	<div class="block-container">
		<div class="block-body">
				' . $__templater->formRadioRow(array(
		'name' => 'rating',
		'value' => $__vars['feedback']['rating'],
	), array(array(
		'value' => 'positive',
		'label' => 'Positive',
		'_type' => 'option',
	),
	array(
		'value' => 'neutral',
		'label' => 'Neutral',
		'_type' => 'option',
	),
	array(
		'value' => 'negative',
		'label' => 'Negative',
		'_type' => 'option',
	)), array(
		'label' => 'Rating',
		'explain' => 'How would you rate your experience with this transaction?',
	)) . '
				' . $__templater->formEditorRow(array(
		'name' => 'message',
		'value' => $__vars['feedback']['feedback'],
	), array(
		'rowtype' => 'fullWidth noLabel mergePrev',
		'label' => 'Feedback',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
	), array(
	)) . '
	</div>
	' . $__templater->func('redirect_input', array($__templater->func('link', array('members', $__vars['user'], ), false) . '#feedback', null, true)) . '
', array(
		'action' => $__templater->func('link', array('members/feedback/save', $__vars['user'], array('feedback_id' => $__vars['feedback']['feedback_id'], ), ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);