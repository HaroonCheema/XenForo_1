<?php
// FROM HASH: fcbaf653dc1213de293b453924fb6e74
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Clear sold status');
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['listing'], 'getBreadcrumbs', array()));
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				<div class="blockMessage blockMessage--important"><strong>' . 'Note' . $__vars['xf']['language']['label_separator'] . '</strong> ' . 'This will fully wipe sold status from listing including whoever is marked as sold.' . '</div>
			', array(
	)) . '
		</div>
	</div>
	' . $__templater->formSubmitRow(array(
		'icon' => 'empty',
		'sticky' => 'true',
		'submit' => 'Clear sold status',
	), array(
	)) . '
', array(
		'action' => $__templater->func('link', array('classifieds/clear-sold', $__vars['listing'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);