<?php
// FROM HASH: edc2d2edda9c5e599adb8c4dd1ecd15c
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped($__templater->escape($__vars['category']['title']));
	$__templater->pageParams['pageNumber'] = $__vars['page'];
	$__finalCompiled .= '
';
	$__templater->pageParams['pageDescription'] = $__templater->preEscaped($__templater->filter($__vars['category']['description'], array(array('raw', array()),), true));
	$__templater->pageParams['pageDescriptionMeta'] = true;
	$__finalCompiled .= '

' . $__templater->callMacro('metadata_macros', 'canonical_url', array(
		'canonicalUrl' => $__templater->func('link', array('canonical:classifieds/categories', $__vars['category'], array('page' => $__vars['page'], ), ), false),
	), $__vars) . '

';
	$__templater->breadcrumbs($__templater->method($__vars['category'], 'getBreadcrumbs', array(false, )));
	$__finalCompiled .= '

' . $__templater->callMacro('z61_classifieds_listing_page_macros', 'listing_page_options', array(
		'category' => $__vars['category'],
	), $__vars) . '

';
	$__compilerTemp1 = '';
	if ($__templater->method($__vars['category'], 'canAddListing', array())) {
		$__compilerTemp1 .= '
		' . $__templater->button('Add listing', array(
			'href' => $__templater->func('link', array('classifieds/categories/add', $__vars['category'], ), false),
			'class' => 'button--cta',
			'icon' => 'write',
		), '', array(
		)) . '
	';
	}
	$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__compilerTemp1 . '
');
	$__finalCompiled .= '

';
	if ($__vars['pendingApproval']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--important">' . 'Your content has been submitted and will be displayed pending approval by a moderator.' . '</div>
';
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
	$__compilerTemp2 = '';
	$__compilerTemp3 = '';
	$__compilerTemp3 .= '
						';
	if ($__vars['canInlineMod']) {
		$__compilerTemp3 .= '
							' . $__templater->callMacro('inline_mod_macros', 'button', array(), $__vars) . '
						';
	}
	$__compilerTemp3 .= '
						';
	if ($__templater->method($__vars['category'], 'canWatch', array())) {
		$__compilerTemp3 .= '
							';
		$__compilerTemp4 = '';
		if ($__vars['category']['Watch'][$__vars['xf']['visitor']['user_id']]) {
			$__compilerTemp4 .= 'Unwatch';
		} else {
			$__compilerTemp4 .= 'Watch';
		}
		$__compilerTemp3 .= $__templater->button('
								' . $__compilerTemp4 . '
							', array(
			'href' => $__templater->func('link', array('classifieds/categories/watch', $__vars['category'], ), false),
			'class' => 'button--link',
			'data-xf-click' => 'switch-overlay',
			'data-sk-watch' => 'Watch',
			'data-sk-unwatch' => 'Unwatch',
		), '', array(
		)) . '
						';
	}
	$__compilerTemp3 .= '
					';
	if (strlen(trim($__compilerTemp3)) > 0) {
		$__compilerTemp2 .= '
			<div class="block-outer-opposite">
				<div class="buttonGroup">
					' . $__compilerTemp3 . '
				</div>
			</div>
		';
	}
	$__finalCompiled .= trim('

		' . $__templater->func('page_nav', array(array(
		'page' => $__vars['page'],
		'total' => $__vars['total'],
		'link' => 'classifieds/categories',
		'data' => $__vars['category'],
		'params' => $__vars['filters'],
		'wrapperclass' => 'block-outer-main',
		'perPage' => $__vars['perPage'],
	))) . '

		' . $__compilerTemp2 . '

	') . '</div>

	<div class="block-container">
		' . $__templater->callMacro('z61_classifieds_overview_macros', 'list_filter_bar', array(
		'filters' => $__vars['filters'],
		'baseLinkPath' => 'classifieds/categories',
		'category' => $__vars['category'],
		'creatorFilter' => $__vars['creatorFilter'],
		'conditionFilter' => $__vars['conditionFilter'],
		'listingTypeFilter' => $__vars['listingTypeFilter'],
	), $__vars) . '

		<div class="block-body">
			';
	if ($__vars['category']['layout_type'] == 'list_view') {
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
	} else if ($__vars['category']['layout_type'] == 'grid_view') {
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
		'link' => 'classifieds/categories',
		'data' => $__vars['category'],
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
		'selected' => $__vars['category']['category_id'],
	), $__vars) . '
', 'replace');
	$__finalCompiled .= '

';
	$__templater->modifySideNavHtml('_xfWidgetPositionSideNav2c4d9ceaaafbfcf02c3f4cc99a031caa', $__templater->widgetPosition('classifieds_category_sidenav', array(
		'category' => $__vars['category'],
	)), 'replace');
	return $__finalCompiled;
}
);