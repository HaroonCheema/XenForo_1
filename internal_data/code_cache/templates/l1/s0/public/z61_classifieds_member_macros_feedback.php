<?php
// FROM HASH: 9579d56cb7bdd7950650f0389bcc0745
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['xf']['options']['z61ClassifiedsListingCurrencies']) {
		$__finalCompiled .= '
		<dl class="pairs pairs--rows pairs--rows--centered fauxBlockLink">
			<dt title="' . $__templater->filter('Feedback', array(array('for_attr', array()),), true) . '">' . 'Feedback' . '</dt>
			<dd>
				<a href="' . $__templater->func('link', array('members/feedback', $__vars['user'], ), true) . '" data-xf-click="overlay" class="fauxBlockLink-linkRow u-concealed">
					' . $__templater->filter($__vars['user']['ClassifiedsFeedbackInfo']['total'], array(array('number', array()),), true) . '
				</a>
			</dd>
		</dl>
';
	}
	return $__finalCompiled;
}
);