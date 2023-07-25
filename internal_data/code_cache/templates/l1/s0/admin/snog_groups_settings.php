<?php
// FROM HASH: d3887aa2730e5ae578af6d15b1ce267c
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Settings for all groups');
	$__finalCompiled .= '
';
	$__templater->setPageParam('section', 'snogGroups_settings');
	$__finalCompiled .= '

<div class="block-container">
	<div class="block-body">
		';
	$__compilerTemp1 = array();
	$__compilerTemp2 = $__templater->method($__vars['nodeTree'], 'getFlattened', array(0, ));
	if ($__templater->isTraversable($__compilerTemp2)) {
		foreach ($__compilerTemp2 AS $__vars['treeEntry']) {
			if ($__vars['treeEntry']['record']['node_type_id'] == 'Category') {
				$__compilerTemp1[] = array(
					'selected' => ($__templater->func('in_array', array($__vars['treeEntry']['record']['node_id'], $__vars['settings']['categories'], ), false) ? true : false),
					'value' => $__vars['treeEntry']['record']['node_id'],
					'label' => $__templater->func('repeat', array('--', $__vars['treeEntry']['depth'], ), true) . ' ' . $__templater->escape($__vars['treeEntry']['record']['title']),
					'_type' => 'option',
				);
			}
		}
	}
	$__compilerTemp3 = '';
	if ($__vars['galleryInstalled']) {
		$__compilerTemp3 .= '
				';
		$__compilerTemp4 = array(array(
			'selected' => (($__vars['settings']['gallery'] == 0) ? true : false),
			'value' => '0',
			'label' => 'None',
			'_type' => 'option',
		));
		$__compilerTemp5 = $__templater->method($__vars['categoryTree'], 'getFlattened', array(0, ));
		if ($__templater->isTraversable($__compilerTemp5)) {
			foreach ($__compilerTemp5 AS $__vars['treeEntry']) {
				if (!$__templater->func('in_array', array($__vars['treeEntry']['record']['category_id'], $__vars['groupMediaIds'], ), false)) {
					$__compilerTemp4[] = array(
						'selected' => (($__vars['treeEntry']['record']['category_id'] == $__vars['settings']['gallery']) ? true : false),
						'value' => $__vars['treeEntry']['record']['category_id'],
						'label' => $__templater->func('repeat', array('--', $__vars['treeEntry']['depth'], ), true) . ' ' . $__templater->escape($__vars['treeEntry']['record']['title']),
						'_type' => 'option',
					);
				}
			}
		}
		$__compilerTemp3 .= $__templater->formSelectRow(array(
			'name' => 'gallery',
		), $__compilerTemp4, array(
			'label' => 'xfmg_media_category',
			'explain' => 'Select the media category to be used as the parent for group media categories.<br />If \'None\' is selected, all group media categories will be top level categories.',
		)) . '
			';
	} else {
		$__compilerTemp3 .= '
				<input type="hidden" name="gallery" value="0" />
			';
	}
	$__compilerTemp6 = array();
	$__compilerTemp7 = $__templater->method($__vars['nodeTree'], 'getFlattened', array(0, ));
	if ($__templater->isTraversable($__compilerTemp7)) {
		foreach ($__compilerTemp7 AS $__vars['treeEntry']) {
			if ($__vars['treeEntry']['record']['node_type_id'] == 'Forum') {
				$__compilerTemp6[] = array(
					'selected' => (($__vars['settings']['forum'] == $__vars['treeEntry']['record']['node_id']) ? true : false),
					'value' => $__vars['treeEntry']['record']['node_id'],
					'label' => $__templater->func('repeat', array('--', $__vars['treeEntry']['depth'], ), true) . ' ' . $__templater->escape($__vars['treeEntry']['record']['title']),
					'_type' => 'option',
				);
			} else {
				$__compilerTemp6[] = array(
					'disabled' => 'disabled',
					'value' => $__vars['treeEntry']['record']['node_id'],
					'label' => $__templater->func('repeat', array('--', $__vars['treeEntry']['depth'], ), true) . ' ' . $__templater->escape($__vars['treeEntry']['record']['title']),
					'_type' => 'option',
				);
			}
		}
	}
	$__compilerTemp8 = '';
	if (!$__templater->test($__vars['availablePrefixes'], 'empty', array())) {
		$__compilerTemp8 .= '
				';
		$__compilerTemp9 = array(array(
			'value' => '-1',
			'label' => $__vars['xf']['language']['parenthesis_open'] . 'None' . $__vars['xf']['language']['parenthesis_close'],
			'_type' => 'option',
		));
		$__compilerTemp9 = $__templater->mergeChoiceOptions($__compilerTemp9, $__vars['availablePrefixes']);
		$__compilerTemp8 .= $__templater->formSelectRow(array(
			'name' => 'prefix',
			'value' => $__vars['settings']['prefix'],
		), $__compilerTemp9, array(
			'label' => 'Prefix for announcement thread',
			'explain' => 'Select the prefix for the announcement thread.<br /><font style="color:blue;"><b>NOTE:</b></font> All prefixes are listed here. The prefix you select must be a valid prefix for the forum selected above.',
		)) . '
			';
	}
	$__finalCompiled .= $__templater->form('
			<h3 class="block-formSectionHeader">' . 'Group category options' . '</h3>

			' . $__templater->formSelectRow(array(
		'name' => 'categories',
		'multiple' => 'true',
	), $__compilerTemp1, array(
		'label' => 'Forum categories',
		'explain' => 'Select what categories can be used when creating groups.<br /><font style="color:blue;"><b>NOTE:</b></font> If you do not select any categories, all forum categories will be available for groups.',
	)) . '
			
			' . $__compilerTemp3 . '
			
			<h3 class="block-formSectionHeader">' . 'Group list options' . '</h3>

			' . $__templater->formRadioRow(array(
		'name' => 'listimage',
	), array(array(
		'value' => '0',
		'selected' => (($__vars['settings']['listimage'] == 0) ? 'selected' : ''),
		'label' => 'None (name only)',
		'_type' => 'option',
	),
	array(
		'value' => '1',
		'selected' => (($__vars['settings']['listimage'] == 1) ? 'selected' : ''),
		'label' => 'Small banner',
		'_type' => 'option',
	),
	array(
		'value' => '2',
		'selected' => (($__vars['settings']['listimage'] == 2) ? 'selected' : ''),
		'label' => 'Avatar',
		'_type' => 'option',
	)), array(
		'label' => 'Image',
		'explain' => 'Select what image should be displayed in the group list',
	)) . '

			' . $__templater->formRadioRow(array(
		'name' => 'listtype',
	), array(array(
		'value' => '0',
		'selected' => (($__vars['settings']['listtype'] == 0) ? 'selected' : ''),
		'label' => 'Group list',
		'_type' => 'option',
	),
	array(
		'value' => '1',
		'selected' => (($__vars['settings']['listtype'] == 1) ? 'selected' : ''),
		'label' => 'Category list',
		'_type' => 'option',
	),
	array(
		'value' => '2',
		'selected' => (($__vars['settings']['listtype'] == 2) ? 'selected' : ''),
		'data-xf-init' => 'disabler',
		'data-container' => '#popoptions, #popnum',
		'data-hide' => 'false',
		'label' => 'Popular groups',
		'_dependent' => array($__templater->formCheckBox(array(
		'name' => 'list',
		'id' => 'popoptions',
	), array(array(
		'name' => 'list[members]',
		'checked' => ($__vars['settings']['list']['members'] ? 'checked' : ''),
		'label' => 'Most members',
		'_type' => 'option',
	),
	array(
		'name' => 'list[threads]',
		'checked' => (($__vars['settings']['list']['threads'] == 1) ? 'checked' : ''),
		'label' => 'Most threads',
		'_type' => 'option',
	),
	array(
		'name' => 'list[posts]',
		'checked' => ($__vars['settings']['list']['posts'] ? 'checked' : ''),
		'label' => 'Most posts',
		'_type' => 'option',
	),
	array(
		'name' => 'list[photos]',
		'checked' => ($__vars['settings']['list']['photos'] ? 'checked' : ''),
		'label' => 'Most photos',
		'_type' => 'option',
	),
	array(
		'name' => 'list[discussions]',
		'checked' => ($__vars['settings']['list']['discussions'] ? 'checked' : ''),
		'label' => 'Most discussions',
		'_type' => 'option',
	)))),
		'_type' => 'option',
	)), array(
		'label' => 'List type',
		'explain' => 'Select the initial display type for the group list',
	)) . '
			
			' . $__templater->formRow('
				<div class="inputGroup inputGroup--inline inputGroup--joined inputNumber" id="popnum" data-xf-init="number-box">
					' . $__templater->formTextBox(array(
		'type' => 'number',
		'name' => 'list[num]',
		'class' => 'input--number js-numberBoxTextInput js-permissionIntInput',
		'value' => (($__vars['settings']['list']['num'] >= 2) ? $__vars['settings']['list']['num'] : 4),
		'min' => '4',
		'max' => '100',
		'step' => '2',
	)) . '
				</div>
			', array(
		'explain' => 'Number of groups in each popular category',
	)) . '
			
			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'value' => '1',
		'name' => 'showdescription',
		'selected' => $__vars['settings']['showdescription'],
		'label' => '&nbsp',
		'_type' => 'option',
	)), array(
		'label' => 'Show groups description',
		'explain' => 'To show the groups description on the main group list page, check this box. <br />
Phrase used: snog_groups_description',
	)) . '
			
			<h3 class="block-formSectionHeader">' . 'Group sidebar options' . '</h3>
			
			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'value' => '1',
		'name' => 'sidebar',
		'selected' => $__vars['settings']['sidebar'],
		'label' => '&nbsp',
		'_type' => 'option',
	)), array(
		'label' => 'Show group sidebar',
		'explain' => 'Check this box to show the the group sidebar on all group pages',
	)) . '
			
			' . $__templater->formRadioRow(array(
		'name' => 'image',
	), array(array(
		'value' => '0',
		'selected' => (($__vars['settings']['image'] == 0) ? 'selected' : ''),
		'label' => 'None',
		'_type' => 'option',
	),
	array(
		'value' => '1',
		'selected' => (($__vars['settings']['image'] == 1) ? 'selected' : ''),
		'label' => 'Small banner',
		'_type' => 'option',
	),
	array(
		'value' => '2',
		'selected' => (($__vars['settings']['image'] == 2) ? 'selected' : ''),
		'label' => 'Avatar',
		'_type' => 'option',
	)), array(
		'label' => 'Show group image',
		'explain' => 'Select what image should be displayed at the top of the group sidebar',
	)) . '
			
			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'value' => '1',
		'name' => 'statistics',
		'selected' => $__vars['settings']['statistics'],
		'label' => '&nbsp',
		'_type' => 'option',
	)), array(
		'label' => 'Show group statistics',
		'explain' => 'Check this box to show the group statistics in the group sidebar',
	)) . '
			
			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'value' => '1',
		'name' => 'posts',
		'selected' => $__vars['settings']['posts'],
		'label' => '&nbsp',
		'_type' => 'option',
	)), array(
		'label' => 'Show latest posts',
		'explain' => 'Check this box to show the latest posts in the group forum in the group sidebar',
	)) . '

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'value' => '1',
		'name' => 'photos',
		'selected' => $__vars['settings']['photos'],
		'label' => '&nbsp',
		'_type' => 'option',
	)), array(
		'label' => 'Show latest photos',
		'explain' => 'Check this box to show the latest photos in the group sidebar',
	)) . '
			
			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'value' => '1',
		'name' => 'events',
		'selected' => $__vars['settings']['events'],
		'label' => '&nbsp',
		'_type' => 'option',
	)), array(
		'label' => 'Show coming events',
		'explain' => 'Check this box to show coming events in the group sidebar',
	)) . '
			
			<h3 class="block-formSectionHeader">' . 'Main group display options' . '</h3>
	
			' . $__templater->formRadioRow(array(
		'name' => 'banner',
	), array(array(
		'value' => '0',
		'selected' => (($__vars['settings']['banner'] == 0) ? 'selected' : ''),
		'label' => 'None',
		'_type' => 'option',
	),
	array(
		'value' => '1',
		'selected' => (($__vars['settings']['banner'] == 1) ? 'selected' : ''),
		'label' => 'Avatar',
		'_type' => 'option',
	),
	array(
		'value' => '2',
		'selected' => (($__vars['settings']['banner'] == 2) ? 'selected' : ''),
		'label' => 'Small banner',
		'_type' => 'option',
	),
	array(
		'value' => '3',
		'selected' => (($__vars['settings']['banner'] == 3) ? 'selected' : ''),
		'label' => 'Large banner',
		'_type' => 'option',
	)), array(
		'label' => 'Show group image',
		'explain' => 'Select what image should be displayed above the group name in the main group display',
	)) . '
			
			' . $__templater->formRow('
				<div class="inputGroup inputGroup--inline inputGroup--joined inputNumber" data-xf-init="number-box">
					' . $__templater->formTextBox(array(
		'type' => 'number',
		'name' => 'bannerwidth',
		'class' => 'input--number js-numberBoxTextInput js-permissionIntInput',
		'value' => (($__vars['settings']['bannerwidth'] >= 1) ? $__vars['settings']['bannerwidth'] : 917),
		'min' => '220',
		'max' => '1200',
	)) . '
				</div>
			', array(
		'label' => 'Large banner width',
	)) . '
	
			' . $__templater->formRow('
				<div class="inputGroup inputGroup--inline inputGroup--joined inputNumber" data-xf-init="number-box">
					' . $__templater->formTextBox(array(
		'type' => 'number',
		'name' => 'bannerheight',
		'class' => 'input--number js-numberBoxTextInput js-permissionIntInput',
		'value' => (($__vars['settings']['bannerheight'] >= 1) ? $__vars['settings']['bannerheight'] : 300),
		'min' => '80',
		'max' => '600',
	)) . '
				</div>
			', array(
		'label' => 'Large banner height',
		'explain' => 'Changing the large banner size requires that banners be re-uploaded in each group. Banners are not resized automatically.',
	)) . '
			
			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'value' => '1',
		'name' => 'original',
		'selected' => $__vars['settings']['original'],
		'label' => '&nbsp',
		'_type' => 'option',
	)), array(
		'label' => 'Use original image',
		'explain' => 'The large banner is resized and cropped to fit the above dimensions. Checking this box uses the original image as the large banner, not the resized and cropped version.',
	)) . '
			
			<h3 class="block-formSectionHeader">' . 'New group options' . '</h3>
			
			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'value' => '1',
		'name' => 'announce',
		'selected' => $__vars['settings']['announce'],
		'label' => '&nbsp',
		'_type' => 'option',
	)), array(
		'label' => 'Announce new group in thread',
		'explain' => 'Check this box to announce new groups in a thread',
	)) . '
			
			' . $__templater->formSelectRow(array(
		'name' => 'forum',
	), $__compilerTemp6, array(
		'label' => 'Forum for announcement',
		'explain' => 'Select the forum that will be used for new group announcements',
	)) . '
			
			' . $__compilerTemp8 . '
			
			<hr class="formRowSep" />
			
			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'value' => '1',
		'name' => 'permset',
		'selected' => $__vars['settings']['permset'],
		'label' => '&nbsp',
		'_type' => 'option',
	)), array(
		'label' => 'Set group forum base permissions',
		'explain' => 'Checking this box will set the forum permissions for the unregistered and registered user groups according to the type of group being created. While not required, this is recommended to prevent users from viewing group forums when the add-on is disabled or uninstalled.<br /><b>NOTE: </b>For this to work properly your system must follow the normal XenForo permission system where all users have their primary user group set to  Registered and any other user groups are secondary user groups.<br />If your system does not follow the normal XenForo permission system, or this option is un-checked, when the add-on is uninstalled or disabled your group forums will become visible to all members of your site.',
	)) . '
			
			<h3 class="block-formSectionHeader">' . 'Misc. group settings' . '</h3>
		
			' . $__templater->formRow('
				<div class="inputGroup inputGroup--inline inputGroup--joined inputNumber" data-xf-init="number-box">
					' . $__templater->formTextBox(array(
		'type' => 'number',
		'name' => 'maxsub',
		'class' => 'input--number js-numberBoxTextInput js-permissionIntInput',
		'value' => (($__vars['settings']['maxsub'] >= 1) ? $__vars['settings']['maxsub'] : 1),
		'min' => '1',
		'max' => '1200',
	)) . '
				</div>
			', array(
		'label' => 'Maximum sub-forums',
		'explain' => 'Enter the maximum number of sub-forums a group owner can create in a group.<br />If you don\'t want group owners to create sub-forums, remove the permission from their user group.',
	)) . '
			
			' . $__templater->formSubmitRow(array(
		'sticky' => 'true',
		'icon' => 'save',
	), array(
	)) . '
		', array(
		'action' => $__templater->func('link', array('group/settings', ), false),
		'ajax' => 'true',
		'class' => 'block',
		'data-xf-init' => 'attachment-manager',
		'data-force-flash-message' => 'true',
	)) . '
	</div>
</div>';
	return $__finalCompiled;
}
);