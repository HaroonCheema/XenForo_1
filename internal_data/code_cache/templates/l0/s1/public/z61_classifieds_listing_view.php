<?php
// FROM HASH: 778d2bdf49ddf074e350b766a6fb93dd
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped($__templater->func('prefix', array('classifieds_listing', $__vars['listing'], 'escaped', ), true) . $__templater->escape($__vars['listing']['title']));
	$__finalCompiled .= '

';
	$__vars['descSnippet'] = $__templater->func('snippet', array($__vars['listing']['content'], 250, array('stripBbCode' => true, ), ), false);
	$__finalCompiled .= '
';
	$__templater->includeJs(array(
		'src' => 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js',
	));
	$__finalCompiled .= '

';
	$__templater->inlineJs('
$(\'.owl-carousel\').owlCarousel({
    center: false,
    items:' . $__vars['listing']['attach_count'] . ',
    loop:false,
	autoplayTimeout: 4000,
	autoplay:true,
	autoplayHoverPause:true,
    margin:10
});
');
	$__finalCompiled .= '

';
	$__templater->includeCss('z61_classifieds_slider.less');
	$__finalCompiled .= '
';
	$__templater->includeCss('z61_classifieds_listing_view.less');
	$__finalCompiled .= '

' . $__templater->callMacro('metadata_macros', 'metadata', array(
		'description' => $__vars['descSnippet'],
		'shareUrl' => $__templater->func('link', array('canonical:classifieds', $__vars['listing'], ), false),
		'canonicalUrl' => $__templater->func('link', array('canonical:classifieds', $__vars['listing'], ), false),
	), $__vars) . '

';
	$__compilerTemp1 = '';
	if ($__vars['listing']['last_edit_date'] > 0) {
		$__compilerTemp1 .= '
		"dateModified": "' . $__templater->filter($__templater->func('date', array($__vars['listing']['last_edit_date'], 'c', ), false), array(array('escape', array('json', )),), true) . '",
		';
	}
	$__compilerTemp2 = '';
	if ($__templater->method($__vars['listing'], 'hasViewableDiscussion', array())) {
		$__compilerTemp2 .= '
			"discussionUrl": "' . $__templater->filter($__templater->func('link', array('canonical:threads', $__vars['listing']['Discussion'], ), false), array(array('escape', array('json', )),), true) . '",
		';
	}
	$__templater->setPageParam('ldJsonHtml', '
	<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "CreativeWork",
		"@id": "' . $__templater->filter($__templater->func('link', array('canonical:classifieds', $__vars['listing'], ), false), array(array('escape', array('json', )),), true) . '",
		"headline": "' . $__templater->filter($__vars['listing']['title'], array(array('escape', array('json', )),), true) . '",
		"description": "' . $__templater->filter($__vars['descSnippet'], array(array('escape', array('json', )),), true) . '",
		"dateCreated": "' . $__templater->filter($__templater->func('date', array($__vars['listing']['listing_date'], 'c', ), false), array(array('escape', array('json', )),), true) . '",
		' . $__compilerTemp1 . '
		' . $__compilerTemp2 . '
		"author": {
			"@type": "Person",
			"name": "' . $__templater->filter(($__vars['listing']['User'] ? $__vars['listing']['User']['username'] : $__vars['listing']['username']), array(array('escape', array('json', )),), true) . '"
		}
	}
	</script>
');
	$__finalCompiled .= '

';
	$__compilerTemp3 = $__vars;
	$__compilerTemp3['pageSelected'] = 'overview';
	$__templater->wrapTemplate('z61_classifieds_listing_wrapper', $__compilerTemp3);
	$__finalCompiled .= '

' . $__templater->callMacro('lightbox_macros', 'setup', array(
		'canViewAttachments' => $__templater->method($__vars['listing'], 'canViewAttachments', array()),
	), $__vars) . '

<div class="block block--classifieds">
	<div class="block-container">
