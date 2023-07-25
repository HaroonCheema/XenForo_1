<?php
// FROM HASH: e7bc891a6d524252fee874dfb0a29fa8
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['category']) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Upload category banner');
		$__finalCompiled .= '

	';
		$__compilerTemp1 = '';
		if ($__vars['category']['category_image'] !== '') {
			$__compilerTemp1 .= '
					';
			$__compilerTemp2 = array(array(
				'value' => '0',
				'label' => 'Uncategorized',
				'_type' => 'option',
			));
			$__compilerTemp3 = $__templater->method($__vars['nodeTree'], 'getFlattened', array(0, ));
			if ($__templater->isTraversable($__compilerTemp3)) {
				foreach ($__compilerTemp3 AS $__vars['treeEntry']) {
					if ($__vars['treeEntry']['record']['node_type_id'] == 'Category') {
						if (!$__templater->test($__vars['settings']['categories'], 'empty', array()) AND $__templater->func('in_array', array($__vars['treeEntry']['record']['node_id'], $__vars['settings']['categories'], ), false)) {
							$__compilerTemp2[] = array(
								'value' => $__vars['treeEntry']['record']['node_id'],
								'label' => $__templater->func('repeat', array('--', $__vars['treeEntry']['depth'], ), true) . ' ' . $__templater->escape($__vars['treeEntry']['record']['title']),
								'_type' => 'option',
							);
						} else {
							if ($__templater->test($__vars['settings']['categories'], 'empty', array())) {
								$__compilerTemp2[] = array(
									'value' => $__vars['treeEntry']['record']['node_id'],
									'label' => $__templater->func('repeat', array('--', $__vars['treeEntry']['depth'], ), true) . ' ' . $__templater->escape($__vars['treeEntry']['record']['title']),
									'_type' => 'option',
								);
							}
						}
					}
				}
			}
			$__compilerTemp1 .= $__templater->formSelectRow(array(
				'name' => 'category',
			), $__compilerTemp2, array(
				'label' => 'Category for banner',
			)) . '
				';
		}
		$__finalCompiled .= $__templater->form('
		<div class="block-container">
			<div class="block-body">
				' . $__compilerTemp1 . '

				' . $__templater->formUploadRow(array(
			'name' => 'upload',
			'accept' => '.gif,.jpeg,.jpg,.jpe,.png',
		), array(
			'label' => 'Upload banner',
		)) . '
			</div>
			' . $__templater->formSubmitRow(array(
			'icon' => 'save',
		), array(
		)) . '
		</div>
	', array(
			'action' => $__templater->func('link', array('group_category', ), false),
			'upload' => 'true',
			'ajax' => 'true',
			'class' => 'block',
		)) . '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['banner']) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Upload banner');
		$__finalCompiled .= '

	';
		$__compilerTemp4 = '';
		if ($__vars['group']['groupbanner'] !== 'default.png') {
			$__compilerTemp4 .= '
					' . $__templater->formRow('
						<img src="' . $__templater->escape($__templater->method($__vars['group'], 'getBannerImageUrl', array('b', ))) . '" />
					
						<div><label><input type="checkbox" name="delete_banner" value="1" /> ' . 'Delete current banner' . '</label></div>
					', array(
				'label' => 'Current banner',
			)) . '
				';
		}
		$__finalCompiled .= $__templater->form('
		<div class="block-container">
			<div class="block-body">
				' . $__compilerTemp4 . '

				' . $__templater->formUploadRow(array(
			'name' => 'upload',
			'accept' => '.gif,.jpeg,.jpg,.jpe,.png',
		), array(
			'label' => 'Upload banner',
		)) . '
			</div>
			' . $__templater->formSubmitRow(array(
			'icon' => 'save',
		), array(
		)) . '
		</div>
	', array(
			'action' => $__templater->func('link', array('group/banner', $__vars['group'], ), false),
			'upload' => 'true',
			'ajax' => 'true',
			'class' => 'block',
		)) . '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['action'] == 'subforum') {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Create sub-forum');
		$__finalCompiled .= '

	';
		$__compilerTemp5 = array();
		$__compilerTemp6 = $__templater->method($__vars['nodeTree'], 'getFlattened', array());
		if ($__templater->isTraversable($__compilerTemp6)) {
			foreach ($__compilerTemp6 AS $__vars['treeEntry']) {
				$__compilerTemp5[] = array(
					'value' => $__vars['treeEntry']['record']['node_id'],
					'selected' => ((!$__vars['firstDone']) ? true : false),
					'label' => $__templater->func('repeat', array('--', $__vars['treeEntry']['record']['depth'] - $__vars['depthAdjust'], ), true) . ' ' . $__templater->escape($__vars['treeEntry']['record']['title']),
					'_type' => 'option',
				);
				$__vars['firstDone'] = '1';
			}
		}
		$__finalCompiled .= $__templater->form('
		<div class="block-container">
			<div class="block-body">
				' . $__templater->formTextBoxRow(array(
			'name' => 'title',
			'value' => $__vars['title'],
		), array(
			'label' => 'Sub-forum name',
		)) . '

				' . $__templater->formSelectRow(array(
			'name' => 'parent',
			'value' => '',
		), $__compilerTemp5, array(
			'label' => 'Parent',
			'explain' => 'Select what forum will be the parent for this subform',
			'hint' => 'Required',
		)) . '

				' . $__templater->formRadioRow(array(
			'name' => 'permissions',
		), array(array(
			'value' => '0',
			'label' => 'Inherit (same as parent forum)',
			'_type' => 'option',
		),
		array(
			'value' => '1',
			'label' => 'Private (group members only)',
			'_type' => 'option',
		),
		array(
			'value' => '2',
			'label' => 'Public (non-members can view thread contents)',
			'_type' => 'option',
		),
		array(
			'value' => '3',
			'label' => 'Viewable only by group moderators',
			'_type' => 'option',
		)), array(
			'label' => 'Permissions',
			'explain' => 'Select the permissions for this sub-forum',
		)) . '
			</div>
			
		<div class="formRow formSubmitRow">
			<div class="formSubmitRow-main">
			<div class="formSubmitRow-bar"></div>
				<div class="formSubmitRow-controls" style="padding: 5px 0 5px 0; !important;">
					<div style="text-align:center;margin-left:auto;margin-right:auto;">
						' . $__templater->button('Save', array(
			'type' => 'submit',
			'accesskey' => 's',
			'class' => 'button button--icon button--icon--save',
		), '', array(
		)) . '
					</div>
				</div>
			</div>
			</div>
		</div>
	', array(
			'action' => $__templater->func('link', array('group/subforum', $__vars['group'], ), false),
			'upload' => 'true',
			'ajax' => 'true',
			'class' => 'block',
		)) . '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['action'] == 'selectforum') {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Select sub-forum');
		$__finalCompiled .= '

	';
		if ($__vars['d'] == 0) {
			$__finalCompiled .= '
		';
			$__vars['link'] = $__templater->func('link', array('group/selectforum', $__vars['group'], ), false);
			$__finalCompiled .= '
	';
		} else {
			$__finalCompiled .= '
		';
			$__vars['link'] = $__templater->func('link', array('group/selectforum', $__vars['group'], array('d' => $__vars['d'], ), ), false);
			$__finalCompiled .= '
	';
		}
		$__finalCompiled .= '
	';
		$__compilerTemp7 = array();
		$__compilerTemp8 = $__templater->method($__vars['groupTree'], 'getFlattened', array(0, ));
		if ($__templater->isTraversable($__compilerTemp8)) {
			foreach ($__compilerTemp8 AS $__vars['treeEntry']) {
				$__compilerTemp7[] = array(
					'value' => $__vars['treeEntry']['record']['node_id'],
					'selected' => false,
					'label' => $__templater->func('repeat', array('--', $__vars['treeEntry']['record']['depth'] - $__vars['depthAdjust'], ), true) . ' ' . $__templater->escape($__vars['treeEntry']['record']['title']),
					'_type' => 'option',
				);
			}
		}
		$__finalCompiled .= $__templater->form('
		<div class="block-container">
			<div class="block-body">
				' . $__templater->formRadioRow(array(
			'name' => 'forum',
		), $__compilerTemp7, array(
			'label' => ((!$__vars['d']) ? 'Sub-forum to edit' : 'Sub-forum to delete'),
		)) . '
			</div>
			
		<div class="formRow formSubmitRow">
			<div class="formSubmitRow-main">
			<div class="formSubmitRow-bar"></div>
				<div class="formSubmitRow-controls" style="padding: 5px 0 5px 0; !important;">
					<div style="text-align:center;margin-left:auto;margin-right:auto;">
						' . $__templater->button('Select sub-forum', array(
			'type' => 'submit',
			'accesskey' => 's',
			'class' => 'button button--icon button--icon--save',
		), '', array(
		)) . '
					</div>
				</div>
			</div>
			</div>
		</div>
	', array(
			'action' => $__vars['link'],
			'upload' => 'true',
			'ajax' => 'true',
			'class' => 'block',
		)) . '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['action'] == 'editforum') {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Edit sub-forum');
		$__finalCompiled .= '

	';
		$__compilerTemp9 = array();
		$__compilerTemp10 = $__templater->method($__vars['groupTree'], 'getFlattened', array());
		if ($__templater->isTraversable($__compilerTemp10)) {
			foreach ($__compilerTemp10 AS $__vars['treeEntry']) {
				if (($__vars['treeEntry']['record']['node_id'] !== $__vars['forum']['node_id']) AND ($__vars['treeEntry']['record']['parent_node_id'] !== $__vars['forum']['node_id'])) {
					$__compilerTemp9[] = array(
						'value' => $__vars['treeEntry']['record']['node_id'],
						'selected' => (($__vars['treeEntry']['record']['node_id'] == $__vars['forum']['parent_node_id']) ? true : false),
						'label' => $__templater->func('repeat', array('--', $__vars['treeEntry']['record']['depth'] - $__vars['depthAdjust'], ), true) . ' ' . $__templater->escape($__vars['treeEntry']['record']['title']),
						'_type' => 'option',
					);
				}
			}
		}
		$__finalCompiled .= $__templater->form('
		<div class="block-container">
			<div class="block-body">
				' . $__templater->formTextBoxRow(array(
			'name' => 'title',
			'value' => $__vars['forum']['title'],
		), array(
			'label' => 'Sub-forum name',
		)) . '

				' . $__templater->formSelectRow(array(
			'name' => 'parent',
			'value' => '',
		), $__compilerTemp9, array(
			'label' => 'Parent',
			'explain' => 'Select what forum will be the parent for this subform',
			'hint' => 'Required',
		)) . '

				' . $__templater->formRadioRow(array(
			'name' => 'permissions',
		), array(array(
			'value' => '0',
			'selected' => (($__vars['permissions'] == 0) ? 'selected' : ''),
			'label' => 'Inherit (same as parent forum)',
			'_type' => 'option',
		),
		array(
			'value' => '1',
			'selected' => (($__vars['permissions'] == 1) ? 'selected' : ''),
			'label' => 'Private (group members only)',
			'_type' => 'option',
		),
		array(
			'value' => '2',
			'selected' => (($__vars['permissions'] == 2) ? 'selected' : ''),
			'label' => 'Public (non-members can view thread contents)',
			'_type' => 'option',
		),
		array(
			'value' => '3',
			'selected' => (($__vars['permissions'] == 3) ? 'selected' : ''),
			'label' => 'Viewable only by group moderators',
			'_type' => 'option',
		)), array(
			'label' => 'Permissions',
			'explain' => 'Select the permissions for this sub-forum',
		)) . '
			</div>
			
		<div class="formRow formSubmitRow">
			<div class="formSubmitRow-main">
			<div class="formSubmitRow-bar"></div>
				<div class="formSubmitRow-controls" style="padding: 5px 0 5px 0; !important;">
					<div style="text-align:center;margin-left:auto;margin-right:auto;">
						<input type="hidden" name="forum" value="' . $__templater->escape($__vars['forum']['node_id']) . '" />
						' . $__templater->button('Save', array(
			'type' => 'submit',
			'accesskey' => 's',
			'class' => 'button button--icon button--icon--save',
		), '', array(
		)) . '
					</div>
				</div>
			</div>
			</div>
		</div>
	', array(
			'action' => $__templater->func('link', array('group/saveforum', $__vars['group'], ), false),
			'upload' => 'true',
			'ajax' => 'true',
			'class' => 'block',
		)) . '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['photoUpload']) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Upload photo');
		$__finalCompiled .= '

	' . $__templater->form('
		<div class="block-container">
			<div class="block-body">
				' . $__templater->formUploadRow(array(
			'name' => 'upload',
			'accept' => '.gif,.jpeg,.jpg,.jpe,.png',
		), array(
			'label' => 'Upload photo',
		)) . '
				' . $__templater->formTextBoxRow(array(
			'name' => 'title',
			'value' => '',
		), array(
			'label' => 'Photo title',
		)) . '
			</div>
			' . $__templater->formSubmitRow(array(
			'icon' => 'save',
		), array(
		)) . '
		</div>
	', array(
			'action' => $__templater->func('link', array('group_photos/upload', $__vars['group'], ), false),
			'upload' => 'true',
			'ajax' => 'true',
			'class' => 'block',
		)) . '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['photoTitle']) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Add photo title');
		$__finalCompiled .= '

	' . $__templater->form('
			<div class="block-container">
			<div class="block-body">
				' . $__templater->formTextBoxRow(array(
			'name' => 'title',
			'value' => $__vars['photo']['title'],
		), array(
			'label' => 'Photo title',
		)) . '
			</div>
			' . $__templater->formSubmitRow(array(
			'icon' => 'save',
		), array(
		)) . '
		</div>
	', array(
			'action' => $__templater->func('link', array('group_photos/title', $__vars['group'], array('photo_id' => $__vars['photo']['photo_id'], ), ), false),
			'ajax' => 'true',
			'class' => 'block',
		)) . '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['photoDelete']) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Delete photo');
		$__finalCompiled .= '

	' . $__templater->form('
		<div class="block-container">
			<div class="block-body">
				' . $__templater->callMacro('helper_action', 'delete_type', array(
			'canHardDelete' => $__vars['canHardDelete'],
		), $__vars) . '
			</div>
			' . $__templater->formSubmitRow(array(
			'icon' => 'delete',
		), array(
			'rowtype' => 'simple',
		)) . '
		</div>
	', array(
			'action' => $__templater->func('link', array('group_photos/delete', $__vars['group'], array('photo_id' => $__vars['photo']['photo_id'], ), ), false),
			'ajax' => 'true',
			'class' => 'block',
			'data-force-flash-message' => 'true',
		)) . '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['action'] == 'titleedit') {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Edit discussion title');
		$__finalCompiled .= '

	' . $__templater->form('
			<div class="block-container">
			<div class="block-body">
				' . $__templater->formTextBoxRow(array(
			'name' => 'title',
			'value' => $__vars['post']['title'],
		), array(
			'label' => 'Title',
		)) . '
			</div>
			' . $__templater->formSubmitRow(array(
			'icon' => 'save',
		), array(
		)) . '
		</div>
	', array(
			'action' => $__templater->func('link', array('group_discussions/title', $__vars['group'], array('post' => $__vars['post']['discussion_id'], ), ), false),
			'ajax' => 'true',
			'class' => 'block',
		)) . '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['action'] == 'remove') {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Confirm action');
		$__finalCompiled .= '

	' . $__templater->form('
		<div class="block-container">
			<div class="block-body">
				' . $__templater->formInfoRow('
					' . 'Please confirm that you want to delete the following' . '
					' . 'member from this group' . '<strong>' . $__templater->escape($__vars['member']['username']) . '</strong>
				', array(
			'rowtype' => 'confirm',
		)) . '
			</div>
			' . $__templater->formSubmitRow(array(
			'icon' => 'delete',
		), array(
			'rowtype' => 'simple',
		)) . '
		</div>
	', array(
			'action' => $__templater->func('link', array('group/remove', $__vars['group'], array('user_id' => $__vars['member']['user_id'], ), ), false),
			'ajax' => 'true',
			'class' => 'block',
			'data-force-flash-message' => 'true',
		)) . '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['action'] == 'membersearch') {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Search members');
		$__finalCompiled .= '

	' . $__templater->form('
		<div class="block-container">
			<div class="block-body">
					' . $__templater->formTextBoxRow(array(
			'name' => 'username',
			'value' => '',
			'type' => 'search',
			'ac' => 'single',
			'placeholder' => 'Username' . $__vars['xf']['language']['ellipsis'],
		), array(
			'label' => 'Username',
		)) . '
			</div>
			
			<div class="formSubmitRow">
				<div class="formSubmitRow-bar"></div>
				<div class="formSubmitRow-controls" style="padding: 5px 0 5px 0; !important;">
					<div style="text-align:center;margin-left:auto;margin-right:auto;">
						' . $__templater->button('Search', array(
			'type' => 'submit',
			'class' => 'button button--icon button--icon--search',
			'name' => 'search',
			'value' => '1',
		), '', array(
		)) . '
					</div>
				</div>
			</div>
		</div>
	', array(
			'action' => $__templater->func('link', array('group/searchmembers', $__vars['group'], ), false),
			'class' => 'block',
			'data-force-flash-message' => 'false',
		)) . '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['action'] == 'invite') {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Invite member');
		$__finalCompiled .= '

	' . $__templater->form('
		<div class="block-container">
			<div class="block-body">
					' . $__templater->formTextBoxRow(array(
			'name' => 'username',
			'value' => '',
			'type' => 'search',
			'ac' => 'single',
			'placeholder' => 'Username' . $__vars['xf']['language']['ellipsis'],
		), array(
			'label' => 'User to invite',
			'explain' => 'Enter the user name of the person you want to invite to ' . $__templater->escape($__vars['group']['name']) . '',
		)) . '
			</div>
			
			<div class="formSubmitRow">
				<div class="formSubmitRow-bar"></div>
				<div class="formSubmitRow-controls" style="padding: 5px 0 5px 0; !important;">
					<div style="text-align:center;margin-left:auto;margin-right:auto;">
						' . $__templater->button('Invite member', array(
			'type' => 'submit',
			'class' => 'button button--icon button--icon--handshake',
			'name' => 'invite',
			'value' => '1',
		), '', array(
		)) . '
					</div>
				</div>
			</div>
		</div>
	', array(
			'action' => $__templater->func('link', array('group/invite', $__vars['group'], ), false),
			'ajax' => 'true',
			'class' => 'block',
			'data-force-flash-message' => 'true',
		)) . '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['action'] == 'approve') {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Confirm action');
		$__finalCompiled .= '

	';
		if ($__templater->func('in_array', array($__vars['group']['groupid'], $__vars['member']['SocialGroups']['pending'], ), false)) {
			$__finalCompiled .= '
		' . $__templater->form('
			<div class="block-container">
				<div class="block-body">
					' . $__templater->formInfoRow('
						' . 'Do you want to Approve or Deny membership to ' . $__templater->escape($__vars['group']['name']) . ' for' . '
						<strong>' . $__templater->escape($__vars['member']['username']) . '</strong>
					', array(
				'rowtype' => 'confirm',
			)) . '
				</div>
			
				<div class="formSubmitRow">
					<div class="formSubmitRow-bar"></div>
					<div class="formSubmitRow-controls" style="padding: 5px 0 5px 0; !important;">
						<div style="text-align:center;margin-left:auto;margin-right:auto;">
						' . $__templater->button('Approve', array(
				'type' => 'submit',
				'class' => 'button button--primary button--icon button--icon--thumbup',
				'name' => 'approve',
				'value' => '1',
			), '', array(
			)) . '
						' . $__templater->button('Deny', array(
				'type' => 'submit',
				'class' => 'button button--icon button--icon--thumbdown',
				'name' => 'deny',
				'value' => '1',
			), '', array(
			)) . '
						</div>
					</div>
				</div>
			</div>
		', array(
				'action' => $__templater->func('link', array('group/approve', $__vars['group'], array('user_id' => $__vars['member']['user_id'], ), ), false),
				'ajax' => 'true',
				'class' => 'block',
				'data-force-flash-message' => 'true',
			)) . '
	';
		} else {
			$__finalCompiled .= '
		<div class="block">
			<div class="block-container">
				<div class="block-body">
					';
			$__compilerTemp11 = '';
			if ($__templater->func('in_array', array($__vars['group']['groupid'], $__vars['member']['SocialGroups']['groups'], ), false)) {
				$__compilerTemp11 .= '
							' . $__templater->escape($__vars['member']['username']) . ' ' . 'has already been approved.' . '
						';
			} else {
				$__compilerTemp11 .= '
							' . $__templater->escape($__vars['member']['username']) . ' ' . 'has already been denied.' . '
						';
			}
			$__finalCompiled .= $__templater->formInfoRow('
						' . $__compilerTemp11 . '
					', array(
				'rowtype' => 'confirm',
			)) . '
				</div>
			</div>
		</div>
	';
		}
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['action'] == 'cancel') {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Confirm action');
		$__finalCompiled .= '

	';
		if ($__templater->func('in_array', array($__vars['group']['groupid'], $__vars['member']['SocialGroups']['invites'], ), false)) {
			$__finalCompiled .= '
		' . $__templater->form('
			<div class="block-container">
				<div class="block-body">
					' . $__templater->formInfoRow('
						' . 'Do you want to cancel the invitation to ' . $__templater->escape($__vars['group']['name']) . ' for' . '
						<strong>' . $__templater->escape($__vars['member']['username']) . '</strong>
					', array(
				'rowtype' => 'confirm',
			)) . '
				</div>
			
				<div class="formSubmitRow">
					<div class="formSubmitRow-bar"></div>
					<div class="formSubmitRow-controls" style="padding: 5px 0 5px 0; !important;">
						<div style="text-align:center;margin-left:auto;margin-right:auto;">
						' . $__templater->button('Cancel invitation', array(
				'type' => 'submit',
				'class' => 'button button--primary button--icon button--icon--times',
				'name' => 'approve',
				'value' => '1',
			), '', array(
			)) . '
						</div>
					</div>
				</div>
			</div>
		', array(
				'action' => $__templater->func('link', array('group/cancel', $__vars['group'], array('user_id' => $__vars['member']['user_id'], ), ), false),
				'ajax' => 'true',
				'class' => 'block',
				'data-force-flash-message' => 'true',
			)) . '
	';
		} else {
			$__finalCompiled .= '
		<div class="block">
			<div class="block-container">
				<div class="block-body">
					' . $__templater->formInfoRow('
						' . 'Invitation for ' . $__templater->escape($__vars['member']['username']) . ' has already been cancelled.' . '
					', array(
				'rowtype' => 'confirm',
			)) . '
				</div>
			</div>
		</div>
	';
		}
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['action'] == 'addmod') {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Add moderator');
		$__finalCompiled .= '

	' . $__templater->form('
		<div class="block-container">
			<div class="block-body">
					' . $__templater->formTextBoxRow(array(
			'name' => 'username',
			'value' => '',
			'type' => 'search',
			'ac' => 'single',
			'placeholder' => 'Username' . $__vars['xf']['language']['ellipsis'],
		), array(
			'label' => 'User to make a group moderator',
			'explain' => 'Enter the user name of the person you want to be a moderator in this group. NOTE: The user must be a member of this group.',
		)) . '
			</div>
			
			<div class="formSubmitRow">
				<div class="formSubmitRow-bar"></div>
				<div class="formSubmitRow-controls" style="padding: 5px 0 5px 0; !important;">
					<div style="text-align:center;margin-left:auto;margin-right:auto;">
						' . $__templater->button('Add moderator', array(
			'type' => 'submit',
			'class' => 'button button--primary button--icon button--icon--save',
			'name' => 'invite',
			'value' => '1',
		), '', array(
		)) . '
					</div>
				</div>
			</div>
		</div>
	', array(
			'action' => $__templater->func('link', array('group/moderator', $__vars['group'], ), false),
			'ajax' => 'true',
			'class' => 'block',
			'data-force-flash-message' => 'true',
		)) . '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['action'] == 'removemod') {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Remove moderator');
		$__finalCompiled .= '

	' . $__templater->form('
		<div class="block-container">
			<div class="block-body">
					' . $__templater->formTextBoxRow(array(
			'name' => 'username',
			'value' => '',
			'type' => 'search',
			'ac' => 'single',
			'placeholder' => 'Username' . $__vars['xf']['language']['ellipsis'],
		), array(
			'label' => 'User to remove as group moderator',
			'explain' => 'Enter the user name of the person you want to remove as moderator in this group.',
		)) . '
			</div>
			
			<div class="formSubmitRow">
				<div class="formSubmitRow-bar"></div>
				<div class="formSubmitRow-controls" style="padding: 5px 0 5px 0; !important;">
					<div style="text-align:center;margin-left:auto;margin-right:auto;">
						' . $__templater->button('Remove moderator', array(
			'type' => 'submit',
			'class' => 'button button--primary button--icon button--icon--delete',
			'name' => 'invite',
			'value' => '1',
		), '', array(
		)) . '
					</div>
				</div>
			</div>
		</div>
	', array(
			'action' => $__templater->func('link', array('group/removemoderator', $__vars['group'], ), false),
			'ajax' => 'true',
			'class' => 'block',
			'data-force-flash-message' => 'true',
		)) . '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['action'] == 'transfer') {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Transfer ownership');
		$__finalCompiled .= '

	' . $__templater->form('
		<div class="block-container">
			<div class="block-body">
					' . $__templater->formTextBoxRow(array(
			'name' => 'username',
			'value' => '',
			'type' => 'search',
			'ac' => 'single',
			'placeholder' => 'Username' . $__vars['xf']['language']['ellipsis'],
		), array(
			'label' => 'New group owner name',
			'explain' => 'Enter the user name of the person that will be the new group owner.',
		)) . '
			</div>
			
			<div class="formSubmitRow">
				<div class="formSubmitRow-bar"></div>
				<div class="formSubmitRow-controls" style="padding: 5px 0 5px 0; !important;">
					<div style="text-align:center;margin-left:auto;margin-right:auto;">
						' . $__templater->button('Transfer ownership', array(
			'type' => 'submit',
			'class' => 'button button--primary button--icon button--icon--save',
			'value' => '1',
		), '', array(
		)) . '
					</div>
				</div>
			</div>
		</div>
	', array(
			'action' => $__templater->func('link', array('group/transfer', $__vars['group'], ), false),
			'ajax' => 'true',
			'class' => 'block',
			'data-force-flash-message' => 'true',
		)) . '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['action'] == 'addevent') {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Add event');
		$__finalCompiled .= '

	';
		$__compilerTemp12 = array();
		if ($__templater->isTraversable($__vars['data']['hours'])) {
			foreach ($__vars['data']['hours'] AS $__vars['hour']) {
				$__compilerTemp12[] = array(
					'value' => $__vars['hour'],
					'label' => $__templater->escape($__vars['hour']),
					'_type' => 'option',
				);
			}
		}
		$__compilerTemp13 = array();
		if ($__templater->isTraversable($__vars['data']['hours'])) {
			foreach ($__vars['data']['hours'] AS $__vars['hour']) {
				$__compilerTemp13[] = array(
					'value' => $__vars['hour'],
					'label' => $__templater->escape($__vars['hour']),
					'_type' => 'option',
				);
			}
		}
		$__finalCompiled .= $__templater->form('
		<div class="block-container">
			<div class="block-body">
				' . $__templater->formTextBoxRow(array(
			'name' => 'title',
			'value' => '',
			'placeholder' => 'Event name' . '...',
		), array(
			'label' => 'Event name',
		)) . '

				' . $__templater->formCheckBoxRow(array(
		), array(array(
			'name' => 'public',
			'value' => '1',
			'label' => '&nbsp;',
			'_type' => 'option',
		)), array(
			'label' => 'Event is a public event',
			'explain' => 'Checking this box will make the event a public event and it will be viewable from the public events calendar.',
		)) . '

				' . $__templater->formEditorRow(array(
			'name' => 'description',
			'value' => '',
		), array(
			'label' => 'Event description',
		)) . '
				
				' . $__templater->formRow('
					<div class="inputGroup">
						' . $__templater->formDateInput(array(
			'name' => 'start',
			'value' => '',
			'data-year-range' => '[' . $__vars['data']['range_low'] . ', ' . $__vars['data']['range_high'] . ']',
		)) . '
						<span class="inputGroup-text">' . 'Time' . ':</span>
						<div style="width:150px;">
							' . $__templater->formSelect(array(
			'name' => 'start_time',
			'value' => '',
			'width' => '10',
		), $__compilerTemp12) . '						
						</div>
					</div>
				', array(
			'label' => 'Start date',
		)) . '
				
				' . $__templater->formCheckBoxRow(array(
		), array(array(
			'name' => 'allDay',
			'value' => '1',
			'data-xf-init' => 'snogenabler',
			'data-invert' => 'true',
			'data-container' => '#dates',
			'data-hide' => 'true',
			'label' => '&nbsp;',
			'_type' => 'option',
		)), array(
			'label' => 'Event is all day',
			'explain' => 'Checking this box will make the event last all day. All day is from 12am to 11:59:59pm.',
		)) . '
				
				<div id="dates">
					' . $__templater->formRow('
						<div class="inputGroup">
							' . $__templater->formDateInput(array(
			'name' => 'end',
			'value' => '',
			'data-year-range' => '[' . $__vars['data']['range_low'] . ', ' . $__vars['data']['range_high'] . ']',
		)) . '
							<span class="inputGroup-text">' . 'Time' . ':</span>
							<div style="width:150px;">
								' . $__templater->formSelect(array(
			'name' => 'end_time',
			'value' => '',
			'width' => '10',
		), $__compilerTemp13) . '						
							</div>
						</div>
					', array(
			'label' => 'End date',
		)) . '
				</div>
			</div>
			
			<div class="formSubmitRow">
				<div class="formSubmitRow-bar"></div>
				<div class="formSubmitRow-controls" style="padding: 5px 0 5px 0; !important;">
					<div style="text-align:center;margin-left:auto;margin-right:auto;">
						' . $__templater->button('Add event', array(
			'type' => 'submit',
			'class' => 'button button--primary button--icon button--icon--save',
			'value' => '1',
		), '', array(
		)) . '
					</div>
				</div>
			</div>
		</div>
	', array(
			'action' => $__templater->func('link', array('group_events/add', $__vars['group'], ), false),
			'ajax' => 'true',
			'class' => 'block',
			'data-force-flash-message' => 'true',
		)) . '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['action'] == 'editevent') {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Edit event' . ' ' . $__templater->escape($__vars['event']['title']));
		$__finalCompiled .= '

	';
		$__compilerTemp14 = array();
		if ($__templater->isTraversable($__vars['data']['hours'])) {
			foreach ($__vars['data']['hours'] AS $__vars['hour']) {
				$__compilerTemp14[] = array(
					'value' => $__vars['hour'],
					'label' => $__templater->escape($__vars['hour']),
					'_type' => 'option',
				);
			}
		}
		$__compilerTemp15 = array();
		if ($__templater->isTraversable($__vars['data']['hours'])) {
			foreach ($__vars['data']['hours'] AS $__vars['hour']) {
				$__compilerTemp15[] = array(
					'value' => $__vars['hour'],
					'label' => $__templater->escape($__vars['hour']),
					'_type' => 'option',
				);
			}
		}
		$__compilerTemp16 = '';
		if (((($__vars['xf']['visitor']['user_id'] == $__vars['event']['user_id']) AND $__vars['permissions']['canDeleteEvents']) OR $__vars['permissions']['deleteAnyEvent']) OR $__templater->method($__vars['xf']['visitor'], 'hasAdminPermission', array('snog_socialgroups_admin', ))) {
			$__compilerTemp16 .= '
							<a href="' . $__templater->func('link', array('group_events/delete', $__vars['group'], array('id' => $__vars['event']['event_id'], ), ), true) . '" class="js-overlayClose button button--icon button--icon--delete" data-xf-click="overlay" data-cache="off"><span class="button-text">' . 'Delete event' . '</span></a>
						';
		}
		$__finalCompiled .= $__templater->form('
		<div class="block-container">
			<div class="block-body">
				' . $__templater->formTextBoxRow(array(
			'name' => 'title',
			'value' => $__vars['event']['title'],
			'placeholder' => 'Event name' . '...',
		), array(
			'label' => 'Event name',
		)) . '

				' . $__templater->formCheckBoxRow(array(
			'value' => $__vars['event']['public'],
		), array(array(
			'name' => 'public',
			'value' => '1',
			'label' => '&nbsp;',
			'_type' => 'option',
		)), array(
			'label' => 'Event is a public event',
			'explain' => 'Checking this box will make the event a public event and it will be viewable from the public events calendar.',
		)) . '
				
				' . $__templater->formEditorRow(array(
			'name' => 'description',
			'value' => $__vars['event']['description'],
		), array(
			'label' => 'Event description',
		)) . '
				
				' . $__templater->formRow('
					<div class="inputGroup">
						' . $__templater->formDateInput(array(
			'name' => 'start',
			'value' => $__vars['data']['start'],
			'data-year-range' => '[' . $__vars['data']['range_low'] . ', ' . $__vars['data']['range_high'] . ']',
		)) . '
						<span class="inputGroup-text">' . 'Time' . ':</span>
						<div style="width:150px;">
							' . $__templater->formSelect(array(
			'name' => 'start_time',
			'value' => $__vars['data']['start_time'],
			'width' => '10',
		), $__compilerTemp14) . '						
						</div>
					</div>
				', array(
			'label' => 'Start date',
		)) . '
				
				' . $__templater->formCheckBoxRow(array(
		), array(array(
			'name' => 'allDay',
			'value' => '1',
			'checked' => ($__vars['event']['allDay'] ? 'checked' : ''),
			'data-xf-init' => 'snogenabler',
			'data-invert' => 'true',
			'data-container' => '#eventdates',
			'data-hide' => 'true',
			'label' => '&nbsp;',
			'_type' => 'option',
		)), array(
			'label' => 'Event is all day',
			'explain' => 'Checking this box will make the event last all day. All day is from 12am to 11:59:59pm.',
		)) . '
				
				<div id="eventdates">
					' . $__templater->formRow('
						<div class="inputGroup">
							' . $__templater->formDateInput(array(
			'name' => 'end',
			'value' => $__vars['data']['end'],
			'data-year-range' => '[' . $__vars['data']['range_low'] . ', ' . $__vars['data']['range_high'] . ']',
		)) . '
							<span class="inputGroup-text">' . 'Time' . ':</span>
							<div style="width:150px;">
								' . $__templater->formSelect(array(
			'name' => 'end_time',
			'value' => $__vars['data']['end_time'],
			'width' => '10',
		), $__compilerTemp15) . '						
							</div>
						</div>
					', array(
			'label' => 'End date',
		)) . '
				</div>
			</div>
			
			<div class="formSubmitRow">
				<div class="formSubmitRow-bar"></div>
				<div class="formSubmitRow-controls" style="padding: 5px 0 5px 0; !important;">
					<div style="text-align:center;margin-left:auto;margin-right:auto;">
						<input type="hidden" name="id" value="' . $__templater->escape($__vars['event']['event_id']) . '" />
						' . $__templater->button('Save event', array(
			'type' => 'submit',
			'accesskey' => 's',
			'class' => 'button button--primary button--icon button--icon--save',
		), '', array(
		)) . '
						' . $__compilerTemp16 . '
					</div>
				</div>
			</div>
		</div>
	', array(
			'action' => $__templater->func('link', array('group_events/edit', $__vars['group'], ), false),
			'ajax' => 'true',
			'class' => 'block',
			'data-force-flash-message' => 'true',
		)) . '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['action'] == 'deleteevent') {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Confirm action');
		$__finalCompiled .= '

	' . $__templater->form('
		<div class="block-container">
			<div class="block-body">
				' . $__templater->formInfoRow('
					' . 'Please confirm that you want to delete the following' . '
					' . 'event' . '<strong>' . $__templater->escape($__vars['event']['title']) . '</strong>
				', array(
			'rowtype' => 'confirm',
		)) . '
			</div>
			' . $__templater->formSubmitRow(array(
			'icon' => 'delete',
		), array(
			'rowtype' => 'simple',
		)) . '
		</div>
	', array(
			'action' => $__templater->func('link', array('group_events/delete', $__vars['group'], array('id' => $__vars['event']['event_id'], ), ), false),
			'ajax' => 'true',
			'class' => 'block',
			'data-force-flash-message' => 'true',
		)) . '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['action'] == 'viewevent') {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('View event');
		$__finalCompiled .= '

	<div class="block">
		<div class="block-container">
			<div class="block-body">
				';
		if (!$__templater->test($__vars['event'], 'empty', array())) {
			$__finalCompiled .= '
					<div style="width:90%;margin-left:auto;margin-right:auto;">
						<h2>' . $__templater->escape($__vars['event']['title']) . '</h2>
						<p>
							' . $__templater->func('bb_code', array($__vars['event']['description'], 'groupevent', $__vars['xf']['visitor'], ), true) . '
						</p>
					</div>
				
					' . $__templater->formRow('
						' . $__templater->func('date_time', array($__vars['event']['start'], ), true) . '
					', array(
				'rowclass' => 'formRow--noColon',
				'label' => 'Starts:',
			)) . '
				
					';
			$__compilerTemp17 = '';
			if ($__vars['event']['end'] > 0) {
				$__compilerTemp17 .= '
							' . $__templater->func('date_time', array($__vars['event']['end'], ), true) . '
						';
			} else {
				$__compilerTemp17 .= '
							' . 'This is an all day event' . '
						';
			}
			$__finalCompiled .= $__templater->formRow('
						' . $__compilerTemp17 . '
					', array(
				'rowclass' => 'formRow--noColon',
				'label' => 'Ends:',
			)) . '
				';
		} else {
			$__finalCompiled .= '
					<div style="width:90%;margin-left:auto;margin-right:auto;">
					' . 'Event not found' . '
					</div>
				';
		}
		$__finalCompiled .= '
			</div>
			
			';
		if (((($__vars['xf']['visitor']['user_id'] == $__vars['event']['user_id']) AND $__vars['permissions']['canEditEvents']) OR $__vars['permissions']['editAnyEvent']) OR $__templater->method($__vars['xf']['visitor'], 'hasAdminPermission', array('snog_socialgroups_admin', ))) {
			$__finalCompiled .= '
				<div class="formSubmitRow">
					<div class="formSubmitRow-bar"></div>
					<div class="formSubmitRow-controls" style="padding: 5px 0 5px 0; !important;">
						<div style="text-align:center;margin-left:auto;margin-right:auto;">
							<a href="' . $__templater->func('link', array('group_events/edit', $__vars['group'], array('id' => $__vars['event']['event_id'], ), ), true) . '" class="js-overlayClose button button--icon button--icon--edit" data-xf-click="overlay" data-cache="off"><span class="button-text">' . 'Edit event' . '</span></a>
						</div>
					</div>
				</div>
			';
		}
		$__finalCompiled .= '
		</div>
	</div>
