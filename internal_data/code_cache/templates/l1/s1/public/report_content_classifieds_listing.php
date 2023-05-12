<?php
// FROM HASH: 59d5215c39e235b6f4755d6633cf1f2a
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<div class="block-row block-row--separated">
	' . $__templater->func('bb_code', array($__vars['report']['content_info']['listing']['content'], 'classifieds_listing', $__vars['content'], ), true) . '
</div>
<div class="block-row block-row--separated block-row--minor">
	<div>
		<dl class="pairs pairs--inline">
			<dt>' . 'Listing' . '</dt>
			<dd><a href="' . $__templater->func('link', array('classifieds', $__vars['content'], ), true) . '">' . $__templater->escape($__vars['content']['title']) . '</a></dd>
		</dl>
	</div>
	<div>
		<dl class="pairs pairs--inline">
			<dt>' . 'Category' . '</dt>
			<dd><a href="' . $__templater->func('link', array('classifieds/categories', $__vars['report']['content_info']['category'], ), true) . '">' . $__templater->escape($__vars['content']['Category']['title']) . '</a></dd>
		</dl>
	</div>
</div>';
	return $__finalCompiled;
}
);