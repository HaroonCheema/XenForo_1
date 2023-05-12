<?php
// FROM HASH: 2a1e8342d6ec18ee3f333cd7c20395be
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Classifieds listing types');
	$__finalCompiled .= '

';
	$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('Add listing type', array(
		'href' => $__templater->func('link', array('classifieds/listing-types/add', ), false),
		'icon' => 'add',
	), '', array(
	)) . '
');
	$__finalCompiled .= '

<div class="block">
	<div class="block-outer">
		' . $__templater->callMacro('filter_macros', 'quick_filter', array(
		'key' => 'connected-accounts',
		'class' => 'block-outer-opposite',
	), $__vars) . '
	</div>
	<div class="block-container">
		<div class="block-body">
			';
	if (!$__templater->test($__vars['listingTypes'], 'empty', array())) {
		$__finalCompiled .= '
				<div class="block-body">
					';
		$__compilerTemp1 = '';
		if ($__templater->isTraversable($__vars['listingTypes'])) {
			foreach ($__vars['listingTypes'] AS $__vars['listingType']) {
				$__compilerTemp1 .= '
							' . $__templater->dataRow(array(
					'label' => $__templater->escape($__vars['listingType']['title']),
					'href' => $__templater->func('link', array('classifieds/listing-types/edit', $__vars['listingType'], ), false),
					'delete' => $__templater->func('link', array('classifieds/listing-types/delete', $__vars['listingType'], ), false),
					'hash' => $__vars['listingType']['listing_type_id'],
				), array(array(
					'class' => 'dataList-cell--min dataList-cell--hint',
					'_type' => 'cell',
					'html' => $__templater->escape($__vars['listingType']['display_order']),
				))) . '
						';
			}
		}
		$__finalCompiled .= $__templater->dataList('
						' . $__compilerTemp1 . '
					', array(
		)) . '
				</div>
			';
	} else {
		$__finalCompiled .= '
				<div class="blockMessage">' . 'No items have been created yet.' . '</div>
			';
	}
	$__finalCompiled .= '
		</div>
	</div>
</div>';
	return $__finalCompiled;
}
);