<?php
// FROM HASH: ea42b682aeae822016456790551a54ec
return array(
'macros' => array('escrow' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'escrow' => '!',
		'type' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	
	';
	if ($__vars['escrow'] AND ($__vars['escrow']['Thread']['escrow_id'] != 0)) {
		$__finalCompiled .= '
		<div class="block-row block-row--separated  js-inlineModContainer" >
			<div class="contentRow ">
				<span class="contentRow-figure">
					' . $__templater->func('avatar', array($__vars['escrow']['Thread']['User'], 's', false, array(
			'defaultname' => $__vars['escrow']['Thread']['User']['username'],
		))) . '
				</span>
				<div class="contentRow-main">
					<h3 class="contentRow-title">
						<a href="' . $__templater->func('link', array('threads', $__vars['escrow']['Thread'], ), true) . '">' . $__templater->escape($__vars['escrow']['Thread']['title']) . '</a>
					</h3>
					<div class="contentRow-minor contentRow-minor--hideLinks">
						<ul class="listInline listInline--bullet">
							<li>
								';
		if ($__vars['type'] == 'my') {
			$__finalCompiled .= '
									' . $__templater->func('username_link', array($__vars['escrow']['User'], false, array(
				'defaultname' => $__vars['escrow']['User']['username'],
			))) . '
									';
		} else if ($__vars['type'] == 'mentioned') {
			$__finalCompiled .= '
									' . $__templater->func('username_link', array($__vars['escrow']['Thread']['User'], false, array(
				'defaultname' => $__vars['escrow']['Thread']['User']['username'],
			))) . '
									
								';
		}
		$__finalCompiled .= '
							</li>
							<li>' . $__templater->func('date_dynamic', array($__vars['escrow']['Thread']['post_date'], array(
		))) . '</li>
							<li>' . 'Amount' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->filter($__vars['escrow']['escrow_amount'], array(array('number', array()),), true) . '</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	';
	}
	$__finalCompiled .= '		
	
';
	return $__finalCompiled;
}
),
'logs_table_list' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'logs' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

  ' . $__templater->dataRow(array(
		'rowtype' => 'header',
	), array(array(
		'_type' => 'cell',
		'html' => ' ' . 'Type' . ' ',
	),
	array(
		'_type' => 'cell',
		'html' => ' ' . 'Date Time' . ' ',
	),
	array(
		'_type' => 'cell',
		'html' => ' ' . 'Amount' . ' ',
	),
	array(
		'_type' => 'cell',
		'html' => ' ' . 'Balance' . ' ',
	))) . '
  ';
	if ($__templater->isTraversable($__vars['logs'])) {
		foreach ($__vars['logs'] AS $__vars['log']) {
			$__finalCompiled .= '
    ' . $__templater->dataRow(array(
			), array(array(
				'_type' => 'cell',
				'html' => ' ' . $__templater->escape($__vars['log']['transaction_type']) . ' ',
			),
			array(
				'_type' => 'cell',
				'html' => $__templater->func('date_dynamic', array($__vars['log']['created_at'], array(
			))),
			),
			array(
				'_type' => 'cell',
				'html' => ' ' . $__templater->escape($__vars['log']['transaction_amount']) . ' ',
			),
			array(
				'_type' => 'cell',
				'html' => $__templater->escape($__vars['log']['current_amount']),
			))) . '
  ';
		}
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'status' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'status' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	<div class="block-body block-row">
		';
	if ($__vars['status'] == 0) {
		$__finalCompiled .= '
			' . 'Waiting for approvel' . '
		';
	} else if ($__vars['status'] == 1) {
		$__finalCompiled .= '
			' . 'Aproved. Processing' . '
		';
	} else if ($__vars['status'] == 2) {
		$__finalCompiled .= '
			' . 'Cancelled by mentioned User' . '
		';
	} else if ($__vars['status'] == 3) {
		$__finalCompiled .= '
			' . 'Cancelled by Creator' . '
		';
	} else if ($__vars['status'] == 4) {
		$__finalCompiled .= '
			' . 'Completed. ' . '
		';
	} else {
		$__finalCompiled .= '
			' . 'fs_escrow_status_undefined' . '
		';
	}
	$__finalCompiled .= '
     </div> 
		
	
	';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '	



<!-- placingProperTableCellTemplate -->

' . '


';
	return $__finalCompiled;
}
);