';
	}
	$__finalCompiled .= '

';
	if ($__vars['action'] == 'moddeletediscussion') {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Delete discussions');
		$__finalCompiled .= '

	';
		$__compilerTemp18 = '';
		if ($__templater->isTraversable($__vars['discussions'])) {
			foreach ($__vars['discussions'] AS $__vars['discussion']) {
				$__compilerTemp18 .= '
			' . $__templater->formHiddenVal('ids[]', $__vars['discussion']['discussion_id'], array(
				)) . '
		';
			}
		}
		$__finalCompiled .= $__templater->form('
		<div class="block-container">
			<div class="block-body">
				' . $__templater->formInfoRow('Are you sure you want to delete ' . $__templater->escape($__vars['total']) . ' discussion(s)?', array(
			'rowtype' => 'confirm',
		)) . '

				' . $__templater->callMacro('helper_action', 'delete_type', array(
			'canHardDelete' => $__vars['canHardDelete'],
		), $__vars) . '
			</div>
			' . $__templater->formSubmitRow(array(
			'icon' => 'delete',
		), array(
		)) . '
		</div>

		' . $__compilerTemp18 . '

		' . $__templater->formHiddenVal('type', 'group_discussion', array(
		)) . '
		' . $__templater->formHiddenVal('action', 'delete', array(
		)) . '
		' . $__templater->formHiddenVal('confirmed', '1', array(
		)) . '
		' . $__templater->func('redirect_input', array($__vars['redirect'], null, true)) . '
	', array(
			'action' => $__templater->func('link', array('inline-mod', ), false),
			'class' => 'block',
			'ajax' => 'true',
		)) . '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['action'] == 'deletediscussion') {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Delete discussions');
		$__finalCompiled .= '

	' . $__templater->form('
		<div class="block-container">
			<div class="block-body">
				' . $__templater->formInfoRow('Are you sure you want to delete ' . $__templater->escape($__vars['total']) . ' discussion(s)?', array(
			'rowtype' => 'confirm',
		)) . '

				' . $__templater->callMacro('helper_action', 'delete_type', array(
			'canHardDelete' => $__vars['canHardDelete'],
		), $__vars) . '
			</div>
			' . $__templater->formSubmitRow(array(
			'icon' => 'delete',
		), array(
		)) . '
		</div>

		
		' . $__templater->formHiddenVal('action', 'delete', array(
		)) . '
		' . $__templater->formHiddenVal('confirmed', '1', array(
		)) . '
		' . $__templater->func('redirect_input', array($__vars['redirect'], null, true)) . '
	', array(
			'action' => $__templater->func('link', array('group_discussions/delete', $__vars['group'], array('id' => $__vars['discussion']['discussion_id'], ), ), false),
			'class' => 'block',
			'ajax' => 'true',
		)) . '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['action'] == 'deletepost') {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Delete posts');
		$__finalCompiled .= '

	';
		$__compilerTemp19 = '';
		if ($__templater->isTraversable($__vars['discussions'])) {
			foreach ($__vars['discussions'] AS $__vars['discussion']) {
				$__compilerTemp19 .= '
			' . $__templater->formHiddenVal('ids[]', $__vars['discussion']['discussion_id'], array(
				)) . '
		';
			}
		}
		$__finalCompiled .= $__templater->form('
		<div class="block-container">
			<div class="block-body">
				' . $__templater->formInfoRow('Are you sure you want to delete ' . $__templater->escape($__vars['total']) . ' post(s)?', array(
			'rowtype' => 'confirm',
		)) . '

				' . $__templater->callMacro('helper_action', 'delete_type', array(
			'canHardDelete' => $__vars['canHardDelete'],
		), $__vars) . '
			</div>
			' . $__templater->formSubmitRow(array(
			'icon' => 'delete',
		), array(
		)) . '
		</div>

		' . $__compilerTemp19 . '

		' . $__templater->formHiddenVal('type', 'group_post', array(
		)) . '
		' . $__templater->formHiddenVal('action', 'delete', array(
		)) . '
		' . $__templater->formHiddenVal('confirmed', '1', array(
		)) . '
		' . $__templater->func('redirect_input', array($__vars['redirect'], null, true)) . '
	', array(
			'action' => $__templater->func('link', array('inline-mod', ), false),
			'class' => 'block',
			'ajax' => 'true',
		)) . '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['action'] == 'postdelete') {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Delete post');
		$__finalCompiled .= '

	' . $__templater->form('
		<div class="block-container">
			<div class="block-body">
				' . $__templater->formInfoRow('Are you sure you want to delete ' . $__templater->escape($__vars['total']) . ' post(s)?', array(
			'rowtype' => 'confirm',
		)) . '

				' . $__templater->callMacro('helper_action', 'delete_type', array(
			'canHardDelete' => $__vars['canHardDelete'],
		), $__vars) . '
			</div>
			' . $__templater->formSubmitRow(array(
			'icon' => 'delete',
		), array(
		)) . '
		</div>

		' . $__templater->formHiddenVal('ids', $__vars['post']['discussion_id'], array(
		)) . '
		' . $__templater->formHiddenVal('type', 'post', array(
		)) . '
		' . $__templater->formHiddenVal('action', 'delete', array(
		)) . '
		' . $__templater->formHiddenVal('confirmed', '1', array(
		)) . '
		' . $__templater->func('redirect_input', array($__vars['redirect'], null, true)) . '
	', array(
			'action' => $__templater->func('link', array('group_discussions/deletepost', $__vars['group'], array('id' => $__vars['post']['discussion_id'], ), ), false),
			'class' => 'block',
			'ajax' => 'true',
		)) . '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['action'] == 'commentdelete') {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Delete post');
		$__finalCompiled .= '

	' . $__templater->form('
		<div class="block-container">
			<div class="block-body">
				' . $__templater->formInfoRow('Are you sure you want to delete ' . $__templater->escape($__vars['total']) . ' post(s)?', array(
			'rowtype' => 'confirm',
		)) . '
				
				' . $__templater->callMacro('helper_action', 'delete_type', array(
			'canHardDelete' => $__vars['canHardDelete'],
		), $__vars) . '
			</div>
			' . $__templater->formSubmitRow(array(
			'icon' => 'delete',
		), array(
		)) . '
		</div>

		' . $__templater->formHiddenVal('type', 'comment', array(
		)) . '
		' . $__templater->formHiddenVal('action', 'delete', array(
		)) . '
		' . $__templater->formHiddenVal('confirmed', '1', array(
		)) . '
		' . $__templater->func('redirect_input', array($__vars['redirect'], null, true)) . '
	', array(
			'action' => $__templater->func('link', array('group_photos/deletecomment', $__vars['group'], array('post' => $__vars['post']['comment_id'], ), ), false),
			'class' => 'block',
			'ajax' => 'true',
		)) . '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['action'] == 'deleteforum') {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Confirm action');
		$__finalCompiled .= '

	';
		$__compilerTemp20 = '';
		if (!$__vars['group']['hasdiscussion']) {
			$__compilerTemp20 .= '
						' . '<b>WARNING:</b> A group must have either a group forum or a group discussion area.<br />This group only has a forum area. Deleting this forum will delete the entire group.' . '
					';
		} else {
			$__compilerTemp20 .= '
						' . 'Note that deleting this forum will delete all sub-forums, threads and posts in all of this group\'s forums.' . '
					';
		}
		$__finalCompiled .= $__templater->form('
		<div class="block-container">
			<div class="block-body">
				' . $__templater->formInfoRow('
					' . 'Please confirm that you want to delete the following' . '
					' . 'group forum' . '<strong>' . $__templater->escape($__vars['forum']['title']) . '</strong>
					' . $__compilerTemp20 . '
				', array(
			'rowtype' => 'confirm',
		)) . '
			</div>
			' . $__templater->formSubmitRow(array(
			'icon' => 'delete',
		), array(
			'rowtype' => 'simple',
		)) . '
		</div>
	', array(
			'action' => $__templater->func('link', array('group/adminforum', $__vars['group'], ), false),
			'ajax' => 'true',
			'class' => 'block',
			'data-force-flash-message' => 'true',
		)) . '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['action'] == 'deletesubforum') {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Confirm action');
		$__finalCompiled .= '

	' . $__templater->form('
		<div class="block-container">
			<div class="block-body">
				' . $__templater->formInfoRow('
					' . 'Please confirm that you want to delete the following' . '
					' . 'sub-forum' . '<strong>' . $__templater->escape($__vars['forum']['title']) . '</strong>
					' . 'Note that deleting this sub-forum will delete all sub-forums, threads and posts in this sub-forum and it\'s sub-forums.' . '
				', array(
			'rowtype' => 'confirm',
		)) . '
			</div>
			' . $__templater->formSubmitRow(array(
			'icon' => 'delete',
		), array(
			'rowtype' => 'simple',
		)) . '
		</div>
	', array(
			'action' => $__templater->func('link', array('group/adminsubforum', $__vars['group'], array('id' => $__vars['forum']['node_id'], ), ), false),
			'ajax' => 'true',
			'class' => 'block',
			'data-force-flash-message' => 'true',
		)) . '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['action'] == 'admindeletediscussion') {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Confirm action');
		$__finalCompiled .= '

	';
		$__compilerTemp21 = '';
		if (!$__vars['group']['hasforum']) {
			$__compilerTemp21 .= '
						' . '<b>WARNING:</b> A group must have either a group forum or a group discussion area.<br />This group only has a discussion area. Deleting the discussion area will delete the entire group.' . '
					';
		} else {
			$__compilerTemp21 .= '
						' . 'This will delete all discussions from the group and remove the discussion area for the group' . '
					';
		}
		$__finalCompiled .= $__templater->form('
		<div class="block-container">
			<div class="block-body">
				' . $__templater->formInfoRow('
					' . 'Please confirm that you want to delete the following' . '
					<strong>' . $__templater->escape($__vars['group']['name']) . ' ' . 'Group discussions' . '</strong>
					' . $__compilerTemp21 . '
				', array(
			'rowtype' => 'confirm',
		)) . '
			</div>
			' . $__templater->formSubmitRow(array(
			'icon' => 'delete',
		), array(
			'rowtype' => 'simple',
		)) . '
		</div>
	', array(
			'action' => $__templater->func('link', array('group/admindiscussion', $__vars['group'], ), false),
			'ajax' => 'true',
			'class' => 'block',
			'data-force-flash-message' => 'true',
		)) . '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['action'] == 'deletegroup') {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Confirm action');
		$__finalCompiled .= '

	';
		$__compilerTemp22 = '';
		if ($__vars['group']['node_id']) {
			$__compilerTemp22 .= '
					' . 'Note that deleting this group will hide all forums associated with this group.<br />If you want to delete the forums for this group, delete them before deleting this group.' . '
					';
		}
		$__finalCompiled .= $__templater->form('
		<div class="block-container">
			<div class="block-body">
				' . $__templater->formInfoRow('
					' . 'Please confirm that you want to delete the following' . '
					' . 'Group' . '<strong>' . $__templater->escape($__vars['group']['name']) . '</strong>
					' . $__compilerTemp22 . '
				', array(
			'rowtype' => 'confirm',
		)) . '
			</div>
			' . $__templater->formSubmitRow(array(
			'icon' => 'delete',
		), array(
			'rowtype' => 'simple',
		)) . '
		</div>
	', array(
			'action' => $__templater->func('link', array('group/admingroup', $__vars['group'], ), false),
			'ajax' => 'true',
			'class' => 'block',
			'data-force-flash-message' => 'true',
		)) . '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['action'] == 'deletemedia') {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Confirm action');
		$__finalCompiled .= '

	' . $__templater->form('
		<div class="block-container">
			<div class="block-body">
				' . $__templater->formInfoRow('
					' . 'Please confirm that you want to delete the following' . '
					<strong>' . $__templater->escape($__vars['group']['name']) . ' ' . 'Media' . '</strong>
					' . 'This will delete all media from the group and remove the XenForo Media Gallery category for the group' . '
				', array(
			'rowtype' => 'confirm',
		)) . '
			</div>
			' . $__templater->formSubmitRow(array(
			'icon' => 'delete',
		), array(
			'rowtype' => 'simple',
		)) . '
		</div>
	', array(
			'action' => $__templater->func('link', array('group/adminmedia', $__vars['group'], ), false),
			'ajax' => 'true',
			'class' => 'block',
			'data-force-flash-message' => 'true',
		)) . '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['action'] == 'deletephoto') {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Confirm action');
		$__finalCompiled .= '

	' . $__templater->form('
		<div class="block-container">
			<div class="block-body">
				' . $__templater->formInfoRow('
					' . 'Please confirm that you want to delete the following' . '
					<strong>' . $__templater->escape($__vars['group']['name']) . ' ' . 'Group photos' . '</strong>
					' . 'This will delete all photos for the group and remove the photo area from the group ' . '
				', array(
			'rowtype' => 'confirm',
		)) . '
			</div>
			' . $__templater->formSubmitRow(array(
			'icon' => 'delete',
		), array(
			'rowtype' => 'simple',
		)) . '
		</div>
	', array(
			'action' => $__templater->func('link', array('group/adminphoto', $__vars['group'], ), false),
			'ajax' => 'true',
			'class' => 'block',
			'data-force-flash-message' => 'true',
		)) . '
';
	}
	return $__finalCompiled;
}
);