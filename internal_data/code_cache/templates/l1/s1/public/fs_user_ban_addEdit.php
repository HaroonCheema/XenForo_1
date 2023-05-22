<?php
// FROM HASH: 34cdd40947633dcb522649d8540016d5
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['userBanned']['user_id']) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Edit ' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['userBanned']['User']['username']));
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Ban Member');
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '
';
	$__compilerTemp1 = '';
	if ($__vars['userBanned']['user_id']) {
		$__compilerTemp1 .= '
					' . $__templater->button('
						' . 'Cancel Ban' . '
					', array(
			'href' => $__templater->func('link', array('scheduleBanUser/delete', $__vars['userBanned'], ), false),
			'overlay' => 'true',
		), '', array(
		)) . '
				';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
		
				' . $__templater->formRow('

					' . $__templater->formDateInput(array(
		'name' => 'ban_date',
		'value' => ($__vars['userBanned']['ban_date'] ? $__templater->func('date', array($__vars['userBanned']['ban_date'], 'Y-m-d', ), false) : $__templater->func('date', array($__vars['xf']['time'], 'Y-m-d', ), false)),
	)) . '
		
					<input type="hidden" name="user_id" value="' . ($__vars['userBanned']['user_id'] ? $__templater->escape($__vars['userBanned']['user_id']) : $__templater->escape($__vars['user_id'])) . '">
					<input type="hidden" name="ban_id" value="' . ($__vars['userBanned']['ban_id'] ? $__templater->escape($__vars['userBanned']['ban_id']) : null) . '">
					
				', array(
		'label' => 'Ban start',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'ban_reason',
		'value' => ($__vars['userBanned']['ban_reason'] ? $__vars['userBanned']['ban_reason'] : ''),
	), array(
		'label' => 'Reason for banning',
		'explain' => 'This will be shown to the user if provided.',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
	), array(
		'html' => '
				' . $__compilerTemp1 . '
			',
	)) . '
	</div>
	' . $__templater->func('redirect_input', array(null, null, true)) . '
', array(
		'action' => $__templater->func('link', array('scheduleBanUser/save', ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);