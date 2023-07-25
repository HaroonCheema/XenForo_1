<?php
// FROM HASH: 54cc1e59bd7c4648eed7e483c4418d46
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if (!$__templater->test($__vars['group'], 'empty', array())) {
		$__finalCompiled .= '
	';
		$__templater->includeCss('snog_groups.less');
		$__finalCompiled .= '
	';
		if (($__vars['title'] == 'Group widget') OR (!$__vars['rendered'])) {
			$__finalCompiled .= '
		';
			$__vars['title'] = 'Group statistics';
			$__finalCompiled .= '
	';
		}
		$__finalCompiled .= '

	<div class="block"' . $__templater->func('widget_data', array($__vars['widget'], ), true) . '>
		<div class="block-container">
			<div class="block-body">
				<h3 class="block-minorHeader">						
					' . $__templater->escape($__vars['title']) . '
				</h3>
				<div class="block-body block-row">
					<dl class="infoRow">
						<dt>' . 'Members' . ':</dt>
						<dd>' . $__templater->escape($__vars['group']['membercount']) . '</dd>
					</dl>

					';
		if ($__vars['group']['hasforum']) {
			$__finalCompiled .= '
						<dl class="infoRow">
							<dt>' . 'Threads' . ':</dt>
							<dd>' . $__templater->escape($__vars['group']['threadcount']) . '</dd>
						</dl>

						<dl class="infoRow">
							<dt>' . 'Messages' . ':</dt>
							<dd>' . $__templater->escape($__vars['group']['postcount']) . '</dd>
						</dl>
					';
		}
		$__finalCompiled .= '

					';
		if ($__vars['group']['hasdiscussion']) {
			$__finalCompiled .= '
						<dl class="infoRow">
							<dt>' . 'Discussions' . ':</dt>
							<dd>' . $__templater->escape($__vars['group']['discussioncount']) . '</dd>
						</dl>
					';
		}
		$__finalCompiled .= '

					';
		if ($__vars['group']['hasalbum']) {
			$__finalCompiled .= '
						<dl class="infoRow">
							<dt>' . 'Photos' . ':</dt>
							<dd>' . $__templater->escape($__vars['group']['photocount']) . '</dd>
						</dl>
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