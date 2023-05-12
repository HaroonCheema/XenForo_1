<?php
// FROM HASH: 9f1742d0e957435e405ac5f874d30ecb
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Your featured listings');
	$__finalCompiled .= '


';
	$__templater->includeJs(array(
		'src' => 'xf/payment.js',
		'min' => '1',
	));
	return $__finalCompiled;
}
);