<?php
// FROM HASH: 1d1682cb8addcfabeb017a657284bb5e
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Add moderator');
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formTextBoxRow(array(
		'name' => 'username',
		'value' => $__vars['username'],
		'type' => 'search',
		'ac' => 'single',
		'placeholder' => 'Username' . $__vars['xf']['language']['ellipsis'],
	), array(
		'label' => 'Moderator username',
	)) . '

			' . $__templater->formRadioRow(array(
		'name' => 'type',
		'value' => $__vars['type'],
	), array(array(
		'value' => '_super',
		'label' => 'Super moderator',
		'hint' => 'A super moderator can moderate the entire board.',
		'_type' => 'option',
	),
	array(
		'value' => 'node',
		'label' => 'Forum moderator',
		'selected' => true,
		'_type' => 'option',
	)), array(
		'label' => 'Type of moderator',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Add moderator' . $__vars['xf']['language']['ellipsis'],
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('molly/add-moderator', $__vars['subForum'], ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
}
);