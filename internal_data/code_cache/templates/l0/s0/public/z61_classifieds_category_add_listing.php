<?php
// FROM HASH: 393e409880b109bde65b2f08d3b9181c
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Add listing');
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['category'], 'getBreadcrumbs', array()));
	$__finalCompiled .= '

';
	$__templater->includeJs(array(
		'src' => 'https://maps.googleapis.com/maps/api/js?key=' . $__vars['xf']['options']['z61ClassifiedsGoogleApi'] . '&libraries=places',
	));
	$__finalCompiled .= '
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
	if ($__vars['attachmentData']) {
		$__compilerTemp1 .= '
						' . $__templater->callMacro('helper_attach_upload', 'upload_block', array(
			'attachmentData' => $__vars['attachmentData'],
			'forceHash' => $__vars['category']['draft_listing']['attachment_hash'],
		), $__vars) . '
					';
	}
	$__compilerTemp2 = '';
	if ($__vars['category']['location_enable']) {
		$__compilerTemp2 .= '
				' . $__templater->formTextBoxRow(array(
			'name' => 'listing_location',
			'id' => 'location',
			'maxlength' => $__templater->func('max_length', array($__vars['listing'], 'listing_location', ), false),
			'placeholder' => 'Enter a location' . $__vars['xf']['language']['ellipsis'],
			'value' => $__vars['listing']['listing_location'],
		), array(
			'label' => 'Location',
		)) . '
			';
	}
	$__compilerTemp3 = '';
	if ($__vars['category']['allow_paid']) {
		$__compilerTemp3 .= '
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
	$__compilerTemp4 = '';
	$__compilerTemp5 = '';
	$__compilerTemp5 .= '
					' . $__templater->callMacro('custom_fields_macros', 'custom_fields_edit', array(
		'type' => 'classifiedsListings',
		'set' => $__vars['listing']['custom_fields'],
		'group' => array('above', 'below', 'extra', ),
		'editMode' => $__templater->method($__vars['listing'], 'getFieldEditMode', array()),
		'onlyInclude' => $__vars['category']['field_cache'],
	), $__vars) . '
				';
	if (strlen(trim($__compilerTemp5)) > 0) {
		$__compilerTemp4 .= '
				<h2 class="block-formSectionHeader"><span class="block-formSectionHeader-aligner">' . 'Additional information' . '</span></h2>
				' . $__compilerTemp5 . '
			';
	}
	$__compilerTemp6 = '';
	if (!$__templater->test($__vars['conditions'], 'empty', array())) {
		$__compilerTemp6 .= '
				' . $__templater->callMacro('z61_classifieds_listing_edit_macros', 'condition', array(
			'category' => $__vars['category'],
			'listing' => $__vars['listing'],
			'conditions' => $__vars['conditions'],
		), $__vars) . '
			';
	}
	$__compilerTemp7 = '';
	if (!$__templater->test($__vars['packages'], 'empty', array())) {
		$__compilerTemp7 .= '
				' . $__templater->callMacro('z61_classifieds_listing_edit_macros', 'package', array(
			'category' => $__vars['category'],
			'listing' => $__vars['listing'],
			'packages' => $__vars['packages'],
		), $__vars) . '
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

			<div>
				' . $__templater->formEditorRow(array(
		'name' => 'message',
		'value' => ($__vars['category']['draft_listing']['message'] ?: $__vars['category']['listing_template']),
		'attachments' => ($__vars['attachmentData'] ? $__vars['attachmentData']['attachments'] : array()),
	), array(
		'rowtype' => 'fullWidth noLabel mergePrev',
		'label' => 'Message',
	)) . '

				' . $__templater->formRow('
					' . $__compilerTemp1 . '
				', array(
	)) . '
			</div>
			' . $__compilerTemp2 . '
			' . $__templater->callMacro('z61_classifieds_listing_edit_macros', 'tags', array(
		'listing' => $__vars['listing'],
		'category' => $__vars['category'],
	), $__vars) . '

			' . $__compilerTemp3 . '

			' . $__compilerTemp4 . '

			<h2 class="block-formSectionHeader"><span class="block-formSectionHeader-aligner">' . 'Listing options' . '</span></h2>

			' . $__templater->callMacro('z61_classifieds_listing_edit_macros', 'type', array(
		'listing' => $__vars['listing'],
		'category' => $__vars['category'],
		'listingTypes' => $__vars['listingTypes'],
	), $__vars) . '

			' . $__compilerTemp6 . '

			' . $__compilerTemp7 . '
		</div>

		' . $__templater->callMacro('z61_classifieds_listing_edit_macros', 'contact_info', array(
		'listing' => $__vars['listing'],
		'category' => $__vars['category'],
	), $__vars) . '

		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
		'sticky' => 'true',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('classifieds/categories/add', $__vars['category'], ), false),
		'ajax' => 'true',
		'class' => 'block',
		'data-xf-init' => 'attachment-manager',
		'draft' => $__templater->func('link', array('classifieds/categories/draft', $__vars['category'], ), false),
		'data-preview-url' => $__templater->func('link', array('classifieds/categories/listing-preview', $__vars['category'], ), false),
	));
	return $__finalCompiled;
}
);