<div class="classifieds-wrapper">
		<div class="classifieds-left">
			<div class="classifiedsCoverImage">
				<div class="classifiedsCoverImage-container">
					<div class="classifiedsCoverImage-container-image">
						<img src="' . $__templater->func('link', array('classifieds/cover-image', $__vars['listing'], ), true) . '" />
					</div>
				</div>
			</div>

			<div class="classifieds-featuredImage--icons">
				<div class="lbContainer js-classifiedsDetails"
					 data-xf-init="lightbox"
					 data-lb-id="listing-' . $__templater->escape($__vars['listing']['listing_id']) . '"
					 data-lb-caption-desc="' . ($__vars['listing']['User'] ? $__templater->escape($__vars['listing']['User']['username']) : $__templater->escape($__vars['listing']['username'])) . ' &middot; ' . $__templater->func('date_time', array($__vars['listing']['listing_date'], ), true) . '">

					<div class="js-lbContainer thumbnailCount' . $__templater->filter($__vars['listing']['attach_count'], array(array('raw', array()),), true) . '">
						';
	if ($__vars['listing']['attach_count']) {
		$__finalCompiled .= '
							';
		$__compilerTemp4 = '';
		$__compilerTemp4 .= '
										';
		if ($__templater->isTraversable($__vars['listing']['Attachments'])) {
			foreach ($__vars['listing']['Attachments'] AS $__vars['attachment']) {
				if (!$__templater->method($__vars['listing'], 'isAttachmentEmbedded', array($__vars['attachment'], ))) {
					$__compilerTemp4 .= '
											<ul class="listPlain">
												' . $__templater->callMacro('attachment_macros', 'attachment_list_item', array(
						'attachment' => $__vars['attachment'],
						'canView' => $__templater->method($__vars['listing'], 'canViewAttachments', array()),
					), $__vars) . '
											</ul>
										';
				}
			}
		}
		$__compilerTemp4 .= '
									';
		if (strlen(trim($__compilerTemp4)) > 0) {
			$__finalCompiled .= '
								';
			$__templater->includeCss('attachments.less');
			$__finalCompiled .= '
								<div class="attachmentList-slider owl-carousel">
									' . $__compilerTemp4 . '
								</div>
							';
		}
		$__finalCompiled .= '
						';
	}
	$__finalCompiled .= '
					</div>
				</div>
			</div>
		</div>
		<div class="classifieds-right">
			<dl class="pairs pairs--justified">
				<dt>' . $__templater->escape($__vars['category']['type_phrase']) . '</dt>
				<dd>' . $__templater->escape($__vars['listing']['Type']['title']) . '</dd>
			</dl>
			';
	if ($__vars['listing']['condition_id']) {
		$__finalCompiled .= '
				<dl class="pairs pairs--justified">
					<dt>' . $__templater->escape($__vars['category']['condition_phrase']) . '</dt>
					<dd>' . $__templater->escape($__vars['listing']['Condition']['title']) . '</dd>
				</dl>
			';
	}
	$__finalCompiled .= '
			';
	if ($__templater->method($__vars['listing'], 'canShowPrice', array())) {
		$__finalCompiled .= '
				<dl class="pairs pairs--justified">
					<dt>' . $__templater->escape($__vars['category']['price_phrase']) . '</dt>
					<dd>
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
					</dd>
				</dl>
			';
	}
	$__finalCompiled .= '
			';
	if ($__vars['listing']['expiration_date']) {
		$__finalCompiled .= '
				<dl class="pairs pairs--justified">
					<dt>' . 'Expires' . '</dt>
					<dd>' . $__templater->func('date_dynamic', array($__vars['listing']['expiration_date'], array(
		))) . '</dd>
				</dl>
			';
	}
	$__finalCompiled .= '
			';
	if ((($__vars['listing']['sold_user_id'] > 0) AND (($__vars['listing']['listing_status'] == 'sold') AND $__templater->method($__vars['listing'], 'canViewPurchaseInfo', array())))) {
		$__finalCompiled .= '
				<dl class="pairs pairs--justified">
					<dt>' . 'Purchased by' . '</dt>
					<dd>' . $__templater->func('username_link', array($__vars['listing']['SoldUser'], false, array(
		))) . '</dd>
				</dl>
			';
	}
	$__finalCompiled .= '
		</div>
	</div>
</div>
</div>

';
	$__compilerTemp5 = '';
	$__compilerTemp5 .= '
					' . $__templater->callMacro('z61_classifieds_listing_wrapper_macros', 'action_buttons', array(
		'listing' => $__vars['listing'],
	), $__vars) . '
				';
	if (strlen(trim($__compilerTemp5)) > 0) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-outer">
			<div class="block-outer-opposite">
				' . $__compilerTemp5 . '
			</div>
		</div>
	</div>
