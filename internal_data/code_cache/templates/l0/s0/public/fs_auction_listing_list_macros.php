<?php
// FROM HASH: 4eb77d3532f5d577482561108b35470d
return array(
'macros' => array('listing' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'listing' => '!',
		'category' => null,
		'showWatched' => true,
		'allowInlineMod' => true,
		'chooseName' => '',
		'extraInfo' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__templater->includeCss('structured_list.less');
	$__finalCompiled .= '
	';
	$__templater->includeCss('fs_auction_list_view.less');
	$__finalCompiled .= '

	<div class="structItem structItem--listing js-inlineModContainer " data-author="' . ($__templater->escape($__vars['listing']['User']['username']) ?: $__templater->escape($__vars['listing']['username'])) . '">
		<div class="structItem-cell structItem-cell--icon structItem-cell--iconExpanded structItem-cell--iconListingCoverImage">
			<div class="structItem-iconContainer">
				';
	if ($__vars['listing']['ends_on'] > $__vars['xf']['time']) {
		$__finalCompiled .= '
				<img src="' . $__templater->escape($__templater->method($__vars['listing'], 'getImage', array())) . '" onload="timmerCounter(' . $__templater->escape($__vars['listing']['auction_id']) . ',' . $__templater->escape($__vars['listing']['ends_on']) . ')">
				';
	} else {
		$__finalCompiled .= '
				 <img src="' . $__templater->escape($__templater->method($__vars['listing'], 'getImage', array())) . '" >
				';
	}
	$__finalCompiled .= '
						
			</div>
		</div>
			
				
		<div class="structItem-cell structItem-cell--main" data-xf-init="touch-proxy">
		
			<div class="structItem-title">
			<span class="label label--primary label--smallest">
						' . $__templater->func('phrase_dynamic', array($__templater->method($__vars['listing']['Prefix'], 'getPhraseName', array()), ), true) . '
					</span>
				<a href="' . $__templater->func('link', array('auction/view-auction', $__vars['listing'], ), true) . '" class="" data-tp-primary="on">' . $__templater->escape($__vars['listing']['title']) . '</a>
					<span class="structItem-listingDescription"> ' . $__templater->escape($__vars['listing']['starting_bid']) . ' ' . ' $' . '</span>
			</div>
			<div class="structItem-minor">

					<ul class="structItem-parts">
						<li>' . $__templater->func('username_link', array($__vars['listing']['User'], false, array(
		'defaultname' => $__vars['listing']['User'],
	))) . '</li>
						<li class="structItem-startDate">' . $__templater->func('date_dynamic', array($__vars['listing']['created_date'], array(
	))) . '</li>
						
							<li>' . $__templater->escape($__vars['listing']['Category']['title']) . '</li>
				
				</ul>
			</div>
			
			<!--	<div class="structItem-listingDescription">' . $__templater->escape($__vars['listing']['starting_bid']) . '</div> -->
			
				<div class="structItem-listingDescription">' . $__templater->func('snippet', array($__vars['listing']['content'], 150, array('stripBbCode' => true, ), ), true) . '</div>
			
		
		</div>
		<div class="structItem-cell structItem-cell--listingMeta">

			<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--type">
				<dt>' . 'Expire' . '</dt>
				<dd>' . $__templater->func('date_dynamic', array($__vars['listing']['ends_on'], array(
	))) . '</dd>
			</dl>
			<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--type">
				<dt>
					';
	if ($__vars['listing']['ends_on'] < $__vars['xf']['time']) {
		$__finalCompiled .= '
						<li>
							<span class="label label--orange label--smallest">' . 'Bidding Closed' . ' 
								<i class="structItem-status structItem-status--locked" 
								   aria-hidden="true" title="' . $__templater->filter('Locked', array(array('for_attr', array()),), true) . '"></i>
							<span class="u-srOnly">' . 'auctionLocked' . '</span>
							</span>
						</li>
					';
	} else {
		$__finalCompiled .= '
						<li>
							<div>
								
						<span class="label label--smallest label--primary" id="days-auction-' . $__templater->escape($__vars['listing']['auction_id']) . '">
							 ' . 'D' . '
						</span>
						<span class="label label--smallest label--primary" id="hours-auction-' . $__templater->escape($__vars['listing']['auction_id']) . '">
							 ' . 'H' . '
						</span>
							<span class="label label--smallest label--primary" id="minutes-auction-' . $__templater->escape($__vars['listing']['auction_id']) . '">
							' . 'M' . '
						</span>
							<span class="label label--smallest label--primary" id="seconds-auction-' . $__templater->escape($__vars['listing']['auction_id']) . '">
							 ' . 'S' . '
						</span>
							</div>
						
					</li>
					';
	}
	$__finalCompiled .= '
				</dt>
				<dd> </dd>
			</dl>
			
		</div>
	</div>
