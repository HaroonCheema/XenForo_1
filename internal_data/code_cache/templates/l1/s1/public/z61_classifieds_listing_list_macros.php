<?php
// FROM HASH: 4fb0a1e4fa4754c8cd19db64b398d42b
return array(
'macros' => array('listing' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'listing' => '!',
		'category' => null,
		'showWatched' => true,
		'allowInlineMod' => true,
		'chooseName' => '',
		'extraInfo' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	';
	$__templater->includeCss('structured_list.less');
	$__finalCompiled .= '
	';
	$__templater->includeCss('z61_classifieds.less');
	$__finalCompiled .= '

	<div class="structItem structItem--listing ' . ($__vars['listing']['prefix_id'] ? ('is-prefix' . $__templater->escape($__vars['listing']['prefix_id'])) : '') . ' ' . ($__templater->method($__vars['listing'], 'isIgnored', array()) ? 'is-ignored' : '') . (($__vars['listing']['listing_state'] == 'moderated') ? 'is-moderated' : '') . (($__vars['listing']['listing_state'] == 'deleted') ? 'is-deleted' : '') . ' js-inlineModContainer js-listingListItem-' . $__templater->escape($__vars['listing']['listing_id']) . '" data-author="' . ($__templater->escape($__vars['listing']['User']['username']) ?: $__templater->escape($__vars['listing']['username'])) . '">
		<div class="structItem-cell structItem-cell--icon structItem-cell--iconExpanded structItem-cell--iconListingCoverImage">
			<div class="structItem-iconContainer">
				' . $__templater->func('z61_classifieds_listing_thumbnail', array($__vars['listing'], ), true) . '
			</div>
		</div>
		<div class="structItem-cell structItem-cell--main" data-xf-init="touch-proxy">
			';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
					';
	if ($__vars['listing']['Featured']) {
		$__compilerTemp1 .= '
						<li>
							<i class="structItem-status structItem-status--attention" aria-hidden="true" title="' . $__templater->filter('Featured', array(array('for_attr', array()),), true) . '"></i>
							<span class="u-srOnly">' . 'Featured' . '</span>
						</li>
					';
	}
	$__compilerTemp1 .= '
					';
	if (!$__vars['listing']['listing_open']) {
		$__compilerTemp1 .= '
						<li>
							<i class="structItem-status structItem-status--locked" aria-hidden="true" title="' . $__templater->filter('Locked', array(array('for_attr', array()),), true) . '"></i>
							<span class="u-srOnly">' . 'Locked' . '</span>
						</li>
					';
	}
	$__compilerTemp1 .= '
					';
	if ($__vars['listing']['listing_state'] == 'moderated') {
		$__compilerTemp1 .= '
						<li>
							<i class="structItem-status structItem-status--moderated" aria-hidden="true" title="' . $__templater->filter('Awaiting approval', array(array('for_attr', array()),), true) . '"></i>
							<span class="u-srOnly">' . 'Awaiting approval' . '</span>
						</li>
					';
	}
	$__compilerTemp1 .= '
					';
	if ($__vars['listing']['listing_state'] == 'deleted') {
		$__compilerTemp1 .= '
						<li>
							<i class="structItem-status structItem-status--deleted" aria-hidden="true" title="' . $__templater->filter('Deleted', array(array('for_attr', array()),), true) . '"></i>
							<span class="u-srOnly">' . 'Deleted' . '</span>
						</li>
					';
	}
	$__compilerTemp1 .= '
					';
	if ($__vars['showWatched'] AND $__vars['xf']['visitor']['user_id']) {
		$__compilerTemp1 .= '
						';
		if ($__vars['listing']['Watch'][$__vars['xf']['visitor']['user_id']]) {
			$__compilerTemp1 .= '
							<li>
								<i class="structItem-status structItem-status--watched" aria-hidden="true" title="' . $__templater->filter('Classifieds listing watched', array(array('for_attr', array()),), true) . '"></i>
								<span class="u-srOnly">' . 'Classifieds listing watched' . '</span>
							</li>
						';
		} else if ((!$__vars['category']) AND $__vars['listing']['Category']['Watch'][$__vars['xf']['visitor']['user_id']]) {
			$__compilerTemp1 .= '
							<li>
								<i class="structItem-status structItem-status--watched" aria-hidden="true" title="' . $__templater->filter('z61_classifieds_category_watched', array(array('for_attr', array()),), true) . '"></i>
								<span class="u-srOnly">' . 'z61_classifieds_category_watched' . '</span>
							</li>
						';
		}
		$__compilerTemp1 .= '
					';
	}
	$__compilerTemp1 .= '
					<li>
						<a href="' . (!$__templater->test($__vars['category'], 'empty', array()) ? $__templater->func('link', array('classifieds/categories', $__vars['category'], array('listing_type_id' => $__vars['listing']['Type']['listing_type_id'], ), ), true) : $__templater->func('link', array('classifieds', null, array('listing_type_id' => $__vars['listing']['Type']['listing_type_id'], ), ), true)) . '">
						<span class="label label--smallest ' . $__templater->escape($__vars['listing']['Type']['css_class']) . '">
							' . $__templater->escape($__vars['listing']['Type']['title']) . '
						</span>
						</a>
					</li>

					';
	if ($__vars['listing']['expired']) {
		$__compilerTemp1 .= '
						<li>
							<span class="label label--orange label--smallest">' . 'Expired' . '</span>
						</li>
					';
	}
	$__compilerTemp1 .= '

					';
	if ($__vars['listing']['listing_status'] == 'sold') {
		$__compilerTemp1 .= '
						<li>
							<span class="label label--yellow label--smallest">
								' . 'Sold' . '
							</span>
						</li>
					';
	}
	$__compilerTemp1 .= '
				';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
				<ul class="structItem-statuses">
				' . $__compilerTemp1 . '
				</ul>
			';
	}
	$__finalCompiled .= '
			
			<div class="structItem-title">
				';
	if ($__vars['listing']['prefix_id']) {
		$__finalCompiled .= '
					';
		if ($__vars['category']) {
			$__finalCompiled .= '
						<a href="' . $__templater->func('link', array('classifieds/categories', $__vars['category'], array('prefix_id' => $__vars['listing']['prefix_id'], ), ), true) . '" class="labelLink" rel="nofollow">' . $__templater->func('prefix', array('classifieds_listing', $__vars['listing'], 'html', '', ), true) . '</a>
					';
		} else {
			$__finalCompiled .= '
						' . $__templater->func('prefix', array('classifieds_listing', $__vars['listing'], 'html', '', ), true) . '
					';
		}
		$__finalCompiled .= '
				';
	}
	$__finalCompiled .= '
				<a href="' . $__templater->func('link', array('classifieds', $__vars['listing'], ), true) . '" class="" data-tp-primary="on">' . $__templater->escape($__vars['listing']['title']) . '</a>
				';
	if ($__templater->method($__vars['listing'], 'canShowPrice', array())) {
		$__finalCompiled .= '
					<span class="label label--primary label--smallest">
						';
		if ($__vars['listing']['price'] > 0) {
			$__finalCompiled .= '
							' . $__templater->filter($__vars['listing']['price'], array(array('currency', array($__vars['listing']['currency'], )),), true) . '
							';
		} else {
			$__finalCompiled .= '
							' . 'Free' . '
						';
		}
		$__finalCompiled .= '
					</span>
				';
	}
	$__finalCompiled .= '
				';
	if ($__vars['listing']['listing_status'] == 'awaiting_payment') {
		$__finalCompiled .= '
						<span class="label label--red label--smallest">
							 ' . 'Awaiting payment' . '
					</span>
				';
	}
	$__finalCompiled .= '
			</div>

			<div class="structItem-minor">
				';
	$__compilerTemp2 = '';
	$__compilerTemp2 .= '
						';
	if ($__vars['extraInfo']) {
		$__compilerTemp2 .= '
							<li>' . $__templater->escape($__vars['extraInfo']) . '</li>
						';
	}
	$__compilerTemp2 .= '
						';
	if ($__vars['chooseName']) {
		$__compilerTemp2 .= '
							<li>' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'name' => $__vars['chooseName'] . '[]',
			'value' => $__vars['listing']['listing_id'],
			'class' => 'js-chooseItem',
			'_type' => 'option',
		))) . '</li>
						';
	} else if ($__vars['allowInlineMod'] AND $__templater->method($__vars['listing'], 'canUseInlineModeration', array())) {
		$__compilerTemp2 .= '
							<li>' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'value' => $__vars['listing']['listing_id'],
			'class' => 'js-inlineModToggle',
			'data-xf-init' => 'tooltip',
			'title' => $__templater->filter('Select for moderation', array(array('for_attr', array()),), false),
			'_type' => 'option',
		))) . '</li>
						';
	}
	$__compilerTemp2 .= '
					';
	if (strlen(trim($__compilerTemp2)) > 0) {
		$__finalCompiled .= '
					<ul class="structItem-extraInfo">
					' . $__compilerTemp2 . '
					</ul>
				';
	}
	$__finalCompiled .= '
				';
	if ($__vars['listing']['listing_state'] == 'deleted') {
		$__finalCompiled .= '
					';
		if ($__vars['extraInfo']) {
			$__finalCompiled .= '<span class="structItem-extraInfo">' . $__templater->escape($__vars['extraInfo']) . '</span>';
		}
		$__finalCompiled .= '

					' . $__templater->callMacro('deletion_macros', 'notice', array(
			'log' => $__vars['listing']['DeletionLog'],
		), $__vars) . '
				';
	} else {
		$__finalCompiled .= '
					<ul class="structItem-parts">
						<li>' . $__templater->func('username_link', array($__vars['listing']['User'], false, array(
			'defaultname' => $__vars['listing']['username'],
		))) . '</li>
						<li class="structItem-startDate"><a href="' . $__templater->func('link', array('classifieds', $__vars['listing'], ), true) . '" rel="nofollow">' . $__templater->func('date_dynamic', array($__vars['listing']['listing_date'], array(
		))) . '</a></li>
						';
		if ((!$__vars['category']) OR $__templater->method($__vars['category'], 'hasChildren', array())) {
			$__finalCompiled .= '
							<li><a href="' . $__templater->func('link', array('classifieds/categories', $__vars['listing']['Category'], ), true) . '">' . $__templater->escape($__vars['listing']['Category']['title']) . '</a></li>
						';
		}
		$__finalCompiled .= '
					</ul>
				';
	}
	$__finalCompiled .= '
			</div>
			
			';
	if ($__vars['listing']['listing_state'] != 'deleted') {
		$__finalCompiled .= '
				<div class="structItem-listingDescription">' . $__templater->func('snippet', array($__vars['listing']['content'], 150, array('stripBbCode' => true, ), ), true) . '</div>
			';
	}
	$__finalCompiled .= '
		</div>
		<div class="structItem-cell structItem-cell--listingMeta">
			';
	if ($__vars['listing']['expiration_date']) {
		$__finalCompiled .= '
				<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--expiration">
					<dt>' . 'Expires' . '</dt>
					<dd>' . $__templater->func('date_dynamic', array($__vars['listing']['expiration_date'], array(
		))) . '</dd>
				</dl>
			';
	}
	$__finalCompiled .= '
			<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--type">
				<dt>' . 'Type' . '</dt>
				<dd>' . $__templater->escape($__vars['listing']['Type']['title']) . '</dd>
			</dl>
			';
	if ($__vars['listing']['condition_id']) {
		$__finalCompiled .= '
				<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--condition">
					<dt>' . 'Condition' . '</dt>
					<dd>' . $__templater->escape($__vars['listing']['Condition']['title']) . '</dd>
				</dl>
			';
	}
	$__finalCompiled .= '
			<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--views">
				<dt>' . 'Views' . '</dt>
				<dd>' . $__templater->filter($__vars['listing']['view_count'], array(array('number', array()),), true) . '</dd>
			</dl>
		</div>
	</div>
