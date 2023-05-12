<?php
// FROM HASH: 4ba4c53f34592298af18f8afcf30fadd
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Edit listing');
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['listing'], 'getBreadcrumbs', array()));
	$__finalCompiled .= '
<script src="https://maps.googleapis.com/maps/api/js?key=' . $__templater->escape($__vars['xf']['options']['z61ClassifiedsGoogleApi']) . '&libraries=places"></script>
';
	$__templater->includeJs(array(
		'src' => 'z61/classifieds/geocomplete.js',
	));
	$__finalCompiled .= '
';
	$__templater->inlineJs('
	$("#location").geocomplete();  
');
	$__finalCompiled .= '
';
	$__compilerTemp1 = '';
	if ($__vars['category']['location_enable']) {
		$__compilerTemp1 .= '
				' . $__templater->formTextBoxRow(array(
			'id' => 'location',
			'name' => 'listing_location',
			'maxlength' => $__templater->func('max_length', array($__vars['listing'], 'listing_location', ), false),
			'placeholder' => 'Enter a location' . $__vars['xf']['language']['ellipsis'],
			'value' => $__vars['listing']['listing_location'],
		), array(
			'label' => 'Location',
		)) . '
			';
	}
	$__compilerTemp2 = '';
	if ($__vars['category']['allow_paid']) {
		$__compilerTemp2 .= '
				' . $__templater->formRow('
					' . $__templater->callMacro('z61_classifieds_listing_edit_macros', 'purchase_inputs', array(
			'listing' => $__vars['listing'],
		), $__vars) . '
				', array(
			'rowtype' => 'input',
			'label' => 'Price',
		)) . '
			';
	}
	$__compilerTemp3 = '';
	$__compilerTemp4 = '';
	$__compilerTemp4 .= '
					' . $__templater->callMacro('custom_fields_macros', 'custom_fields_edit', array(
		'type' => 'classifiedsListings',
		'set' => $__vars['listing']['custom_fields'],
		'group' => array('above', 'below', 'extra', ),
		'editMode' => $__templater->method($__vars['listing'], 'getFieldEditMode', array()),
		'onlyInclude' => $__vars['category']['field_cache'],
	), $__vars) . '
				';
	if (strlen(trim($__compilerTemp4)) > 0) {
		$__compilerTemp3 .= '
				<h2 class="block-formSectionHeader"><span class="block-formSectionHeader-aligner">' . 'Additional information' . '</span></h2>
				' . $__compilerTemp4 . '
			';
	}
	$__compilerTemp5 = '';
	if (!$__templater->test($__vars['conditions'], 'empty', array())) {
		$__compilerTemp5 .= '
				' . $__templater->callMacro('z61_classifieds_listing_edit_macros', 'condition', array(
			'category' => $__vars['category'],
			'listing' => $__vars['listing'],
			'conditions' => $__vars['conditions'],
		), $__vars) . '
			';
	}
	$__compilerTemp6 = '';
	if ($__templater->method($__vars['listing'], 'canSendModeratorActionAlert', array())) {
		$__compilerTemp6 .= '
				<hr class="formRowSep" />

				' . $__templater->formRow('
					' . $__templater->callMacro('helper_action', 'author_alert', array(
			'row' => false,
		), $__vars) . '
				', array(
		)) . '
			';
	}
	$__finalCompiled .= $__templater->form('

	<div class="block-container">
		<div class="block-body">
			' . $__templater->callMacro('z61_classifieds_listing_edit_macros', 'title', array(
		'category' => $__vars['category'],
		'listing' => $__vars['listing'],
		'prefixes' => $__vars['prefixes'],
	), $__vars) . '

			' . $__templater->callMacro('z61_classifieds_listing_edit_macros', 'content', array(
		'listing' => $__vars['listing'],
		'category' => $__vars['category'],
		'attachmentData' => $__vars['attachmentData'],
	), $__vars) . '

			' . $__compilerTemp1 . '

			' . $__templater->callMacro('z61_classifieds_listing_edit_macros', 'tags', array(
		'listing' => $__vars['listing'],
		'category' => $__vars['category'],
	), $__vars) . '
			
			' . $__compilerTemp2 . '

			' . $__compilerTemp3 . '

			<h2 class="block-formSectionHeader"><span class="block-formSectionHeader-aligner">' . 'Listing options' . '</span></h2>
			' . $__templater->callMacro('z61_classifieds_listing_edit_macros', 'type', array(
		'category' => $__vars['category'],
		'listing' => $__vars['listing'],
		'listingTypes' => $__vars['listingTypes'],
	), $__vars) . '

			' . $__compilerTemp5 . '

			' . $__templater->callMacro('z61_classifieds_listing_edit_macros', 'contact_info', array(
		'listing' => $__vars['listing'],
		'category' => $__vars['category'],
	), $__vars) . '
			
			' . $__compilerTemp6 . '
		</div>

		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
		'sticky' => 'true',
	), array(
		'html' => '
				' . $__templater->button('', array(
		'class' => 'u-jsOnly',
		'data-xf-click' => 'preview-click',
		'icon' => 'preview',
	), '', array(
	)) . '
			',
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('classifieds/edit', $__vars['listing'], ), false),
		'upload' => 'true',
		'ajax' => 'true',
		'class' => 'block',
		'data-xf-init' => 'attachment-manager',
		'data-preview-url' => $__templater->func('link', array('classifieds/preview', $__vars['listing'], ), false),
	));
	return $__finalCompiled;
}
);