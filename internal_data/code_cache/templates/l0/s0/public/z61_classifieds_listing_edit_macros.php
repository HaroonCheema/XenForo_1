<?php
// FROM HASH: 72316d4a9194c061ef6d24f8bc35f4cd
return array(
'macros' => array('purchase_inputs' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'listing' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	<div class="inputGroup">
		' . $__templater->formTextBox(array(
		'name' => 'price',
		'value' => ((!$__templater->func('empty', array($__vars['listing']['price']))) ? $__vars['listing']['price'] : $__vars['category']['draft_listing']['price']),
		'placeholder' => 'Price',
		'style' => 'width: 120px',
	)) . '
		<span class="inputGroup-splitter"></span>
		';
	$__compilerTemp1 = array();
	$__compilerTemp2 = $__templater->method($__templater->method($__vars['xf']['app']['em'], 'getRepository', array('Z61\\Classifieds:Listing', )), 'getAvailableCurrencies', array($__vars['listing'], ));
	if ($__templater->isTraversable($__compilerTemp2)) {
		foreach ($__compilerTemp2 AS $__vars['currency']) {
			$__compilerTemp1[] = array(
				'value' => $__vars['currency']['code'],
				'label' => $__templater->escape($__vars['currency']['code']),
				'_type' => 'option',
			);
		}
	}
	$__finalCompiled .= $__templater->formSelect(array(
		'name' => 'currency',
		'value' => $__templater->filter($__vars['listing']['currency'], array(array('to_upper', array()),), false),
		'style' => 'width: 110px',
	), $__compilerTemp1) . '
	</div>
';
	return $__finalCompiled;
}
),
'title' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'listing' => '!',
		'category' => '!',
		'prefixes' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formPrefixInputRow($__vars['prefixes'], array(
		'type' => 'classifieds_listing',
		'prefix-value' => $__vars['listing']['prefix_id'],
		'textbox-value' => (($__templater->func('strlen', array($__vars['listing']['title'], ), false) > 0) ? $__vars['listing']['title'] : $__vars['category']['draft_listing']['title']),
		'textbox-class' => 'input--title',
		'maxlength' => $__templater->func('max_length', array($__vars['listing'], 'title', ), false),
		'placeholder' => 'Title' . $__vars['xf']['language']['ellipsis'],
	), array(
		'label' => 'Title',
		'rowtype' => 'fullWidth noLabel',
	)) . '
';
	return $__finalCompiled;
}
),
'type' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'listing' => '!',
		'category' => '!',
		'listingTypes' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__compilerTemp1 = '';
	if ($__vars['listingTypes']) {
		$__compilerTemp1 .= '
			';
		$__compilerTemp2 = array();
		if ($__templater->isTraversable($__vars['listingTypes'])) {
			foreach ($__vars['listingTypes'] AS $__vars['type']) {
				if ($__templater->method($__vars['listing'], 'isInsert', array())) {
					$__compilerTemp2[] = array(
						'value' => $__vars['type']['listing_type_id'],
						'selected' => ($__templater->func('count', array($__vars['listingTypes'], ), false) == 1),
						'label' => $__templater->escape($__vars['type']['title']),
						'_type' => 'option',
					);
				} else {
					$__compilerTemp2[] = array(
						'value' => $__vars['type']['listing_type_id'],
						'selected' => ($__vars['listing']['listing_type_id'] == $__vars['type']['listing_type_id']),
						'label' => $__templater->escape($__vars['type']['title']),
						'_type' => 'option',
					);
				}
			}
		}
		$__compilerTemp1 .= $__templater->formRadio(array(
			'name' => 'listing_type_id',
			'value' => (($__vars['listing']['listing_type_id'] > 0) ? $__vars['listing']['listing_type_id'] : $__vars['category']['draft_listing']['listing_type_id']),
		), $__compilerTemp2) . '
		';
	} else {
		$__compilerTemp1 .= '
			' . $__templater->escape($__vars['listingTypes']['title']) . '
			' . $__templater->formHiddenVal('listing_type_id', $__vars['listingTypes']['listing_type_id'], array(
		)) . '
		';
	}
	$__finalCompiled .= $__templater->formRow('
		' . $__compilerTemp1 . '
	', array(
		'label' => 'Type',
	)) . '
