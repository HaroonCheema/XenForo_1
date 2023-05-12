<?php
// FROM HASH: e328e765f108e54cb7af6514f58834d7
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['extras']['z61ClassifiedsFeedbackBasic'] AND $__vars['user']['ClassifiedsFeedbackInfo']) {
		$__finalCompiled .= '
	<dl class="pairs pairs--justified">
		<dt>' . 'Feedback score' . '</dt>
		<dd><a href="' . $__templater->func('link', array('members/feedback', $__vars['user'], ), true) . '" data-xf-click="overlay">' . $__templater->escape($__vars['user']['ClassifiedsFeedbackInfo']['total']) . '</a></dd>
	</dl>
';
	}
	return $__finalCompiled;
}
);