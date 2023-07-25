<?php
// FROM HASH: 7bbbbac3126584aa0489bc5ad95629fb
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<div class="mainframe">
';
	if ($__vars['permissions']['inlineMod']) {
		$__finalCompiled .= '
	';
		$__templater->includeJs(array(
			'src' => 'xf/inline_mod.js',
			'min' => '1',
		));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

<div class="block" data-xf-init="' . ($__vars['permissions']['inlineMod'] ? 'inline-mod' : '') . '" data-type="group_discussion" data-href="' . $__templater->func('link', array('inline-mod', ), true) . '">
	<div class="block-outer" style="margin-top:10px;">
		' . $__templater->func('page_nav', array(array(
		'page' => $__vars['page'],
		'total' => $__vars['total'],
		'link' => 'group_discussions',
		'data' => $__vars['group'],
		'params' => $__vars['filters'],
		'wrapperclass' => 'block-outer-main',
		'perPage' => $__vars['perPage'],
	))) . '

		';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
					';
	if ($__vars['permissions']['inlineMod']) {
		$__compilerTemp1 .= '
						' . $__templater->button('
							' . 'Selected' . $__vars['xf']['language']['label_separator'] . ' <span class="js-inlineModCounter">0</span>
						', array(
			'class' => 'button--link js-inlineModTrigger',
		), '', array(
		)) . '
					';
	}
	$__compilerTemp1 .= '
				';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
			<div class="block-outer-opposite">
				<div class="buttonGroup">
				' . $__compilerTemp1 . '
				</div>
			</div>
			';
	}
	$__finalCompiled .= '
	</div>
	
	<div class="block-container">
		<div class="block-body">
			<div class="block-filterBar">
				<div class="filterBar">
					' . $__templater->button('Filters', array(
		'class' => 'filterBar-menuTrigger button--link',
		'data-xf-click' => 'menu',
		'aria-expanded' => 'false',
		'aria-haspopup' => 'true',
	), '', array(
	)) . '
					<div class="menu" data-menu="menu" aria-hidden="true">
						<div class="menu-content">
							<h4 class="menu-header">' . 'Filters' . '</h4>
							' . $__templater->form('		
								<div class="menu-row menu-row--separated">
									' . $__templater->formRadio(array(
		'name' => 'filter_type',
	), array(array(
		'value' => 'all',
		'selected' => (($__vars['filters']['filter_type'] == 'all') OR (!$__vars['filters']['filter_type'])),
		'label' => 'Show all discussions',
		'_type' => 'option',
	),
	array(
		'value' => 'started',
		'selected' => (($__vars['filters']['filter_type'] == 'starter') ? true : false),
		'data-hide' => 'true',
		'label' => 'Started by' . $__vars['xf']['language']['ellipsis'],
		'_dependent' => array($__templater->formTextBox(array(
		'name' => 'starter',
		'value' => ($__vars['filters']['starter'] ? $__vars['filters']['starter'] : ''),
		'ac' => 'single',
		'maxlength' => $__templater->func('max_length', array($__vars['xf']['visitor'], 'username', ), false),
	))),
		'_type' => 'option',
	))) . '
								</div>

								<div class="menu-footer">
									<span class="menu-footer-controls">
										' . $__templater->button('Filter', array(
		'type' => 'submit',
		'class' => 'button--primary',
		'accesskey' => 's',
	), '', array(
	)) . '
									</span>
								</div>

								' . $__templater->formHiddenVal('apply', '1', array(
	)) . '
							', array(
		'action' => $__templater->func('link', array('group_discussions', $__vars['group'], ), false),
	)) . '
						</div>
					</div>
				</div>
			</div>

			<div class="structItemContainer">
				';
	if (!$__templater->test($__vars['stickyDiscussions'], 'empty', array())) {
		$__finalCompiled .= '
					<div class="structItemContainer-group structItemContainer-group--sticky">
						';
		if ($__templater->isTraversable($__vars['stickyDiscussions'])) {
			foreach ($__vars['stickyDiscussions'] AS $__vars['discussion']) {
				$__finalCompiled .= '
							' . $__templater->callMacro('snog_groups_discussion_list_macros', 'item', array(
					'discussion' => $__vars['stickyDiscussions'],
					'group' => $__vars['group'],
					'permissions' => $__vars['permissions'],
				), $__vars) . '
						';
			}
		}
		$__finalCompiled .= '
					</div>
				';
	}
	$__finalCompiled .= '

				';
	if (!$__templater->test($__vars['discussions'], 'empty', array())) {
		$__finalCompiled .= '
					<div class="structItemContainer-group">
						';
		if ($__templater->isTraversable($__vars['discussions'])) {
			foreach ($__vars['discussions'] AS $__vars['discussion']) {
				$__finalCompiled .= '
								' . $__templater->callMacro('snog_groups_discussion_list_macros', 'item', array(
					'discussion' => $__vars['discussion'],
					'group' => $__vars['group'],
					'permissions' => $__vars['permissions'],
				), $__vars) . '
						';
			}
		}
		$__finalCompiled .= '
					</div>
				';
	} else {
		$__finalCompiled .= '
					' . 'There are no discussions in this group' . '
				';
	}
	$__finalCompiled .= '
			</div>
		</div>
	</div>
</div>

' . $__templater->func('page_nav', array(array(
		'page' => $__vars['page'],
		'total' => $__vars['total'],
		'link' => 'group_discussions',
		'data' => $__vars['group'],
		'params' => $__vars['filters'],
		'wrapperclass' => 'js-filterHide block-outer block-outer--after',
		'perPage' => $__vars['perPage'],
	))) . '
</div>';
	return $__finalCompiled;
}
);