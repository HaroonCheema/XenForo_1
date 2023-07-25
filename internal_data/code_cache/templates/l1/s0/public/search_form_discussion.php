<?php
// FROM HASH: 4579dc3b6beabe84ab44c966dca0faf5
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Search group discussions');
	$__finalCompiled .= '

' . $__templater->callMacro('search_form_macros', 'keywords', array(
		'input' => $__vars['input'],
	), $__vars) . '
' . $__templater->callMacro('search_form_macros', 'user', array(
		'input' => $__vars['input'],
	), $__vars) . '
' . $__templater->callMacro('search_form_macros', 'date', array(
		'input' => $__vars['input'],
	), $__vars) . '

' . $__templater->formNumberBoxRow(array(
		'name' => 'c[min_reply_count]',
		'value' => $__templater->filter($__vars['input']['c']['min_reply_count'], array(array('default', array(0, )),), false),
		'min' => '0',
	), array(
		'label' => 'Minimum number of replies',
	)) . '

';
	$__compilerTemp1 = array(array(
		'value' => '',
		'label' => 'All groups',
		'_type' => 'option',
	));
	if ($__templater->isTraversable($__vars['groups'])) {
		foreach ($__vars['groups'] AS $__vars['group']) {
			$__compilerTemp1[] = array(
				'value' => $__vars['group']['groupid'],
				'label' => $__templater->escape($__vars['group']['name']),
				'_type' => 'option',
			);
		}
	}
	$__finalCompiled .= $__templater->formRow('

	<ul class="inputList">
		<li>' . $__templater->formSelect(array(
		'name' => 'c[groups][]',
		'size' => '7',
		'multiple' => 'multiple',
		'value' => $__templater->filter($__vars['input']['c']['groups'], array(array('default', array(array(0, ), )),), false),
	), $__compilerTemp1) . '</li>
	</ul>
', array(
		'rowtype' => 'input',
		'label' => 'Search in group',
	)) . '

' . $__templater->callMacro('search_form_macros', 'order', array(
		'isRelevanceSupported' => $__vars['isRelevanceSupported'],
		'options' => array('replies' => 'Most replies', ),
		'input' => $__vars['input'],
	), $__vars);
	return $__finalCompiled;
}
);