';
	return $__finalCompiled;
}
),
'listing_simple' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'listing' => '!',
		'withMeta' => true,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	<div class="contentRow">
		<div class="contentRow-figure">
			' . $__templater->func('avatar', array($__vars['listing']['User'], 'xxs', false, array(
	))) . '
		</div>
		<div class="contentRow-main contentRow-main--close">
			<a href="' . $__templater->func('link', array('classifieds', $__vars['listing'], ), true) . '">' . $__templater->func('prefix', array('classifieds_listing', $__vars['listing'], ), true) . $__templater->escape($__vars['listing']['title']) . '</a>
			<div class="contentRow-lesser">' . $__templater->func('snippet', array($__vars['listing']['content'], 50, array('stripBbCode' => true, ), ), true) . '</div>
			';
	if ($__vars['withMeta']) {
		$__finalCompiled .= '
				<div class="contentRow-minor contentRow-minor--smaller">
					<ul class="listInline listInline--bullet">
						<li>' . ($__templater->escape($__vars['listing']['User']['username']) ?: $__templater->escape($__vars['listing']['username'])) . '</li>
						<li>' . 'Created' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->func('date_dynamic', array($__vars['listing']['created_date'], array(
		))) . '</li>
					</ul>
				</div>
			';
	}
	$__finalCompiled .= '
		</div>
	</div>
