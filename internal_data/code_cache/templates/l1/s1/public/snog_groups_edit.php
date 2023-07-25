<?php
// FROM HASH: 1135149017382b887651f913fe37b22c
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['group']['groupid'] AND (($__vars['group']['owner_id'] !== $__vars['xf']['visitor']['user_id']) AND (!$__templater->method($__vars['xf']['visitor'], 'hasAdminPermission', array('snog_socialgroups_admin', ))))) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--error">
		' . 'You do not have permission to edit this group' . '
	</div>
';
	} else {
		$__finalCompiled .= '
	';
		$__compilerTemp1 = array(array(
			'value' => '-1',
			'label' => $__vars['xf']['language']['parenthesis_open'] . 'None' . $__vars['xf']['language']['parenthesis_close'],
			'_type' => 'option',
		));
		$__compilerTemp2 = $__templater->method($__vars['nodeTree'], 'getFlattened', array(0, ));
		if ($__templater->isTraversable($__compilerTemp2)) {
			foreach ($__compilerTemp2 AS $__vars['treeEntry']) {
				if ($__vars['treeEntry']['record']['node_type_id'] == 'Category') {
					if (!$__templater->test($__vars['settings']['categories'], 'empty', array()) AND $__templater->func('in_array', array($__vars['treeEntry']['record']['node_id'], $__vars['settings']['categories'], ), false)) {
						$__compilerTemp1[] = array(
							'value' => $__vars['treeEntry']['record']['node_id'],
							'label' => $__templater->func('repeat', array('--', $__vars['treeEntry']['depth'], ), true) . ' ' . $__templater->escape($__vars['treeEntry']['record']['title']),
							'_type' => 'option',
						);
					} else {
						if ($__templater->test($__vars['settings']['categories'], 'empty', array())) {
							$__compilerTemp1[] = array(
								'value' => $__vars['treeEntry']['record']['node_id'],
								'label' => $__templater->func('repeat', array('--', $__vars['treeEntry']['depth'], ), true) . ' ' . $__templater->escape($__vars['treeEntry']['record']['title']),
								'_type' => 'option',
							);
						}
					}
				}
			}
		}
		$__compilerTemp3 = '';
		if ($__templater->method($__vars['xf']['visitor'], 'hasPermission', array('snogGroups', 'canCreateForum', ))) {
			$__compilerTemp3 .= '
			';
			if (!$__vars['group']['hasforum']) {
				$__compilerTemp3 .= '
				' . $__templater->formCheckBoxRow(array(
				), array(array(
					'name' => 'hasforum',
					'value' => '1',
					'selected' => $__vars['group']['hasforum'],
					'data-xf-init' => 'snogenabler',
					'data-container' => '#forumview',
					'data-hide' => 'true',
					'label' => '&nbsp;',
					'_type' => 'option',
				)), array(
					'label' => 'Create group forum',
					'explain' => 'Checking this box will create a forum for this group',
				)) . '
			';
			} else {
				$__compilerTemp3 .= '
				' . $__templater->formCheckBoxRow(array(
				), array(array(
					'disabled' => 'disabled',
					'name' => 'dummy1',
					'value' => '1',
					'selected' => $__vars['group']['hasforum'],
					'label' => '&nbsp;',
					'_type' => 'option',
				)), array(
					'rowclass' => 'is-disabled',
					'label' => 'Create group forum',
					'explain' => 'Checking this box will create a forum for this group',
				)) . '
				<input type="hidden" name="hasforum" value="' . $__templater->escape($__vars['group']['hasforum']) . '" />
			';
			}
			$__compilerTemp3 .= '

			<div class="private">
				<div id="forumview">
					';
			if ((!$__vars['group']['privategroup']) AND (!$__vars['group']['privatehide'])) {
				$__compilerTemp3 .= '
						' . $__templater->formCheckBoxRow(array(
				), array(array(
					'name' => 'postview',
					'value' => '1',
					'selected' => $__vars['group']['postview'],
					'label' => 'Non-members can view thread contents',
					'_type' => 'option',
				)), array(
					'explain' => 'Check this box to allow non-members to view group thread contents',
				)) . '
					';
			}
			$__compilerTemp3 .= '
				</div>
			</div>
		';
		}
		$__compilerTemp4 = '';
		if ($__templater->method($__vars['xf']['visitor'], 'hasPermission', array('snogGroups', 'canCreateDiscussion', ))) {
			$__compilerTemp4 .= '
			';
			if (!$__vars['group']['hasdiscussion']) {
				$__compilerTemp4 .= '
				' . $__templater->formCheckBoxRow(array(
				), array(array(
					'name' => 'hasdiscussion',
					'value' => '1',
					'selected' => $__vars['group']['hasdiscussion'],
					'data-xf-init' => 'snogenabler',
					'data-container' => '#discussionview',
					'data-hide' => 'true',
					'label' => '&nbsp;',
					'_type' => 'option',
				)), array(
					'label' => 'Create group discussion area',
					'explain' => 'Checking this box will create a discussion area for this group',
				)) . '
			';
			} else {
				$__compilerTemp4 .= '
				' . $__templater->formCheckBoxRow(array(
				), array(array(
					'disabled' => 'disabled',
					'name' => 'dummy2',
					'value' => '1',
					'selected' => $__vars['group']['hasdiscussion'],
					'label' => '&nbsp;',
					'_type' => 'option',
				)), array(
					'rowclass' => 'is-disabled',
					'label' => 'Create group discussion area',
					'explain' => 'Checking this box will create a discussion area for this group',
				)) . '
				<input type="hidden" name="hasdiscussion" value="' . $__templater->escape($__vars['group']['hasdiscussion']) . '" />
			';
			}
			$__compilerTemp4 .= '
		
			<div class="private">
				<div id="discussionview">
					';
			if ((!$__vars['group']['privategroup']) AND (!$__vars['group']['privatehide'])) {
				$__compilerTemp4 .= '
						' . $__templater->formCheckBoxRow(array(
				), array(array(
					'name' => 'discussionview',
					'value' => '1',
					'selected' => $__vars['group']['discussionview'],
					'label' => 'Non-members can view group discussions',
					'_type' => 'option',
				)), array(
					'explain' => 'Check this box to allow non-members to view group discussions',
				)) . '				
					';
			}
			$__compilerTemp4 .= '
				</div>
			</div>
		';
		}
		$__compilerTemp5 = '';
		if ($__templater->method($__vars['xf']['visitor'], 'hasPermission', array('snogGroups', 'canCreateAlbum', ))) {
			$__compilerTemp5 .= '
			';
			if (!$__vars['group']['hasalbum']) {
				$__compilerTemp5 .= '
				' . $__templater->formCheckBoxRow(array(
				), array(array(
					'name' => 'hasalbum',
					'value' => '1',
					'selected' => $__vars['group']['hasalbum'],
					'data-xf-init' => 'snogenabler',
					'data-container' => '#albumview',
					'data-hide' => 'true',
					'label' => '&nbsp;',
					'_type' => 'option',
				)), array(
					'label' => 'Create group photo area',
					'explain' => 'Checking this box will create an area for photos for this group',
				)) . '
			';
			} else {
				$__compilerTemp5 .= '
				' . $__templater->formCheckBoxRow(array(
				), array(array(
					'disabled' => 'disabled',
					'name' => 'dummy3',
					'value' => '1',
					'selected' => $__vars['group']['hasalbum'],
					'label' => '&nbsp;',
					'_type' => 'option',
				)), array(
					'rowclass' => 'is-disabled',
					'label' => 'Create group photo area',
					'explain' => 'Checking this box will create an area for photos for this group',
				)) . '
				<input type="hidden" name="hasalbum" value="' . $__templater->escape($__vars['group']['hasalbum']) . '" />
			';
			}
			$__compilerTemp5 .= '
		
			<div class="private">
				<div id="albumview">
					';
			if ((!$__vars['group']['privategroup']) AND (!$__vars['group']['privatehide'])) {
				$__compilerTemp5 .= '
						' . $__templater->formCheckBoxRow(array(
				), array(array(
					'name' => 'albumview',
					'value' => '1',
					'selected' => $__vars['group']['albumview'],
					'label' => 'Non-members can view group photos',
					'_type' => 'option',
				)), array(
					'explain' => 'Check this box to allow non-members to view group photos',
				)) . '
					';
			}
			$__compilerTemp5 .= '
				</div>
			</div>
		';
		}
		$__compilerTemp6 = '';
		if ($__templater->method($__vars['xf']['visitor'], 'hasPermission', array('snogGroups', 'canCreateMedia', )) AND $__vars['galleryInstalled']) {
			$__compilerTemp6 .= '
			';
			if (!$__vars['group']['hasmedia']) {
				$__compilerTemp6 .= '
				' . $__templater->formCheckBoxRow(array(
				), array(array(
					'name' => 'hasmedia',
					'value' => '1',
					'selected' => $__vars['group']['hasmedia'],
					'label' => '&nbsp;',
					'_type' => 'option',
				)), array(
					'label' => 'Create media area',
					'explain' => 'Checking this box will create a XenForo Media Gallery category for this group.<br />Media is only viewable by group members.',
				)) . '
			';
			} else {
				$__compilerTemp6 .= '
				' . $__templater->formCheckBoxRow(array(
				), array(array(
					'disabled' => 'disabled',
					'name' => 'dummy4',
					'value' => '1',
					'selected' => $__vars['group']['hasmedia'],
					'label' => '&nbsp;',
					'_type' => 'option',
				)), array(
					'rowclass' => 'is-disabled',
					'label' => 'Create media area',
					'explain' => 'Checking this box will create a XenForo Media Gallery category for this group.<br />Media is only viewable by group members.',
				)) . '
				<input type="hidden" name="hasmedia" value="' . $__templater->escape($__vars['group']['hasmedia']) . '" />
			';
			}
			$__compilerTemp6 .= '
		';
		}
		$__compilerTemp7 = '';
		if ($__templater->method($__vars['xf']['visitor'], 'hasPermission', array('snogGroups', 'canCreateCalendar', ))) {
			$__compilerTemp7 .= '
			';
			if (!$__vars['group']['hasevent']) {
				$__compilerTemp7 .= '
				' . $__templater->formCheckBoxRow(array(
				), array(array(
					'name' => 'hasevent',
					'value' => '1',
					'selected' => $__vars['group']['hasevent'],
					'data-xf-init' => 'snogenabler',
					'data-container' => '#eventview',
					'data-hide' => 'true',
					'label' => '&nbsp;',
					'_type' => 'option',
				)), array(
					'label' => 'Create group event calendar',
					'explain' => 'Checking this box will create an event calendar for this group',
				)) . '
			';
			} else {
				$__compilerTemp7 .= '
				' . $__templater->formCheckBoxRow(array(
				), array(array(
					'disabled' => 'disabled',
					'name' => 'dummy4',
					'value' => '1',
					'selected' => $__vars['group']['hasevent'],
					'label' => '&nbsp;',
					'_type' => 'option',
				)), array(
					'rowclass' => 'is-disabled',
					'label' => 'Create group event calendar',
					'explain' => 'Checking this box will create an event calendar for this group',
				)) . '
				<input type="hidden" name="hasevent" value="' . $__templater->escape($__vars['group']['hasevent']) . '" />
			';
			}
			$__compilerTemp7 .= '

			<div class="private">
				<div id="eventview">
					';
			if ((!$__vars['group']['privategroup']) AND (!$__vars['group']['privatehide'])) {
				$__compilerTemp7 .= '
						' . $__templater->formCheckBoxRow(array(
				), array(array(
					'name' => 'eventview',
					'value' => '1',
					'selected' => $__vars['group']['eventview'],
					'label' => 'Non-members can view group event calendar',
					'_type' => 'option',
				)), array(
					'explain' => 'Check this box to allow non-members to view the group event calendar',
				)) . '
					';
			}
			$__compilerTemp7 .= '
				</div>
			</div>
		';
		}
		$__compilerTemp8 = '';
		if ((($__templater->method($__vars['xf']['visitor'], 'hasPermission', array('snogGroups', 'canCreatePrivate', )) OR $__templater->method($__vars['xf']['visitor'], 'hasPermission', array('snogGroups', 'canMakeHidden', ))) OR $__templater->method($__vars['xf']['visitor'], 'hasPermission', array('snogGroups', 'canRequireApproval', ))) OR $__templater->method($__vars['xf']['visitor'], 'hasPermission', array('snogGroups', 'canCreateRestricted', ))) {
			$__compilerTemp8 .= '
	
			<h3 class="block-formSectionHeader">
				<span class="block-formSectionHeader-aligner">' . 'Group settings' . '</span>
			</h3>

			';
			if ($__templater->method($__vars['xf']['visitor'], 'hasPermission', array('snogGroups', 'canCreatePrivate', ))) {
				$__compilerTemp8 .= '
				<div id="privategroup">
					' . $__templater->formCheckBoxRow(array(
				), array(array(
					'name' => 'privategroup',
					'value' => '1',
					'checked' => ($__vars['group']['privategroup'] ? 'checked' : ''),
					'data-invert' => 'true',
					'data-xf-init' => 'snogenabler',
					'data-container' => '#notprivate, #hidden, .private, #note',
					'data-hide' => 'true',
					'label' => '&nbsp;',
					'_type' => 'option',
				)), array(
					'label' => 'This is a private group',
					'explain' => 'Checking this box hides all content from non-members. Users must request membership and be approved to view content. This DOES NOT hide the group itself. All view options selected above are removed.',
				)) . '
				</div>
			';
			}
			$__compilerTemp8 .= '
		
			';
			if ($__templater->method($__vars['xf']['visitor'], 'hasPermission', array('snogGroups', 'canMakeHidden', ))) {
				$__compilerTemp8 .= '
				<div id="hidden">
					' . $__templater->formCheckBoxRow(array(
				), array(array(
					'name' => 'privatehide',
					'value' => '1',
					'checked' => ($__vars['group']['privatehide'] ? 'checked' : ''),
					'data-invert' => 'true',
					'data-xf-init' => 'snogenabler',
					'data-container' => '#privategroup, #notprivate, .private, #note',
					'data-hide' => 'true',
					'label' => '&nbsp;',
					'_type' => 'option',
				)), array(
					'label' => 'This is a hidden private group',
					'explain' => 'Check this box to completely hide this group from non-members and make it \'INVITE ONLY\'. All view options selected above are removed.',
				)) . '
				</div>
			';
			}
			$__compilerTemp8 .= '
	
			';
			if ($__templater->method($__vars['xf']['visitor'], 'hasPermission', array('snogGroups', 'canRequireApproval', ))) {
				$__compilerTemp8 .= '
				<div id="notprivate">
					' . $__templater->formCheckBoxRow(array(
				), array(array(
					'name' => 'approval',
					'value' => '1',
					'checked' => ($__vars['group']['approval'] ? 'checked' : ''),
					'data-invert' => 'true',
					'data-xf-init' => 'snogenabler',
					'data-container' => '#privategroup, #hidden, #note',
					'data-hide' => 'true',
					'label' => '&nbsp;',
					'_type' => 'option',
				)), array(
					'label' => 'Not private but require approval',
					'explain' => 'Checking this box requires new members to be approved. Checking this box does not hide content from non-members if it is allowed in the view options above.',
				)) . '
				</div>
			';
			}
			$__compilerTemp8 .= '
			
			';
			if (($__templater->method($__vars['xf']['visitor'], 'hasPermission', array('snogGroups', 'canCreatePrivate', )) OR $__templater->method($__vars['xf']['visitor'], 'hasPermission', array('snogGroups', 'canMakeHidden', ))) OR $__templater->method($__vars['xf']['visitor'], 'hasPermission', array('snogGroups', 'canRequireApproval', ))) {
				$__compilerTemp8 .= '
				<div id="note">
					<dl class="formRow">
						<dt></dt>
						<dd>
							' . 'If one of the options above is not selected, the group will be a public group and anyone can join without approval.' . '
						</dd>				
					</dl>
				</div>
			';
			}
			$__compilerTemp8 .= '
			
			';
			if ($__templater->method($__vars['xf']['visitor'], 'hasPermission', array('snogGroups', 'canCreateRestricted', ))) {
				$__compilerTemp8 .= '
				' . $__templater->formCheckBoxRow(array(
				), array(array(
					'name' => 'restricted',
					'value' => '1',
					'selected' => $__vars['group']['restricted'],
					'label' => '&nbsp;',
					'_type' => 'option',
				)), array(
					'label' => 'This is a restricted group',
					'explain' => 'If checked, only members that the admin of the site has given permission to view restricted groups will be able to see this group',
				)) . '
			';
			}
			$__compilerTemp8 .= '
		';
		}
		$__finalCompiled .= $__templater->form('
		' . $__templater->formTextBoxRow(array(
			'name' => 'name',
			'value' => $__vars['group']['name'],
		), array(
			'label' => 'Group name',
		)) . '

		' . $__templater->formSelectRow(array(
			'name' => 'category_id',
			'value' => $__vars['group']['category_id'],
		), $__compilerTemp1, array(
			'label' => 'Group category',
			'explain' => 'Select a category for this group',
		)) . '
	
		' . $__templater->formEditorRow(array(
			'name' => 'groupdescription',
			'value' => $__vars['group']['groupdescription'],
		), array(
			'label' => 'Group description',
			'explain' => 'Enter a detailed description for this group',
		)) . '
			
		<hr class="formRowSep" />
		
		' . $__compilerTemp3 . '

		' . $__compilerTemp4 . '
		
		' . $__compilerTemp5 . '
		
		' . $__compilerTemp6 . '
	
		' . $__compilerTemp7 . '

		<dl class="formRow">
			<dt></dt>
			<dd>
				' . 'Once the above items are created, they can not be deleted' . '
			</dd>				
		</dl>

		' . $__compilerTemp8 . '
		
		<h3 class="block-formSectionHeader">
			<span class="block-formSectionHeader-aligner">' . 'Notification settings' . '</span>
		</h3>

		' . $__templater->formCheckBoxRow(array(
		), array(array(
			'name' => 'joins',
			'value' => '1',
			'selected' => $__vars['group']['joins'],
			'label' => '&nbsp;',
			'_type' => 'option',
		)), array(
			'label' => 'User joins this group',
			'explain' => 'Checking this box will send a notification PC to the owner of this group when a new user joins this group',
		)) . '

		' . $__templater->formCheckBoxRow(array(
		), array(array(
			'name' => 'accepts',
			'value' => '1',
			'selected' => $__vars['group']['accepts'],
			'label' => '&nbsp;',
			'_type' => 'option',
		)), array(
			'label' => 'User accepts invitation',
			'explain' => 'Checking this box will send a notification PC to the owner of this group when a user accepts an invitation to join this group',
		)) . '
		
		' . $__templater->formCheckBoxRow(array(
		), array(array(
			'name' => 'leaves',
			'value' => '1',
			'selected' => $__vars['group']['leaves'],
			'label' => '&nbsp;',
			'_type' => 'option',
		)), array(
			'label' => 'Member leaves this group',
			'explain' => 'Checking this box will send a notification PC to the owner of this group when a member leaves this group',
		)) . '

		' . $__templater->formSubmitRow(array(
			'icon' => 'save',
			'submit' => 'Submit',
			'sticky' => 'false',
		), array(
		)) . '
	', array(
			'action' => $__templater->func('link', array('group/save', $__vars['group'], ), false),
			'ajax' => 'true',
			'class' => 'block',
			'data-xf-init' => 'attachment-manager',
			'data-force-flash-message' => 'true',
		)) . '
';
	}
	return $__finalCompiled;
}
);