<?php
// FROM HASH: 6e863295c26450c62bb69ead9ee40248
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<div class="block-container">
  <div class="block-body">
    ';
	$__compilerTemp1 = '';
	if (true) {
		$__compilerTemp1 .= '
          <div class="block-body">
            ' . $__templater->dataList('
              ' . $__templater->callMacro('fs_escrow_list_macro', 'logs_table_list', array(
			'logs' => $__vars['logs'],
		), $__vars) . '
            ', array(
			'data-xf-init' => 'responsive-data-list',
		)) . '
          </div>

          ';
	} else {
		$__compilerTemp1 .= '
          <div class="block-body block-row">
            ' . 'No any transaction found' . '
          </div>
        ';
	}
	$__finalCompiled .= $__templater->form('
      <div class="block-container">
        ' . $__compilerTemp1 . '
      </div>
    ', array(
		'action' => $__templater->func('link', array($__vars['prefix'] . '/toggle', ), false),
		'class' => 'block',
		'ajax' => 'true',
	)) . '
  </div>';
	return $__finalCompiled;
}
);