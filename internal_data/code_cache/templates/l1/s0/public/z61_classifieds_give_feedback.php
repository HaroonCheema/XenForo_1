<?php
// FROM HASH: b4b19e9b50485641ea6923d3af9e8b9a
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Give feedback for transaction' . ': ' . $__templater->escape($__vars['listing']['title']));
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['xf']['visitor']['user_id'] == $__vars['listing']['user_id']) {
		$__compilerTemp1 .= '
                        ' . $__templater->func('username_link', array($__vars['listing']['SoldUser'], false, array(
		))) . '
                    ';
	} else {
		$__compilerTemp1 .= '
                        ' . $__templater->func('username_link', array($__vars['listing']['User'], false, array(
		))) . '
                    ';
	}
	$__vars['rateUser'] = $__templater->preEscaped('
                    ' . $__compilerTemp1 . '
                ');
	$__finalCompiled .= $__templater->form('
    <div class="block-container">
        <div class="block-body">
            ' . $__templater->formInfoRow('
                ' . '' . '
                ' . 'You are rating user: ' . $__templater->escape($__vars['rateUser']) . '' . '
            ', array(
		'rowtype' => 'confirm',
	)) . '
            ' . $__templater->formRadioRow(array(
		'name' => 'role',
	), array(array(
		'value' => 'buyer',
		'label' => 'Buyer',
		'_type' => 'option',
	),
	array(
		'value' => 'seller',
		'label' => 'Seller',
		'_type' => 'option',
	),
	array(
		'value' => 'trader',
		'label' => 'Trader',
		'_type' => 'option',
	)), array(
		'label' => 'Your role',
		'explain' => 'What was your role in this transaction?',
	)) . '

            ' . $__templater->formRadioRow(array(
		'name' => 'rating',
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

            ' . $__templater->formTextAreaRow(array(
		'name' => 'feedback',
		'autosize' => 'true',
	), array(
		'label' => 'Additional information',
	)) . '
        </div>

        ' . $__templater->formSubmitRow(array(
		'submit' => 'Submit feedback',
	), array(
	)) . '
    </div>
', array(
		'action' => $__templater->func('link', array('classifieds/give-feedback', $__vars['listing'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);