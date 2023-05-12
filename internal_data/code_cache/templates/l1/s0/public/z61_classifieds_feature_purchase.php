<?php
// FROM HASH: 1cdde5793ccdb4d4029c1084a8a1292a
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Thanks for your purchase!');
	$__finalCompiled .= '

';
	$__templater->wrapTemplate('z61_classifieds_listing_wrapper', $__vars);
	$__finalCompiled .= '

<div class="blockMessage">' . 'Thank you for purchasing this upgrade.<br />
<br />
When the payment has been approved, your listing will be upgraded.' . '</div>';
	return $__finalCompiled;
}
);