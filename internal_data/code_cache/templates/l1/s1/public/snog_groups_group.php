<?php
// FROM HASH: e742f81633eefbc7f9a3d04ade095085
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped($__templater->escape($__vars['name']));
	$__finalCompiled .= '

';
	if ((!$__vars['group']['groupid']) AND $__vars['editPage']) {
		$__finalCompiled .= '
	';
		$__vars['group']['name'] = 'New Group';
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">
			<div class="block-body">
				';
		$__templater->includeJs(array(
			'src' => 'Snog/Groups/snogform.min.js',
		));
		$__finalCompiled .= '
				' . $__templater->includeTemplate('snog_groups_edit', $__vars) . '
			</div>
		</div>
	</div>
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->breadcrumbs($__templater->method($__vars['group'], 'getCategoryBreadcrumb', array()));
		$__finalCompiled .= '	
	';
		$__templater->modifySideNavHtml('_xfWidgetPositionSideNavfdf7f184543d707b31734b94b89f3590', $__templater->widgetPosition('snogGroupSidenav', array(
			'group' => $__vars['group'],
		)), 'replace');
		$__finalCompiled .= '
	';
		$__templater->modifySidebarHtml('_xfWidgetPositionSidebar81c4ed9067aed0e6bcf5e132cec49e3a', $__templater->widgetPosition('snogGroupSidebar', array(
			'group' => $__vars['group'],
		)), 'replace');
		$__finalCompiled .= '
';
	}
	return $__finalCompiled;
}
);