';
	return $__finalCompiled;
}
),
'expiration' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'listing' => '!',
		'category' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__compilerTemp1 = '';
	if ($__templater->method($__vars['listing'], 'isInsert', array())) {
		$__compilerTemp1 .= '
			';
		if (!$__templater->test($__vars['category']['expiration_date'], 'empty', array())) {
			$__compilerTemp1 .= '
				' . $__templater->func('date_dynamic', array($__vars['category']['expiration_date'], array(
			))) . '
			';
		} else {
			$__compilerTemp1 .= '
				' . '' . $__templater->escape($__vars['category']['expiration_days']) . ' days' . '
			';
		}
		$__compilerTemp1 .= '
			';
	} else {
		$__compilerTemp1 .= '
			' . $__templater->func('date_dynamic', array($__vars['listing']['expiration_date'], array(
		))) . '
		';
	}
	$__finalCompiled .= $__templater->formRow('
		' . $__compilerTemp1 . '
	', array(
		'label' => 'Expires',
	)) . '
';
	return $__finalCompiled;
}
),
'content' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'listing' => '!',
		'category' => '!',
		'attachmentData' => array(),
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formEditorRow(array(
		'name' => 'message',
		'value' => $__vars['listing']['content'],
		'attachments' => $__vars['attachmentData']['attachments'],
	), array(
		'rowtype' => 'fullWidth noLabel mergePrev',
		'label' => 'Message',
	)) . '

	';
	$__compilerTemp1 = '';
	if ($__vars['attachmentData']) {
		$__compilerTemp1 .= '
			' . $__templater->callMacro('helper_attach_upload', 'upload_block', array(
			'attachmentData' => $__vars['attachmentData'],
		), $__vars) . '
		';
	}
	$__finalCompiled .= $__templater->formRow('
		' . $__compilerTemp1 . '
		' . $__templater->button('', array(
		'class' => 'button--link u-jsOnly',
		'data-xf-click' => 'preview-click',
		'icon' => 'preview',
	), '', array(
	)) . '
	', array(
	)) . '
