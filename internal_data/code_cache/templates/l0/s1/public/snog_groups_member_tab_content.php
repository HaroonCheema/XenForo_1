<?php
// FROM HASH: 5670c26ca60f9e076811db260fbcd30c
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->includeCss('snog_groups.less');
	$__finalCompiled .= '

';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped($__templater->escape($__vars['user']['username']));
	$__finalCompiled .= '

<div class="block">
	<div class="block-container">
		<div class="block-body">
			<div class="groups">
			';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
				';
	if ($__vars['groups']) {
		$__compilerTemp1 .= '
					';
		if ($__templater->isTraversable($__vars['groups'])) {
			foreach ($__vars['groups'] AS $__vars['group']) {
				$__compilerTemp1 .= '
							<div class="groupBlock">
								<a href="' . $__templater->func('link', array('group/info', $__vars['group'], ), true) . '" >
								';
				if ($__vars['group']['Settings']['listimage']) {
					$__compilerTemp1 .= '
									';
					if ($__vars['group']['groupbanner'] == 'default.png') {
						$__compilerTemp1 .= '
										';
						if ($__vars['group']['Settings']['listimage'] == 1) {
							$__compilerTemp1 .= '
											<img src="' . $__templater->escape($__templater->method($__vars['group'], 'getBannerImageUrl', array('', ))) . '" ><br />
										';
						} else {
							$__compilerTemp1 .= '
											<img src="' . $__templater->escape($__templater->method($__vars['group'], 'getBannerImageUrl', array('a', ))) . '" ><br />
										';
						}
						$__compilerTemp1 .= '
									';
					} else {
						$__compilerTemp1 .= '
										';
						if ($__vars['group']['Settings']['listimage'] == 1) {
							$__compilerTemp1 .= '
											<img src="' . $__templater->escape($__templater->method($__vars['group'], 'getBannerImageUrl', array('b', ))) . '" ><br />
										';
						} else {
							$__compilerTemp1 .= '
											<img src="' . $__templater->escape($__templater->method($__vars['group'], 'getBannerImageUrl', array('a', ))) . '" ><br />
										';
						}
						$__compilerTemp1 .= '
									';
					}
					$__compilerTemp1 .= '
								';
				}
				$__compilerTemp1 .= '
								<div class="groupName">' . $__templater->escape($__vars['group']['name']) . '</div></a>
							</div>
					';
			}
		}
		$__compilerTemp1 .= '
				';
	}
	$__compilerTemp1 .= '
				';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
				' . $__compilerTemp1 . '
			';
	} else {
		$__finalCompiled .= '
				<div class="block-row block-row--separated">' . '' . $__templater->escape($__vars['user']['username']) . ' has not joined any groups.' . '</div>
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