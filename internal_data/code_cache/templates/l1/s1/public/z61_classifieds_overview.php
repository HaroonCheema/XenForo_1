<?php
// FROM HASH: ef0475dfbd6d369d742ad34ecb58b9a7
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Classifieds');
	$__templater->pageParams['pageNumber'] = $__vars['page'];
	$__finalCompiled .= '

' . $__templater->callMacro('metadata_macros', 'canonical_url', array(
		'canonicalUrl' => $__templater->func('link', array('canonical:classifieds', null, array('page' => $__vars['page'], ), ), false),
	), $__vars) . '

';
	$__templater->setPageParam('searchConstraints', array('Listings' => array('search_type' => 'classifieds_listing', ), ));
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['xf']['visitor'], 'canAddClassified', array()) AND !$__templater->test($__vars['categoryTree'], 'empty', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('Add listing' . $__vars['xf']['language']['ellipsis'], array(
			'href' => $__templater->func('link', array('classifieds/add', ), false),
			'class' => 'button--cta',
			'icon' => 'write',
			'overlay' => 'true',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

';
	if ($__vars['canInlineMod']) {
		$__finalCompiled .= '
	';
		$__templater->includeJs(array(
			'src' => 'xf/inline_mod.js',
			'min' => '1',
		));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

<div class="block" data-xf-init="' . ($__vars['canInlineMod'] ? 'inline-mod' : '') . '" data-type="classifieds_listing" data-href="' . $__templater->func('link', array('inline-mod', ), true) . '">
	<div class="block-outer">';
	$__compilerTemp1 = '';
	$__compilerTemp2 = '';
	$__compilerTemp2 .= '
					';
	if ($__vars['canInlineMod']) {
		$__compilerTemp2 .= '
						' . $__templater->callMacro('inline_mod_macros', 'button', array(), $__vars) . '
					';
	}
	$__compilerTemp2 .= '
				';
	if (strlen(trim($__compilerTemp2)) > 0) {
		$__compilerTemp1 .= '
			<div class="block-outer-opposite">
				<div class="buttonGroup">
				' . $__compilerTemp2 . '
				</div>
			</div>
		';
	}
	$__finalCompiled .= trim('

		' . $__templater->func('page_nav', array(array(
		'page' => $__vars['page'],
		'total' => $__vars['total'],
		'link' => 'classifieds',
		'params' => $__vars['filters'],
		'wrapperclass' => 'block-outer-main',
		'perPage' => $__vars['perPage'],
	))) . '

		' . $__compilerTemp1 . '

	') . '</div>

	<div class="block-container">
		' . $__templater->callMacro('z61_classifieds_overview_macros', 'list_filter_bar', array(
		'filters' => $__vars['filters'],
		'baseLinkPath' => 'classifieds',
		'creatorFilter' => $__vars['creatorFilter'],
		'conditionFilter' => $__vars['conditionFilter'],
		'listingTypeFilter' => $__vars['listingTypeFilter'],
		'addressFilter' => $__vars['addressFilter'],
	), $__vars) . '

		<div class="block-body">
			';
	if ($__vars['xf']['options']['z61ClassifiedsListLayout'] == 'list_view') {
		$__finalCompiled .= '
				';
		if (!$__templater->test($__vars['featuredListings'], 'empty', array())) {
			$__finalCompiled .= '
					<div class="structItemContainer">
						';
			if ($__templater->isTraversable($__vars['featuredListings'])) {
				foreach ($__vars['featuredListings'] AS $__vars['listing']) {
					$__finalCompiled .= '
							' . $__templater->callMacro('z61_classifieds_listing_list_macros', 'listing', array(
						'listing' => $__vars['listing'],
					), $__vars) . '
						';
				}
			}
			$__finalCompiled .= '
					</div>
				';
		}
		$__finalCompiled .= '
				';
		if (!$__templater->test($__vars['listings'], 'empty', array())) {
			$__finalCompiled .= '
					<div class="structItemContainer">
						';
			if ($__templater->isTraversable($__vars['listings'])) {
				foreach ($__vars['listings'] AS $__vars['listing']) {
					$__finalCompiled .= '
							' . $__templater->callMacro('z61_classifieds_listing_list_macros', 'listing', array(
						'listing' => $__vars['listing'],
					), $__vars) . '
						';
				}
			}
			$__finalCompiled .= '
					</div>
					';
		} else if ($__vars['filters']) {
			$__finalCompiled .= '
					<div class="block-row">' . 'There are currently no listings that match your filters.' . '</div>
					';
		} else {
			$__finalCompiled .= '
					<div class="block-row">' . 'No listings have been created yet.' . '</div>
				';
		}
		$__finalCompiled .= '
			';
	} else if ($__vars['xf']['options']['z61ClassifiedsListLayout'] == 'grid_view') {
		$__finalCompiled .= '
				';
		if (!$__templater->test($__vars['featuredListings'], 'empty', array())) {
			$__finalCompiled .= '
					<div class="structItemContainer">
						';
			if ($__templater->isTraversable($__vars['featuredListings'])) {
				foreach ($__vars['featuredListings'] AS $__vars['listing']) {
					$__finalCompiled .= '
							' . $__templater->callMacro('z61_classifieds_listing_list_macros', 'listing_grid', array(
						'listing' => $__vars['listing'],
					), $__vars) . '
						';
				}
			}
			$__finalCompiled .= '
					</div>
				';
		}
		$__finalCompiled .= '
				';
		if (!$__templater->test($__vars['listings'], 'empty', array())) {
			$__finalCompiled .= '
					<div class="structItemContainer">
						';
			if ($__templater->isTraversable($__vars['listings'])) {
				foreach ($__vars['listings'] AS $__vars['listing']) {
					$__finalCompiled .= '
							' . $__templater->callMacro('z61_classifieds_listing_list_macros', 'listing_grid', array(
						'listing' => $__vars['listing'],
					), $__vars) . '
						';
				}
			}
			$__finalCompiled .= '
					</div>
					';
		} else if ($__vars['filters']) {
			$__finalCompiled .= '
					<div class="block-row">' . 'There are currently no listings that match your filters.' . '</div>
					';
		} else {
			$__finalCompiled .= '
					<div class="block-row">' . 'No listings have been created yet.' . '</div>
				';
		}
		$__finalCompiled .= '
			';
	}
	$__finalCompiled .= '
		</div>
	</div>

	<div class="block-outer block-outer--after">
		' . $__templater->func('page_nav', array(array(
		'page' => $__vars['page'],
		'total' => $__vars['total'],
		'link' => 'classifieds',
		'params' => $__vars['filters'],
		'wrapperclass' => 'block-outer-main',
		'perPage' => $__vars['perPage'],
	))) . '
		' . $__templater->func('show_ignored', array(array(
		'wrapperclass' => 'block-outer-opposite',
	))) . '
	</div>
</div>

';
	$__templater->setPageParam('sideNavTitle', 'Categories');
	$__finalCompiled .= '
';
	$__templater->modifySideNavHtml(null, '
	' . $__templater->callMacro('z61_classifieds_category_list_macros', 'simple_list_block', array(
		'categoryTree' => $__vars['categoryTree'],
		'categoryExtras' => $__vars['categoryExtras'],
	), $__vars) . '
', 'replace');
	$__finalCompiled .= '

';
	$__templater->modifySideNavHtml('_xfWidgetPositionSideNav4401d3a32bbed9b86a42e889338553d3', $__templater->widgetPosition('classifieds_overview_sidenav', array()), 'replace');
	return $__finalCompiled;
}
);