<?php
// FROM HASH: 091979d2ff01333cfcc2370bacc07b63
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__compilerTemp1 = '';
	if ($__vars['xf']['options']['multiQuote']) {
		$__compilerTemp1 .= '
					' . $__templater->callMacro('multi_quote_macros', 'button', array(
			'href' => $__templater->func('link', array('threads/multi-quote', $__vars['thread'], ), false),
			'messageSelector' => '.js-post',
			'storageKey' => 'multiQuoteThread',
		), $__vars) . '
				';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formEditorRow(array(
		'name' => 'message',
		'value' => $__vars['defaultMessage'],
		'maxlength' => $__vars['xf']['options']['messageMaxLength'],
		'placeholder' => 'Write your reply...',
	), array(
		'rowtype' => 'fullWidth noLabel',
		'label' => 'Message',
	)) . '

			' . $__templater->formRow('
				' . $__compilerTemp1 . '
			', array(
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Post reply',
		'icon' => 'reply',
		'sticky' => 'true',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('group_discussions/add-reply', $__vars['group'], array('id' => $__vars['discussion']['discussion_id'], ), ), false),
		'class' => 'block',
		'ajax' => 'true',
		'draft' => $__templater->func('link', array('group_discussions/draft', $__vars['group'], array('id' => $__vars['discussion'], ), ), false),
	));
	return $__finalCompiled;
}
);