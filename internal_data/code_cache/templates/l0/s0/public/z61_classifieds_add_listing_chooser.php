<?php
// FROM HASH: d34dc58c3c30ce467c4546a6fba812b5
return array(
'macros' => array('category_list' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'children' => '!',
		'extras' => '!',
		'depth' => '0',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	if ($__templater->isTraversable($__vars['children'])) {
		foreach ($__vars['children'] AS $__vars['id'] => $__vars['child']) {
			$__finalCompiled .= '
		' . $__templater->callMacro(null, 'category_list_entry', array(
				'category' => $__vars['child']['record'],
				'extras' => $__vars['extras'][$__vars['id']],
				'children' => $__vars['child']['children'],
				'childExtras' => $__vars['extras'],
				'depth' => $__vars['depth'],
			), $__vars) . '
	';
		}
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'category_list_entry' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'category' => '!',
		'extras' => '!',
		'children' => '!',
		'childExtras' => '!',
		'depth' => '0',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	if ($__vars['depth'] == 0) {
		$__finalCompiled .= '
		';
		if ($__templater->method($__vars['category'], 'canAddListing', array())) {
			$__finalCompiled .= '
			' . $__templater->callMacro(null, 'category_list_entry_forum_level_0', array(
				'category' => $__vars['category'],
				'extras' => $__vars['extras'],
				'children' => $__vars['children'],
				'childExtras' => $__vars['childExtras'],
				'depth' => $__vars['depth'],
			), $__vars) . '
		';
		} else {
			$__finalCompiled .= '
			' . $__templater->callMacro(null, 'category_list_entry_no_posting_level_0', array(
				'category' => $__vars['category'],
				'extras' => $__vars['extras'],
				'children' => $__vars['children'],
				'childExtras' => $__vars['childExtras'],
				'depth' => $__vars['depth'],
			), $__vars) . '
		';
		}
		$__finalCompiled .= '
	';
	} else {
		$__finalCompiled .= '
		';
		if ($__templater->method($__vars['category'], 'canAddListing', array())) {
			$__finalCompiled .= '
			' . $__templater->callMacro(null, 'category_list_entry_forum', array(
				'category' => $__vars['category'],
				'extras' => $__vars['extras'],
				'children' => $__vars['children'],
				'childExtras' => $__vars['childExtras'],
				'depth' => $__vars['depth'],
			), $__vars) . '
		';
		} else {
			$__finalCompiled .= '
			' . $__templater->callMacro(null, 'category_list_entry_no_posting', array(
				'category' => $__vars['category'],
				'extras' => $__vars['extras'],
				'children' => $__vars['children'],
				'childExtras' => $__vars['childExtras'],
				'depth' => $__vars['depth'],
			), $__vars) . '
		';
		}
		$__finalCompiled .= '
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'category_list_entry_category_level_0' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'category' => '!',
		'extras' => '!',
		'children' => '!',
		'childExtras' => '!',
		'depth' => '0',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	<div class="block block--treeEntryChooser">
		<div class="block-container">
			<h2 class="block-header">
				' . $__templater->escape($__vars['category']['title']) . '
				';
	if ($__vars['category']['description']) {
		$__finalCompiled .= '
					<span class="block-desc">
						' . $__templater->filter($__vars['category']['description'], array(array('strip_tags', array()),), true) . '
					</span>
				';
	}
	$__finalCompiled .= '
			</h2>
			<div class="block-body">
				' . $__templater->callMacro(null, 'category_list', array(
		'children' => $__vars['children'],
		'extras' => $__vars['childExtras'],
		'depth' => ($__vars['depth'] + 1),
	), $__vars) . '
			</div>
		</div>
	</div>
';
	return $__finalCompiled;
}
),
'category_list_entry_forum_level_0' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'category' => '!',
		'extras' => '!',
		'children' => '!',
		'childExtras' => '!',
		'depth' => '0',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	<div class="block block--treeEntryChooser">
		<div class="block-container">
			' . $__templater->callMacro(null, 'category_list_entry_forum', array(
		'category' => $__vars['category'],
		'extras' => $__vars['extras'],
		'children' => $__vars['children'],
		'childExtras' => $__vars['childExtras'],
		'depth' => $__vars['depth'],
	), $__vars) . '
		</div>
	</div>
