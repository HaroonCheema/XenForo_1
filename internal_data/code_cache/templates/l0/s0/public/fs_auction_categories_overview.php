<?php
// FROM HASH: 9d0b098551e1d2f90a3f07b58de10784
return array(
'macros' => array('table_list' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'data' => $__vars['data'],
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
  ' . $__templater->dataRow(array(
		'rowtype' => 'header',
	), array(array(
		'_type' => 'cell',
		'html' => ' ' . 'fs_cell_bidding' . ' ',
	),
	array(
		'class' => 'dataList-cell--min',
		'_type' => 'cell',
		'html' => '',
	),
	array(
		'class' => 'dataList-cell--min',
		'_type' => 'cell',
		'html' => '',
	))) . '
  ';
	if ($__templater->isTraversable($__vars['data'])) {
		foreach ($__vars['data'] AS $__vars['value']) {
			$__finalCompiled .= '
    ' . $__templater->dataRow(array(
			), array(array(
				'_type' => 'cell',
				'html' => ' ' . $__templater->escape($__vars['value']['title']) . ' ',
			),
			array(
				'href' => $__templater->func('link', array('auction/categories/edit', $__vars['value'], ), false),
				'_type' => 'action',
				'html' => 'Edit',
			),
			array(
				'href' => $__templater->func('link', array('auction/categories/delete', $__vars['value'], ), false),
				'overlay' => 'true',
				'_type' => 'delete',
				'html' => '',
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
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Auction');
	$__templater->pageParams['pageNumber'] = $__vars['page'];
	$__finalCompiled .= '

';
	$__templater->setPageParam('searchConstraints', array('Listings' => array('search_type' => 'classifieds_listing', ), ));
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['xf']['visitor'], 'canAddClassified', array()) AND !$__templater->test($__vars['categories'], 'empty', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('Add Bidiing' . $__vars['xf']['language']['ellipsis'], array(
			'href' => $__templater->func('link', array('auction/add', ), false),
			'class' => 'button--cta',
			'icon' => 'write',
			'overlay' => 'true',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if (!$__templater->test($__vars['data'], 'empty', array())) {
		$__compilerTemp1 .= '
	<div class="block-body">
			' . $__templater->dataList('
					
				' . $__templater->callMacro(null, 'table_list', array(
			'data' => $__vars['data'],
		), $__vars) . '


				   ', array(
			'data-xf-init' => 'responsive-data-list',
		)) . '
				
		    
		</div>
       ';
	} else {
		$__compilerTemp1 .= '
			<div class="block-body block-row">' . 'No items have been created yet.' . '</div>
		
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
' . '


';
	$__templater->setPageParam('sideNavTitle', 'Categories');
	$__finalCompiled .= '
';
	$__compilerTemp2 = '';
	if ($__templater->isTraversable($__vars['categories'])) {
		foreach ($__vars['categories'] AS $__vars['child']) {
			$__compilerTemp2 .= '
		<li class="categoryList-item">
		<div class="categoryList-itemRow">
			
			<a href="' . $__templater->func('link', array('classifieds/categories', $__vars['category'], ), true) . '" class="categoryList-link' . ($__vars['isSelected'] ? ' is-selected' : '') . '">
				' . $__templater->escape($__vars['child']['title']) . '
			</a>
			<span class="categoryList-label">
				<span class="label label--subtle label--smallest">' . $__templater->filter($__vars['child']['bid_count'], array(array('number_short', array()),), true) . '</span>
			</span>
		</div>
	</li>
	';
		}
	}
	$__templater->modifySideNavHtml(null, '
	' . $__compilerTemp2 . '

', 'replace');
	$__finalCompiled .= '

';
	$__templater->modifySideNavHtml('_xfWidgetPositionSideNav4401d3a32bbed9b86a42e889338553d3', $__templater->widgetPosition('classifieds_overview_sidenav', array()), 'replace');
	return $__finalCompiled;
}
);