';
	return $__finalCompiled;
}
),
'listing_simple' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'listing' => '!',
		'withMeta' => true,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	<div class="contentRow">
		<div class="contentRow-figure">
			' . $__templater->func('avatar', array($__vars['listing']['User'], 'xxs', false, array(
	))) . '
		</div>
		<div class="contentRow-main contentRow-main--close">
			<a href="' . $__templater->func('link', array('classifieds', $__vars['listing'], ), true) . '">' . $__templater->func('prefix', array('classifieds_listing', $__vars['listing'], ), true) . $__templater->escape($__vars['listing']['title']) . '</a>
			<div class="contentRow-lesser">' . $__templater->func('snippet', array($__vars['listing']['content'], 50, array('stripBbCode' => true, ), ), true) . '</div>
			';
	if ($__vars['withMeta']) {
		$__finalCompiled .= '
				<div class="contentRow-minor contentRow-minor--smaller">
					<ul class="listInline listInline--bullet">
						<li>' . ($__templater->escape($__vars['listing']['User']['username']) ?: $__templater->escape($__vars['listing']['username'])) . '</li>
						<li>' . 'Created' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->func('date_dynamic', array($__vars['listing']['listing_date'], array(
		))) . '</li>
					</ul>
				</div>
			';
	}
	$__finalCompiled .= '
		</div>
	</div>
