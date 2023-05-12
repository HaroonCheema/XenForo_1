<?php
// FROM HASH: 814a1196ed0ab80291023c9fd383c2d5
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Contact listing owner: ' . $__templater->escape($__vars['user']['username']) . '');
	$__finalCompiled .= '
';
	$__templater->breadcrumb($__templater->preEscaped($__templater->escape($__vars['listing']['title'])), $__templater->func('link', array('classifieds', $__vars['listing'], ), false), array(
	));
	$__finalCompiled .= '
<div class="block">
	<div class="block-container">
		<div class="block-body">
			';
	if ($__vars['conversation']) {
		$__finalCompiled .= '
				';
		$__compilerTemp1 = '';
		if ($__templater->method($__vars['xf']['visitor'], 'canStartConversationWith', array($__vars['user'], ))) {
			$__compilerTemp1 .= '
						' . $__templater->button('
							' . 'Start conversation' . '
						', array(
				'href' => $__templater->func('link', array('conversations/add', null, array('to' => $__vars['user']['username'], 'title' => $__vars['conversationTitle'], ), ), false),
				'class' => 'button--cta',
			), '', array(
			)) . '
					';
		} else {
			$__compilerTemp1 .= '
						<span class="button is-disabled">' . 'You may not start a conversation with this user.' . '</span>
					';
		}
		$__finalCompiled .= $__templater->formRow('
					' . $__compilerTemp1 . '
				', array(
			'label' => 'Conversation',
		)) . '
			';
	}
	$__finalCompiled .= '
			';
	if ($__vars['email'] AND !$__templater->test($__vars['listing']['contact_email'], 'empty', array())) {
		$__finalCompiled .= '
				' . $__templater->formRow('
					' . $__templater->escape($__vars['listing']['contact_email']) . '
				', array(
			'label' => 'Email',
		)) . '
			';
	}
	$__finalCompiled .= '
			';
	if ($__vars['custom'] AND !$__templater->test($__vars['listing']['contact_custom'], 'empty', array())) {
		$__finalCompiled .= '
				' . $__templater->formRow('
					' . $__templater->escape($__vars['listing']['contact_custom']) . '
				', array(
			'label' => 'Other',
		)) . '
			';
	}
	$__finalCompiled .= '
		</div>
	</div>
</div>';
	return $__finalCompiled;
}
);