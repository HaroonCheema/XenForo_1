<?php
// FROM HASH: af776a2067b3556d953b02983b41d058
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['xf']['visitor'], 'canViewClassifiedsFeedback', array())) {
		$__finalCompiled .= '
	<a href="' . $__templater->func('link', array('members/feedback', $__vars['user'], ), true) . '"
	   class="tabs-tab" id="feedback" role="tab">
		' . 'Feedback' . '
		';
		if ($__vars['user']['ClassifiedsFeedbackInfo']) {
			$__finalCompiled .= '
		 ' . $__templater->filter($__vars['user']['ClassifiedsFeedbackInfo']['total'], array(array('parens', array()),), true) . '	
		';
		}
		$__finalCompiled .= '
	</a>
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['xf']['visitor'], 'canViewClassifieds', array())) {
		$__finalCompiled .= '
	<a href="' . $__templater->func('link', array('classifieds/authors', $__vars['user'], ), true) . '"
	   class="tabs-tab" id="listings" role="tab">
		' . 'Listings' . '
	</a>
';
	}
	return $__finalCompiled;
}
);