<?php
// FROM HASH: 4a4398267124451f49484707a5892e06
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Edit thread');
	$__finalCompiled .= '

';
	$__templater->includeJs(array(
		'src' => 'xf/thread.js',
		'min' => '1',
	));
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['thread'], 'getBreadcrumbs', array()));
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__templater->method($__vars['xf']['visitor'], 'hasPermission', array('bh_brand_hub', 'bh_can_assignThreadsToHub', ))) {
		$__compilerTemp1 .= '
';
		$__compilerTemp2 = array(array(
			'value' => '0',
			'selected' => !$__vars['thread']['item_id'],
			'label' => $__vars['xf']['language']['parenthesis_open'] . 'None' . $__vars['xf']['language']['parenthesis_close'],
			'_type' => 'option',
		));
		if ($__templater->isTraversable($__vars['items'])) {
			foreach ($__vars['items'] AS $__vars['item']) {
				$__compilerTemp2[] = array(
					'value' => $__vars['item']['item_id'],
					'label' => $__templater->escape($__vars['item']['item_title']),
					'_type' => 'option',
				);
			}
		}
		$__compilerTemp1 .= $__templater->formSelectRow(array(
			'name' => 'item_id',
			'value' => $__vars['thread']['item_id'],
		), $__compilerTemp2, array(
			'label' => 'Item',
		)) . '
';
	}
	$__compilerTemp3 = '';
	$__compilerTemp4 = '';
	$__compilerTemp4 .= '
					' . $__templater->filter($__templater->method($__vars['thread']['TypeHandler'], 'renderExtraDataEdit', array($__vars['thread'], 'edit', 'thread', )), array(array('raw', array()),), true) . '
				';
	if (strlen(trim($__compilerTemp4)) > 0) {
		$__compilerTemp3 .= '
				<hr class="formRowSep" />
				' . $__compilerTemp4 . '
			';
	}
	$__compilerTemp5 = '';
	$__compilerTemp6 = '';
	$__compilerTemp6 .= '
					';
	if ($__templater->method($__vars['thread'], 'canEditSchedule', array())) {
		$__compilerTemp6 .= '
	' . $__templater->formRow('
		' . $__templater->callMacro('bssp_macros', 'scheduled_input', array(
			'value' => $__vars['thread']['Schedule']['posting_date'],
		), $__vars) . '
	', array(
			'label' => 'Post date',
		)) . '
';
	}
	$__compilerTemp6 .= '
' . $__templater->callMacro('custom_fields_macros', 'custom_fields_edit', array(
		'type' => 'threads',
		'set' => $__vars['thread']['custom_fields'],
		'editMode' => $__templater->method($__vars['thread'], 'getFieldEditMode', array()),
		'onlyInclude' => $__vars['forum']['field_cache'],
	), $__vars) . '
				';
	if (strlen(trim($__compilerTemp6)) > 0) {
		$__compilerTemp5 .= '
				<hr class="formRowSep" />
				' . $__compilerTemp6 . '
				<hr class="formRowSep" />
			';
	}
	$__compilerTemp7 = '';
	if ($__templater->method($__vars['thread'], 'canDelete', array())) {
		$__compilerTemp7 .= '
					' . $__templater->button('Delete' . $__vars['xf']['language']['ellipsis'], array(
			'href' => $__templater->func('link', array('threads/delete', $__vars['thread'], ), false),
			'icon' => 'delete',
			'overlay' => 'true',
		), '', array(
		)) . '
				';
	}
	$__compilerTemp8 = '';
	if ($__vars['noInlineMod']) {
		$__compilerTemp8 .= '
		' . $__templater->formHiddenVal('_xfNoInlineMod', '1', array(
		)) . '
	';
	}
	$__compilerTemp9 = '';
	if ($__vars['forumName']) {
		$__compilerTemp9 .= '
		' . $__templater->formHiddenVal('_xfForumName', '1', array(
		)) . '
	';
	}
	$__finalCompiled .= $__templater->form('

	<div class="block-container">
		<div class="block-body">
			' . $__templater->formPrefixInputRow(($__templater->method($__vars['thread'], 'isPrefixEditable', array()) ? $__vars['prefixes'] : array()), array(
		'type' => 'thread',
		'prefix-value' => $__vars['thread']['prefix_id'],
		'textbox-value' => $__vars['thread']['title'],
		'placeholder' => 'Title' . $__vars['xf']['language']['ellipsis'],
		'autofocus' => 'autofocus',
		'maxlength' => $__templater->func('max_length', array($__vars['thread'], 'title', ), false),
		'help-href' => $__templater->func('link', array('forums/prefix-help', $__vars['forum'], ), false),
	), array(
		'label' => 'Title',
	)) . '
' . $__compilerTemp1 . '


			' . $__compilerTemp3 . '

			' . $__compilerTemp5 . '

			' . $__templater->callMacro('helper_thread_options', 'thread_status', array(
		'thread' => $__vars['thread'],
	), $__vars) . '
		</div>

		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
		'sticky' => 'true',
	), array(
		'html' => '
				' . $__compilerTemp7 . '
			',
	)) . '
	</div>

	' . $__compilerTemp8 . '
	' . $__compilerTemp9 . '
', array(
		'action' => $__templater->func('link', array('threads/edit', $__vars['thread'], ), false),
		'class' => 'block',
		'ajax' => 'true',
		'data-xf-init' => 'thread-edit-form',
		'data-item-selector' => '.js-threadListItem-' . $__vars['thread']['thread_id'],
	));
	return $__finalCompiled;
}
);