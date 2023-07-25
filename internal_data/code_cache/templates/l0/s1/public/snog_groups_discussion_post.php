<?php
// FROM HASH: 0855ef466c03e5f0fbbb6ce5e320f522
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Start new discussion');
	$__finalCompiled .= '

<div class="block-container">
	<div class="block-body">
		' . $__templater->form('
			<div class="postholder">
				' . $__templater->formRow('
					' . $__templater->formTextBoxRow(array(
		'name' => 'title',
		'value' => '',
		'placeholder' => 'Discussion title' . '...',
	), array(
		'label' => 'Title',
		'rowtype' => 'fullWidth noLabel',
	)) . '
					<hr class="formRowSep" />
					' . $__templater->formEditorRow(array(
		'name' => 'message',
		'value' => $__vars['discussion']['draft']['message'],
	), array(
		'rowtype' => 'fullWidth noLabel',
		'label' => 'Message',
	)) . '
				', array(
		'rowtype' => 'fullWidth noLabel',
	)) . '		
			</div>
			' . $__templater->formSubmitRow(array(
		'submit' => 'Post discussion',
		'icon' => 'write',
		'sticky' => 'true',
	), array(
	)) . '
		', array(
		'action' => $__templater->func('link', array('group_discussions/post-new', $__vars['group'], ), false),
		'ajax' => 'true',
		'class' => 'block',
		'data-xf-init' => 'attachment-manager',
	)) . '
	</div>
</div>';
	return $__finalCompiled;
}
);