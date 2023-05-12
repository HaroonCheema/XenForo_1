<?php
// FROM HASH: 7fd522242885c7824302ddee400fc502
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= 'z61_classifieds_x_sold_listing_y_in_category_z
<div class="contentRow-title">
	' . '' . $__templater->func('username_link', array($__vars['user'], false, array('defaultname' => $__vars['newsFeed']['username'], ), ), true) . '\'s listing ' . ((((('<a href="' . $__templater->func('link', array('classifieds', $__vars['content'], ), true)) . '">') . $__templater->func('prefix', array('classifieds_listing', $__vars['content'], ), true)) . $__templater->escape($__vars['content']['title'])) . '</a>') . ' in ' . (((('<a href="' . $__templater->func('link', array('classifieds/categories', $__vars['content']['Category'], ), true)) . '">') . $__templater->escape($__vars['content']['Category']['title'])) . '</a>') . ' was sold.' . '
</div>

<div class="contentRow-snippet">' . $__templater->func('snippet', array($__vars['content']['content'], $__vars['xf']['options']['newsFeedMessageSnippetLength'], array('stripQuote' => true, ), ), true) . '</div>
';
	if ($__vars['content']['attach_count']) {
		$__finalCompiled .= '
	' . $__templater->callMacro('news_feed_attached_images', 'attached_images', array(
			'attachments' => $__vars['content']['Attachments'],
			'link' => $__templater->func('link', array('classifieds', $__vars['content'], ), false),
		), $__vars) . '
';
	}
	$__finalCompiled .= '

<div class="contentRow-minor">' . $__templater->func('date_dynamic', array($__vars['newsFeed']['event_date'], array(
	))) . '</div>';
	return $__finalCompiled;
}
);