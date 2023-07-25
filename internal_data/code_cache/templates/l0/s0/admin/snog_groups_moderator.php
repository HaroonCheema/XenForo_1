<?php
// FROM HASH: f2aebc15c7cb069796ef7e501de7a62e
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Group moderator permissions');
	$__finalCompiled .= '

';
	$__templater->setPageParam('section', 'snogGroups_moderator');
	$__finalCompiled .= '

';
	$__templater->includeJs(array(
		'src' => 'xf/permission.js',
		'min' => '1',
	));
	$__templater->includeCss('permission.less');
	$__compilerTemp1 = '';
	if ($__templater->isTraversable($__vars['permissions'])) {
		foreach ($__vars['permissions'] AS $__vars['interfaceGroup']) {
			$__compilerTemp1 .= '
			';
			if ($__vars['interfaceGroup']['interface_group_id'] !== $__vars['displayedGroup']) {
				$__compilerTemp1 .= '
				';
				$__vars['displayedGroup'] = $__vars['interfaceGroup']['interface_group_id'];
				$__compilerTemp1 .= '
				<h3 class="block-formSectionHeader">
					';
				if ($__vars['displayedGroup'] == 'generalPermissions') {
					$__compilerTemp1 .= '
						<span class="block-formSectionHeader-aligner">' . 'Group forum general permissions' . '</span>
					';
				}
				$__compilerTemp1 .= '
					';
				if ($__vars['displayedGroup'] == 'forumPermissions') {
					$__compilerTemp1 .= '
						<span class="block-formSectionHeader-aligner">' . 'Group forum permissions' . '</span>
					';
				}
				$__compilerTemp1 .= '
					';
				if ($__vars['displayedGroup'] == 'forumModeratorPermissions') {
					$__compilerTemp1 .= '
						<span class="block-formSectionHeader-aligner">' . 'Group forum moderator permissions' . '</span>
					';
				}
				$__compilerTemp1 .= '
					';
				if ($__vars['displayedGroup'] == 'eventPermissions') {
					$__compilerTemp1 .= '
						<span class="block-formSectionHeader-aligner">' . 'Group event permissions' . '</span>
					';
				}
				$__compilerTemp1 .= '
					';
				if ($__vars['displayedGroup'] == 'aphotoPermissions') {
					$__compilerTemp1 .= '
						<span class="block-formSectionHeader-aligner">' . 'Group photo permissions' . '</span>
					';
				}
				$__compilerTemp1 .= '
					';
				if ($__vars['displayedGroup'] == 'amediaPermissions') {
					$__compilerTemp1 .= '
						<span class="block-formSectionHeader-aligner">' . 'Group media permissions' . '</span>
					';
				}
				$__compilerTemp1 .= '
					';
				if ($__vars['displayedGroup'] == 'amediaModeratorPermissions') {
					$__compilerTemp1 .= '
						<span class="block-formSectionHeader-aligner">' . 'Group media moderator permissions' . '</span>
					';
				}
				$__compilerTemp1 .= '
				</h3>
				<div class="block-body"
					id="permGroup-' . $__templater->escape($__vars['displayedGroup']) . '"
				>
					';
				if ($__vars['displayedGroup'] !== 'generalPermissions') {
					$__compilerTemp1 .= '
						' . $__templater->formRow('
							' . $__templater->button('Quick set', array(
						'class' => 'button--link menuTrigger',
						'data-xf-click' => 'menu',
						'aria-expanded' => 'false',
						'aria-haspopup' => 'true',
					), '', array(
					)) . '
							<div class="menu" data-menu="menu" aria-hidden="true">
								<div class="menu-content">
									<h3 class="menu-header">' . 'Quick set' . '</h3>
									<a class="blockLink js-permissionQuickSet" data-target="#permGroup-' . $__templater->escape($__vars['displayedGroup']) . '" data-value="content_allow" tabindex="0">
										' . 'Set all to: ' . 'Yes' . '' . '
									</a>
									<a class="blockLink js-permissionQuickSet" data-target="#permGroup-' . $__templater->escape($__vars['displayedGroup']) . '" data-value="reset" tabindex="0">
										' . 'Set all to: ' . 'No' . '' . '
									</a>
									<a class="blockLink js-permissionQuickSet" data-target="#permGroup-' . $__templater->escape($__vars['displayedGroup']) . '" data-value="deny" tabindex="0">
										' . 'Set all to: ' . 'Never' . '' . '
									</a>
								</div>
							</div>
						', array(
						'rowclass' => 'formRow--permissionQuickSet',
					)) . '
					';
				}
				$__compilerTemp1 .= '
					';
				if ($__templater->isTraversable($__vars['permissions'])) {
					foreach ($__vars['permissions'] AS $__vars['permission']) {
						$__compilerTemp1 .= '
						';
						if ($__vars['permission']['interface_group_id'] == $__vars['displayedGroup']) {
							$__compilerTemp1 .= '
							';
							$__vars['inputName'] = 'permission[' . $__vars['permission']['permission_group_id'] . '][' . $__vars['permission']['permission_id'] . ']';
							$__compilerTemp1 .= '

							';
							$__compilerTemp2 = '';
							if ($__vars['permission']['permission_type'] == 'flag') {
								$__compilerTemp2 .= '
									';
								$__vars['value'] = $__vars['permission']['moderator_value'];
								$__compilerTemp2 .= '
									<ul class="permissionChoices permissionChoices--flag">
										<li class="permissionChoices-choice permissionChoices-choice--yes">
											' . $__templater->formRadio(array(
									'name' => $__vars['inputName'],
									'value' => $__vars['value'],
									'standalone' => 'true',
								), array(array(
									'value' => 'content_allow',
									'label' => 'Yes',
									'_type' => 'option',
								))) . '
										</li>
										<li class="permissionChoices-choice permissionChoices-choice--no">
											' . $__templater->formRadio(array(
									'name' => $__vars['inputName'],
									'value' => ((($__vars['value'] == 'reset') OR (!$__vars['value'])) ? 'reset' : ''),
									'standalone' => 'true',
								), array(array(
									'value' => 'reset',
									'label' => 'No',
									'_type' => 'option',
								))) . '
										</li>
										<li class="permissionChoices-choice permissionChoices-choice--never">
											' . $__templater->formRadio(array(
									'name' => $__vars['inputName'],
									'value' => $__vars['value'],
									'standalone' => 'true',
								), array(array(
									'value' => 'deny',
									'label' => 'Never',
									'_type' => 'option',
								))) . '
										</li>
									</ul>
								';
							} else {
								$__compilerTemp2 .= '
									';
								$__vars['value'] = $__vars['permission']['moderator_int'];
								$__compilerTemp2 .= '
									<ul class="permissionChoices permissionChoices--int">
										<li class="permissionChoices-choice permissionChoices-choice--yes">
											<label>
												<input type="radio" name="' . $__templater->escape($__vars['inputName']) . '" value="-1" ' . (($__vars['value'] == -1) ? 'checked="checked"' : '') . ' />
												' . 'Unlimited' . '
											</label>
										</li>
										<li class="permissionChoices-choice permissionChoices-choice--int">
											<div class="inputGroup inputGroup--inline inputGroup--joined inputNumber" data-xf-init="number-box">
												<label class="inputGroup-text">
													<input type="radio" name="' . $__templater->escape($__vars['inputName']) . '" value="0"
														data-xf-init="disabler"
														data-container="< li"
														' . (($__vars['value'] >= 0) ? 'checked="checked"' : '') . '
													/>
													<span class="u-srOnly">' . 'As follows' . $__vars['xf']['language']['label_separator'] . '</span>
												</label>
												' . $__templater->formTextBox(array(
									'name' => $__vars['inputName'],
									'value' => (($__vars['value'] >= 0) ? $__templater->filter($__vars['value'], array(array('default', array(0, )),), false) : 0),
									'type' => 'number',
									'min' => '0',
									'class' => 'input--number js-numberBoxTextInput js-permissionIntInput',
								)) . '
											</div>
										</li>
									</ul>
								';
							}
							$__compilerTemp1 .= $__templater->formRow('

								' . $__compilerTemp2 . '
							', array(
								'label' => (($__vars['permission']['permission_id'] == 'like') ? 'Like/React to posts' : $__templater->escape($__vars['permission']['MasterTitle']['phrase_text'])),
								'rowclass' => 'js-permission formRow--noColon',
								'data-xf-init' => 'permission-choice',
								'data-permission-type' => $__vars['permission']['permission_type'],
							)) . '
						';
						}
						$__compilerTemp1 .= '
					';
					}
				}
				$__compilerTemp1 .= '
				</div>
			';
			}
			$__compilerTemp1 .= '
		';
		}
	}
	$__finalCompiled .= $__templater->form('
	' . '' . '
	' . '' . '

	<div class="block-outer"
		data-xf-init="permission-form"
		data-form="< form"
		data-permission-type="global"
	>
		<div class="block-outer-main js-globalPermissionQuickSet">
			' . $__templater->button('Quick set', array(
		'class' => 'button--link menuTrigger',
		'data-xf-click' => 'menu',
		'aria-expanded' => 'false',
		'aria-haspopup' => 'true',
	), '', array(
	)) . '
			<div class="menu" data-menu="menu" aria-hidden="true">
				<div class="menu-content">
					<h3 class="menu-header">' . 'Quick set' . '</h3>
					<a class="blockLink js-permissionQuickSet" data-target="' . $__templater->escape($__vars['target']) . '" data-value="content_allow" tabindex="0">
						' . 'Set all to: ' . 'Yes' . '' . '
					</a>
					<a class="blockLink js-permissionQuickSet" data-target="' . $__templater->escape($__vars['target']) . '" data-value="reset" tabindex="0">
						' . 'Set all to: ' . 'No' . '' . '
					</a>
					<a class="blockLink js-permissionQuickSet" data-target="' . $__templater->escape($__vars['target']) . '" data-value="deny" tabindex="0">
						' . 'Set all to: ' . 'Never' . '' . '
					</a>
				</div>
			</div>
		</div>
		<div class="block-outer-opposite quickFilter">
			<input type="text" class="input js-permissionFilterInput" placeholder="' . 'Filter' . $__vars['xf']['language']['ellipsis'] . '" />
		</div>
	</div>

	<div class="block-container">

		' . $__compilerTemp1 . '
		<input type="hidden" name="type" value="moderator" />
		' . $__templater->formSubmitRow(array(
		'sticky' => 'true',
		'icon' => 'save',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('group/savepermissions', $__vars['userGroup'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);