';
	return $__finalCompiled;
}
),
'tags' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'listing' => '!',
		'category' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	if ($__templater->method($__vars['category'], 'canEditTags', array())) {
		$__finalCompiled .= '
		<hr class="formRowSep" />
		' . $__templater->formTokenInputRow(array(
			'name' => 'tags',
			'value' => ($__vars['listing']['tags'] ? $__templater->filter($__vars['listing']['tags'], array(array('join', array(', ', )),), false) : $__vars['category']['draft_listing']['tags']),
			'href' => $__templater->func('link', array('misc/tag-auto-complete', ), false),
			'min-length' => $__vars['xf']['options']['tagLength']['min'],
			'max-length' => $__vars['xf']['options']['tagLength']['max'],
			'max-tokens' => $__vars['xf']['options']['maxContentTags'],
		), array(
			'label' => 'Tags',
			'explain' => '
				' . 'Multiple tags may be separated by commas.' . '
			',
		)) . '
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'contact_info' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'listing' => '!',
		'category' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
			';
	if ($__vars['category']['contact_conversation'] OR $__vars['category']['contact_email']) {
		$__compilerTemp1 .= '
				';
		$__compilerTemp2 = array();
		if ($__vars['category']['contact_conversation']) {
			$__compilerTemp2[] = array(
				'name' => 'contact_conversation_enable',
				'checked' => $__vars['listing']['contact_conversation_enable'],
				'label' => 'Allow users to contact you by conversation',
				'_type' => 'option',
			);
		}
		if ($__vars['category']['contact_email']) {
			$__compilerTemp2[] = array(
				'name' => 'contact_email_enable',
				'checked' => $__vars['listing']['contact_email_enable'],
				'label' => 'Allow users to contact you by email',
				'_dependent' => array($__templater->formTextBox(array(
				'name' => 'contact_email',
				'value' => (($__templater->func('strlen', array($__vars['listing']['contact_email'], ), false) > 0) ?: $__vars['listing']['contact_email']),
				'maxlength' => '150',
			))),
				'_type' => 'option',
			);
		}
		$__compilerTemp1 .= $__templater->formCheckBoxRow(array(
		), $__compilerTemp2, array(
		)) . '
			';
	}
	$__compilerTemp1 .= '
			';
	if ($__vars['category']['contact_custom']) {
		$__compilerTemp1 .= '
				' . $__templater->formTextBoxRow(array(
			'name' => 'contact_custom',
			'value' => $__vars['listing']['contact_custom'],
			'maxlength' => '150',
		), array(
			'label' => 'Other',
			'explain' => 'You may use this field to provide alternative forms of contact.',
		)) . '
			';
	}
	$__compilerTemp1 .= '
		';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
		<h2 class="block-formSectionHeader"><span class="block-formSectionHeader-aligner">' . 'Contact options' . '</span></h2>

		<hr class="formRowSep" />
		' . $__compilerTemp1 . '
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'condition' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'listing' => '!',
		'category' => '!',
		'conditions' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__compilerTemp1 = array();
	if ($__templater->isTraversable($__vars['conditions'])) {
		foreach ($__vars['conditions'] AS $__vars['condition']) {
			if ($__templater->method($__vars['listing'], 'isInsert', array())) {
				$__compilerTemp1[] = array(
					'value' => $__vars['condition']['condition_id'],
					'selected' => ($__templater->func('count', array($__vars['conditions'], ), false) == 1),
					'label' => $__templater->escape($__vars['condition']['title']),
					'_type' => 'option',
				);
			} else {
				$__compilerTemp1[] = array(
					'value' => $__vars['condition']['condition_id'],
					'selected' => ($__vars['listing']['condition_id'] == $__vars['condition']['condition_id']),
					'label' => $__templater->escape($__vars['condition']['title']),
					'_type' => 'option',
				);
			}
		}
	}
	$__finalCompiled .= $__templater->formRow('
		' . $__templater->formRadio(array(
		'name' => 'condition_id',
		'value' => (($__vars['listing']['condition_id'] > 0) ? $__vars['listing']['condition_id'] : $__vars['category']['draft_listing']['condition_id']),
	), $__compilerTemp1) . '
	', array(
		'label' => 'Condition',
	)) . '
';
	return $__finalCompiled;
}
),
'package' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'listing' => '!',
		'category' => '!',
		'packages' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__compilerTemp1 = array();
	if ($__templater->isTraversable($__vars['packages'])) {
		foreach ($__vars['packages'] AS $__vars['package']) {
			if ($__templater->method($__vars['listing'], 'isInsert', array())) {
				$__compilerTemp1[] = array(
					'value' => $__vars['package']['package_id'],
					'hint' => $__templater->escape($__vars['package']['cost_phrase']),
					'selected' => ($__templater->func('count', array($__vars['packages'], ), false) == 1),
					'label' => $__templater->escape($__vars['package']['title']),
					'_type' => 'option',
				);
			} else {
				$__compilerTemp1[] = array(
					'value' => $__vars['package']['package_id'],
					'hint' => $__templater->escape($__vars['package']['cost_phrase']),
					'selected' => ($__vars['listing']['package_id'] == $__vars['package']['package_id']),
					'label' => $__templater->escape($__vars['package']['title']),
					'_type' => 'option',
				);
			}
		}
	}
	$__finalCompiled .= $__templater->formRow('
		' . $__templater->formRadio(array(
		'name' => 'package_id',
		'value' => (($__vars['listing']['package_id'] > 0) ? $__vars['listing']['package_id'] : $__vars['category']['draft_listing']['package_id']),
	), $__compilerTemp1) . '
	', array(
		'label' => 'Package',
	)) . '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

' . '

' . '

' . '

' . '

' . '

' . '

' . '

';
	return $__finalCompiled;
}
);