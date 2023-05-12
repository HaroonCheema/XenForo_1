<?php
// FROM HASH: 3babe2703dedd95d9fbb20bdce2b5d46
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Mark listing sold');
	$__finalCompiled .= '

' . $__templater->form('
    <div class="block-container">
        <div class="block-body">
            ' . $__templater->formInfoRow('Are you sure you want to mark <a href="' . $__templater->func('link', array('classifieds', $__vars['listing'], ), true) . '" target="_blank">' . $__templater->escape($__vars['listing']['title']) . '</a> as sold?', array(
		'rowtype' => 'confirm',
	)) . '
        ' . $__templater->formTextBoxRow(array(
		'name' => 'username',
		'ac' => 'single',
		'autocomplete' => 'off',
		'maxlength' => $__templater->func('max_length', array($__vars['xf']['visitor'], 'username', ), false),
		'value' => ($__vars['listing']['sold_username'] ?: ''),
		'placeholder' => 'Name' . $__vars['xf']['language']['ellipsis'],
	), array(
		'label' => 'Purchasing user',
	)) . '
        ' . $__templater->formSubmitRow(array(
		'submit' => 'Mark listing sold',
		'icon' => 'markRead',
	), array(
		'rowtype' => 'simple',
	)) . '
        </div>
    </div>
', array(
		'action' => $__templater->func('link', array('classifieds/mark-sold', $__vars['listing'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);