<?php
// FROM HASH: 6441f61ad982a1ec597b5e6ee6aa7634
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<li class="block-row block-row--separated ' . ($__templater->method($__vars['listing'], 'isIgnored', array()) ? 'is-ignored' : '') . ' js-inlineModContainer" data-author="' . ($__templater->escape($__vars['listing']['User']['username']) ?: $__templater->escape($__vars['listing']['username'])) . '">
	<div class="contentRow ' . ((!$__templater->method($__vars['listing'], 'isVisible', array())) ? 'is-deleted' : '') . '">
		<span class="contentRow-figure">
				';
	if ($__vars['listing']['cover_image_id']) {
		$__finalCompiled .= '
					' . $__templater->func('z61_classifieds_listing_thumbnail', array($__vars['listing'], ), true) . '
				';
	} else {
		$__finalCompiled .= '
					' . $__templater->func('avatar', array($__vars['listing']['User'], 's', false, array(
			'defaultname' => $__vars['listing']['username'],
		))) . '
				';
	}
	$__finalCompiled .= '
		</span>
		<div class="contentRow-main">
			<h3 class="contentRow-title">
				<a href="' . $__templater->func('link', array('classifieds', $__vars['listing'], ), true) . '">' . $__templater->func('prefix', array('classifieds_listing', $__vars['listing'], ), true) . $__templater->func('highlight', array($__vars['listing']['title'], $__vars['options']['term'], ), true) . '</a>
			</h3>

			<div class="contentRow-snippet">' . $__templater->func('snippet', array($__vars['listing']['content'], 300, array('term' => $__vars['options']['term'], 'stripQuote' => true, ), ), true) . '</div>

			<div class="contentRow-minor contentRow-minor--hideLinks">
				<ul class="listInline listInline--bullet">
					';
	if (($__vars['options']['mod'] == 'classifieds_listing') AND $__templater->method($__vars['listing'], 'canUseInlineModeration', array())) {
		$__finalCompiled .= '
						<li>' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'value' => $__vars['listing']['listing_id'],
			'class' => 'js-inlineModToggle',
			'_type' => 'option',
		))) . '</li>
					';
	}
	$__finalCompiled .= '
					<li>' . $__templater->func('username_link', array($__vars['listing']['User'], false, array(
		'defaultname' => $__vars['listing']['username'],
	))) . '</li>
					<li>' . 'Listing' . '</li>
					<li>' . $__templater->func('date_dynamic', array($__vars['listing']['listing_date'], array(
	))) . '</li>
					<li>' . 'Category' . $__vars['xf']['language']['label_separator'] . ' <a href="' . $__templater->func('link', array('classifieds/categories', $__vars['listing']['Category'], ), true) . '">' . $__templater->escape($__vars['listing']['Category']['title']) . '</a></li>
				</ul>
			</div>
		</div>
	</div>
</li>';
	return $__finalCompiled;
}
);