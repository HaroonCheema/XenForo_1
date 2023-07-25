<?php
// FROM HASH: 10945467e97566543a1cf21ae2e3805e
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->includeCss('snog_groups.less');
	$__finalCompiled .= '
	
';
	$__templater->setPageParam('section', 'snogGroups');
	$__finalCompiled .= '

';
	if (!$__vars['group']) {
		$__finalCompiled .= '
    ';
		if ($__vars['forum']['Node']['Group']) {
			$__finalCompiled .= '
        ';
			$__vars['group'] = $__vars['forum']['Node']['Group'];
			$__finalCompiled .= '
    ';
		}
		$__finalCompiled .= '
    ';
		if ($__vars['forum']['Node']['Subforum']['Group']) {
			$__finalCompiled .= '
        ';
			$__vars['group'] = $__vars['forum']['Node']['Subforum']['Group'];
			$__finalCompiled .= '
    ';
		}
		$__finalCompiled .= '
    ';
		if ($__vars['mgcategory']['Group']) {
			$__finalCompiled .= '
        ';
			$__vars['group'] = $__vars['mgcategory']['Group'];
			$__finalCompiled .= '
    ';
		}
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['group'] AND ($__vars['photoPage'] AND $__vars['permissions']['uploadPhoto'])) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	<div class="p-title-pageAction">
		' . $__templater->button('Upload photo', array(
			'href' => $__templater->func('link', array('group_photos/upload', $__vars['group'], ), false),
			'class' => 'button--cta',
			'icon' => 'add',
			'data-xf-click' => 'overlay',
		), '', array(
		)) . '
	</div>
');
	}
	$__finalCompiled .= '

';
	if ($__vars['group'] AND $__vars['photoView']) {
		$__compilerTemp1 = '';
		if ($__vars['photoPrevious']) {
			$__compilerTemp1 .= '
		' . $__templater->button('Previous', array(
				'href' => $__templater->func('link', array('group_photos/view', $__vars['group'], array('photo_id' => $__vars['photoPrevious']['photo_id'], 'myphotos' => $__vars['myphotos'], 'member' => $__vars['member'], ), ), false),
				'class' => 'button button--small button--icon button--icon--previous',
			), '', array(
			)) . '
	';
		}
		$__compilerTemp2 = '';
		if ($__vars['photoNext']) {
			$__compilerTemp2 .= '
		' . $__templater->button('Next', array(
				'href' => $__templater->func('link', array('group_photos/view', $__vars['group'], array('photo_id' => $__vars['photoNext']['photo_id'], 'myphotos' => $__vars['myphotos'], 'member' => $__vars['member'], ), ), false),
				'class' => 'button button--small button--icon button--icon--next',
			), '', array(
			)) . '
	';
		}
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__compilerTemp1 . '
	' . $__compilerTemp2 . '
');
	}
	$__finalCompiled .= '

';
	if ($__vars['group'] AND ($__vars['eventPage'] AND $__vars['permissions']['addEvent'])) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	<div class="p-title-pageAction">
		' . $__templater->button('Add event', array(
			'href' => $__templater->func('link', array('group_events/add', $__vars['group'], ), false),
			'class' => 'button--cta',
			'icon' => 'add',
			'data-xf-click' => 'overlay',
		), '', array(
		)) . '
	</div>
');
	}
	$__finalCompiled .= '

';
	if ($__vars['group'] AND ($__vars['discussionPage'] AND ($__templater->func('in_array', array($__vars['group']['groupid'], $__vars['xf']['visitor']['SocialGroups']['groups'], ), false) OR $__vars['xf']['visitor']['is_super_admin']))) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	<div class="p-title-pageAction">
		' . $__templater->button('Start new discussion', array(
			'href' => $__templater->func('link', array('group_discussions/new', $__vars['group'], ), false),
			'class' => 'button--cta',
			'icon' => 'write',
			'data-xf-click' => 'overlay',
		), '', array(
		)) . '
	</div>
');
	}
	$__finalCompiled .= '

