<?php
// FROM HASH: 5e4217c96facbdd84b6049912308981c
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Confirm action');
	$__finalCompiled .= '

';
	$__compilerTemp1 = array();
	if ($__templater->isTraversable($__vars['listingTypes'])) {
		foreach ($__vars['listingTypes'] AS $__vars['type']) {
			$__compilerTemp1[] = array(
				'value' => $__vars['type']['listing_type_id'],
				'label' => $__templater->escape($__vars['type']['title']),
				'_type' => 'option',
			);
		}
	}
	$__finalCompiled .= $__templater->form('

	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Please confirm that you want to remove this listing type' . $__vars['xf']['language']['label_separator'] . '
				<strong><a href="' . $__templater->func('link', array('classifieds/listing-types/edit', $__vars['listingType'], ), true) . '">' . $__templater->escape($__vars['listingType']['title']) . '</a></strong>
			', array(
		'rowtype' => 'confirm',
	)) . '
			' . $__templater->formSelectRow(array(
		'name' => 'new_listing_type_id',
	), $__compilerTemp1, array(
		'label' => 'Reassign classifieds listings',
		'explain' => 'Listings of \'' . $__templater->escape($__vars['listingType']['title']) . '\' type will be reassigned to the selected type.',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'delete',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('classifieds/listing-types/delete', $__vars['listingType'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);