';
	return $__finalCompiled;
}
),
'listing_grid' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'listing' => '!',
		'category' => null,
		'showWatched' => true,
		'allowInlineMod' => true,
		'chooseName' => '',
		'extraInfo' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	';
	$__templater->includeCss('structured_list.less');
	$__finalCompiled .= '
	
	';
	$__templater->includeCss('fs_auctions.less');
	$__finalCompiled .= '
	
	';
	$__templater->includeCss('fs_auction_listing_grid_view.less');
	$__finalCompiled .= '

	
	<div class="structItem structItem--listing js-inlineModContainer js-listingListItem-' . $__templater->escape($__vars['listing']['auction_id']) . '" style="display: grid;
    justify-content: center;
}">
		<div class="structItem-cell structItem-cell--icon structItem-cell--iconExpanded structItem-cell--iconListingCoverImage">
			<div class="structItem-iconContainer" >
				';
	if ($__vars['listing']['ends_on'] > $__vars['xf']['time']) {
		$__finalCompiled .= '
						<img src ="' . $__templater->escape($__templater->method($__vars['listing'], 'getImage', array())) . '" loading="lazy">
						
				';
	} else {
		$__finalCompiled .= '
				 		<img src ="' . $__templater->escape($__templater->method($__vars['listing'], 'getImage', array())) . '" class="auction-itemGrid-img" loading="lazy">

				';
	}
	$__finalCompiled .= '
				
			</div>
		</div>
		
		<div class="structItem-cell structItem-cell--listingMeta">
			<div class="structItem-cell structItem-cell--main" data-xf-init="touch-proxy">
				
			';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
							
					';
	if ($__vars['listing']['ends_on'] > $__vars['xf']['time']) {
		$__compilerTemp1 .= '
								<li>
					
								</li>
					';
	} else {
		$__compilerTemp1 .= '
						<li>			
						</li>
						
					';
	}
	$__compilerTemp1 .= '
						
					';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
				<div >
					<span class="auction-category">' . $__templater->escape($__vars['listing']['Category']['title']) . '</span>
				</div>
				
				<div >
												
					';
		if ($__vars['listing']['ends_on'] > $__vars['xf']['time']) {
			$__finalCompiled .= '
					
										<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--expiration">
					<dt>' . 'Expire' . '</dt>
					<dd>			<span class="label label--smallest label--primary" id="days-auction-' . $__templater->escape($__vars['listing']['auction_id']) . '">
							 ' . 'D' . '
						</span>
										<span class="label label--smallest label--primary" id="hours-auction-' . $__templater->escape($__vars['listing']['auction_id']) . '">
							' . 'H' . '
						</span>
											<span class="label label--smallest label--primary" id="minutes-auction-' . $__templater->escape($__vars['listing']['auction_id']) . '">
						 ' . 'M' . '
						</span>
										<span class="label label--smallest label--primary" id="seconds-auction-' . $__templater->escape($__vars['listing']['auction_id']) . '">
							' . 'S' . '
						</span></dd>
				</dl>
							
					';
		} else {
			$__finalCompiled .= '

										<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--expiration">
					<dt>' . 'Expire' . '</dt>
					<dd>		
						<span class="label label--orange label--smallest">' . 'Bidding Closed' . ' 
								<i class="structItem-status structItem-status--locked" 
								   aria-hidden="true" title="' . $__templater->filter('Locked', array(array('for_attr', array()),), true) . '"></i>
							<span class="u-srOnly">' . 'auctionLocked' . '</span>
							</span>
											</dd>
				</dl>				

						
						
			';
		}
		$__finalCompiled .= '
				</div>
				
				
				<ul class="structItem-statuses">
					' . $__compilerTemp1 . '
				</ul>
			';
	}
	$__finalCompiled .= '

			<div class="structItem-title">
					<span class="label label--primary label--smallest">
						' . $__templater->func('phrase_dynamic', array($__templater->method($__vars['listing']['Prefix'], 'getPhraseName', array()), ), true) . '
							
					</span>
			<a href="' . $__templater->func('link', array('auction/view-auction', $__vars['listing'], ), true) . '" class="" data-tp-primary="on">' . $__templater->escape($__vars['listing']['title']) . '</a>
			</div>
			<div class="structItem-minor">
					<ul class="structItem-parts">
						<li>' . $__templater->func('username_link', array($__vars['listing']['User'], false, array(
		'defaultname' => $__vars['listing']['User'],
	))) . '</li>
						<li class="structItem-startDate">' . $__templater->func('date_dynamic', array($__vars['listing']['created_date'], array(
	))) . '</li>
						';
	if ((!$__vars['category']) OR $__templater->method($__vars['category'], 'hasChildren', array())) {
		$__finalCompiled .= '
							<li>' . 'Expire' . ' . ' . $__templater->func('date_dynamic', array($__vars['listing']['ends_on'], array(
		))) . '</li>
						';
	}
	$__finalCompiled .= '
					</ul>
				
			</div>
				<div class="structItem-listingDescription">' . $__templater->func('snippet', array($__vars['listing']['content'], 150, array('stripBbCode' => true, ), ), true) . '</div>

				<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--expiration">
					<dt style="color:black; font-size:17px">' . 'Bid' . '</dt>
					<dd style="color:black; font-size:17px">
							' . $__templater->escape($__vars['listing']['starting_bid']) . ' ' . ' $' . '
					</dd>
				</dl>
		
		</div>
			
			<!--	<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--expiration">
					<dt style="color:black; font-size:17px">' . 'Bid' . '</dt>
					<dd style="color:black; font-size:17px">
							' . $__templater->escape($__vars['listing']['starting_bid']) . ' ' . ' $' . '
					</dd>
				</dl>-->
		
		
	

		</div>
	</div>
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