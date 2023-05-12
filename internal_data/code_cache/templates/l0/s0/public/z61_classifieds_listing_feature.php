<?php
// FROM HASH: 1cf23e00f62b017064f914fe55cd0582
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Confirm feature' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['listing']['title']));
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
                ' . 'Please confirm you wish to feature this item for the displayed fee' . $__vars['xf']['language']['label_separator'] . '
                <strong><a href="' . $__templater->func('link', array('classifieds', $__vars['listing'], ), true) . '">' . $__templater->escape($__vars['listing']['title']) . '</a></strong>
            ', array(
		'rowtype' => 'confirm',
	)) . '

            ' . $__templater->formRow('
                ' . $__templater->escape($__vars['listing']['Category']['cost_phrase']) . '
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
		'submit' => 'Buy for ' . $__templater->filter($__vars['listing']['Category']['price'], array(array('currency', array($__vars['listing']['Category']['currency'], )),), true) . '',
	), array(
		'rowtype' => '',
	)) . '
    </div>
', array(
		'action' => $__templater->func('link', array('classifieds/feature', $__vars['listing'], ), false),
		'ajax' => 'true',
		'data-xf-init' => 'payment-provider-container',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);