';
	return $__finalCompiled;
}
),
'category_list_entry_no_posting_level_0' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'category' => '!',
		'extras' => '!',
		'children' => '!',
		'childExtras' => '!',
		'depth' => '0',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	<div class="block block--treeEntryChooser">
		<div class="block-container">
			' . $__templater->callMacro(null, 'category_list_entry_no_posting', array(
		'category' => $__vars['category'],
		'extras' => $__vars['extras'],
		'children' => $__vars['children'],
		'childExtras' => $__vars['childExtras'],
		'depth' => $__vars['depth'],
	), $__vars) . '
		</div>
	</div>
';
	return $__finalCompiled;
}
),
'category_list_entry_forum' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'category' => '!',
		'extras' => '!',
		'children' => '!',
		'childExtras' => '!',
		'depth' => '0',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	<div class="block-row block-row--clickable block-row--separated fauxBlockLink">
		<div class="contentRow contentRow--alignMiddle' . (($__vars['depth'] > 1) ? (' u-depth' . ($__vars['depth'] - 1)) : '') . '">
			<div class="contentRow-main">
				<h2 class="contentRow-title">
					<a href="' . $__templater->func('link', array('classifieds/categories/add', $__vars['category'], ), true) . '" class="fauxBlockLink-blockLink">
						' . $__templater->escape($__vars['category']['title']) . '
					</a>
				</h2>
				';
	if ($__vars['category']['description']) {
		$__finalCompiled .= '
					<div class="contentRow-minor contentRow-minor--singleLine">
						' . $__templater->filter($__vars['category']['description'], array(array('strip_tags', array()),), true) . '
					</div>
				';
	}
	$__finalCompiled .= '
			</div>
			<div class="contentRow-suffix">
				<dl class="pairs pairs--rows pairs--rows--centered">
					<dt>' . 'Listings' . '</dt>
					<dd>' . $__templater->filter($__vars['extras']['listing_count'], array(array('number_short', array()),), true) . '</dd>
				</dl>
			</div>
		</div>
	</div>
	' . $__templater->callMacro(null, 'category_list', array(
		'children' => $__vars['children'],
		'extras' => $__vars['childExtras'],
		'depth' => ($__vars['depth'] + 1),
	), $__vars) . '
';
	return $__finalCompiled;
}
),
'category_list_entry_no_posting' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'category' => '!',
		'extras' => '!',
		'children' => '!',
		'childExtras' => '!',
		'depth' => '0',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	<div class="block-row block-row--separated">
		<div class="contentRow contentRow--alignMiddle' . (($__vars['depth'] > 1) ? (' u-depth' . ($__vars['depth'] - 1)) : '') . ' is-disabled">
			<div class="contentRow-main">
				<h2 class="contentRow-title">
					' . $__templater->escape($__vars['category']['title']) . '
				</h2>
                <div class="contentRow-minor contentRow-minor--singleLine">
                    ' . 'You have insufficient privileges to post threads here.' . '
                </div>
			</div>
			<div class="contentRow-suffix">
				<dl class="pairs pairs--rows pairs--rows--centered">
					<dt>' . 'classifieds_listings' . '</dt>
					<dd>' . $__templater->filter($__vars['extras']['listing_count'], array(array('number_short', array()),), true) . '</dd>
				</dl>
			</div>
		</div>
	</div>
	' . $__templater->callMacro(null, 'category_list', array(
		'children' => $__vars['children'],
		'extras' => $__vars['childExtras'],
		'depth' => ($__vars['depth'] + 1),
	), $__vars) . '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Add listing to' . $__vars['xf']['language']['ellipsis']);
	$__finalCompiled .= '

' . $__templater->callMacro(null, 'category_list', array(
		'children' => $__vars['categoryTree'],
		'extras' => $__vars['categoryExtras'],
	), $__vars) . '

' . '

' . '

' . '

' . '

' . '

' . '

';
	return $__finalCompiled;
}
);