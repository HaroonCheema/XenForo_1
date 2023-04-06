<?php
// FROM HASH: 39381539b3e8daf41dd1bf71d94468af
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formRow('

	<ul class="listPlain inputGroup-container">
		
			<li class="inputGroup">
				' . $__templater->formTextBox(array(
		'name' => $__vars['inputName'] . '[title]',
		'style' => 'width: 50%;',
		'value' => $__vars['choice']['title'],
		'placeholder' => 'Title',
	)) . '
				<span class="inputGroup-splitter"></span>
				' . $__templater->formDateInput(array(
		'name' => $__vars['inputName'] . '[from]',
		'value' => $__vars['choice']['from'],
		'placeholder' => 'from',
	)) . '
			    <span class="inputGroup-splitter"></span>
				' . $__templater->formDateInput(array(
		'name' => $__vars['inputName'] . '[to]',
		'value' => $__vars['choice']['to'],
		'placeholder' => 'to',
	)) . '
			</li>
	

	</ul>
', array(
		'rowtype' => 'input',
		'label' => $__templater->escape($__vars['option']['title']),
		'hint' => $__templater->escape($__vars['hintHtml']),
		'explain' => $__templater->escape($__vars['explainHtml']),
		'html' => $__templater->escape($__vars['listedHtml']),
	));
	return $__finalCompiled;
}
);