';
	}
	$__finalCompiled .= '

<div class="block">
	<div class="block-container">
		<div class="block-body js-listingBody">

			<div class="listingBody">
				<article class="listingBody-main">
					' . $__templater->callMacro('custom_fields_macros', 'custom_fields_view', array(
		'type' => 'classifiedsListings',
		'group' => 'above',
		'onlyInclude' => $__vars['category']['field_cache'],
		'set' => $__vars['listing']['custom_fields'],
		'wrapperClass' => 'listingBody-fields listingBody-fields--before',
	), $__vars) . '

					' . $__templater->func('bb_code', array($__vars['listing']['content'], 'classifieds_listing', $__vars['listing'], ), true) . '

					' . $__templater->callMacro('custom_fields_macros', 'custom_fields_view', array(
		'type' => 'classifiedsListings',
		'group' => 'below',
		'onlyInclude' => $__vars['category']['field_cache'],
		'set' => $__vars['listing']['custom_fields'],
		'wrapperClass' => 'listingBody-fields listingBody-fields--after',
	), $__vars) . '

					';
	$__compilerTemp6 = '';
	$__compilerTemp6 .= '
								';
	$__compilerTemp7 = '';
	$__compilerTemp7 .= '
											' . '
											' . $__templater->func('react', array(array(
		'content' => $__vars['listing'],
		'link' => 'classifieds/react',
		'list' => '< .listingBody | .js-reactionsList',
	))) . '
										';
	if (strlen(trim($__compilerTemp7)) > 0) {
		$__compilerTemp6 .= '
									<div class="actionBar-set actionBar-set--external">
										' . $__compilerTemp7 . '
									</div>
								';
	}
	$__compilerTemp6 .= '

								';
	$__compilerTemp8 = '';
	$__compilerTemp8 .= '
											';
	if ($__templater->method($__vars['listing'], 'canReport', array())) {
		$__compilerTemp8 .= '
												<a href="' . $__templater->func('link', array('classifieds/report', $__vars['listing'], ), true) . '"
												   class="actionBar-action actionBar-action--report" data-xf-click="overlay">' . 'Report' . '</a>
											';
	}
	$__compilerTemp8 .= '

											';
	$__vars['hasActionBarMenu'] = false;
	$__compilerTemp8 .= '
											';
	if ($__templater->method($__vars['listing'], 'canEdit', array())) {
		$__compilerTemp8 .= '
												<a href="' . $__templater->func('link', array('classifieds/edit', $__vars['listing'], ), true) . '"
												   class="actionBar-action actionBar-action--edit actionBar-action--menuItem">' . 'Edit' . '</a>
												';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp8 .= '
											';
	}
	$__compilerTemp8 .= '
											';
	if ($__templater->method($__vars['listing'], 'canDelete', array('soft', ))) {
		$__compilerTemp8 .= '
												<a href="' . $__templater->func('link', array('classifieds/delete', $__vars['listing'], ), true) . '"
												   class="actionBar-action actionBar-action--delete actionBar-action--menuItem"
												   data-xf-click="overlay">' . 'Delete' . '</a>
												';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp8 .= '
											';
	}
	$__compilerTemp8 .= '
											';
	if ($__templater->method($__vars['xf']['visitor'], 'canViewIps', array()) AND $__vars['listing']['ip_id']) {
		$__compilerTemp8 .= '
												<a href="' . $__templater->func('link', array('classifieds/ip', $__vars['listing'], ), true) . '"
												   class="actionBar-action actionBar-action--ip actionBar-action--menuItem"
												   data-xf-click="overlay">' . 'IP' . '</a>
												';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp8 .= '
											';
	}
	$__compilerTemp8 .= '
											';
	if ($__templater->method($__vars['listing'], 'canWarn', array())) {
		$__compilerTemp8 .= '
												<a href="' . $__templater->func('link', array('classifieds/warn', $__vars['listing'], ), true) . '"
												   class="actionBar-action actionBar-action--warn actionBar-action--menuItem">' . 'Warn' . '</a>
												';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp8 .= '
												';
	} else if ($__vars['listing']['warning_id'] AND $__templater->method($__vars['xf']['visitor'], 'canViewWarnings', array())) {
		$__compilerTemp8 .= '
												<a href="' . $__templater->func('link', array('warnings', array('warning_id' => $__vars['listing']['warning_id'], ), ), true) . '"
												   class="actionBar-action actionBar-action--warn actionBar-action--menuItem"
												   data-xf-click="overlay">' . 'View warning' . '</a>
												';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp8 .= '
											';
	}
	$__compilerTemp8 .= '
											' . '
											';
	if ($__vars['hasActionBarMenu']) {
		$__compilerTemp8 .= '
												<a class="actionBar-action actionBar-action--menuTrigger"
												   data-xf-click="menu"
												   title="' . 'More options' . '"
												   role="button"
												   tabindex="0"
												   aria-expanded="false"
												   aria-haspopup="true">&#8226;&#8226;&#8226;</a>

												<div class="menu" data-menu="menu" aria-hidden="true" data-menu-builder="actionBar">
													<div class="menu-content">
														<h4 class="menu-header">' . 'More options' . '</h4>
														<div class="js-menuBuilderTarget"></div>
													</div>
												</div>
											';
	}
	$__compilerTemp8 .= '
										';
	if (strlen(trim($__compilerTemp8)) > 0) {
		$__compilerTemp6 .= '
									<div class="actionBar-set actionBar-set--internal">
										' . $__compilerTemp8 . '
									</div>
								';
	}
	$__compilerTemp6 .= '
							';
	if (strlen(trim($__compilerTemp6)) > 0) {
		$__finalCompiled .= '
						<div class="actionBar">
							' . $__compilerTemp6 . '
						</div>
					';
	}
	$__finalCompiled .= '

					<div class="reactionsBar js-reactionsList ' . ($__vars['listing']['reactions'] ? 'is-active' : '') . '">
						' . $__templater->func('reactions', array($__vars['listing'], 'classifieds/reactions', array())) . '
					</div>

					<div class="js-historyTarget toggleTarget" data-href="trigger-href"></div>
				</article>
			</div>
		</div>
	</div>
