<?php
// FROM HASH: 63a3c8a05f4d5380e520fe0dfdd6919b
return array(
'macros' => array('listing_page_options' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'category' => '!',
		'listing' => null,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__templater->setPageParam('listingCategory', $__vars['category']);
	$__finalCompiled .= '

	';
	$__templater->setPageParam('searchConstraints', array('Listings' => array('search_type' => 'listing', ), 'This category' => array('search_type' => 'listing', 'c' => array('categories' => array($__vars['category']['category_id'], ), ), ), ));
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';

	return $__finalCompiled;
}
);