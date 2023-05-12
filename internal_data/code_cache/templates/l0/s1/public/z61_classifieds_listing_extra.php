<?php
// FROM HASH: e660f69ac70a8e8f88051e8d0b9ab6c2
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped($__templater->func('prefix', array('classifieds_listing', $__vars['listing'], 'escaped', ), true) . $__templater->escape($__vars['listing']['title']) . ' - ' . 'Extra info');
	$__finalCompiled .= '

';
	$__compilerTemp1 = $__vars;
	$__compilerTemp1['pageSelected'] = 'extra';
	$__templater->wrapTemplate('z61_classifieds_listing_wrapper', $__compilerTemp1);
	$__finalCompiled .= '

<div class="block">
    ';
	$__compilerTemp2 = '';
	$__compilerTemp2 .= '
                    ' . $__templater->callMacro('z61_classifieds_listing_wrapper_macros', 'action_buttons', array(
		'listing' => $__vars['listing'],
	), $__vars) . '
                ';
	if (strlen(trim($__compilerTemp2)) > 0) {
		$__finalCompiled .= '
        <div class="block-outer">
            <div class="block-outer-opposite">
                ' . $__compilerTemp2 . '
            </div>
        </div>
    ';
	}
	$__finalCompiled .= '

    <div class="block-container">
        <div class="block-body block-row">
            ' . $__templater->callMacro('custom_fields_macros', 'custom_fields_view', array(
		'type' => 'classifiedsListings',
		'group' => 'extra',
		'onlyInclude' => $__vars['category']['field_cache'],
		'set' => $__vars['listing']['custom_fields'],
	), $__vars) . '
        </div>
    </div>
</div>';
	return $__finalCompiled;
}
);