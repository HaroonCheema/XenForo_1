<?php
// FROM HASH: f961121ee2ab620c1d4583fdf1911428
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['noH1'] = true;
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['listing']['Category'], 'getBreadcrumbs', array()));
	$__finalCompiled .= '
';
	$__templater->includeCss('z61_classifieds.less');
	$__finalCompiled .= '

' . $__templater->callMacro('z61_classifieds_listing_page_macros', 'listing_page_options', array(
		'category' => $__vars['listing']['Category'],
		'listing' => $__vars['listing'],
	), $__vars) . '

' . $__templater->callMacro('z61_classifieds_listing_wrapper_macros', 'header', array(
		'listing' => $__vars['listing'],
	), $__vars) . '

' . $__templater->callMacro('z61_classifieds_listing_wrapper_macros', 'tabs', array(
		'listing' => $__vars['listing'],
		'selected' => $__vars['pageSelected'],
	), $__vars) . '

' . $__templater->callMacro('z61_classifieds_listing_wrapper_macros', 'status', array(
		'listing' => $__vars['listing'],
	), $__vars) . '

' . $__templater->filter($__vars['innerContent'], array(array('raw', array()),), true);
	return $__finalCompiled;
}
);