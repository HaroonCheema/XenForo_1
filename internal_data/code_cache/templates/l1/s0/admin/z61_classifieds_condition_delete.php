<?php
// FROM HASH: 381ac908eeb9f996a27770be4dbd799d
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Confirm action');
	$__finalCompiled .= '

' . $__templater->form('

	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Please confirm that you want to remove this listing condition' . $__vars['xf']['language']['label_separator'] . '
				<strong><a href="' . $__templater->func('link', array('classifieds/conditions/edit', $__vars['condition'], ), true) . '">' . $__templater->escape($__vars['condition']['title']) . '</a></strong>
			', array(
		'rowtype' => 'confirm',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'delete',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('classifieds/conditions/delete', $__vars['condition'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);