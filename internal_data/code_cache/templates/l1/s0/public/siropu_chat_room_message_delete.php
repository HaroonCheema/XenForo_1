<?php
// FROM HASH: 9ce63a17136dca5d6cc54309132af15f
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Delete message');
	$__finalCompiled .= '

';
	$__templater->includeJs(array(
		'src' => 'siropu/chat/message.js',
		'min' => 'true',
	));
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body block-row">
			' . $__templater->func('bb_code', array($__vars['message']['message_text'], 'siropu_chat_room_message', $__vars['message']['User'], ), true) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'delete',
		'class' => 'js-overlayClose',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('chat/message/delete', $__vars['message'], ), false),
		'class' => 'block',
		'data-xf-init' => 'siropu-chat-message-delete',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);