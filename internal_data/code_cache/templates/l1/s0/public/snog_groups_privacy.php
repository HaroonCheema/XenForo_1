<?php
// FROM HASH: 51a58276c9f4c948908571a62d3e0ef6
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<dl class="inputLabelPair">
	<dt>' . 'View groups you belong to' . $__vars['xf']['language']['label_separator'] . '</dt>
	<dd>
		' . $__templater->formSelect(array(
		'name' => 'privacy[snog_groups_view]',
		'value' => $__vars['xf']['visitor']['Privacy']['snog_groups_view'],
	), array(array(
		'value' => 'everyone',
		'label' => 'All visitors',
		'_type' => 'option',
	),
	array(
		'value' => 'members',
		'label' => 'Members only',
		'_type' => 'option',
	),
	array(
		'value' => 'none',
		'label' => 'Nobody',
		'_type' => 'option',
	))) . '
	</dd>
</dl>';
	return $__finalCompiled;
}
);