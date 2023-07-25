<?php
// FROM HASH: dab512fa017bffa6ec9b256f5927cbd7
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<div class="block">
	<div class="block-container">
		<h3 class="block-minorHeader">
			<a href="" rel="nofollow">' . 'Group events' . '</a>
		</h3>
		<ul class="block-body">
			';
	if (!$__templater->test($__vars['events'], 'empty', array())) {
		$__finalCompiled .= '
			';
		if ($__templater->isTraversable($__vars['events'])) {
			foreach ($__vars['events'] AS $__vars['event']) {
				$__finalCompiled .= '
				<li class="block-row">
					<div class="contentRow">
						<div class="contentRow-main contentRow-main--close">
							<a href="' . $__templater->func('link', array('group_events/view', $__vars['group'], array('id' => $__vars['event']['event_id'], ), ), true) . '" data-xf-click="overlay">' . $__templater->escape($__vars['event']['title']) . '</a>
							<div class="contentRow-minor contentRow-minor--hideLinks">
								<ul class="listInline listInline--bullet">
									';
				if ($__vars['event']['start'] >= $__vars['timenow']) {
					$__finalCompiled .= '
										<li>' . 'Starts:' . ' ' . $__templater->func('date_dynamic', array($__vars['event']['start'], array(
					))) . '</li>
									';
				} else {
					$__finalCompiled .= '
										<li>' . 'Started:' . ' ' . $__templater->func('date_dynamic', array($__vars['event']['start'], array(
					))) . '<br />
										';
					if (!$__vars['event']['allDay']) {
						$__finalCompiled .= '
											' . 'Ends:' . ' ' . $__templater->func('date_dynamic', array($__vars['event']['end'], array(
						))) . '
										';
					} else {
						$__finalCompiled .= '
											' . 'Ends: Midnight' . '
										';
					}
					$__finalCompiled .= '
										</li>
									';
				}
				$__finalCompiled .= '
								</ul>
							</div>
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
						' . 'There are no events for this group' . '
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