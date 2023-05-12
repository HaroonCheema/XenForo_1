<?php
// FROM HASH: cfb945838b961d477abfbe500f684b54
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if (!$__templater->test($__vars['listings'], 'empty', array())) {
		$__finalCompiled .= '
	<div class="block"' . $__templater->func('widget_data', array($__vars['widget'], ), true) . '>
		<div class="block-container">
			';
		if ($__vars['style'] == 'full') {
			$__finalCompiled .= '
				<h3 class="block-header">
					<a href="' . $__templater->escape($__vars['link']) . '" rel="nofollow">' . ($__templater->escape($__vars['title']) ?: 'z61_classifieds_nearby_listings') . '</a>
				</h3>
				<div class="block-body">
					<div class="structItemContainer">
						';
			if ($__templater->isTraversable($__vars['listings'])) {
				foreach ($__vars['listings'] AS $__vars['listing']) {
					$__finalCompiled .= '
							' . $__templater->callMacro('z61_classifieds_listing_list_macros', 'listing', array(
						'allowInlineMod' => false,
						'listing' => $__vars['listing'],
					), $__vars) . '
						';
				}
			}
			$__finalCompiled .= '
					</div>
				</div>
				';
			if ($__vars['hasMore']) {
				$__finalCompiled .= '
					<div class="block-footer">
						<span class="block-footer-controls">
							' . $__templater->button('View more' . $__vars['xf']['language']['ellipsis'], array(
					'href' => $__vars['link'],
					'rel' => 'nofollow',
				), '', array(
				)) . '
						</span>
					</div>
				';
			}
			$__finalCompiled .= '
			';
		} else {
			$__finalCompiled .= '
				<h3 class="block-minorHeader">
					<a href="' . $__templater->escape($__vars['link']) . '" rel="nofollow">' . ($__templater->escape($__vars['title']) ?: 'z61_classifieds_nearby_listings') . '</a>
				</h3>
				<ul class="block-body">
					';
			if ($__templater->isTraversable($__vars['listings'])) {
				foreach ($__vars['listings'] AS $__vars['listing']) {
					$__finalCompiled .= '
						<li class="block-row">
							' . $__templater->callMacro('z61_classifieds_listing_list_macros', 'listing_simple', array(
						'listing' => $__vars['listing'],
					), $__vars) . '
						</li>
					';
				}
			}
			$__finalCompiled .= '
				</ul>
			';
		}
		$__finalCompiled .= '
		</div>
	</div>
';
	}
	return $__finalCompiled;
}
);