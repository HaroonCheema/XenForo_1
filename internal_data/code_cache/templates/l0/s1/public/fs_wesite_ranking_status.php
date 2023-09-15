<?php
// FROM HASH: 1d23be1f72984c634c733e81935d2f0d
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->includeCss('fs_wesite_ranking_status_css.less');
	$__finalCompiled .= '
<div class="block bestuser">
	<div class="block-container block-cont">
		<div class="block-header">
			' . 'Total Complaint Resolution : ' . ' ' . $__templater->escape($__vars['siteStatus']['totalPercen']) . ' %
		</div>
		<div class="block-body">
			<div class="block-container">
				<div class="block-header">
					';
	if ($__vars['siteStatus']['highPercen'] != 0) {
		$__finalCompiled .= '
						<a href="' . $__templater->func('link', array('forums', $__vars['siteStatus']['highPercenNode'], ), true) . '">
							' . $__templater->escape($__vars['siteStatus']['highPercenNode']['title']) . '
						</a>
						';
	} else {
		$__finalCompiled .= '
						' . 'None' . ' 
					';
	}
	$__finalCompiled .= '
				</div>
				<div class="block-body body-pad">
					<ul>
						<li> ' . 'Highest Complaint Resolution :' . '  ' . $__templater->escape($__vars['siteStatus']['highPercen']) . ' %</li>
					</ul>
				</div>
			</div>

			<div class="block-container">
				<div class="block-header">
					<a href="' . $__templater->func('link', array('forums', $__vars['siteStatus']['lowPercenNode'], ), true) . '">
						' . $__templater->escape($__vars['siteStatus']['lowPercenNode']['title']) . '
					</a>
				</div>
				<div class="block-body body-pad">
					<ul>
						<li> ' . 'Lowest Complaint Resolution :' . '  ' . $__templater->escape($__vars['siteStatus']['lowPercen']) . ' %</li>
					</ul>
				</div>
			</div>

			<div class="block-container">
				<div class="block-header">
					<a href="' . $__templater->func('link', array('forums', $__vars['siteStatus']['nodeMostComplains'], ), true) . '">
						' . $__templater->escape($__vars['siteStatus']['nodeMostComplains']['title']) . '
					</a>
				</div>
				<div class="block-body body-pad">
					<ul>
						<li> ' . 'Most Complaints :' . '  ' . $__templater->escape($__vars['siteStatus']['mostcomplains']) . '</li>
					</ul>
				</div>
			</div>

		</div>
	</div>
</div>';
	return $__finalCompiled;
}
);