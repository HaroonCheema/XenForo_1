<?php
// FROM HASH: f30aa4ce98b39c2e0fefcfe277bbf061
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Edit post');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['quickEdit']) {
		$__compilerTemp1 .= '
					' . $__templater->button('Cancel', array(
			'class' => 'js-cancelButton',
		), '', array(
		)) . '
				';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formEditorRow(array(
		'name' => 'message',
		'value' => $__vars['post']['message'],
		'attachments' => $__vars['attachmentData']['attachments'],
		'data-min-height' => '100',
		'maxlength' => $__vars['xf']['options']['messageMaxLength'],
	), array(
		'rowtype' => ($__vars['quickEdit'] ? 'fullWidth noLabel' : ''),
		'label' => 'Message',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
		'sticky' => 'true',
	), array(
		'rowtype' => ($__vars['quickEdit'] ? 'simple' : ''),
		'html' => '
				' . $__compilerTemp1 . '
			',
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('group_discussions/edit', $__vars['group'], array('post' => $__vars['post']['discussion_id'], 'p' => $__vars['position'], ), ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);