<?php
// FROM HASH: a5c769b73187a19160f073d639034338
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<li class="block-row block-row--separated js-inlineModContainer" data-author="' . ($__templater->escape($__vars['post']['User']['username']) ?: $__templater->escape($__vars['post']['username'])) . '">
	<div class="contentRow">
		<span class="contentRow-figure">
			<span class="avatar avatar--s avatar--default">
				
				<img src="' . $__templater->escape($__templater->method($__vars['group'], 'getBannerImageUrl', array('a', ))) . '" >
				</span>
		</span>
		<div class="contentRow-main">
			<h3 class="contentRow-title">
				<a href="' . $__templater->func('link', array('group/info', $__vars['group'], ), true) . '">' . $__templater->func('highlight', array($__vars['group']['name'], $__vars['options']['term'], ), true) . '</a>
			</h3>

			<div class="contentRow-snippet">' . $__templater->func('snippet', array($__vars['group']['groupdescription'], 300, array('term' => $__vars['options']['term'], 'stripQuote' => true, ), ), true) . '</div>
			
			<div class="contentRow-minor contentRow-minor--hideLinks">
				<ul class="listInline listInline--bullet">
					<li>' . 'Group owner' . ': ' . $__templater->func('username_link', array($__vars['group']['Owner'], false, array(
	))) . '</li>
				</ul>
			</div>
		</div>
	</div>
</li>';
	return $__finalCompiled;
}
);