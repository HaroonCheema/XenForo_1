<?php
// FROM HASH: f5b0a4670eb501fb290760fcb0a0ba6a
return array(
'macros' => array('go_listing_bar' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'listing' => '!',
		'watchType' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	<table cellpadding="10" cellspacing="0" border="0" width="100%" class="linkBar">
	<tr>
		<td>
			<a href="' . $__templater->func('link', array('canonical:classifieds', $__vars['listing'], ), true) . '" class="button">' . 'classifieds_view_this_listing' . '</a>
		</td>
		<td align="' . ($__vars['xf']['isRtl'] ? 'left' : 'right') . '">
			';
	if ($__vars['watchType'] == 'listing') {
		$__finalCompiled .= '
				<a href="' . $__templater->func('link', array('canonical:watched/classifieds-listings', ), true) . '" class="buttonFake">' . 'classifieds_watched_listings' . '</a>
			';
	} else if ($__vars['watchType'] == 'category') {
		$__finalCompiled .= '
				<a href="' . $__templater->func('link', array('canonical:watched/classifieds-categories', ), true) . '" class="buttonFake">' . 'Watched categories' . '</a>
			';
	}
	$__finalCompiled .= '
		</td>
	</tr>
	</table>
';
	return $__finalCompiled;
}
),
'watched_category_footer' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'listing' => '!',
		'category' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . 'classifieds_watched_category_email_html_footer' . '
';
	return $__finalCompiled;
}
),
'watched_listing_footer' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'listing' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . 'classifieds_watched_listing_email_html_footer' . '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

' . '

';
	return $__finalCompiled;
}
);