</div>

';
	if ($__vars['listing']['listing_location'] AND $__vars['xf']['options']['z61ClassifiedsGoogleApi']) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">
			<div class="block-minorHeader">' . 'Location' . '</div>

			<div class="block-body ">
				<div class="block-row block-row--separated">
					<iframe
							width="100%" height="400px" frameborder="0" style="border: 0"
							src="https://www.google.com/maps/embed/v1/place?key=' . $__templater->escape($__vars['xf']['options']['z61ClassifiedsGoogleApi']) . '&q=' . $__templater->filter($__vars['listing']['listing_location'], array(array('censor', array()),), true) . '">
					</iframe>
				</div>
			</div>
		</div>
	</div>
';
	}
	$__finalCompiled .= '

';
	$__compilerTemp9 = '';
	if ($__vars['listing']['last_edit_date']) {
		$__compilerTemp9 .= '
					<dl class="pairs pairs--justified">
						';
		if ($__vars['listing']['user_id'] == $__vars['listing']['last_edit_user_id']) {
			$__compilerTemp9 .= '
							<dt>' . 'Last edited' . '</dt>
							<dd>' . $__templater->func('date_dynamic', array($__vars['listing']['last_edit_date'], array(
			))) . '</dd>
							';
		} else {
			$__compilerTemp9 .= '
							<dt>' . 'Last edited by a moderator' . '</dt>
							<dd>' . $__templater->func('date_dynamic', array($__vars['listing']['last_edit_date'], array(
			))) . '</dd>
						';
		}
		$__compilerTemp9 .= '
					</dl>
				';
	}
	$__templater->modifySidebarHtml(null, '
	<div class="block">
		<div class="block-container">
			<h3 class="block-minorHeader">' . 'Information' . '</h3>
			<div class="block-body block-row">
				<dl class="pairs pairs--justified">
					<dt>' . 'Author' . '</dt>
					<dd>' . $__templater->func('username_link', array($__vars['listing']['User'], false, array(
		'defaultname' => $__vars['listing']['username'],
	))) . '</dd>
				</dl>
				<dl class="pairs pairs--justified">
					<dt>' . 'Created' . '</dt>
					<dd>' . $__templater->func('date_dynamic', array($__vars['listing']['listing_date'], array(
	))) . '</dd>
				</dl>
				' . $__compilerTemp9 . '
				<dl class="pairs pairs--justified">
					<dt>' . 'Views' . '</dt>
					<dd>' . $__templater->escape($__vars['listing']['view_count']) . '</dd>
				</dl>
			</div>
		</div>
	</div>
