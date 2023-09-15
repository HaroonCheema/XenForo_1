<?php
// FROM HASH: 8f3e21cce014c1993d62829fdc939a8f
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->form('

	<div class="menu-row menu-row--separated">
		' . 'Complaints' . $__vars['xf']['language']['label_separator'] . '
		<div class="u-inputSpacer">
			' . $__templater->formSelect(array(
		'name' => 'fs_web_ranking_complains',
		'value' => $__vars['conditions']['fs_web_ranking_complains'],
	), array(array(
		'value' => 'high',
		'label' => 'Highest Resolution',
		'_type' => 'option',
	),
	array(
		'value' => 'lowest',
		'label' => 'Lowest Resolution',
		'_type' => 'option',
	))) . '
		</div>
	</div>	

	<div class="menu-footer">
		<span class="menu-footer-controls">
			' . $__templater->button('Filter', array(
		'type' => 'submit',
		'class' => 'button--primary',
	), '', array(
	)) . '
		</span>
	</div>

	' . $__templater->formHiddenVal('search', '1', array(
	)) . '
', array(
		'action' => $__templater->func('link', array('web-ranking', ), false),
	));
	return $__finalCompiled;
}
);