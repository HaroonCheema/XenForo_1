<?php
// FROM HASH: 03911853113f7106c0edfab966b04428
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Confirm purchase' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['listing']['title']));
	$__finalCompiled .= '

';
	$__templater->includeJs(array(
		'src' => 'xf/payment.js',
		'min' => '1',
	));
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Please confirm you wish to list this item for the displayed fee' . ':
				<strong>' . $__templater->escape($__vars['listing']['title']) . '</strong>
			', array(
		'rowtype' => 'confirm',
	)) . '

			' . $__templater->formRow('
				' . $__templater->escape($__vars['listing']['Type']['title']) . '
			', array(
		'label' => 'Type',
	)) . '

			' . $__templater->formRow('
				' . $__templater->escape($__vars['listing']['Condition']['title']) . '
			', array(
		'label' => 'Condition',
	)) . '

			' . $__templater->formRow('
				' . $__templater->escape($__vars['listing']['Package']['cost_phrase']) . '
			', array(
		'label' => 'Cost',
	)) . '

			' . $__templater->callMacro('z61_classifieds_purchase_macros', 'payment_profiles', array(
		'listing' => $__vars['listing'],
		'profiles' => $__vars['profiles'],
	), $__vars) . '
		</div>

		' . $__templater->formSubmitRow(array(
		'icon' => 'purchase',
		'class' => 'js-payButton',
		'submit' => 'Buy for ' . $__templater->filter($__vars['listing']['Package']['cost_amount'], array(array('currency', array($__vars['listing']['Package']['cost_currency'], )),), true) . '',
	), array(
		'rowtype' => '',
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('purchase', $__vars['listing'], array('listing_id' => $__vars['listing']['listing_id'], ), ), false),
		'ajax' => 'true',
		'data-xf-init' => 'payment-provider-container',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);