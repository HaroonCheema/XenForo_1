<?php
// FROM HASH: 4cd87df6db5ab4eb78b9eb78b6f5bbf0
return array(
'macros' => array('escrow' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'escrow' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	<li class="block-row block-row--separated  js-inlineModContainer" >
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
					<li>' . $__templater->func('username_link', array($__vars['escrow']['Thread']['User'], false, array(
		'defaultname' => $__vars['escrow']['Thread']['User']['username'],
	))) . '</li>
					<li>' . $__templater->func('date_dynamic', array($__vars['escrow']['Thread']['post_date'], array(
	))) . '</li>
					<li>' . 'Amount' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->filter($__vars['escrow']['escrow_amount'], array(array('number', array()),), true) . '</li>
				</ul>
			</div>
		</div>
	</div>
</li>
	
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
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '	



<!-- placingProperTableCellTemplate -->

';
	return $__finalCompiled;
}
);