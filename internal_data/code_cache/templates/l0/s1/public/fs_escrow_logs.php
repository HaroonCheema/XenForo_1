<?php
// FROM HASH: 2bba51554d38dc192cb8565751a295db
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<div class="block-container">
  <div class="block-body">
	  
    ';
	$__compilerTemp1 = '';
	if ($__templater->func('count', array($__vars['logs'], ), false) > 0) {
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