', 'replace');
	$__finalCompiled .= '

';
	$__compilerTemp10 = '';
	$__compilerTemp11 = '';
	$__compilerTemp11 .= '
				';
	if ($__templater->method($__vars['listing'], 'hasViewableDiscussion', array())) {
		$__compilerTemp11 .= '
					' . $__templater->button('Join discussion', array(
			'href' => $__templater->func('link', array('threads', $__vars['listing']['Discussion'], ), false),
			'class' => 'button--fullWidth',
		), '', array(
		)) . '
				';
	}
	$__compilerTemp11 .= '
			';
	if (strlen(trim($__compilerTemp11)) > 0) {
		$__compilerTemp10 .= '
		<div class="listingSidebarGroup listingSidebarGroup--buttons">
			' . $__compilerTemp11 . '
		</div>
	';
	}
	$__templater->modifySidebarHtml(null, '
	' . $__compilerTemp10 . '
', 'replace');
	$__finalCompiled .= '

';
	$__compilerTemp12 = '';
	if (!$__templater->test($__vars['authorOthers'], 'empty', array())) {
		$__compilerTemp12 .= '
		<div class="block">
			<div class="block-container">
				<h3 class="block-minorHeader">
					<a href="' . $__templater->func('link', array('classifieds/authors', $__vars['listing']['User'], ), true) . '">' . 'More listings by ' . $__templater->escape($__vars['listing']['User']['username']) . '' . '</a>
				</h3>
				<div class="block-body block-row">
					<ul class="listingSidebarList">
						';
		if ($__templater->isTraversable($__vars['authorOthers'])) {
			foreach ($__vars['authorOthers'] AS $__vars['authorOther']) {
				$__compilerTemp12 .= '
							<li>
								' . $__templater->callMacro('z61_classifieds_listing_list_macros', 'listing_simple', array(
					'listing' => $__vars['authorOther'],
					'withMeta' => false,
				), $__vars) . '
							</li>
						';
			}
		}
		$__compilerTemp12 .= '
					</ul>
				</div>
			</div>
		</div>
	';
	}
	$__templater->modifySidebarHtml(null, '
	' . $__compilerTemp12 . '
', 'replace');
	$__finalCompiled .= '

';
	$__compilerTemp13 = '';
	$__compilerTemp14 = '';
	$__compilerTemp14 .= '
					<h3 class="block-minorHeader">' . 'Share this listing' . '</h3>
					';
	$__compilerTemp15 = '';
	$__compilerTemp15 .= '
								' . $__templater->callMacro('share_page_macros', 'buttons', array(
		'iconic' => true,
	), $__vars) . '
							';
	if (strlen(trim($__compilerTemp15)) > 0) {
		$__compilerTemp14 .= '
						<div class="block-body block-row block-row--separated">
							' . $__compilerTemp15 . '
						</div>
					';
	}
	$__compilerTemp14 .= '

					';
	$__compilerTemp16 = '';
	$__compilerTemp16 .= '
								' . $__templater->callMacro('share_page_macros', 'share_clipboard_input', array(
		'label' => 'Copy URL BB code',
		'text' => '[URL="' . $__templater->func('link', array('canonical:classifieds', $__vars['listing'], ), false) . '"]' . $__vars['listing']['title'] . '[/URL]',
	), $__vars) . '
							';
	if (strlen(trim($__compilerTemp16)) > 0) {
		$__compilerTemp14 .= '
						<div class="block-body block-row block-row--separated">
							' . $__compilerTemp16 . '
						</div>
					';
	}
	$__compilerTemp14 .= '
				';
	if (strlen(trim($__compilerTemp14)) > 0) {
		$__compilerTemp13 .= '
		<div class="block">
			<div class="block-container">
				' . $__compilerTemp14 . '
			</div>
		</div>
	';
	}
	$__templater->modifySidebarHtml('shareSidebar', '
	' . $__compilerTemp13 . '
', 'replace');
	$__finalCompiled .= '

';
	$__templater->modifySidebarHtml('_xfWidgetPositionSidebarb431cab32d4d7a2e328ec5f875c5db24', $__templater->widgetPosition('classifieds_listing_view_sidebar', array(
		'listing' => $__vars['listing'],
	)), 'replace');
	return $__finalCompiled;
}
);