<?php
// FROM HASH: e45e243399e0ab9d2443b59f4eed1083
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->includeCss('snog_groups.less');
	$__finalCompiled .= '

';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Popular groups');
	$__finalCompiled .= '

';
	$__templater->setPageParam('section', 'snogGroups');
	$__finalCompiled .= '

<div class="block">
	<div class="block-container">
		<div class="block-body">
			<div class="groups" style="overflow:hidden;">
				';
	if ($__templater->test($__vars['members'], 'empty', array()) AND ($__templater->test($__vars['threads'], 'empty', array()) AND ($__templater->test($__vars['posts'], 'empty', array()) AND ($__templater->test($__vars['photos'], 'empty', array()) AND $__templater->test($__vars['discussions'], 'empty', array()))))) {
		$__finalCompiled .= '
					' . 'No groups found' . '
				';
	} else {
		$__finalCompiled .= '
					<div class="popholder">
						';
		if (!$__templater->test($__vars['members'], 'empty', array()) AND $__vars['settings']['list']['members']) {
			$__finalCompiled .= '
							<div class="popular">
								<h3 class="block-header popheader">
									' . 'Most members' . '
								</h3>
								';
			if ($__templater->isTraversable($__vars['members'])) {
				foreach ($__vars['members'] AS $__vars['group']) {
					$__finalCompiled .= '
									<div class="groupBlock">
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
													<img src="' . $__templater->func('base_url', array('/data/groups/GroupBanners/default.png', ), true) . '" ><br />
												';
							} else {
								$__finalCompiled .= '
													<img src="' . $__templater->func('base_url', array('/data/groups/GroupBanners/defaultavatar.png', ), true) . '" ><br />
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
									</div>
								';
				}
			}
			$__finalCompiled .= '
							</div>
						';
		}
		$__finalCompiled .= '
						
						';
		if (!$__templater->test($__vars['threads'], 'empty', array()) AND $__vars['settings']['list']['threads']) {
			$__finalCompiled .= '
							<div class="popular">
								<h3 class="block-header popheader">
									' . 'Most threads' . '
								</h3>
		
								';
			if ($__templater->isTraversable($__vars['threads'])) {
				foreach ($__vars['threads'] AS $__vars['group']) {
					$__finalCompiled .= '
									<div class="groupBlock">
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
													<img src="' . $__templater->func('base_url', array('/data/groups/GroupBanners/default.png', ), true) . '" ><br />
												';
							} else {
								$__finalCompiled .= '
													<img src="' . $__templater->func('base_url', array('/data/groups/GroupBanners/defaultavatar.png', ), true) . '" ><br />
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
									</div>
								';
				}
			}
			$__finalCompiled .= '
							</div>
						';
		}
		$__finalCompiled .= '
						
						';
		if (!$__templater->test($__vars['posts'], 'empty', array()) AND $__vars['settings']['list']['posts']) {
			$__finalCompiled .= '
							<div class="popular">
								<h3 class="block-header popheader">
									' . 'Most posts' . '
								</h3>
			
								';
			if ($__templater->isTraversable($__vars['posts'])) {
				foreach ($__vars['posts'] AS $__vars['group']) {
					$__finalCompiled .= '
									<div class="groupBlock">
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
													<img src="' . $__templater->func('base_url', array('/data/groups/GroupBanners/default.png', ), true) . '" ><br />
												';
							} else {
								$__finalCompiled .= '
													<img src="' . $__templater->func('base_url', array('/data/groups/GroupBanners/defaultavatar.png', ), true) . '" ><br />
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
									</div>
								';
				}
			}
			$__finalCompiled .= '
							</div>
						';
		}
		$__finalCompiled .= '
						
						';
		if (!$__templater->test($__vars['photos'], 'empty', array()) AND $__vars['settings']['list']['photos']) {
			$__finalCompiled .= '
							<div class="popular">
								<h3 class="block-header popheader">
									' . 'Most photos' . '
								</h3>
		
								';
			if ($__templater->isTraversable($__vars['photos'])) {
				foreach ($__vars['photos'] AS $__vars['group']) {
					$__finalCompiled .= '
									<div class="groupBlock">
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
													<img src="' . $__templater->func('base_url', array('/data/groups/GroupBanners/default.png', ), true) . '" ><br />
												';
							} else {
								$__finalCompiled .= '
													<img src="' . $__templater->func('base_url', array('/data/groups/GroupBanners/defaultavatar.png', ), true) . '" ><br />
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
									</div>
								';
				}
			}
			$__finalCompiled .= '
							</div>
						';
		}
		$__finalCompiled .= '
															  
						';
		if (!$__templater->test($__vars['discussions'], 'empty', array()) AND $__vars['settings']['list']['discussions']) {
			$__finalCompiled .= '
							<div class="popular">
								<h3 class="block-header popheader">
									' . 'Most discussions' . '
								</h3>
								';
			if ($__templater->isTraversable($__vars['discussions'])) {
				foreach ($__vars['discussions'] AS $__vars['group']) {
					$__finalCompiled .= '
									<div class="groupBlock">
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
													<img src="' . $__templater->func('base_url', array('/data/groups/GroupBanners/default.png', ), true) . '" ><br />
												';
							} else {
								$__finalCompiled .= '
													<img src="' . $__templater->func('base_url', array('/data/groups/GroupBanners/defaultavatar.png', ), true) . '" ><br />
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
									</div>
								';
				}
			}
			$__finalCompiled .= '
							</div>
						';
		}
		$__finalCompiled .= '
					</div>
				';
	}
	$__finalCompiled .= '
			</div>
		</div>
	</div>
</div>';
	return $__finalCompiled;
}
);