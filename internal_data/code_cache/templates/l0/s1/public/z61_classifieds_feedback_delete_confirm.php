<?php
// FROM HASH: 0240a666486536d75d52c98fa01d10ff
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Confirm action');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['editUrl']) {
		$__compilerTemp1 .= '
					<strong><a href="' . $__templater->escape($__vars['editUrl']) . '">' . $__templater->escape($__vars['contentTitle']) . '</a></strong>
				';
	} else {
		$__compilerTemp1 .= '
					<strong>' . $__templater->escape($__vars['contentTitle']) . '</strong>
				';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Please confirm that you want to delete the following feedback' . $__vars['xf']['language']['label_separator'] . '
				' . $__compilerTemp1 . '
			', array(
		'rowtype' => 'confirm',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'delete',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>
', array(
		'action' => $__vars['confirmUrl'],
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);