<?php
// FROM HASH: 47ca54aa13b4b9316ed8de3bdfdc79c6
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['z61ClassifiedsListing']) {
		$__finalCompiled .= '
	';
		$__vars['originalH1'] = $__templater->preEscaped($__templater->func('page_h1', array('')));
		$__finalCompiled .= '
	';
		$__vars['originalDescription'] = $__templater->preEscaped($__templater->func('page_description'));
		$__finalCompiled .= '

	';
		$__templater->pageParams['noH1'] = true;
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageDescription'] = $__templater->preEscaped('');
		$__templater->pageParams['pageDescriptionMeta'] = true;
		$__finalCompiled .= '

	' . $__templater->callMacro('z61_classifieds_listing_wrapper_macros', 'header', array(
			'listing' => $__vars['z61ClassifiedsListing'],
			'titleHtml' => $__vars['originalH1'],
			'metaHtml' => $__vars['originalDescription'],
		), $__vars) . '

	' . $__templater->callMacro('z61_classifieds_listing_wrapper_macros', 'tabs', array(
			'listing' => $__vars['z61ClassifiedsListing'],
			'selected' => 'discussion',
		), $__vars) . '
';
	}
	return $__finalCompiled;
}
);