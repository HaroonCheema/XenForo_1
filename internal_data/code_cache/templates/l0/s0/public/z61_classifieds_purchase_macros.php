<?php
// FROM HASH: 033682ca6b80d01839061b6c2d5fc62d
return array(
'macros' => array('payment_profiles' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'listing' => '!',
		'profiles' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	if (($__templater->func('count', array($__vars['listing']['Package']['payment_profile_ids'], ), false) > 1)) {
		$__finalCompiled .= '
		';
		$__compilerTemp1 = array(array(
			'label' => $__vars['xf']['language']['parenthesis_open'] . 'Choose a payment method' . $__vars['xf']['language']['parenthesis_close'],
			'_type' => 'option',
		));
		if ($__templater->isTraversable($__vars['listing']['Package']['payment_profile_ids'])) {
			foreach ($__vars['listing']['Package']['payment_profile_ids'] AS $__vars['profileId']) {
				if ($__templater->func('in_array', array($__vars['profileId'], $__vars['listing']['Category']['payment_profile_ids'], ), false)) {
					$__compilerTemp1[] = array(
						'value' => $__vars['profileId'],
						'label' => $__templater->escape($__vars['profiles'][$__vars['profileId']]),
						'_type' => 'option',
					);
				}
			}
		}
		$__finalCompiled .= $__templater->formSelectRow(array(
			'name' => 'payment_profile_id',
		), $__compilerTemp1, array(
			'label' => 'Pay using',
		)) . '
	';
	} else {
		$__finalCompiled .= '
		' . $__templater->formHiddenVal('payment_profile_id', $__templater->filter($__vars['listing']['Package']['payment_profile_ids'], array(array('first', array()),), false), array(
		)) . '
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';

	return $__finalCompiled;
}
);