<?php
// FROM HASH: db4d338a1af7a8a50ae85a9b55121637
return array(
'macros' => array('featured_carousel' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'featuredListings' => '!',
		'viewAllLink' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	if (!$__templater->test($__vars['featuredListings'], 'empty', array())) {
		$__finalCompiled .= '
		';
		$__templater->includeCss('carousel.less');
		$__finalCompiled .= '
		';
		$__templater->includeCss('lightslider.less');
		$__finalCompiled .= '

		';
		$__templater->includeJs(array(
			'prod' => 'xf/carousel-compiled.js',
			'dev' => 'vendor/lightslider/lightslider.min.js, xf/carousel.js',
		));
		$__finalCompiled .= '

		<div class="carousel carousel--withFooter">
			<ul class="carousel-body carousel-body--show2" data-xf-init="carousel">
				';
		if ($__templater->isTraversable($__vars['featuredListings'])) {
			foreach ($__vars['featuredListings'] AS $__vars['listing']) {
				$__finalCompiled .= '
					<li>
						<div class="carousel-item">
							<div class="contentRow">
								<div class="contentRow-figure">
										' . $__templater->func('avatar', array($__vars['listing']['User']['username'], 'm', false, array(
					'notooltip' => 'true',
				))) . '
								</div>
								<div class="contentRow-main">
									<h4 class="contentRow-title"><a href="' . $__templater->func('link', array('classifieds', $__vars['listing'], ), true) . '">' . $__templater->func('prefix', array('classifieds_listing', $__vars['listing'], ), true) . $__templater->escape($__vars['listing']['title']) . '</a></h4>
									<div class="contentRow-minor contentRow-minor--smaller">
										<ul class="listInline listInline--bullet">
											<li>' . ($__templater->escape($__vars['listing']['User']['username']) ?: $__templater->escape($__vars['listing']['User']['username'])) . '</li>
											<li>' . 'Updated' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->func('date_dynamic', array($__vars['listing']['last_edit_date'], array(
				))) . '</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</li>
				';
			}
		}
		$__finalCompiled .= '
			</ul>
			<div class="carousel-footer">
				<a href="' . $__templater->escape($__vars['viewAllLink']) . '">' . 'classifieds_view_all_featured_listings' . '</a>
			</div>
		</div>
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'list_filter_bar' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'filters' => '!',
		'baseLinkPath' => '!',
		'category' => null,
		'creatorFilter' => null,
		'conditionFilter' => null,
		'listingTypeFilter' => null,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__vars['sortOrders'] = array('last_update' => 'z61_classifieds_last_updated', 'expiration_date' => 'Expiration date', 'title' => 'Title', 'price' => 'Price', );
	$__finalCompiled .= '

	<div class="block-filterBar">
		<div class="filterBar">
			';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
						';
	if ($__vars['filters']['prefix_id']) {
		$__compilerTemp1 .= '
							<li><a href="' . $__templater->func('link', array($__vars['baseLinkPath'], $__vars['category'], $__templater->filter($__vars['filters'], array(array('replace', array('prefix_id', null, )),), false), ), true) . '"
								class="filterBar-filterToggle" data-xf-init="tooltip" title="' . $__templater->filter('Remove this filter', array(array('for_attr', array()),), true) . '">
								<span class="filterBar-filterToggle-label">' . 'Prefix' . $__vars['xf']['language']['label_separator'] . '</span>
								' . $__templater->func('prefix_title', array('classifieds_listing', $__vars['filters']['prefix_id'], ), true) . '</a></li>
						';
	}
	$__compilerTemp1 .= '
						';
	if ($__vars['filters']['condition_id']) {
		$__compilerTemp1 .= '
						<li><a href="' . $__templater->func('link', array($__vars['baseLinkPath'], $__vars['category'], $__templater->filter($__vars['filters'], array(array('replace', array('condition_id', null, )),), false), ), true) . '"
							   class="filterBar-filterToggle" data-xf-init="tooltip" title="' . $__templater->filter('Remove this filter', array(array('for_attr', array()),), true) . '">
							<span class="filterBar-filterToggle-label">' . 'Condition' . $__vars['xf']['language']['label_separator'] . '</span>
							' . $__templater->escape($__vars['conditionFilter']['title']) . '</a></li>
					';
	}
	$__compilerTemp1 .= '
						
					';
	if ($__vars['xf']['options']['z61ClassifiedsGoogleApi'] AND ($__vars['filters']['address'] AND $__vars['addressFilter'])) {
		$__compilerTemp1 .= '
						<li><a href="' . $__templater->func('link', array($__vars['baseLinkPath'], $__vars['category'], $__templater->filter($__vars['filters'], array(array('replace', array('address', null, )),), false), ), true) . '"
							   class="filterBar-filterToggle" data-xf-init="tooltip" title="' . $__templater->filter('Remove this filter', array(array('for_attr', array()),), true) . '">
							<span class="filterBar-filterToggle-label">' . 'Within' . $__vars['xf']['language']['label_separator'] . '</span>
							' . '' . $__templater->escape($__vars['address']['distance']) . ' ' . $__templater->filter($__vars['address']['distance_unit'], array(array('to_upper', array()),), true) . ' of ' . $__templater->escape($__vars['address']['formatted']) . '' . '</a></li>
					';
	}
	$__compilerTemp1 .= '

					';
	if ($__vars['filters']['listing_type_id']) {
		$__compilerTemp1 .= '
						<li><a href="' . $__templater->func('link', array($__vars['baseLinkPath'], $__vars['category'], $__templater->filter($__vars['filters'], array(array('replace', array('listing_type_id', null, )),), false), ), true) . '"
							   class="filterBar-filterToggle" data-xf-init="tooltip" title="' . $__templater->filter('Remove this filter', array(array('for_attr', array()),), true) . '">
							<span class="filterBar-filterToggle-label">' . 'Type' . $__vars['xf']['language']['label_separator'] . '</span>
							' . $__templater->escape($__vars['listingTypeFilter']['title']) . '</a></li>
					';
	}
	$__compilerTemp1 .= '

						';
	if ($__vars['filters']['creator_id'] AND $__vars['creatorFilter']) {
		$__compilerTemp1 .= '
							<li><a href="' . $__templater->func('link', array($__vars['baseLinkPath'], $__vars['category'], $__templater->filter($__vars['filters'], array(array('replace', array('creator_id', null, )),), false), ), true) . '"
								class="filterBar-filterToggle" data-xf-init="tooltip" title="' . $__templater->filter('Remove this filter', array(array('for_attr', array()),), true) . '">
								<span class="filterBar-filterToggle-label">' . 'Author' . $__vars['xf']['language']['label_separator'] . '</span>
								' . $__templater->escape($__vars['creatorFilter']['username']) . '</a></li>
						';
	}
	$__compilerTemp1 .= '
						';
	if ($__vars['filters']['order'] AND $__vars['sortOrders'][$__vars['filters']['order']]) {
		$__compilerTemp1 .= '
							<li><a href="' . $__templater->func('link', array($__vars['baseLinkPath'], $__vars['category'], $__templater->filter($__vars['filters'], array(array('replace', array(array('order' => null, 'direction' => null, ), )),), false), ), true) . '"
								class="filterBar-filterToggle" data-xf-init="tooltip" title="' . $__templater->filter('Return to the default order', array(array('for_attr', array()),), true) . '">
								<span class="filterBar-filterToggle-label">' . 'Sort by' . $__vars['xf']['language']['label_separator'] . '</span>
								' . $__templater->escape($__vars['sortOrders'][$__vars['filters']['order']]) . '
								<i class="fa ' . (($__vars['filters']['direction'] == 'asc') ? 'fa-angle-up' : 'fa-angle-down') . '" aria-hidden="true"></i>
								<span class="u-srOnly">';
		if ($__vars['filters']['direction'] == 'asc') {
			$__compilerTemp1 .= 'Ascending';
		} else {
			$__compilerTemp1 .= 'Descending';
		}
		$__compilerTemp1 .= '</span>
							</a></li>
						';
	}
	$__compilerTemp1 .= '
					';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
				<ul class="filterBar-filters">
					' . $__compilerTemp1 . '
				</ul>
			';
	}
	$__finalCompiled .= '

			<a class="filterBar-menuTrigger" data-xf-click="menu" role="button" tabindex="0" aria-expanded="false" aria-haspopup="true">' . 'Filters' . '</a>
			<div class="menu menu--wide" data-menu="menu" aria-hidden="true"
				data-href="' . $__templater->func('link', array($__vars['baseLinkPath'] . '/filters', $__vars['category'], $__vars['filters'], ), true) . '"
				data-load-target=".js-filterMenuBody">
				<div class="menu-content">
					<h4 class="menu-header">' . 'Show only' . $__vars['xf']['language']['label_separator'] . '</h4>
					<div class="js-filterMenuBody">
						<div class="menu-row">' . 'Loading' . $__vars['xf']['language']['ellipsis'] . '</div>
					</div>
				</div>
			</div>
		</div>
	</div>
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

';
	return $__finalCompiled;
}
);