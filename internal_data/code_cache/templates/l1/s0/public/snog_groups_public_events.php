<?php
// FROM HASH: ce1297130e49eaa5e941cee9e2d67d5b
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Public Events');
	$__finalCompiled .= '

';
	$__templater->includeCss('snog_groups_events.less');
	$__finalCompiled .= '

<div class="block">
	<div class="block-container">
		<div class="block-body">
			<div class="publicholder">
				<div id=\'calendar\'></div>
			</div>
		</div>
	</div>
</div>';
	return $__finalCompiled;
}
);