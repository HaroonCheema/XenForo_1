<?php
// FROM HASH: 260ec2169e567ba90b68b346655f72a0
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Confirm action');
	$__finalCompiled .= '

';
	$__templater->breadcrumb($__templater->preEscaped('Packages'), $__templater->func('link', array('classifieds/packages', ), false), array(
	));
	$__finalCompiled .= '
';
	$__templater->breadcrumb($__templater->preEscaped($__templater->escape($__vars['package']['title'])), $__templater->func('link', array('classifieds/packages', $__vars['package'], ), false), array(
	));
	$__finalCompiled .= '

' . $__templater->form('

    <div class="block-container">
        <div class="block-body">
            ' . $__templater->formInfoRow('
                ' . 'Please confirm that you want to remove this package' . $__vars['xf']['language']['label_separator'] . '
                <strong><a href="' . $__templater->func('link', array('classifieds/packages/edit', $__vars['package'], ), true) . '">' . $__templater->escape($__vars['package']['title']) . '</a></strong>
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
		'action' => $__templater->func('link', array('classifieds/packages/delete', $__vars['package'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);