<div class="p-body-main ' . ($__vars['sidebar'] ? 'p-body-main--withSidebar' : '') . ' ' . ($__vars['sideNav'] ? 'p-body-main--withSideNav' : '') . '">
	';
	if ($__vars['sideNav']) {
		$__finalCompiled .= '
		' . $__templater->callAdsMacro('container_sidenav_above', array(), $__vars) . '
		<div class="p-body-sideNav">
			<div class="p-body-sideNavTrigger">
				' . $__templater->button('
					' . ($__templater->escape($__vars['sideNavTitle']) ?: 'Navigation') . '
				', array(
			'class' => 'button--link',
			'data-xf-click' => 'off-canvas',
			'data-menu' => '#js-SideNavOcm',
		), '', array(
		)) . '
			</div>
			<div class="p-body-sideNavInner" data-ocm-class="offCanvasMenu offCanvasMenu--blocks" id="js-SideNavOcm" data-ocm-builder="sideNav">
				<div data-ocm-class="offCanvasMenu-backdrop" data-menu-close="true"></div>
				<div data-ocm-class="offCanvasMenu-content">
					<div class="p-body-sideNavContent">
						';
		if ($__templater->isTraversable($__vars['sideNav'])) {
			foreach ($__vars['sideNav'] AS $__vars['sideNavHtml']) {
				$__finalCompiled .= '
							' . $__templater->escape($__vars['sideNavHtml']) . '
						';
			}
		}
		$__finalCompiled .= '
					</div>
				</div>
			</div>
		</div>
		' . $__templater->callAdsMacro('container_sidenav_below', array(), $__vars) . '
	';
	}
	$__finalCompiled .= '

	<div class="p-body-content">
		<div class="block">
			<div class="block-container">
				<div class="block-body">
					<dl class="headRow">
						';
	if ($__vars['group']['Settings']['sidebar']) {
		$__finalCompiled .= '
							<dt>
								';
		if ($__vars['group']['groupid']) {
			$__finalCompiled .= '
									';
			if ($__vars['group']['Settings']['image']) {
				$__finalCompiled .= '
										<div class="tcenter">
											';
				if ($__vars['group']['groupbanner'] == 'default.png') {
					$__finalCompiled .= '
												';
					if ($__vars['group']['Settings']['image'] == 1) {
						$__finalCompiled .= '
													<img src="' . $__templater->escape($__templater->method($__vars['group'], 'getBannerImageUrl', array('', ))) . '" ><br />
												';
					} else {
						$__finalCompiled .= '
													<img src="' . $__templater->escape($__templater->method($__vars['group'], 'getBannerImageUrl', array('a', ))) . '" ><br />	
												';
					}
					$__finalCompiled .= '
											';
				} else {
					$__finalCompiled .= '
												';
					if ($__vars['group']['Settings']['image'] == 1) {
						$__finalCompiled .= '
													<img src="' . $__templater->escape($__templater->method($__vars['group'], 'getBannerImageUrl', array('b', ))) . '" ><br />	
												';
					} else {
						$__finalCompiled .= '
													<img src="' . $__templater->escape($__templater->method($__vars['group'], 'getBannerImageUrl', array('a', ))) . '" ><br />	
												';
					}
					$__finalCompiled .= '
											';
				}
				$__finalCompiled .= '
										</div>
									';
			}
			$__finalCompiled .= '
						
									';
			if ($__vars['group']['Settings']['statistics']) {
				$__finalCompiled .= '
										' . $__templater->includeTemplate('snog_groups_widget_statistics', $__vars) . '
									';
			}
			$__finalCompiled .= '
							
									';
			if ($__vars['group']['node_id']) {
				$__finalCompiled .= '
										' . $__templater->includeTemplate('snog_groups_widget_latest_posts', $__vars) . '
									';
			}
			$__finalCompiled .= '
								
									';
			if ($__vars['group']['hasalbum'] AND $__vars['group']['Settings']['photos']) {
				$__finalCompiled .= '
										' . $__templater->includeTemplate('snog_groups_widget_photos', $__vars) . '
									';
			}
			$__finalCompiled .= '
							
									';
			if ($__vars['group']['hasevent'] AND $__vars['group']['Settings']['events']) {
				$__finalCompiled .= '
										' . $__templater->includeTemplate('snog_groups_widget_events', $__vars) . '
									';
			}
			$__finalCompiled .= '
								';
		}
		$__finalCompiled .= '
							</dt>
						';
	} else {
		$__finalCompiled .= '
							<dt class="ndisplay"></dt>
						';
	}
	$__finalCompiled .= '

						<dd>
							';
	if ($__vars['group']['groupbanner'] AND $__vars['group']['Settings']['banner']) {
		$__finalCompiled .= '
								';
		if ($__vars['group']['Settings']['banner'] == 1) {
			$__finalCompiled .= '
									';
			$__vars['banner'] = $__templater->method($__vars['group'], 'getBannerImageUrl', array('a', ));
			$__finalCompiled .= '
								';
		}
		$__finalCompiled .= '
					
								';
		if ($__vars['group']['Settings']['banner'] == 2) {
			$__finalCompiled .= '
									';
			if ($__vars['group']['groupbanner'] == 'default.png') {
				$__finalCompiled .= '
										';
				$__vars['banner'] = $__templater->method($__vars['group'], 'getBannerImageUrl', array('', ));
				$__finalCompiled .= '
									';
			} else {
				$__finalCompiled .= '
										';
				$__vars['banner'] = $__templater->method($__vars['group'], 'getBannerImageUrl', array('b', ));
				$__finalCompiled .= '
									';
			}
			$__finalCompiled .= '
								';
		}
		$__finalCompiled .= '
						
								';
		if ($__vars['group']['Settings']['banner'] == 3) {
			$__finalCompiled .= '
									';
			if ($__vars['group']['groupbanner'] == 'default.png') {
				$__finalCompiled .= '
										';
				$__vars['banner'] = $__templater->method($__vars['group'], 'getBannerImageUrl', array('l', ));
				$__finalCompiled .= '
									';
			} else {
				$__finalCompiled .= '
										';
				if (!$__vars['group']['Settings']['original']) {
					$__finalCompiled .= '
											';
					$__vars['banner'] = $__templater->method($__vars['group'], 'getBannerImageUrl', array('f', ));
					$__finalCompiled .= '
										';
				} else {
					$__finalCompiled .= '
											';
					$__vars['banner'] = $__templater->method($__vars['group'], 'getBannerImageUrl', array('o', ));
					$__finalCompiled .= '
										';
				}
				$__finalCompiled .= '
									';
			}
			$__finalCompiled .= '
								';
		}
		$__finalCompiled .= '
						
								<div>
									' . $__templater->callback('Snog\\Groups\\Callbacks\\Banner', 'getLargeBanner', '', array($__vars['banner'], )) . '
								</div>
							';
	}
	$__finalCompiled .= '
					
							<div class="group-p-title">
								<h1 class="group-p-title-value">' . $__templater->escape($__vars['group']['name']) . '</h1>
								';
	$__compilerTemp3 = '';
	$__compilerTemp3 .= (isset($__templater->pageParams['pageAction']) ? $__templater->pageParams['pageAction'] : '');
	if (strlen(trim($__compilerTemp3)) > 0) {
		$__finalCompiled .= '
									<div class="group-p-title-pageAction">' . $__compilerTemp3 . '</div>
								';
	}
	$__finalCompiled .= '
							</div>
					
							';
	if ($__vars['group']['groupid']) {
		$__finalCompiled .= '
								<div class="block-container">
									<h2 class="block-tabHeader tabs hScroller" data-xf-init="h-scroller">
										<span class="hScroller-scroll">
											<a class="tabs-tab ' . (($__vars['infoPage'] == true) ? 'is-active' : '') . '" role="tab" tabindex="0" href="' . $__templater->func('link', array('group/info', $__vars['group'], ), true) . '">' . 'Group information' . '</a>
											';
		if ($__vars['group']['node_id']) {
			$__finalCompiled .= '
												';
			if (((($__vars['group']['postview'] OR $__vars['group']['approval']) OR $__templater->func('in_array', array($__vars['group']['groupid'], $__vars['xf']['visitor']['SocialGroups']['groups'], ), false)) OR ((!$__vars['group']['privategroup']) AND ((!$__vars['group']['privatehide']) AND (!$__vars['group']['approval'])))) OR $__templater->method($__vars['xf']['visitor'], 'hasAdminPermission', array('snog_socialgroups_admin', ))) {
				$__finalCompiled .= '
													<a class="tabs-tab ' . (($__vars['forum']['Node'] == true) ? 'is-active' : '') . '" role="tab" tabindex="0" href="' . $__templater->func('link', array('forums', array('node_id' => $__vars['group']['node_id'], 'title' => $__vars['group']['name'], ), ), true) . '">' . 'Group forum' . '</a>
												';
			}
			$__finalCompiled .= '
											';
		}
		$__finalCompiled .= '

											';
		if ($__vars['group']['hasdiscussion']) {
			$__finalCompiled .= '
												';
			if (($__vars['group']['discussionview'] OR $__templater->func('in_array', array($__vars['group']['groupid'], $__vars['xf']['visitor']['SocialGroups']['groups'], ), false)) OR $__templater->method($__vars['xf']['visitor'], 'hasAdminPermission', array('snog_socialgroups_admin', ))) {
				$__finalCompiled .= '
													<a class="tabs-tab ' . (($__vars['discussionPage'] OR $__vars['discussionView']) ? 'is-active' : '') . '" role="tab" tabindex="0" href="' . $__templater->func('link', array('group_discussions', $__vars['group'], ), true) . '">' . 'Group discussions' . '</a>
												';
			}
			$__finalCompiled .= '
											';
		}
		$__finalCompiled .= '
	
											';
		if ($__vars['group']['hasalbum']) {
			$__finalCompiled .= '
												';
			if (($__vars['group']['albumview'] OR $__templater->func('in_array', array($__vars['group']['groupid'], $__vars['xf']['visitor']['SocialGroups']['groups'], ), false)) OR $__templater->method($__vars['xf']['visitor'], 'hasAdminPermission', array('snog_socialgroups_admin', ))) {
				$__finalCompiled .= '
													<a class="tabs-tab ' . (($__vars['photoPage'] OR $__vars['photoView']) ? 'is-active' : '') . '" role="tab" tabindex="0" href="' . $__templater->func('link', array('group_photos/photolist', $__vars['group'], ), true) . '">' . 'Group photos' . '</a>
												';
			}
			$__finalCompiled .= '
											';
		}
		$__finalCompiled .= '
											
											';
		if ($__vars['group']['hasmedia']) {
			$__finalCompiled .= '
												';
			if ($__templater->func('in_array', array($__vars['group']['groupid'], $__vars['xf']['visitor']['SocialGroups']['groups'], ), false) OR $__templater->method($__vars['xf']['visitor'], 'hasAdminPermission', array('snog_socialgroups_admin', ))) {
				$__finalCompiled .= '
													<a class="tabs-tab ' . ($__vars['mgcategory'] ? 'is-active' : '') . '" role="tab" tabindex="0" href="' . $__templater->func('link', array('media/categories', $__vars['group']['Media'], ), true) . '">Group media</a>
												';
			}
			$__finalCompiled .= '
											';
		}
		$__finalCompiled .= '
								
											';
		if ($__vars['group']['hasevent']) {
			$__finalCompiled .= '
												';
			if (($__vars['group']['eventview'] OR $__templater->func('in_array', array($__vars['group']['groupid'], $__vars['xf']['visitor']['SocialGroups']['groups'], ), false)) OR $__templater->method($__vars['xf']['visitor'], 'hasAdminPermission', array('snog_socialgroups_admin', ))) {
				$__finalCompiled .= '
													<a class="tabs-tab ' . ($__vars['eventPage'] ? 'is-active' : '') . '" role="tab" tabindex="0" href="' . $__templater->func('link', array('group_events', $__vars['group'], ), true) . '">' . 'Group events' . '</a>
												';
			}
			$__finalCompiled .= '
											';
		}
		$__finalCompiled .= '
							
											';
		if ((((!$__vars['group']['privategroup']) AND (!$__vars['group']['privatehide'])) OR $__templater->func('in_array', array($__vars['group']['groupid'], $__vars['xf']['visitor']['SocialGroups']['groups'], ), false)) OR $__templater->method($__vars['xf']['visitor'], 'hasAdminPermission', array('snog_socialgroups_admin', ))) {
			$__finalCompiled .= '
												<a class="tabs-tab ' . ($__vars['memberPage'] ? 'is-active' : '') . '" role="tab" tabindex="0" href="' . $__templater->func('link', array('group/members', $__vars['group'], ), true) . '">' . 'Group members' . '</a>
											';
		}
		$__finalCompiled .= '
								
											';
		if (($__vars['xf']['visitor']['user_id'] == $__vars['group']['owner_id']) OR $__templater->method($__vars['xf']['visitor'], 'hasAdminPermission', array('snog_socialgroups_admin', ))) {
			$__finalCompiled .= '
												<a class="tabs-tab" data-xf-click="menu" role="tab" tabindex="0">' . 'Owner tools' . '</a>
												<div class="menu menu--potentialFixed" data-menu="menu" aria-hidden="true" data-load-target=".js-ownerMenuBody">
													<div class="menu-content js-ownerMenuBody">
														<ol class="listPlain">
															<li class="menu-row menu-row--separated menu-row--clickable">
																<div class="fauxBlockLink">
																	<div class="contentRow">
																		<div class="contentRow-main contentRow-main==close">
																			<div class="menu-row"><a class="fauxBlockLink-blockLink" href="' . $__templater->func('link', array('group/edit', $__vars['group'], ), true) . '">' . 'Edit group' . '</a></div>			
																		</div>																												
																	</div>
																</div>
															</li>
													
															';
			if ($__vars['group']['node_id'] AND ($__templater->method($__vars['xf']['visitor'], 'hasPermission', array('snogGroups', 'canCreateSubforum', )) OR $__vars['xf']['visitor']['is_admin'])) {
				$__finalCompiled .= '
																';
				if (($__vars['group']['subforums'] < $__vars['group']['Settings']['maxsub']) OR $__vars['xf']['visitor']['is_admin']) {
					$__finalCompiled .= '
																	<li class="menu-row menu-row--separated menu-row--clickable">
																		<div class="fauxBlockLink">
																			<div class="contentRow">
																				<div class="contentRow-main contentRow-main==close">
																					<div class="menu-row"><a class="fauxBlockLink-blockLink" href="' . $__templater->func('link', array('group/subforum', $__vars['group'], ), true) . '" data-xf-click="overlay">' . 'Create sub-forum' . '</a></div>			
																				</div>																												
																			</div>
																		</div>
																	</li>
																';
				}
				$__finalCompiled .= '
													
																';
				if ($__vars['group']['subforums']) {
					$__finalCompiled .= '
																	<li class="menu-row menu-row--separated menu-row--clickable">
																		<div class="fauxBlockLink">
																			<div class="contentRow">
																				<div class="contentRow-main contentRow-main==close">
																					<div class="menu-row"><a class="fauxBlockLink-blockLink" href="' . $__templater->func('link', array('group/selectforum', $__vars['group'], ), true) . '" data-xf-click="overlay">' . 'Edit sub-forum' . '</a></div>			
																				</div>																												
																			</div>
																		</div>
																	</li>
																	';
					if ($__vars['group']['subforums'] > 1) {
						$__finalCompiled .= '
																		<li class="menu-row menu-row--separated menu-row--clickable">
																			<div class="fauxBlockLink">
																				<div class="contentRow">
																					<div class="contentRow-main contentRow-main==close">
																						<div class="menu-row"><a class="fauxBlockLink-blockLink" href="' . $__templater->func('link', array('group/sortforums', $__vars['group'], ), true) . '" data-xf-click="overlay">' . 'Sort sub-forums' . '</a></div>			
																					</div>																												
																				</div>
																			</div>
																		</li>
																	';
					}
					$__finalCompiled .= '
																';
				}
				$__finalCompiled .= '
															';
			}
			$__finalCompiled .= '
													
															<li class="menu-row menu-row--separated menu-row--clickable">
																<div class="fauxBlockLink">
																	<div class="contentRow">
																		<div class="contentRow-main contentRow-main==close">
																			<div class="menu-row"><a class="fauxBlockLink-blockLink" href="' . $__templater->func('link', array('group/transfer', $__vars['group'], ), true) . '" data-xf-click="overlay">' . 'Transfer ownership' . '</a></div>			
																		</div>																												
																	</div>
																</div>
															</li>
													
															<li class="menu-row menu-row--separated menu-row--clickable">
																<div class="fauxBlockLink">
																	<div class="contentRow">
																		<div class="contentRow-main contentRow-main==close">
																			<div class="menu-row"><a class="fauxBlockLink-blockLink" href="' . $__templater->func('link', array('group/banner', $__vars['group'], ), true) . '" data-xf-click="overlay">' . 'Upload banner' . '</a></div>			
																		</div>																												
																	</div>
																</div>
															</li>
													
															';
			if ($__templater->method($__vars['xf']['visitor'], 'hasAdminPermission', array('snog_socialgroups_admin', ))) {
				$__finalCompiled .= '
																<h3 class="menu-header">' . 'Admins Only' . '</h3>
													
																<li class="menu-row menu-row--separated menu-row--clickable">
																	<div class="fauxBlockLink">
																		<div class="contentRow">
																			<div class="contentRow-main contentRow-main==close">
																				<div class="menu-row"><a class="fauxBlockLink-blockLink" href="' . $__templater->func('link', array('group/admingroup', $__vars['group'], ), true) . '" data-xf-click="overlay">' . 'Delete group' . '</a></div>			
																			</div>																												
																		</div>
																	</div>
																</li>

																';
				if ($__vars['group']['hasdiscussion']) {
					$__finalCompiled .= '
																	<li class="menu-row menu-row--separated menu-row--clickable">
																		<div class="fauxBlockLink">
																			<div class="contentRow">
																				<div class="contentRow-main contentRow-main==close">
																					<div class="menu-row"><a class="fauxBlockLink-blockLink" href="' . $__templater->func('link', array('group/admindiscussion', $__vars['group'], ), true) . '" data-xf-click="overlay">' . 'Delete group discussions' . '</a></div>			
																				</div>																												
																			</div>
																		</div>
																	</li>
																';
				}
				$__finalCompiled .= '
																
																';
				if ($__vars['group']['hasalbum']) {
					$__finalCompiled .= '
																	<li class="menu-row menu-row--separated menu-row--clickable">
																		<div class="fauxBlockLink">
																			<div class="contentRow">
																				<div class="contentRow-main contentRow-main==close">
																					<div class="menu-row"><a class="fauxBlockLink-blockLink" href="' . $__templater->func('link', array('group/adminphoto', $__vars['group'], ), true) . '" data-xf-click="overlay">' . 'Delete group photos' . '</a></div>			
																				</div>																												
																			</div>
																		</div>
																	</li>
																';
				}
				$__finalCompiled .= '
																
																';
				if ($__vars['group']['hasmedia'] AND $__vars['group']['media_id']) {
					$__finalCompiled .= '
																	<li class="menu-row menu-row--separated menu-row--clickable">
																		<div class="fauxBlockLink">
																			<div class="contentRow">
																				<div class="contentRow-main contentRow-main==close">
																					<div class="menu-row"><a class="fauxBlockLink-blockLink" href="' . $__templater->func('link', array('group/adminmedia', $__vars['group'], ), true) . '" data-xf-click="overlay">' . 'Delete group media' . '</a></div>			
																				</div>																												
																			</div>
																		</div>
																	</li>
																';
				}
				$__finalCompiled .= '
																
																';
				if ($__vars['group']['node_id']) {
					$__finalCompiled .= '
																	<li class="menu-row menu-row--separated menu-row--clickable">
																		<div class="fauxBlockLink">
																			<div class="contentRow">
																				<div class="contentRow-main contentRow-main==close">
																					<div class="menu-row"><a class="fauxBlockLink-blockLink" href="' . $__templater->func('link', array('group/adminforum', $__vars['group'], ), true) . '" data-xf-click="overlay">' . 'Delete main group forum' . '</a></div>			
																				</div>																												
																			</div>
																		</div>
																	</li>

																	';
					if ($__vars['group']['subforums']) {
						$__finalCompiled .= '
																		<li class="menu-row menu-row--separated menu-row--clickable">
																			<div class="fauxBlockLink">
																				<div class="contentRow">
																					<div class="contentRow-main contentRow-main==close">
																						<div class="menu-row"><a class="fauxBlockLink-blockLink" href="' . $__templater->func('link', array('group/selectforum', $__vars['group'], array('d' => '2', ), ), true) . '" data-xf-click="overlay">' . 'Delete group sub-forum' . '</a></div>			
																					</div>																												
																				</div>
																			</div>
																		</li>
																	';
					}
					$__finalCompiled .= '
																';
				}
				$__finalCompiled .= '
															';
			}
			$__finalCompiled .= '
														</ol>
													</div>
												</div>
											';
		}
		$__finalCompiled .= '
										</span>
									</h2>

									';
		if ($__vars['photoPage']) {
			$__finalCompiled .= '
										<a href="' . $__templater->func('link', array('group_photos/myphotos', $__vars['group'], ), true) . '" class="menuLink" >' . 'My photos' . '</a>
									';
		}
		$__finalCompiled .= '
				
									';
		if ($__vars['memberPage'] AND (($__vars['group']['owner_id'] == $__vars['xf']['visitor']['user_id']) OR $__vars['xf']['visitor']['is_admin'])) {
			$__finalCompiled .= '
										<a href="' . $__templater->func('link', array('group/searchmembers', $__vars['group'], ), true) . '" class="menuLink" data-xf-click="overlay">' . 'Search members' . '</a>
										<a href="' . $__templater->func('link', array('group/invite', $__vars['group'], ), true) . '" class="menuLink" data-xf-click="overlay">' . 'Invite member' . '</a>
										<a href="' . $__templater->func('link', array('group/moderator', $__vars['group'], ), true) . '" class="menuLink" data-xf-click="overlay">' . 'Add moderator' . '</a>
										<a href="' . $__templater->func('link', array('group/removemoderator', $__vars['group'], ), true) . '" class="menuLink" data-xf-click="overlay">' . 'Remove moderator' . '</a>
									';
		}
		$__finalCompiled .= '
								</div>
							';
	}
	$__finalCompiled .= '
					
							';
	if ($__vars['forum']['Node']['Group'] OR $__vars['forum']['Node']['Subforum']) {
		$__finalCompiled .= '
								';
		if ($__vars['h1']->{'value'} !== $__vars['group']['name']) {
			$__finalCompiled .= '
									<h1 class="p-title-value">' . $__templater->escape($__vars['h1']) . '</h1>
								';
		}
		$__finalCompiled .= '
						
								<div style="margin-top:10px;">
								' . $__templater->callAdsMacro('container_content_above', array(), $__vars) . '
								<div class="mainframe">
									<div class="p-body-pageContent">
										';
		$__vars['group'] = $__vars['group'];
		$__finalCompiled .= '
										' . $__templater->filter($__vars['content'], array(array('raw', array()),), true) . '
									</div>
								</div>
								' . $__templater->callAdsMacro('container_content_below', array(), $__vars) . '
								</div>
							';
	} else {
		$__finalCompiled .= '
								';
		if ($__vars['mgcategory']['Group']['media_id']) {
			$__finalCompiled .= '
									';
			if ($__vars['h1']->{'value'} !== $__vars['group']['name']) {
				$__finalCompiled .= '
										<h1 class="p-title-value">' . $__templater->escape($__vars['h1']) . '</h1>
									';
			}
			$__finalCompiled .= '

									<div style="margin-top:10px;">
										' . $__templater->callAdsMacro('container_content_above', array(), $__vars) . '
										<div class="mainframe">
											<div class="p-body-pageContent">
												';
			$__vars['group'] = $__vars['group'];
			$__finalCompiled .= '
												' . $__templater->filter($__vars['content'], array(array('raw', array()),), true) . '
											</div>
										</div>
										' . $__templater->callAdsMacro('container_content_below', array(), $__vars) . '
									</div>
								';
		} else {
			$__finalCompiled .= '	
									';
			if (!$__vars['editPage']) {
				$__finalCompiled .= '
										<div style="margin-top:10px;">
											';
				if ($__vars['group']) {
					$__finalCompiled .= '
												' . $__templater->callAdsMacro('container_content_above', array(), $__vars) . '
											';
				}
				$__finalCompiled .= '
											';
				if ($__vars['infoPage']) {
					$__finalCompiled .= $__templater->includeTemplate('snog_groups_detail', $__vars);
				}
				$__finalCompiled .= '
											';
				if ($__vars['photoPage']) {
					$__finalCompiled .= $__templater->includeTemplate('snog_groups_photos', $__vars);
				}
				$__finalCompiled .= '
											';
				if ($__vars['photoView']) {
					$__finalCompiled .= $__templater->includeTemplate('snog_groups_photo_view', $__vars);
				}
				$__finalCompiled .= '
											';
				if ($__vars['eventPage']) {
					$__finalCompiled .= $__templater->includeTemplate('snog_groups_events', $__vars);
				}
				$__finalCompiled .= '
											';
				if ($__vars['memberPage']) {
					$__finalCompiled .= $__templater->includeTemplate('snog_groups_members', $__vars);
				}
				$__finalCompiled .= '
											';
				if ($__vars['discussionPage']) {
					$__finalCompiled .= $__templater->includeTemplate('snog_groups_discussion_list', $__vars);
				}
				$__finalCompiled .= '
											';
				if ($__vars['discussionView']) {
					$__finalCompiled .= $__templater->includeTemplate('snog_groups_discussion_view', $__vars);
				}
				$__finalCompiled .= '
											' . $__templater->callAdsMacro('container_content_below', array(), $__vars) . '
										</div>
									';
			} else {
				$__finalCompiled .= '
										';
				if ($__vars['editPage']) {
					$__finalCompiled .= $__templater->includeTemplate('snog_groups_edit', $__vars);
				}
				$__finalCompiled .= '
									';
			}
			$__finalCompiled .= '
								';
		}
		$__finalCompiled .= '
							';
	}
	$__finalCompiled .= '
						</dd>
					</dl>
				</div>
			</div>
		</div>
	</div>

	';
	if ($__vars['sidebar']) {
		$__finalCompiled .= '
    	<div class="p-body-sidebar">
        	' . $__templater->callAdsMacro('container_sidebar_above', array(), $__vars) . '
            	';
		if ($__templater->isTraversable($__vars['sidebar'])) {
			foreach ($__vars['sidebar'] AS $__vars['sidebarHtml']) {
				$__finalCompiled .= '
                	' . $__templater->escape($__vars['sidebarHtml']) . '
                ';
			}
		}
		$__finalCompiled .= '
                ' . $__templater->callAdsMacro('container_sidebar_below', array(), $__vars) . '
        </div>
    ';
	}
	$__finalCompiled .= '
</div>';
	return $__finalCompiled;
}
);