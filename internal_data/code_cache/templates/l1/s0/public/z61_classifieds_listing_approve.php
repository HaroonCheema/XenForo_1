<?php
// FROM HASH: c70ab729aecc6f96b07a39f216eab858
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Approve listing');
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['listing'], 'getBreadcrumbs', array()));
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Please confirm that you want to approve the following' . $__vars['xf']['language']['label_separator'] . '
				<strong><a href="' . $__templater->func('link', array('classifieds', $__vars['listing'], ), true) . '">' . $__templater->escape($__vars['listing']['title']) . '</a></strong>
			', array(
		'rowtype' => 'confirm',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('classifieds/approve', $__vars['listing'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);