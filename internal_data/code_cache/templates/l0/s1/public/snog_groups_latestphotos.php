<?php
// FROM HASH: 9fe529077696e4b07bbb146847a434a5
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<div class="block">
	<div class="block-container">
		<h3 class="block-minorHeader">
			' . 'Latest photos' . '
		</h3>
		<ul class="block-body">
			';
	if (!$__templater->test($__vars['newPhotos'], 'empty', array())) {
		$__finalCompiled .= '
			';
		if ($__templater->isTraversable($__vars['newPhotos'])) {
			foreach ($__vars['newPhotos'] AS $__vars['photo']) {
				$__finalCompiled .= '
				<li class="block-row">
					<div class="contentRow">
						<div class="contentRow-main contentRow-main--close">
							<a href="' . $__templater->func('link', array('group_photos/view', $__vars['group'], array('photo_id' => $__vars['photo']['photo_id'], ), ), true) . '">' . $__templater->escape($__vars['photo']['title']) . '</a>
						</div>
					</div>
				</li>
			';
			}
		}
		$__finalCompiled .= '
			';
	} else {
		$__finalCompiled .= '
			<li class="block-row">
				<div class="contentRow">
					<div class="contentRow-minor contentRow-minor--hideLinks">
						' . 'There are no photos in this group' . '
					</div>
				</div>
			</li>
		';
	}
	$__finalCompiled .= '
		</ul>
	</div>
</div>';
	return $__finalCompiled;
}
);