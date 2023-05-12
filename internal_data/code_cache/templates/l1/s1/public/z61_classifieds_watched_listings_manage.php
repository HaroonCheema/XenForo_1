<?php
// FROM HASH: fb7bb499302398ebddbb42a877dbf9eb
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Manage watched classifieds listings');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['state'] == 'delete') {
		$__compilerTemp1 .= '
                    ' . 'Are you sure you want to stop watching <b>all</b> listings?' . '
                    ';
	} else {
		$__compilerTemp1 .= '
                    ' . 'Are you sure you want to update your email notification settings for <b>all</b> listings?' . '
                ';
	}
	$__finalCompiled .= $__templater->form('
    <div class="block-container">
        <div class="block-row">
            ' . $__templater->formInfoRow('
                ' . $__compilerTemp1 . '
            ', array(
		'rowtype' => 'confirm',
	)) . '
        </div>
        ' . $__templater->formSubmitRow(array(
		'submit' => 'Confirm',
		'icon' => 'notificationsOff',
	), array(
		'rowtype' => 'simple',
	)) . '
    </div>
', array(
		'action' => $__templater->func('link', array('watched/classifieds/manage', null, array('state' => $__vars['state'], ), ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);