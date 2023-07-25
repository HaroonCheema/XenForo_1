<?php
// FROM HASH: da02272ea4df7201ad48d42b1e64bfd6
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<hr class="formRowSep" />

' . $__templater->formRadioRow(array(
		'name' => 'options[type]',
		'value' => ($__vars['options']['type'] ?: 'banner'),
	), array(array(
		'value' => 'banner',
		'label' => 'Group banner',
		'_type' => 'option',
	),
	array(
		'value' => 'stats',
		'label' => 'Group statistics',
		'_type' => 'option',
	),
	array(
		'value' => 'events',
		'label' => 'Coming events',
		'_type' => 'option',
	),
	array(
		'value' => 'posts',
		'label' => 'Latest posts',
		'_type' => 'option',
	),
	array(
		'value' => 'photos',
		'label' => 'Latest photos',
		'_type' => 'option',
	)), array(
		'label' => 'Widget type',
	)) . '

<input type="hidden" name="$options[style]" value="simple" />';
	return $__finalCompiled;
}
);