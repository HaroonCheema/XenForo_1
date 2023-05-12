<?php
// FROM HASH: f4b3f897644078c905153b46dfc40e4f
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<hr class="formRowSep" />

' . $__templater->formNumberBoxRow(array(
		'name' => 'options[limit]',
		'value' => $__vars['options']['limit'],
		'min' => '1',
	), array(
		'label' => 'Maximum entries',
	)) . '

' . $__templater->formRadioRow(array(
		'name' => 'options[style]',
		'value' => ($__vars['options']['style'] ?: 'simple'),
	), array(array(
		'value' => 'simple',
		'label' => 'Simple',
		'hint' => 'A simple view, designed for narrow spaces such as sidebars.',
		'_type' => 'option',
	),
	array(
		'value' => 'full',
		'label' => 'Full',
		'hint' => 'A full size view, displaying as a standard classifieds list.',
		'_type' => 'option',
	)), array(
		'label' => 'Display style',
	)) . '

' . $__templater->formNumberBoxRow(array(
		'name' => 'options[distance]',
		'value' => $__vars['options']['distance'],
		'min' => '1',
	), array(
		'label' => 'Distance',
	)) . '
' . $__templater->formSelectRow(array(
		'name' => 'options[distance_unit]',
		'value' => $__vars['options']['distance_unit'],
	), array(array(
		'value' => 'km',
		'selected' => ($__vars['filters']['address']['distance_unit'] == 'km'),
		'label' => 'KM',
		'_type' => 'option',
	),
	array(
		'value' => 'mi',
		'selected' => ($__vars['filters']['address']['distance_unit'] == 'mi'),
		'label' => 'MI',
		'_type' => 'option',
	)), array(
		'label' => 'Distance unit',
	));
	return $__finalCompiled;
}
);