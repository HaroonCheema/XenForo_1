<?php
// FROM HASH: 7467b0111053c3350e50923e6db96767
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped($__templater->escape($__vars['fieldLabel']));
	$__finalCompiled .= '

';
	$__compilerTemp1 = $__vars;
	$__compilerTemp1['pageSelected'] = $__templater->preEscaped('about');
	$__templater->wrapTemplate('tlg_group_wrapper', $__compilerTemp1);
	$__finalCompiled .= '

';
	$__compilerTemp2 = '';
	if ($__vars['canDelete']) {
		$__compilerTemp2 .= '
                ' . $__templater->formCheckBoxRow(array(
		), array(array(
			'name' => 'delete',
			'label' => 'Delete existing image',
			'_type' => 'option',
		)), array(
		)) . '
            ';
	}
	$__finalCompiled .= $__templater->form('
    <div class="block-container">
        <div class="block-body">
            ' . $__templater->formUploadRow(array(
		'name' => 'file',
	), array(
		'label' => $__templater->escape($__vars['fieldLabel']),
		'explain' => 'It is recommended that you use an image that is at least ' . $__templater->escape($__vars['baseWidth']) . 'x' . $__templater->escape($__vars['baseHeight']) . ' pixels.',
	)) . '

            ' . $__compilerTemp2 . '
        </div>

        ' . $__templater->formSubmitRow(array(
		'submit' => 'Upload',
		'icon' => 'upload',
	), array(
		'rowtype' => 'simple',
	)) . '
    </div>
', array(
		'action' => $__vars['formAction'],
		'ajax' => 'true',
		'upload' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);