';
	return $__finalCompiled;
}
),
'listing_grid' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'listing' => '!',
		'category' => null,
		'showWatched' => true,
		'allowInlineMod' => true,
		'chooseName' => '',
		'extraInfo' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	';
	$__templater->includeCss('structured_list.less');
	$__finalCompiled .= '
	';
	$__templater->includeCss('z61_classifieds.less');
	$__finalCompiled .= '
	';
	$__templater->includeCss('z61_classifieds_listing_grid_view.less');
	$__finalCompiled .= '

	<div class="structItem structItem--listing ' . ($__vars['listing']['prefix_id'] ? ('is-prefix' . $__templater->escape($__vars['listing']['prefix_id'])) : '') . ' ' . ($__templater->method($__vars['listing'], 'isIgnored', array()) ? 'is-ignored' : '') . (($__templater->method($__vars['listing'], 'isUnread', array()) AND (!$__vars['forceRead'])) ? ' is-unread' : '') . (($__vars['listing']['listing_state'] == 'moderated') ? 'is-moderated' : '') . (($__vars['listing']['listing_state'] == 'deleted') ? 'is-deleted' : '') . ' js-inlineModContainer js-listingListItem-' . $__templater->escape($__vars['listing']['listing_id']) . '" data-author="' . ($__templater->escape($__vars['listing']['User']['username']) ?: $__templater->escape($__vars['listing']['username'])) . '">
		<div class="structItem-cell structItem-cell--icon structItem-cell--iconExpanded structItem-cell--iconListingCoverImage">
			<div class="structItem-iconContainer">
				';
	if ($__vars['listing']['cover_image_id']) {
		$__finalCompiled .= '
					' . $__templater->func('z61_classifieds_listing_thumbnail', array($__vars['listing'], ), true) . '
					';
	} else {
		$__finalCompiled .= '
					' . $__templater->func('avatar', array($__vars['listing']['User'], 'm', false, array(
			'defaultname' => ($__vars['listing']['username'] ?: 'Deleted member'),
		))) . '
				';
	}
	$__finalCompiled .= '
			</div>
		</div>
		<div class="structItem-cell structItem-cell--main" data-xf-init="touch-proxy">
			';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
						';
	if ($__vars['listing']['Featured']) {
		$__compilerTemp1 .= '
							<li>
								<i class="structItem-status structItem-status--attention" aria-hidden="true" title="' . $__templater->filter('xa_ams_featured', array(array('for_attr', array()),), true) . '"></i>
								<span class="u-srOnly">' . 'xa_ams_featured' . '</span>
							</li>
						';
	}
	$__compilerTemp1 .= '
						';
	if ($__vars['listing']['listing_state'] == 'moderated') {
		$__compilerTemp1 .= '
							<li>
								<i class="structItem-status structItem-status--moderated" aria-hidden="true" title="' . $__templater->filter('Awaiting approval', array(array('for_attr', array()),), true) . '"></i>
								<span class="u-srOnly">' . 'Awaiting approval' . '</span>
							</li>
						';
	}
	$__compilerTemp1 .= '
						';
	if ($__vars['listing']['listing_state'] == 'deleted') {
		$__compilerTemp1 .= '
							<li>
								<i class="structItem-status structItem-status--deleted" aria-hidden="true" title="' . $__templater->filter('Deleted', array(array('for_attr', array()),), true) . '"></i>
								<span class="u-srOnly">' . 'Deleted' . '</span>
							</li>
						';
	}
	$__compilerTemp1 .= '
						';
	if ($__vars['showWatched'] AND $__vars['xf']['visitor']['user_id']) {
		$__compilerTemp1 .= '
							';
		if ($__vars['listing']['Watch'][$__vars['xf']['visitor']['user_id']]) {
			$__compilerTemp1 .= '
								<li>
									<i class="structItem-status structItem-status--watched" aria-hidden="true" title="' . $__templater->filter('Classifieds listing watched', array(array('for_attr', array()),), true) . '"></i>
									<span class="u-srOnly">' . 'Classifieds listing watched' . '</span>
								</li>
								';
		} else if ((!$__vars['category']) AND $__vars['listing']['Category']['Watch'][$__vars['xf']['visitor']['user_id']]) {
			$__compilerTemp1 .= '
								<li>
									<i class="structItem-status structItem-status--watched" aria-hidden="true" title="' . $__templater->filter('z61_classifieds_category_watched', array(array('for_attr', array()),), true) . '"></i>
									<span class="u-srOnly">' . 'z61_classifieds_category_watched' . '</span>
								</li>
							';
		}
		$__compilerTemp1 .= '
						';
	}
	$__compilerTemp1 .= '
					';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
				<ul class="structItem-statuses">
					' . $__compilerTemp1 . '
				</ul>
			';
	}
	$__finalCompiled .= '

			<div class="structItem-title">
				';
	if ($__vars['listing']['prefix_id']) {
		$__finalCompiled .= '
					';
		if ($__vars['category']) {
			$__finalCompiled .= '
						<a href="' . $__templater->func('link', array('classifieds/categories', $__vars['category'], array('prefix_id' => $__vars['listing']['prefix_id'], ), ), true) . '" class="labelLink" rel="nofollow">' . $__templater->func('prefix', array('classifieds_listing', $__vars['listing'], 'html', '', ), true) . '</a>
						';
		} else {
			$__finalCompiled .= '
						' . $__templater->func('prefix', array('classifieds_listing', $__vars['listing'], 'html', '', ), true) . '
					';
		}
		$__finalCompiled .= '
				';
	}
	$__finalCompiled .= '
				<a href="' . $__templater->func('link', array('classifieds', $__vars['listing'], ), true) . '" class="" data-tp-primary="on">' . $__templater->escape($__vars['listing']['title']) . '</a>
				';
	if ($__templater->method($__vars['listing'], 'canShowPrice', array())) {
		$__finalCompiled .= '
					<span class="label label--primary label--smallest">
						';
		if ($__vars['listing']['price'] > 0) {
			$__finalCompiled .= '
							' . $__templater->filter($__vars['listing']['price'], array(array('currency', array($__vars['listing']['currency'], )),), true) . '
							';
		} else {
			$__finalCompiled .= '
							' . 'Free' . '
						';
		}
		$__finalCompiled .= '
					</span>
				';
	}
	$__finalCompiled .= '
				';
	if ($__vars['listing']['listing_status'] == 'awaiting_payment') {
		$__finalCompiled .= '
						<span class="label label--red label--smallest">
							 ' . 'Awaiting payment' . '
					</span>
				';
	}
	$__finalCompiled .= '
			</div>

			<div class="structItem-minor">
				';
	$__compilerTemp2 = '';
	$__compilerTemp2 .= '
							';
	if ($__vars['extraInfo']) {
		$__compilerTemp2 .= '
								<li>' . $__templater->escape($__vars['extraInfo']) . '</li>
							';
	}
	$__compilerTemp2 .= '
							';
	if ($__vars['chooseName']) {
		$__compilerTemp2 .= '
								<li>' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'name' => $__vars['chooseName'] . '[]',
			'value' => $__vars['listing']['listing_id'],
			'class' => 'js-chooseItem',
			'_type' => 'option',
		))) . '</li>
								';
	} else if ($__vars['allowInlineMod'] AND $__templater->method($__vars['listing'], 'canUseInlineModeration', array())) {
		$__compilerTemp2 .= '
								<li>' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'value' => $__vars['listing']['listing_id'],
			'class' => 'js-inlineModToggle',
			'data-xf-init' => 'tooltip',
			'title' => $__templater->filter('Select for moderation', array(array('for_attr', array()),), false),
			'_type' => 'option',
		))) . '</li>
							';
	}
	$__compilerTemp2 .= '
						';
	if (strlen(trim($__compilerTemp2)) > 0) {
		$__finalCompiled .= '
					<ul class="structItem-extraInfo">
						' . $__compilerTemp2 . '
					</ul>
				';
	}
	$__finalCompiled .= '
				';
	if ($__vars['listing']['listing_state'] == 'deleted') {
		$__finalCompiled .= '
					';
		if ($__vars['extraInfo']) {
			$__finalCompiled .= '<span class="structItem-extraInfo">' . $__templater->escape($__vars['extraInfo']) . '</span>';
		}
		$__finalCompiled .= '

					' . $__templater->callMacro('deletion_macros', 'notice', array(
			'log' => $__vars['listing']['DeletionLog'],
		), $__vars) . '
					';
	} else {
		$__finalCompiled .= '
					<ul class="structItem-parts">
						<li>' . $__templater->func('username_link', array($__vars['listing']['User'], false, array(
			'defaultname' => $__vars['listing']['username'],
		))) . '</li>
						<li class="structItem-startDate"><a href="' . $__templater->func('link', array('classifieds', $__vars['listing'], ), true) . '" rel="nofollow">' . $__templater->func('date_dynamic', array($__vars['listing']['listing_date'], array(
		))) . '</a></li>
						';
		if ((!$__vars['category']) OR $__templater->method($__vars['category'], 'hasChildren', array())) {
			$__finalCompiled .= '
							<li><a href="' . $__templater->func('link', array('classifieds/categories', $__vars['listing']['Category'], ), true) . '">' . $__templater->escape($__vars['listing']['Category']['title']) . '</a></li>
						';
		}
		$__finalCompiled .= '
					</ul>
				';
	}
	$__finalCompiled .= '
			</div>

			';
	if ($__vars['listing']['listing_state'] != 'deleted') {
		$__finalCompiled .= '
				<div class="structItem-listingDescription">' . $__templater->func('snippet', array($__vars['listing']['content'], 150, array('stripBbCode' => true, ), ), true) . '</div>
			';
	}
	$__finalCompiled .= '
		</div>
		<div class="structItem-cell structItem-cell--listingMeta">
			';
	if ($__vars['listing']['expiration_date']) {
		$__finalCompiled .= '
				<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--expiration">
					<dt>' . 'Expires' . '</dt>
					<dd>' . $__templater->func('date_dynamic', array($__vars['listing']['expiration_date'], array(
		))) . '</dd>
				</dl>
			';
	}
	$__finalCompiled .= '
			<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--type">
				<dt>' . 'Type' . '</dt>
				<dd>' . $__templater->escape($__vars['listing']['Type']['title']) . '</dd>
			</dl>
			<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--condition">
				<dt>' . 'Condition' . '</dt>
				<dd>' . $__templater->escape($__vars['listing']['Condition']['title']) . '</dd>
			</dl>
			<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--views">
				<dt>' . 'Views' . '</dt>
				<dd>' . $__templater->filter($__vars['listing']['view_count'], array(array('number', array()),), true) . '</dd>
			</dl>
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
	
' . '

';
	return $__finalCompiled;
}
);