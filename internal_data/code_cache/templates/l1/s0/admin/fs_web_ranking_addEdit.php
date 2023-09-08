<?php
// FROM HASH: 77cd6380d44d6c99af1eb6305b0ca716
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['node']['node_id']) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('fs_web_ranking_create');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('fs_web_ranking_edit:' . ' ' . $__templater->escape($__vars['node']['title']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['node']['node_id']) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('', array(
			'href' => $__templater->func('link', array('web-ranking/delete', $__vars['node'], ), false),
			'icon' => 'delete',
			'data-xf-click' => 'overlay',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formTextBoxRow(array(
		'name' => 'title',
		'value' => $__vars['node']['title'],
		'required' => 'required',
	), array(
		'label' => 'Title',
		'hint' => 'Required',
	)) . '

			' . $__templater->formTextAreaRow(array(
		'name' => 'description',
		'value' => $__vars['node']['description'],
		'rows' => '2',
		'autosize' => 'true',
	), array(
		'label' => 'Description',
		'hint' => 'You may use HTML',
	)) . '
			
			' . $__templater->formSubmitRow(array(
		'sticky' => 'true',
		'icon' => 'save',
	), array(
	)) . '
		</div>
	</div>
', array(
		'action' => $__templater->func('link', array('web-ranking/save', $__vars['node'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);