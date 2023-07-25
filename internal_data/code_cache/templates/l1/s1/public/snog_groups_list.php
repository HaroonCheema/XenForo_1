<?php
// FROM HASH: 4852b42f997b98716922385f85124837
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ((!$__vars['owned']) AND (!$__vars['memberof'])) {
		$__finalCompiled .= '
	';
		if ($__vars['catname']) {
			$__finalCompiled .= '
		';
			$__templater->pageParams['pageTitle'] = $__templater->preEscaped($__templater->escape($__vars['catname']));
			$__finalCompiled .= '
	';
		} else {
			$__finalCompiled .= '
		';
			$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Groups');
			$__finalCompiled .= '
		';
			if ($__vars['settings']['showdescription']) {
				$__finalCompiled .= '
			';
				$__templater->pageParams['pageDescription'] = $__templater->preEscaped('Groups are groups you create and manage. Something like mini-forums of your own.');
				$__templater->pageParams['pageDescriptionMeta'] = true;
				$__finalCompiled .= '
		';
			}
			$__finalCompiled .= '
	';
		}
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		if ($__vars['owned']) {
			$__finalCompiled .= '
		';
			$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Owned groups');
			$__finalCompiled .= '
	';
		} else {
			$__finalCompiled .= '
		';
			$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Member of groups');
			$__finalCompiled .= '
	';
		}
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	$__templater->setPageParam('section', 'snogGroups');
	$__finalCompiled .= '

';
	$__templater->includeCss('snog_groups.less');
	$__finalCompiled .= '

<div class="block">
	';
	if ($__vars['category']) {
		$__finalCompiled .= '
		' . $__templater->func('page_nav', array(array(
			'page' => $__vars['page'],
			'total' => $__vars['total'],
			'link' => 'groups/category',
			'params' => array('cat' => $__vars['category'], ),
			'wrapperclass' => 'js-filterHide block-outer block-outer--after',
			'perPage' => $__vars['perPage'],
		))) . '
		';
		if ($__vars['showAlpha']) {
			$__finalCompiled .= '
			<div class="block-outer" style="margin-top:5px;">
				<div class="block-outer-main">
					<nav class="pageNavWrapper pageNavWrapper--mixed">
						<div class="pageNav">
							<ul class="pageNav-main">
								<li class="pageNav-page' . (($__vars['alpha'] == 'All') ? ' pageNav-page--current' : '') . '">
									<a href="' . $__templater->func('link', array('groups/category', '', array('cat' => $__vars['category'], ), ), true) . '">' . 'All' . '</a>
								</li>
								';
			if ($__templater->isTraversable($__vars['firstLetters'])) {
				foreach ($__vars['firstLetters'] AS $__vars['firstLetter']) {
					$__finalCompiled .= '
									<li class="pageNav-page' . (($__vars['alpha'] == $__vars['firstLetter']) ? ' pageNav-page--current' : '') . '">
										<a href="' . $__templater->func('link', array('groups/category', '', array('cat' => $__vars['category'], 'alpha' => $__vars['firstLetter'], ), ), true) . '">' . $__templater->escape($__vars['firstLetter']) . '</a>
									</li>
								';
				}
			}
			$__finalCompiled .= '
							</ul>
						</div>
					</nav>
				</div>
			</div>
		';
		}
		$__finalCompiled .= '
	';
	} else if ($__vars['listall']) {
		$__finalCompiled .= '
		' . $__templater->func('page_nav', array(array(
			'page' => $__vars['page'],
			'total' => $__vars['total'],
			'link' => 'groups/listall',
			'wrapperclass' => 'js-filterHide block-outer block-outer--after',
			'perPage' => $__vars['perPage'],
		))) . '
		';
		if ($__vars['showAlpha']) {
			$__finalCompiled .= '
			<div class="block-outer" style="margin-top:5px;">
				<div class="block-outer-main">
					<nav class="pageNavWrapper pageNavWrapper--mixed">
						<div class="pageNav">
							<ul class="pageNav-main">
								<li class="pageNav-page' . (($__vars['alpha'] == 'All') ? ' pageNav-page--current' : '') . '">
									<a href="' . $__templater->func('link', array('groups/listall', ), true) . '">' . 'All' . '</a>
								</li>
								';
			if ($__templater->isTraversable($__vars['firstLetters'])) {
				foreach ($__vars['firstLetters'] AS $__vars['firstLetter']) {
					$__finalCompiled .= '
									<li class="pageNav-page' . (($__vars['alpha'] == $__vars['firstLetter']) ? ' pageNav-page--current' : '') . '">
										<a href="' . $__templater->func('link', array('groups/listall', '', array('alpha' => $__vars['firstLetter'], ), ), true) . '">' . $__templater->escape($__vars['firstLetter']) . '</a>
									</li>
								';
				}
			}
			$__finalCompiled .= '
							</ul>
						</div>
					</nav>
				</div>
			</div>
		';
		}
		$__finalCompiled .= '
	';
	} else {
		$__finalCompiled .= '
		' . $__templater->func('page_nav', array(array(
			'page' => $__vars['page'],
			'total' => $__vars['total'],
			'link' => 'groups',
			'wrapperclass' => 'js-filterHide block-outer block-outer--after',
			'perPage' => $__vars['perPage'],
		))) . '
		';
		if ($__vars['showAlpha']) {
			$__finalCompiled .= '
			<div class="block-outer" style="margin-top:5px;">
				<div class="block-outer-main">
					<nav class="pageNavWrapper pageNavWrapper--mixed">
						<div class="pageNav">
							<ul class="pageNav-main">
								<li class="pageNav-page' . (($__vars['alpha'] == 'All') ? ' pageNav-page--current' : '') . '">
									<a href="' . $__templater->func('link', array('groups', ), true) . '">' . 'All' . '</a>
								</li>
								';
			if ($__templater->isTraversable($__vars['firstLetters'])) {
				foreach ($__vars['firstLetters'] AS $__vars['firstLetter']) {
					$__finalCompiled .= '
									<li class="pageNav-page' . (($__vars['alpha'] == $__vars['firstLetter']) ? ' pageNav-page--current' : '') . '">
										<a href="' . $__templater->func('link', array('groups', '', array('alpha' => $__vars['firstLetter'], ), ), true) . '">' . $__templater->escape($__vars['firstLetter']) . '</a>
									</li>
								';
				}
			}
			$__finalCompiled .= '
							</ul>
						</div>
					</nav>
				</div>
			</div>
		';
		}
		$__finalCompiled .= '
	';
	}
	$__finalCompiled .= '
	
	<div class="block-container">
		<div class="block-body">
			<div class="groups">
				';
	if (!$__templater->test($__vars['groups'], 'empty', array())) {
		$__finalCompiled .= '
					';
		if ($__templater->isTraversable($__vars['groups'])) {
			foreach ($__vars['groups'] AS $__vars['group']) {
				$__finalCompiled .= '
						';
				if (((!$__vars['group']['restricted']) OR ($__vars['group']['restricted'] AND $__templater->func('in_array', array($__vars['group']['groupid'], $__vars['xf']['visitor']['SocialGroups']['groups'], ), false))) OR $__templater->method($__vars['xf']['visitor'], 'hasPermission', array('snogGroups', 'canViewRestricted', ))) {
					$__finalCompiled .= '
							';
					if (((!$__vars['group']['privatehide']) OR ($__vars['group']['privatehide'] AND $__templater->func('in_array', array($__vars['group']['groupid'], $__vars['xf']['visitor']['SocialGroups']['groups'], ), false))) OR $__vars['xf']['visitor']['is_admin']) {
						$__finalCompiled .= '
								<div class="groupBlock">
									';
						if (($__vars['group']['node_id'] AND $__templater->func('in_array', array($__vars['group']['groupid'], $__vars['xf']['visitor']['SocialGroups']['groups'], ), false)) OR ($__vars['group']['node_id'] AND ($__vars['xf']['visitor']['is_admin'] AND $__templater->method($__vars['xf']['visitor'], 'hasAdminPermission', array('snog_socialgroups_admin', ))))) {
							$__finalCompiled .= '
										<a href="' . $__templater->func('link', array('forums', array('node_id' => $__vars['group']['node_id'], 'title' => $__vars['group']['name'], ), ), true) . '" >
										';
							if ($__vars['group']['Settings']['listimage']) {
								$__finalCompiled .= '
											';
								if ($__vars['group']['groupbanner'] == 'default.png') {
									$__finalCompiled .= '
												';
									if ($__vars['group']['Settings']['listimage'] == 1) {
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
									if ($__vars['group']['Settings']['listimage'] == 1) {
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
										';
							}
							$__finalCompiled .= '
										<div class="groupName">' . $__templater->escape($__vars['group']['name']) . '</div></a>
									';
						} else {
							$__finalCompiled .= '
										<a href="' . $__templater->func('link', array('group/info', $__vars['group'], ), true) . '" >
										';
							if ($__vars['group']['Settings']['listimage']) {
								$__finalCompiled .= '
											';
								if ($__vars['group']['groupbanner'] == 'default.png') {
									$__finalCompiled .= '
												';
									if ($__vars['group']['Settings']['listimage'] == 1) {
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
									if ($__vars['group']['Settings']['listimage'] == 1) {
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
										';
							}
							$__finalCompiled .= '
										<div class="groupName">' . $__templater->escape($__vars['group']['name']) . '</div></a>
									';
						}
						$__finalCompiled .= '
								</div>
							';
					}
					$__finalCompiled .= '
						';
				}
				$__finalCompiled .= '
					';
			}
		}
		$__finalCompiled .= '
				';
	} else if (!$__templater->test($__vars['categories'], 'empty', array())) {
		$__finalCompiled .= '
					';
		if ($__templater->isTraversable($__vars['categories'])) {
			foreach ($__vars['categories'] AS $__vars['category']) {
				$__finalCompiled .= '
						<div class="groupBlock">
							<a href="' . $__templater->func('link', array('groups/category', '', array('cat' => $__vars['category']['node_id'], ), ), true) . '" >
							';
				if ($__vars['settings']['listimage'] AND $__vars['category']['image']) {
					$__finalCompiled .= '
								';
					if ($__vars['settings']['listimage'] == 1) {
						$__finalCompiled .= '
									<img src="' . $__templater->escape($__templater->method($__vars['category']['image'], 'getCategoryImageUrl', array('b', ))) . '" ><br />
								';
					} else {
						$__finalCompiled .= '
									<img src="' . $__templater->escape($__templater->method($__vars['category']['image'], 'getCategoryImageUrl', array('a', ))) . '" ><br />
								';
					}
					$__finalCompiled .= '
							';
				} else if ($__vars['settings']['listimage']) {
					$__finalCompiled .= '
								';
					if ($__vars['settings']['listimage'] == 1) {
						$__finalCompiled .= '
									' . $__templater->callback('Snog\\Groups\\Callbacks\\Banner', 'getDefaultGroupBanner', '', array()) . '<br />
								';
					} else {
						$__finalCompiled .= '
									' . $__templater->callback('Snog\\Groups\\Callbacks\\Banner', 'getDefaultGroupAvatar', '', array()) . '<br />
								';
					}
					$__finalCompiled .= '
							';
				}
				$__finalCompiled .= '
							<div class="groupName">' . $__templater->escape($__vars['category']['name']) . '</div></a>
						</div>
					';
			}
		}
		$__finalCompiled .= '
				';
	} else {
		$__finalCompiled .= '
					' . 'No groups found' . '
				';
	}
	$__finalCompiled .= '
			</div>
		</div>
	</div>

	';
	if ($__vars['category']) {
		$__finalCompiled .= '
		' . $__templater->func('page_nav', array(array(
			'page' => $__vars['page'],
			'total' => $__vars['total'],
			'link' => 'groups/category',
			'params' => array('cat' => $__vars['category'], ),
			'wrapperclass' => 'js-filterHide block-outer block-outer--after',
			'perPage' => $__vars['perPage'],
		))) . '
	';
	} else if ($__vars['listall']) {
		$__finalCompiled .= '
		' . $__templater->func('page_nav', array(array(
			'page' => $__vars['page'],
			'total' => $__vars['total'],
			'link' => 'groups/listall',
			'wrapperclass' => 'js-filterHide block-outer block-outer--after',
			'perPage' => $__vars['perPage'],
		))) . '
	';
	} else {
		$__finalCompiled .= '
		' . $__templater->func('page_nav', array(array(
			'page' => $__vars['page'],
			'total' => $__vars['total'],
			'link' => 'groups',
			'wrapperclass' => 'js-filterHide block-outer block-outer--after',
			'perPage' => $__vars['perPage'],
		))) . '
	';
	}
	$__finalCompiled .= '
</div>';
	return $__finalCompiled;
}
);