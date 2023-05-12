<?php
// FROM HASH: e25da874dd994bb54f59735a03bd1f3f
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['category'], 'isInsert', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Add category');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Edit category' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['category']['title']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['category']['category_id']) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('', array(
			'href' => $__templater->func('link', array('classifieds/categories/delete', $__vars['category'], ), false),
			'icon' => 'delete',
			'data-xf-click' => 'overlay',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

';
	$__compilerTemp1 = array();
	if ($__templater->isTraversable($__vars['nodes'])) {
		foreach ($__vars['nodes'] AS $__vars['nodeId'] => $__vars['node']) {
			$__compilerTemp1[] = array(
				'value' => $__vars['node']['value'],
				'disabled' => $__vars['node']['disabled'],
				'label' => $__templater->escape($__vars['node']['label']),
				'_type' => 'option',
			);
		}
	}
	$__templater->includeJs(array(
		'src' => 'xf/prefix_menu.js',
		'min' => '1',
	));
	$__compilerTemp2 = array();
	$__compilerTemp3 = $__templater->method($__templater->method($__vars['xf']['app']['em'], 'getRepository', array('Z61\\Classifieds:Listing', )), 'getAvailableCurrencies', array());
	if ($__templater->isTraversable($__compilerTemp3)) {
		foreach ($__compilerTemp3 AS $__vars['currency']) {
			$__compilerTemp2[] = array(
				'value' => $__vars['currency']['code'],
				'label' => $__templater->escape($__vars['currency']['code']),
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp4 = array();
	if ($__templater->isTraversable($__vars['profiles'])) {
		foreach ($__vars['profiles'] AS $__vars['profileId'] => $__vars['profile']) {
			$__compilerTemp4[] = array(
				'value' => $__vars['profileId'],
				'label' => (($__vars['profile']['Provider']['title'] !== $__vars['profile']['title']) ? (($__templater->escape($__vars['profile']['Provider']['title']) . ' - ') . $__templater->escape($__vars['profile']['title'])) : $__templater->escape($__vars['profile']['Provider']['title'])),
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp5 = '';
	if (!$__templater->test($__vars['listingTypes'], 'empty', array())) {
		$__compilerTemp5 .= '
				<hr class="formRowSep" />

				';
		$__compilerTemp6 = array();
		if ($__templater->isTraversable($__vars['listingTypes'])) {
			foreach ($__vars['listingTypes'] AS $__vars['listingTypeId'] => $__vars['listingType']) {
				$__compilerTemp6[] = array(
					'value' => $__vars['listingTypeId'],
					'label' => $__templater->escape($__vars['listingType']['title']),
					'checked' => $__templater->func('in_array', array($__vars['listingType']['listing_type_id'], $__vars['category']['listing_type_ids'], ), false),
					'_type' => 'option',
				);
			}
		}
		$__compilerTemp5 .= $__templater->formCheckBoxRow(array(
			'name' => 'listing_type_ids',
			'value' => $__vars['category']['listing_type_ids'],
		), $__compilerTemp6, array(
			'label' => 'Allowed types',
			'explain' => 'Types are a way of identifying what kind of listing a user has created. By default, these are used to differentiate by "Want to buy" listings vs "Want to sell" listings.',
		)) . '
			';
	} else {
		$__compilerTemp5 .= '
				<hr class="formRowSep" />

				' . $__templater->formRow('
					' . $__templater->filter('None', array(array('parens', array()),), true) . ' <a href="' . $__templater->func('link', array('classifieds/listing-types', ), true) . '" target="_blank">' . 'Add type' . '</a>
				', array(
			'label' => 'Allowed types',
		)) . '
			';
	}
	$__compilerTemp7 = '';
	if (!$__templater->test($__vars['conditions'], 'empty', array())) {
		$__compilerTemp7 .= '
				<hr class="formRowSep" />

				';
		$__compilerTemp8 = array();
		if ($__templater->isTraversable($__vars['conditions'])) {
			foreach ($__vars['conditions'] AS $__vars['conditionId'] => $__vars['condition']) {
				$__compilerTemp8[] = array(
					'value' => $__vars['conditionId'],
					'label' => $__templater->escape($__vars['condition']['title']),
					'checked' => $__templater->func('in_array', array($__vars['condition']['condition_id'], $__vars['category']['condition_ids'], ), false),
					'_type' => 'option',
				);
			}
		}
		$__compilerTemp7 .= $__templater->formCheckBoxRow(array(
			'name' => 'condition_ids',
			'value' => $__vars['category']['condition_ids'],
		), $__compilerTemp8, array(
			'label' => 'Allowed conditions',
			'explain' => 'Conditions allow users to specify and inform others about what condition the item is currently in. If no conditions are selected here, the option is disabled and will not appear for this category.',
		)) . '
			';
	} else {
		$__compilerTemp7 .= '
				<hr class="formRowSep" />

				' . $__templater->formRow('
					' . $__templater->filter('None', array(array('parens', array()),), true) . ' <a href="' . $__templater->func('link', array('classifieds/conditions', ), true) . '" target="_blank">' . 'Add condition' . '</a>
				', array(
			'label' => 'Allowed listing conditions',
		)) . '
			';
	}
	$__compilerTemp9 = '';
	if (!$__templater->test($__vars['packages'], 'empty', array())) {
		$__compilerTemp9 .= '
				<hr class="formRowSep" />

				';
		$__compilerTemp10 = array();
		if ($__templater->isTraversable($__vars['packages'])) {
			foreach ($__vars['packages'] AS $__vars['packageId'] => $__vars['package']) {
				$__compilerTemp10[] = array(
					'value' => $__vars['packageId'],
					'label' => $__templater->escape($__vars['package']['title']),
					'checked' => $__templater->func('in_array', array($__vars['package']['package_id'], $__vars['category']['package_ids'], ), false),
					'_type' => 'option',
				);
			}
		}
		$__compilerTemp9 .= $__templater->formCheckBoxRow(array(
			'name' => 'package_ids',
			'value' => $__vars['category']['package_ids'],
		), $__compilerTemp10, array(
			'label' => 'Available packages',
			'explain' => 'Packages allow you to setup constraints for how long a listing should last and how much that should cost the end user, if anything.',
		)) . '
			';
	} else {
		$__compilerTemp9 .= '
				<hr class="formRowSep" />

				' . $__templater->formRow('
					' . $__templater->filter('None', array(array('parens', array()),), true) . ' <a href="' . $__templater->func('link', array('classifieds/packages', ), true) . '" target="_blank">' . 'Add package' . '</a>
				', array(
			'label' => 'Available packages',
		)) . '
			';
	}
	$__compilerTemp11 = '';
	if (!$__templater->test($__vars['availableFields'], 'empty', array())) {
		$__compilerTemp11 .= '
				<hr class="formRowSep" />

				';
		$__compilerTemp12 = $__templater->mergeChoiceOptions(array(), $__vars['availableFields']);
		$__compilerTemp11 .= $__templater->formCheckBoxRow(array(
			'name' => 'available_fields',
			'value' => $__vars['category']['field_cache'],
			'listclass' => 'field listColumns',
		), $__compilerTemp12, array(
			'label' => 'Available fields',
			'hint' => '
						' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'check-all' => '.field.listColumns',
			'label' => 'Select all',
			'_type' => 'option',
		))) . '
					',
		)) . '
			';
	} else {
		$__compilerTemp11 .= '
				<hr class="formRowSep" />

				' . $__templater->formRow('
					' . $__templater->filter('None', array(array('parens', array()),), true) . ' <a href="' . $__templater->func('link', array('classifieds/fields', ), true) . '" target="_blank">' . 'Add field' . '</a>
				', array(
			'label' => 'Available fields',
		)) . '
			';
	}
	$__compilerTemp13 = '';
	if (!$__templater->test($__vars['availablePrefixes'], 'empty', array())) {
		$__compilerTemp13 .= '
				<hr class="formRowSep" />

				';
		$__compilerTemp14 = $__templater->mergeChoiceOptions(array(), $__vars['availablePrefixes']);
		$__compilerTemp13 .= $__templater->formCheckBoxRow(array(
			'name' => 'available_prefixes',
			'value' => $__vars['category']['prefix_cache'],
			'listclass' => 'prefix listColumns',
		), $__compilerTemp14, array(
			'label' => 'Available prefixes',
			'hint' => '
						' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'check-all' => '.prefix.listColumns',
			'label' => 'Select all',
			'_type' => 'option',
		))) . '
					',
		)) . '
			';
	} else {
		$__compilerTemp13 .= '
				<hr class="formRowSep" />

				' . $__templater->formRow('
					' . $__templater->filter('None', array(array('parens', array()),), true) . ' <a href="' . $__templater->func('link', array('classifieds/prefixes', ), true) . '" target="_blank">' . 'Add prefix' . '</a>
				', array(
			'label' => 'Available prefixes',
		)) . '
			';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formTextBoxRow(array(
		'name' => 'title',
		'value' => $__vars['category']['title'],
	), array(
		'label' => 'Title',
	)) . '

			' . $__templater->formTextAreaRow(array(
		'name' => 'description',
		'value' => $__vars['category']['description'],
		'rows' => '2',
		'autosize' => 'true',
	), array(
		'label' => 'Description',
		'hint' => 'You may use HTML',
	)) . '

			' . $__templater->callMacro('category_tree_macros', 'parent_category_select_row', array(
		'category' => $__vars['category'],
		'categoryTree' => $__vars['categoryTree'],
	), $__vars) . '

			' . $__templater->callMacro('display_order_macros', 'row', array(
		'value' => $__vars['category']['display_order'],
	), $__vars) . '

			' . $__templater->formSelectRow(array(
		'name' => 'layout_type',
		'value' => $__vars['category']['layout_type'],
		'id' => 'js-classifiedsLayoutType',
	), array(array(
		'value' => 'list_view',
		'selected' => ($__vars['category']['layout_type'] == 'list_view'),
		'label' => 'List view layout',
		'_type' => 'option',
	),
	array(
		'value' => 'grid_view',
		'selected' => ($__vars['category']['layout_type'] == 'grid_view'),
		'label' => 'Grid view layout',
		'_type' => 'option',
	)), array(
		'label' => 'List layout type',
	)) . '

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'allow_paid',
		'selected' => $__vars['category']['allow_paid'],
		'label' => 'Allow prices to be set for listed items',
		'hint' => 'If enabled, users will be allowed to set prices for the listings that they create in this category.',
		'_type' => 'option',
	),
	array(
		'name' => 'location_enable',
		'selected' => $__vars['category']['location_enable'],
		'label' => 'Allow location to be set for listed items',
		'hint' => 'If enabled, a location field will be available on the listing create/edit form. This location field will be used to display a Google Map on the listing and to support filtering by location.',
		'_type' => 'option',
	),
	array(
		'name' => 'moderate_listings',
		'selected' => $__vars['category']['moderate_listings'],
		'label' => 'Moderate new listings posted in this category',
		'hint' => 'If enabled, a moderator will have to manually approve listings posted in this category.',
		'_type' => 'option',
	),
	array(
		'name' => 'exclude_expired',
		'selected' => $__vars['category']['exclude_expired'],
		'label' => 'Exclude expired listings from listing count',
		'hint' => 'When enabled, listings that expire will reduce the listing count.',
		'_type' => 'option',
	),
	array(
		'name' => 'contact_conversation',
		'selected' => $__vars['category']['contact_conversation'],
		'label' => 'Allow users to contact listing owner by conversation',
		'hint' => 'If enabled, this will allow users to contact advertisers directly from the listing. Advertisers can also disable this behaviour on a per-listing basis.',
		'_type' => 'option',
	),
	array(
		'name' => 'contact_email',
		'selected' => $__vars['category']['contact_email'],
		'label' => 'Allow users to contact listing owner by the user\'s email',
		'hint' => 'If  enabled, this will allow users to contact advertisers directly from the listing. A preferred email address can be set for each listing and advertisers can also disable this behaviour on a per-listing basis.',
		'_type' => 'option',
	),
	array(
		'name' => 'contact_custom',
		'selected' => $__vars['category']['contact_custom'],
		'label' => 'Allow users to list custom contact information',
		'hint' => 'If enabled, an additional text field will be displayed when creating a listing allowing advertisers to add custom contact information.',
		'_type' => 'option',
	),
	array(
		'name' => 'require_listing_image',
		'selected' => $__vars['category']['require_listing_image'],
		'label' => 'Require listings to have an image attachment',
		'hint' => 'Enabling will require all new listings to have at least one image attachment.',
		'_type' => 'option',
	),
	array(
		'name' => 'require_sold_user',
		'selected' => $__vars['category']['require_sold_user'],
		'label' => 'Require listing purchaser name to mark listing as sold',
		'hint' => 'When enabled, will require the owner of a listing to add the username of the user who received their item in order to mark it as sold.',
		'_type' => 'option',
	),
	array(
		'name' => 'replace_forum_action_button',
		'selected' => $__vars['category']['replace_forum_action_button'],
		'label' => 'Replace \'Post thread\' with post listing',
		'hint' => 'When enabled will replace the "Post threads" button in this forum\'s thread list with a button for posting new listings.',
		'_type' => 'option',
	)), array(
	)) . '
			
			' . $__templater->formSelectRow(array(
		'name' => 'node_id',
		'value' => $__vars['category']['node_id'],
		'id' => 'js-classifiedsThreadNodeList',
	), $__compilerTemp1, array(
		'label' => 'Automatically create thread in forum',
	)) . '

			' . $__templater->formRow('
				' . '' . '
				' . $__templater->callMacro('public:prefix_macros', 'select', array(
		'type' => 'thread',
		'prefixes' => $__vars['threadPrefixes'],
		'selected' => $__vars['category']['thread_prefix_id'],
		'name' => 'thread_prefix_id',
		'href' => $__templater->func('link', array('forums/prefixes', ), false),
		'listenTo' => '#js-classifiedsThreadNodeList',
	), $__vars) . '
			', array(
		'label' => 'Automatically created thread prefix',
		'rowtype' => 'input',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'paid_feature_enable',
		'selected' => $__vars['category']['paid_feature_enable'],
		'label' => 'Enable paid feature status',
		'hint' => 'If enabled, users will be able to pay to upgrade their listing to featured. Set the amount of days a listing is featured below.',
		'_dependent' => array($__templater->formNumberBox(array(
		'name' => 'paid_feature_days',
		'value' => $__vars['category']['paid_feature_days'],
	))),
		'_type' => 'option',
	)), array(
	)) . '

			' . $__templater->formRow('
				<div class="inputGroup">
					' . $__templater->formTextBox(array(
		'name' => 'price',
		'value' => ($__vars['category']['price'] ?: ''),
		'placeholder' => 'Price',
		'style' => 'width: 120px',
	)) . '
					<span class="inputGroup-splitter"></span>
					' . $__templater->formSelect(array(
		'name' => 'currency',
		'value' => $__templater->filter($__vars['category']['currency'], array(array('to_upper', array()),), false),
		'style' => 'width: 110px',
	), $__compilerTemp2) . '
				</div>
			', array(
		'label' => 'Feature price',
		'explain' => 'The price to charge a user to feature their listing',
	)) . '

			' . $__templater->formCheckBoxRow(array(
		'name' => 'payment_profile_ids',
		'value' => $__vars['category']['payment_profile_ids'],
	), $__compilerTemp4, array(
		'label' => 'Payment profile',
	)) . '

			' . $__compilerTemp5 . '


			' . $__compilerTemp7 . '

			' . $__compilerTemp9 . '
			<hr class="formRowSep" />
			' . $__templater->formRow('
						<div>' . 'Listing type phrase' . $__vars['xf']['language']['label_separator'] . '</div>
						' . $__templater->formTextBox(array(
		'name' => 'phrase_listing_type',
		'value' => $__vars['category']['phrase_listing_type'],
		'required' => 'required',
	)) . '
						<div>' . 'Listing condition phrase' . $__vars['xf']['language']['label_separator'] . '</div>
						' . $__templater->formTextBox(array(
		'name' => 'phrase_listing_condition',
		'value' => $__vars['category']['phrase_listing_condition'],
		'required' => 'required',
	)) . '
						<div>' . 'Listing price phrase' . $__vars['xf']['language']['label_separator'] . '</div>
						' . $__templater->formTextBox(array(
		'name' => 'phrase_listing_price',
		'value' => $__vars['category']['phrase_listing_price'],
		'required' => 'required',
	)) . '

			', array(
		'label' => 'Quick info phrases',
		'explain' => 'You may use these fields to configure the header text shown in the quick info area of a listing. You\'ll need to navigate to Appearance -> Phrases first and create new phrases or customise the existing ones.',
	)) . '

			' . $__compilerTemp11 . '

			' . $__compilerTemp13 . '
			<hr class="formRowSep" />

			' . $__templater->formEditorRow(array(
		'name' => 'listing_template',
		'value' => $__vars['category']['listing_template'],
		'rows' => '2',
		'autosize' => 'true',
	), array(
		'label' => 'Listing template',
		'hint' => 'The default body of new listings in this category.',
	)) . '
			
			' . $__templater->formSubmitRow(array(
		'sticky' => 'true',
		'icon' => 'save',
	), array(
	)) . '
		</div>
	</div>
', array(
		'action' => $__templater->func('link', array('classifieds/categories/save', $__vars['category'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);