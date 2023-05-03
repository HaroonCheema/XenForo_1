<?php
// FROM HASH: 68580c207e940409390c468300087e55
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Submit feedback');
	$__finalCompiled .= '

';
	$__templater->includeCss('andy_trader.less');
	$__finalCompiled .= '

' . $__templater->func('username_link', array($__vars['user'], true, array(
	))) . '

<br /><br />

<a href="' . $__templater->func('link', array('trader/history', '', array('user_id' => $__vars['userId'], ), ), true) . '" rel="nofollow">' . 'Return to trader history' . '</a>
<br />
<br />

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			
			' . $__templater->formTextBoxRow(array(
		'name' => 'username',
		'readonly' => 'readonly',
		'value' => $__vars['username'],
		'class' => 'trader-muted',
	), array(
		'label' => 'Username',
	)) . '
			
			' . $__templater->formRadioRow(array(
		'name' => 'rating',
	), array(array(
		'value' => '0',
		'selected' => 1,
		'label' => 'Positive',
		'_type' => 'option',
	),
	array(
		'value' => '1',
		'label' => 'Neutral',
		'_type' => 'option',
	),
	array(
		'value' => '2',
		'label' => 'Negative',
		'_type' => 'option',
	)), array(
		'label' => 'Rating',
	)) . '

			' . $__templater->formTextAreaRow(array(
		'name' => 'seller_comment',
		'rows' => '5',
		'autosize' => 'true',
	), array(
		'label' => 'Seller comment',
		'explain' => 'As a seller please describe your experience with this buyer. (200 character limit)',
	)) . '
		</div>
	</div>

	' . $__templater->formSubmitRow(array(
		'submit' => 'Submit',
	), array(
	)) . '

', array(
		'action' => $__templater->func('link', array('trader/savebuyer', '', array('user_id' => $__vars['userId'], ), ), false),
		'ajax' => 'false',
		'class' => 'block',
		'data-force-flash-message' => 'true',
	));
	return $__finalCompiled;
}
);