<?php
// FROM HASH: 3c53902aa3f012ffefae112c51405875
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Listing conditions');
	$__finalCompiled .= '

';
	$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('Add listing condition', array(
		'href' => $__templater->func('link', array('classifieds/conditions/add', ), false),
		'icon' => 'add',
	), '', array(
	)) . '
');
	$__finalCompiled .= '

';
	if (!$__templater->test($__vars['conditions'], 'empty', array())) {
		$__finalCompiled .= '
	';
		$__compilerTemp1 = '';
		if ($__templater->isTraversable($__vars['conditions'])) {
			foreach ($__vars['conditions'] AS $__vars['condition']) {
				$__compilerTemp1 .= '
						' . $__templater->dataRow(array(
					'label' => $__templater->escape($__vars['condition']['title']),
					'href' => $__templater->func('link', array('classifieds/conditions/edit', $__vars['condition'], ), false),
					'delete' => $__templater->func('link', array('classifieds/conditions/delete', $__vars['condition'], ), false),
					'hash' => $__vars['condition']['condition_id'],
				), array(array(
					'class' => 'dataList-cell--min dataList-cell--hint',
					'_type' => 'cell',
					'html' => $__templater->escape($__vars['condition']['display_order']),
				),
				array(
					'name' => 'active[' . $__vars['condition']['condition_id'] . ']',
					'selected' => $__vars['condition']['active'],
					'class' => 'dataList-cell--separated',
					'submit' => 'true',
					'tooltip' => 'Enable / disable \'' . (('[' . $__vars['condition']['title']) . ']') . '\'',
					'_type' => 'toggle',
					'html' => '',
				))) . '

					';
			}
		}
		$__compilerTemp2 = '';
		if ($__vars['exportView']) {
			$__compilerTemp2 .= '
					<span class="block-footer-select">' . $__templater->formCheckBox(array(
				'standalone' => 'true',
			), array(array(
				'check-all' => '< .block-container',
				'label' => 'Select all',
				'_type' => 'option',
			))) . '</span>
					<span class="block-footer-controls">' . $__templater->button('', array(
				'type' => 'submit',
				'icon' => 'export',
			), '', array(
			)) . '</span>
				';
		}
		$__finalCompiled .= $__templater->form('

		<div class="block-outer">
			' . $__templater->callMacro('filter_macros', 'quick_filter', array(
			'key' => 'conditions',
			'class' => 'block-outer-opposite',
		), $__vars) . '
		</div>
		<div class="block-container">
			<div class="block-body">
				' . $__templater->dataList('
					' . $__compilerTemp1 . '
				', array(
		)) . '
			</div>
			<div class="block-footer block-footer--split">
				<span class="block-footer-counter">' . $__templater->func('display_totals', array($__vars['conditions'], ), true) . '</span>
				' . $__compilerTemp2 . '
			</div>
		</div>
	', array(
			'action' => $__templater->func('link', array('classifieds/conditions/toggle', ), false),
			'ajax' => 'true',
			'class' => 'block',
		)) . '
';
	} else {
		$__finalCompiled .= '
	<div class="blockMessage">' . 'No items have been created yet.' . '</div>
';
	}
	return $__finalCompiled;
}
);