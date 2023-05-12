<?php
// FROM HASH: 5484ffbb6c3b71a514437af5e70f8dc9
return array(
'macros' => array('header' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'listing' => '!',
		'titleHtml' => null,
		'showMeta' => true,
		'metaHtml' => null,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	';
	$__compilerTemp1 = '';
	if ($__vars['titleHtml'] !== null) {
		$__compilerTemp1 .= '
							' . $__templater->filter($__vars['titleHtml'], array(array('raw', array()),), true) . '
						';
	} else {
		$__compilerTemp1 .= '
							' . $__templater->func('prefix', array('classifieds_listing', $__vars['listing'], ), true) . $__templater->escape($__vars['listing']['title']) . '
						';
	}
	$__compilerTemp2 = '';
	if ($__vars['listing']['listing_status'] == 'sold') {
		$__compilerTemp2 .= '
							<span class="label label--yellow">
								' . 'Sold' . '
							</span>
						';
	}
	$__compilerTemp3 = '';
	$__compilerTemp4 = '';
	$__compilerTemp4 .= '
								' . '
								';
	if ($__templater->method($__vars['listing'], 'isAwaitingPayment', array())) {
		$__compilerTemp4 .= '
									' . $__templater->button('
										' . 'Pay' . $__vars['xf']['language']['ellipsis'] . '
									', array(
			'href' => $__templater->func('link', array('classifieds/pay', $__vars['listing'], ), false),
			'class' => 'button--cta button button--icon',
			'icon' => 'purchase',
			'overlay' => 'true',
		), '', array(
		)) . '
								';
	}
	$__compilerTemp4 .= '
								';
	if (($__vars['xf']['visitor']['user_id'] != $__vars['listing']['user_id']) AND $__templater->method($__vars['listing'], 'canContactOwner', array())) {
		$__compilerTemp4 .= '
									' . $__templater->button('
										' . 'Contact user' . $__vars['xf']['language']['ellipsis'] . '
									', array(
			'href' => $__templater->func('link', array('classifieds/contact', $__vars['listing'], ), false),
			'class' => 'button--cta button button--icon button--icon--write',
			'overlay' => 'true',
		), '', array(
		)) . '
								';
	}
	$__compilerTemp4 .= '
							';
	if (strlen(trim($__compilerTemp4)) > 0) {
		$__compilerTemp3 .= '
						<div class="p-title-pageAction">
							' . $__compilerTemp4 . '
						</div>
					';
	}
	$__compilerTemp5 = '';
	if ($__vars['showMeta']) {
		$__compilerTemp5 .= '
					<div class="p-description">
						';
		if ($__vars['metaHtml'] !== null) {
			$__compilerTemp5 .= '
							' . $__templater->filter($__vars['metaHtml'], array(array('raw', array()),), true) . '
						';
		} else {
			$__compilerTemp5 .= '
							<ul class="listInline listInline--bullet">
								<li>
									<i class="fa fa-user" aria-hidden="true" title="' . $__templater->filter('Author', array(array('for_attr', array()),), true) . '"></i>
									<span class="u-srOnly">' . 'Author' . '</span>

									' . $__templater->func('username_link', array($__vars['listing']['User'], false, array(
				'defaultname' => $__vars['listing']['username'],
				'class' => 'u-concealed',
			))) . '
								</li>
								<li>
									<i class="fa fa-clock-o" aria-hidden="true" title="' . $__templater->filter('Creation date', array(array('for_attr', array()),), true) . '"></i>
									<span class="u-srOnly">' . 'Creation date' . '</span>

									<a href="' . $__templater->func('link', array('classifieds', $__vars['listing'], ), true) . '" class="u-concealed">' . $__templater->func('date_dynamic', array($__vars['listing']['listing_date'], array(
			))) . '</a>
								</li>
								';
			if ($__vars['xf']['options']['enableTagging'] AND ($__templater->method($__vars['listing'], 'canEditTags', array()) OR $__vars['listing']['tags'])) {
				$__compilerTemp5 .= '
									<li>
										<i class="fa fa-tags" aria-hidden="true" title="' . $__templater->filter('Tags', array(array('for_attr', array()),), true) . '"></i>
										<span class="u-srOnly">' . 'Tags' . '</span>

										';
				if ($__vars['listing']['tags']) {
					$__compilerTemp5 .= '
											';
					if ($__templater->isTraversable($__vars['listing']['tags'])) {
						foreach ($__vars['listing']['tags'] AS $__vars['tag']) {
							$__compilerTemp5 .= '
												<a href="' . $__templater->func('link', array('tags', $__vars['tag'], ), true) . '" class="tagItem" dir="auto">' . $__templater->escape($__vars['tag']['tag']) . '</a>
											';
						}
					}
					$__compilerTemp5 .= '
										';
				} else {
					$__compilerTemp5 .= '
											' . 'None' . '
										';
				}
				$__compilerTemp5 .= '
										';
				if ($__templater->method($__vars['listing'], 'canEditTags', array())) {
					$__compilerTemp5 .= '
											<a href="' . $__templater->func('link', array('classifieds/tags', $__vars['listing'], ), true) . '" class="u-concealed" data-xf-click="overlay"
												data-xf-init="tooltip" title="' . $__templater->filter('Edit tags', array(array('for_attr', array()),), true) . '">
												<i class="fa fa-pencil" aria-hidden="true"></i>
												<span class="u-srOnly">' . 'Edit' . '</span>
											</a>
										';
				}
				$__compilerTemp5 .= '
									</li>
								';
			}
			$__compilerTemp5 .= '
								';
			if ($__vars['listing']['Featured']) {
				$__compilerTemp5 .= '
									<li><span class="label label--accent">' . 'Featured' . '</span></li>
								';
			}
			$__compilerTemp5 .= '
							</ul>
						';
		}
		$__compilerTemp5 .= '
					</div>
				';
	}
	$__templater->setPageParam('headerHtml', '
		<div class="contentRow contentRow--hideFigureNarrow">
			<span class="contentRow-figure">
				' . $__templater->func('avatar', array($__vars['listing']['User'], 's', false, array(
	))) . '
			</span>
			<div class="contentRow-main">
				<div class="p-title">
					<h1 class="p-title-value">
						' . $__compilerTemp1 . '
						' . $__compilerTemp2 . '

					</h1>
					' . $__compilerTemp3 . '
				</div>
				' . $__compilerTemp5 . '
			</div>
		</div>
	');
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'status' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'listing' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
				';
	if ($__vars['listing']['listing_state'] == 'deleted') {
		$__compilerTemp1 .= '
					<dd class="blockStatus-message blockStatus-message--deleted">
						' . $__templater->callMacro('deletion_macros', 'notice', array(
			'log' => $__vars['listing']['DeletionLog'],
		), $__vars) . '
					</dd>
				';
	} else if ($__vars['listing']['listing_state'] == 'moderated') {
		$__compilerTemp1 .= '
					<dd class="blockStatus-message blockStatus-message--moderated">
						' . 'Awaiting approval before being displayed publicly.' . '
					</dd>
				';
	}
	$__compilerTemp1 .= '
				';
	if (!$__vars['listing']['listing_open']) {
		$__compilerTemp1 .= '
					<dd class="blockStatus-message blockStatus-message--locked">
						' . 'This listing is closed.' . '
					</dd>
				';
	}
	$__compilerTemp1 .= '
			';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
		<dl class="blockStatus blockStatus--standalone">
			<dt>' . 'Status' . '</dt>
			' . $__compilerTemp1 . '
		</dl>
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'tabs' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'listing' => '!',
		'selected' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
						';
	if ($__templater->method($__vars['listing'], 'hasExtraInfoTab', array())) {
		$__compilerTemp1 .= '
							<a class="tabs-tab ' . (($__vars['selected'] == 'extra') ? 'is-active' : '') . '" href="' . $__templater->func('link', array('classifieds/extra', $__vars['listing'], ), true) . '">' . 'Extra info' . '</a>
						';
	}
	$__compilerTemp1 .= '
						';
	if ($__templater->method($__vars['listing'], 'hasViewableDiscussion', array())) {
		$__compilerTemp1 .= '
							<a class="tabs-tab ' . (($__vars['selected'] == 'discussion') ? 'is-active' : '') . '" href="' . $__templater->func('link', array('threads', $__vars['listing']['Discussion'], ), true) . '">' . 'Discussion' . '</a>
						';
	}
	$__compilerTemp1 .= '
						';
	if ($__vars['listing']['User']['ClassifiedsFeedbackInfo']) {
		$__compilerTemp1 .= '
							<a class="tabs-tab" href="' . $__templater->func('link', array('members/feedback', $__vars['listing']['User'], ), true) . '">' . 'User feedback' . '</a>
						';
	}
	$__compilerTemp1 .= '
					';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
		<div class="tabs tabs--standalone">
			<div class="hScroller" data-xf-init="h-scroller">
				<span class="hScroller-scroll">
					<a class="tabs-tab ' . (($__vars['selected'] == 'overview') ? 'is-active' : '') . '" href="' . $__templater->func('link', array('classifieds', $__vars['listing'], ), true) . '">' . 'Overview' . '</a>
					' . $__compilerTemp1 . '
				</span>
			</div>
		</div>
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'action_buttons' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'listing' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	if ($__templater->method($__vars['listing'], 'canGiveFeedback', array())) {
		$__finalCompiled .= '
		' . $__templater->button('Submit feedback', array(
			'href' => $__templater->func('link', array('classifieds/give-feedback', $__vars['listing'], ), false),
			'overlay' => 'true',
		), '', array(
		)) . '
	';
	}
	$__finalCompiled .= '

	';
	if ($__templater->method($__vars['listing'], 'canMarkSoldOwnListing', array())) {
		$__finalCompiled .= '
		' . $__templater->button('Mark sold', array(
			'href' => $__templater->func('link', array('classifieds/mark-sold', $__vars['listing'], ), false),
			'overlay' => 'true',
		), '', array(
		)) . '
	';
	}
	$__finalCompiled .= '

	';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
			';
	if ($__templater->method($__vars['listing'], 'canUndelete', array()) AND ($__vars['listing']['listing_state'] == 'deleted')) {
		$__compilerTemp1 .= '
				' . $__templater->button('
					' . 'Undelete' . '
				', array(
			'href' => $__templater->func('link', array('classifieds/undelete', $__vars['listing'], ), false),
			'class' => 'button--link',
			'overlay' => 'true',
		), '', array(
		)) . '
			';
	}
	$__compilerTemp1 .= '
			';
	if ($__templater->method($__vars['listing'], 'canApproveUnapprove', array()) AND ($__vars['listing']['listing_state'] == 'moderated')) {
		$__compilerTemp1 .= '
				' . $__templater->button('
					' . 'Approve' . '
				', array(
			'href' => $__templater->func('link', array('classifieds/approve', $__vars['listing'], ), false),
			'class' => 'button--link',
			'overlay' => 'true',
		), '', array(
		)) . '
			';
	}
	$__compilerTemp1 .= '
			';
	if ($__templater->method($__vars['listing'], 'canWatch', array())) {
		$__compilerTemp1 .= '
				';
		$__compilerTemp2 = '';
		if ($__vars['listing']['Watch'][$__vars['xf']['visitor']['user_id']]) {
			$__compilerTemp2 .= '
						' . 'Unwatch' . '
					';
		} else {
			$__compilerTemp2 .= '
						' . 'Watch' . '
					';
		}
		$__compilerTemp1 .= $__templater->button('

					' . $__compilerTemp2 . '
				', array(
			'href' => $__templater->func('link', array('classifieds/watch', $__vars['listing'], ), false),
			'class' => 'button--link',
			'data-xf-click' => 'switch-overlay',
			'data-sk-watch' => 'Watch',
			'data-sk-unwatch' => 'Unwatch',
		), '', array(
		)) . '
			';
	}
	$__compilerTemp1 .= '
			';
	$__compilerTemp3 = '';
	$__compilerTemp3 .= '
					' . $__templater->callMacro('bookmark_macros', 'button', array(
		'content' => $__vars['listing'],
		'confirmUrl' => $__templater->func('link', array('classifieds/bookmark', $__vars['listing'], ), false),
	), $__vars) . '
				';
	if (strlen(trim($__compilerTemp3)) > 0) {
		$__compilerTemp1 .= '
				' . $__compilerTemp3 . '
			';
	}
	$__compilerTemp1 .= '
			';
	$__compilerTemp4 = '';
	$__compilerTemp4 .= '
								<!--[Z61/Classifieds:listing_tools_menu:top]-->
								';
	if ($__templater->method($__vars['listing'], 'canSetCoverImage', array())) {
		$__compilerTemp4 .= '
									<a href="' . $__templater->func('link', array('classifieds/set-cover-image', $__vars['listing'], ), true) . '" data-xf-click="overlay" class="menu-linkRow">' . 'Set cover image' . '</a>
								';
	}
	$__compilerTemp4 .= '
								';
	if ($__templater->method($__vars['listing'], 'canEdit', array())) {
		$__compilerTemp4 .= '
									<a href="' . $__templater->func('link', array('classifieds/edit', $__vars['listing'], ), true) . '" class="menu-linkRow">' . 'Edit listing' . '</a>
								';
	}
	$__compilerTemp4 .= '
								';
	if ($__templater->method($__vars['listing'], 'canClose', array())) {
		$__compilerTemp4 .= '
									<a href="' . $__templater->func('link', array('classifieds/close', $__vars['listing'], ), true) . '" class="menu-linkRow">' . 'Close listing' . '</a>
								';
	}
	$__compilerTemp4 .= '
								';
	if ($__templater->method($__vars['listing'], 'canOpenListing', array())) {
		$__compilerTemp4 .= '
									<a href="' . $__templater->func('link', array('classifieds/open', $__vars['listing'], ), true) . '" class="menu-linkRow">' . 'Open listing' . '</a>
								';
	}
	$__compilerTemp4 .= '
								' . '
								';
	if ($__templater->method($__vars['listing'], 'canMove', array())) {
		$__compilerTemp4 .= '
									<a href="' . $__templater->func('link', array('classifieds/move', $__vars['listing'], ), true) . '" data-xf-click="overlay" class="menu-linkRow">' . 'Move listing' . '</a>
								';
	}
	$__compilerTemp4 .= '
								';
	if ($__templater->method($__vars['listing'], 'canReassign', array())) {
		$__compilerTemp4 .= '
									<a href="' . $__templater->func('link', array('classifieds/reassign', $__vars['listing'], ), true) . '" data-xf-click="overlay" class="menu-linkRow">' . 'Reassign listing' . '</a>
								';
	}
	$__compilerTemp4 .= '
								';
	if ($__templater->method($__vars['listing'], 'canClearSold', array())) {
		$__compilerTemp4 .= '
									<a href="' . $__templater->func('link', array('classifieds/clear-sold', $__vars['listing'], ), true) . '" data-xf-click="overlay" class="menu-linkRow">' . 'Clear sold status' . '</a>
								';
	}
	$__compilerTemp4 .= '
							';
	if ($__templater->method($__vars['listing'], 'canDelete', array('soft', ))) {
		$__compilerTemp4 .= '
									<a href="' . $__templater->func('link', array('classifieds/delete', $__vars['listing'], ), true) . '" data-xf-click="overlay" class="menu-linkRow">' . 'Delete listing' . '</a>
								';
	}
	$__compilerTemp4 .= '
									<!--[Z61/Classifieds:listing_tools_menu:before_footer]-->
								';
	if ($__templater->method($__vars['listing'], 'canUseInlineModeration', array())) {
		$__compilerTemp4 .= '
									<div class="menu-footer"
										data-xf-init="inline-mod"
										data-type="classifieds_listing"
										data-href="' . $__templater->func('link', array('inline-mod', ), true) . '"
										data-toggle=".js-classifiedsListingInlineModToggle">
										' . $__templater->formCheckBox(array(
		), array(array(
			'class' => 'js-classifiedsListingInlineModToggle',
			'value' => $__vars['listing']['listing_id'],
			'label' => 'Select for moderation',
			'_type' => 'option',
		))) . '
									</div>
									';
		$__templater->includeJs(array(
			'src' => 'xf/inline_mod.js',
			'min' => '1',
		));
		$__compilerTemp4 .= '
								';
	}
	$__compilerTemp4 .= '
								<!--[Z61/Classifieds:listing_tools_menu:bottom]-->
							';
	if (strlen(trim($__compilerTemp4)) > 0) {
		$__compilerTemp1 .= '
				<div class="buttonGroup-buttonWrapper">
					' . $__templater->button('&#8226;&#8226;&#8226;', array(
			'class' => 'button--link menuTrigger',
			'data-xf-click' => 'menu',
			'aria-expanded' => 'false',
			'aria-haspopup' => 'true',
			'title' => $__templater->filter('More options', array(array('for_attr', array()),), false),
		), '', array(
		)) . '
					<div class="menu" data-menu="menu" aria-hidden="true">
						<div class="menu-content">
							<h4 class="menu-header">' . 'More options' . '</h4>
							' . $__compilerTemp4 . '
						</div>
					</div>
				</div>
			';
	}
	$__compilerTemp1 .= '
		';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
		<div class="buttonGroup">
		' . $__compilerTemp1 . '
		</div>
	';
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

' . '

' . '

';
	return $__finalCompiled;
}
);