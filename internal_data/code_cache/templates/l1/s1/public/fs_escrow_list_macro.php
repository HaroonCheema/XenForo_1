<?php
// FROM HASH: a967c318660d24c565823be384e0aba7
return array(
'macros' => array('escrow' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'escrow' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	<li class="block-row block-row--separated  js-inlineModContainer" data-author="' . ($__templater->escape($__vars['thread']['User']['username']) ?: $__templater->escape($__vars['thread']['username'])) . '">
	<div class="contentRow ">
		<span class="contentRow-figure">
			' . $__templater->func('avatar', array($__vars['xf']['visitor']['User'], 's', false, array(
		'defaultname' => $__vars['xf']['visitor']['username'],
	))) . '
		</span>
		<div class="contentRow-main">
			<h3 class="contentRow-title">
				<a href="' . $__templater->func('link', array('threads', $__vars['thread'], ), true) . '">Title</a>
			</h3>

			<div class="contentRow-snippet">' . $__templater->func('snippet', array($__vars['thread']['FirstPost']['message'], 300, array('term' => $__vars['options']['term'], 'stripQuote' => true, ), ), true) . '</div>

			<div class="contentRow-minor contentRow-minor--hideLinks">
				<ul class="listInline listInline--bullet">
					<li>' . $__templater->func('username_link', array($__vars['xf']['visitor']['User'], false, array(
		'defaultname' => $__vars['xf']['visitor']['username'],
	))) . '</li>
					<li>' . 'Thread' . '</li>
					<li>' . $__templater->func('date_dynamic', array($__vars['thread']['post_date'], array(
	))) . '</li>
					<li>' . 'Replies' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->filter($__vars['thread']['reply_count'], array(array('number', array()),), true) . '</li>
					<li>' . 'Forum' . $__vars['xf']['language']['label_separator'] . ' <a href="' . $__templater->func('link', array('forums', $__vars['thread']['Forum'], ), true) . '">' . $__templater->escape($__vars['thread']['Forum']['title']) . '</a></li>
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
		'logs' => '',
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
	if ($__templater->isTraversable($__vars['attendance'])) {
		foreach ($__vars['attendance'] AS $__vars['attend']) {
			$__finalCompiled .= '
    ' . $__templater->dataRow(array(
			), array(array(
				'_type' => 'cell',
				'html' => ' ' . $__templater->func('date', array($__vars['attend']['date'], ), true) . ' ',
			),
			array(
				'_type' => 'cell',
				'html' => ' ' . $__templater->func('time', array($__vars['attend']['in_time'], ), true) . ' ',
			),
			array(
				'_type' => 'cell',
				'html' => ' ' . $__templater->func('time', array($__vars['attend']['out_time'], ), true) . ' ',
			),
			array(
				'_type' => 'cell',
				'html' => '

      ' . (($__vars['attend']['comment'] != '') ? $__templater->func('snippet', array($__vars['attend']['comment'], 30, array('stripBbCode' => true, ), ), true) : 'noComments') . '
       ',
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