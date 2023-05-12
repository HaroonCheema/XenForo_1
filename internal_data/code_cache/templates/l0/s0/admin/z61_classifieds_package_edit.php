<?php
// FROM HASH: 47f9b698e3f38307b685da265f472151
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['package'], 'isInsert', array())) {
		$__finalCompiled .= '
    ';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Add package');
		$__finalCompiled .= '
    ';
	} else {
		$__finalCompiled .= '
    ';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Edit package' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['package']['title']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	$__templater->breadcrumb($__templater->preEscaped('Packages'), $__templater->func('link', array('classifieds/packages', ), false), array(
	));
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['package'], 'isUpdate', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
    ' . $__templater->button('', array(
			'href' => $__templater->func('link', array('classifieds/packages/delete', $__vars['package'], ), false),
			'icon' => 'delete',
			'overlay' => 'true',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

';
	$__compilerTemp1 = array();
	if ($__templater->isTraversable($__vars['profiles'])) {
		foreach ($__vars['profiles'] AS $__vars['profileId'] => $__vars['profile']) {
			$__compilerTemp1[] = array(
				'value' => $__vars['profileId'],
				'label' => (($__vars['profile']['Provider']['title'] !== $__vars['profile']['title']) ? (($__templater->escape($__vars['profile']['Provider']['title']) . ' - ') . $__templater->escape($__vars['profile']['title'])) : $__templater->escape($__vars['profile']['Provider']['title'])),
				'_type' => 'option',
			);
		}
	}
	$__finalCompiled .= $__templater->form('
    <div class="block-container">
        <div class="block-body">
            ' . $__templater->formTextBoxRow(array(
		'name' => 'title',
		'value' => ($__templater->method($__vars['package'], 'isUpdate', array()) ? $__vars['package']['title'] : ''),
	), array(
		'label' => 'Title',
	)) . '

            ' . $__templater->callMacro('display_order_macros', 'row', array(
		'value' => $__vars['package']['display_order'],
	), $__vars) . '

            ' . $__templater->formRow('

                <div class="inputGroup">
                    ' . $__templater->formTextBox(array(
		'name' => 'cost_amount',
		'value' => ($__vars['package']['cost_amount'] ?: 10),
		'style' => 'width: 120px',
	)) . '
                    <span class="inputGroup-splitter"></span>
                    ' . $__templater->callMacro('public:currency_macros', 'currency_list', array(
		'value' => ($__vars['package']['cost_currency'] ?: 'USD'),
		'class' => 'input--autoSize',
	), $__vars) . '
                </div>

                <div class="formRow-explain">' . '<strong>Note:</strong> Ensure your merchant account with the selected payment profiles supports the above currencies. Currency support may vary by region.' . '</div>
            ', array(
		'rowtype' => 'input',
		'label' => 'Cost',
	)) . '

            ' . $__templater->formRadioRow(array(
		'name' => 'length_type',
	), array(array(
		'value' => 'permanent',
		'selected' => $__vars['package']['length_unit'] == '',
		'label' => 'Permanent',
		'_type' => 'option',
	),
	array(
		'value' => 'timed',
		'selected' => $__vars['package']['length_unit'] != '',
		'label' => 'For length' . $__vars['xf']['language']['label_separator'],
		'_dependent' => array('
                        <div class="inputGroup">
                            ' . $__templater->formNumberBox(array(
		'name' => 'length_amount',
		'value' => ($__vars['package']['length_amount'] ?: 1),
		'min' => '1',
		'max' => '255',
	)) . '
                            <span class="inputGroup-splitter"></span>
                            ' . $__templater->formSelect(array(
		'name' => 'length_unit',
		'value' => ((($__vars['package']['length_unit'] == 'permanent') OR (!$__vars['package']['length_amount'])) ? 'months' : $__vars['package']['length_unit']),
		'class' => 'input--inline',
	), array(array(
		'value' => 'day',
		'label' => 'Days',
		'_type' => 'option',
	),
	array(
		'value' => 'month',
		'label' => 'Months',
		'_type' => 'option',
	),
	array(
		'value' => 'year',
		'label' => 'Years',
		'_type' => 'option',
	))) . '
                        </div>
                    '),
		'_type' => 'option',
	)), array(
		'label' => 'Length',
	)) . '

            ' . $__templater->formCheckBoxRow(array(
		'name' => 'payment_profile_ids',
		'value' => $__vars['package']['payment_profile_ids'],
	), $__compilerTemp1, array(
		'label' => 'Payment profile',
	)) . '

            ' . $__templater->formCheckBoxRow(array(
	), array(array(
		'label' => 'Enabled',
		'selected' => $__vars['package']['active'],
		'name' => 'active',
		'_type' => 'option',
	)), array(
	)) . '

            ' . $__templater->formSubmitRow(array(
		'icon' => 'save',
		'sticky' => 'true',
	), array(
	)) . '
        </div>
    </div>
', array(
		'action' => $__templater->func('link', array('classifieds/packages/save', $__vars['package'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);