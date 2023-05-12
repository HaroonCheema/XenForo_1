<?php
// FROM HASH: 3c362ecdbb412f656e70a8ca3c3e0d11
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Packages');
	$__finalCompiled .= '

';
	$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('Add package', array(
		'href' => $__templater->func('link', array('classifieds/packages/add', ), false),
		'icon' => 'add',
	), '', array(
	)) . '
');
	$__finalCompiled .= '

';
	if (!$__templater->test($__vars['packages'], 'empty', array())) {
		$__finalCompiled .= '
	';
		$__compilerTemp1 = '';
		if ($__templater->isTraversable($__vars['packages'])) {
			foreach ($__vars['packages'] AS $__vars['package']) {
				$__compilerTemp1 .= '
						' . $__templater->dataRow(array(
					'label' => $__templater->escape($__vars['package']['title']),
					'hint' => $__templater->escape($__vars['package']['cost_phrase']),
					'href' => $__templater->func('link', array('classifieds/packages/edit', $__vars['package'], ), false),
					'delete' => $__templater->func('link', array('classifieds/packages/delete', $__vars['package'], ), false),
					'hash' => $__vars['package']['package_id'],
				), array(array(
					'class' => 'dataList-cell--min dataList-cell--hint',
					'_type' => 'cell',
					'html' => $__templater->escape($__vars['package']['display_order']),
				),
				array(
					'name' => 'active[' . $__vars['package']['package_id'] . ']',
					'selected' => $__vars['package']['active'],
					'class' => 'dataList-cell--separated',
					'submit' => 'true',
					'tooltip' => 'Enable / disable \'' . (('[' . $__vars['package']['title']) . ']') . '\'',
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
			'key' => 'packages',
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
				<span class="block-footer-counter">' . $__templater->func('display_totals', array($__vars['packages'], ), true) . '</span>
				' . $__compilerTemp2 . '
			</div>
		</div>
	', array(
			'action' => $__templater->func('link', array('classifieds/packages/toggle', ), false),
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