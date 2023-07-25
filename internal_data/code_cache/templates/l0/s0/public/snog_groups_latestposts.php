<?php
// FROM HASH: 9dd0ca295798263babec40b7f417f6fb
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<div class="block"' . $__templater->func('widget_data', array($__vars['widget'], ), true) . '>
	<div class="block-container">
		<div class="block-body">
			<h3 class="block-minorHeader">
				<a href="" rel="nofollow">' . 'Latest posts' . '</a>
			</h3>
			<ul class="block-body">
				';
	if (!$__templater->test($__vars['threads'], 'empty', array())) {
		$__finalCompiled .= '
					';
		if ($__templater->isTraversable($__vars['threads'])) {
			foreach ($__vars['threads'] AS $__vars['thread']) {
				$__finalCompiled .= '
						<li class="block-row">
							<div class="contentRow">
								<div class="contentRow-figure">
									' . $__templater->func('avatar', array($__vars['thread']['LastPoster'], 'xxs', false, array(
					'defaultname' => $__vars['thread']['last_post_username'],
				))) . '
								</div>
								<div class="contentRow-main contentRow-main--close">
									';
				if ($__templater->method($__vars['thread'], 'isUnread', array())) {
					$__finalCompiled .= '
										<a href="' . $__templater->func('link', array('threads/unread', $__vars['thread'], ), true) . '">' . $__templater->func('prefix', array('thread', $__vars['thread'], ), true) . $__templater->escape($__vars['thread']['title']) . '</a>
									';
				} else {
					$__finalCompiled .= '
										<a href="' . $__templater->func('link', array('threads/post', $__vars['thread'], array('post_id' => $__vars['thread']['last_post_id'], ), ), true) . '">' . $__templater->func('prefix', array('thread', $__vars['thread'], ), true) . $__templater->escape($__vars['thread']['title']) . '</a>
									';
				}
				$__finalCompiled .= '

									<div class="contentRow-minor contentRow-minor--hideLinks">
										<ul class="listInline listInline--bullet">
											<li>' . $__templater->escape($__vars['thread']['last_post_cache']['username']) . '</li>
											<li>' . $__templater->func('date_dynamic', array($__vars['thread']['last_post_date'], array(
				))) . '</li>
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
								' . 'There are no new posts' . '
							</div>
						</div>
					</li>
				';
	}
	$__finalCompiled .= '
			</ul>
		</div>
	</div>
</div>';
	return $__finalCompiled;
}
);