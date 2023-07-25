<?php
// FROM HASH: 977b192fa6c0252c4db7ae2b706bee3e
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if (!$__templater->test($__vars['group'], 'empty', array())) {
		$__finalCompiled .= '
	';
		$__templater->includeCss('snog_groups.less');
		$__finalCompiled .= '

	<div class="block"' . $__templater->func('widget_data', array($__vars['widget'], ), true) . '>
		<div class="block-container">
				<div class="block-body">
					<div class="bannerWidget">
						';
		if ($__vars['group']['groupbanner'] == 'default.png') {
			$__finalCompiled .= '
							<img src="' . $__templater->func('base_url', array('/data/groups/GroupBanners/' . $__vars['group']['groupbanner'], ), true) . '" ><br />
						';
		} else {
			$__finalCompiled .= '
							';
			if ($__vars['group']['Settings']['image'] == 1) {
				$__finalCompiled .= '
								<img class="bannerimg" src="' . $__templater->escape($__templater->method($__vars['group'], 'getBannerImageUrl', array('b', ))) . '" ><br />	
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
			</div>
		</div>
	</div>
';
	}
	return $__finalCompiled;
}
);