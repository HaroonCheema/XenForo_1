<?php
// FROM HASH: 84457f35951ba4193962eaaa63b1b1d3
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
	
	<div class="structItem structItem--listing js-inlineModContainer " id="auction-' . $__templater->escape($__vars['listing']['auction_id']) . '" data-author="' . ($__templater->escape($__vars['listing']['User']['username']) ?: $__templater->escape($__vars['listing']['username'])) . '">
		<div class="structItem-cell structItem-cell--icon structItem-cell--iconExpanded structItem-cell--iconListingCoverImage">
			<div class="structItem-iconContainer">
				';
	if ($__vars['listing']['ends_on'] > $__vars['xf']['time']) {
		$__finalCompiled .= '
						<a href="' . $__templater->func('link', array('auction/view-auction', $__vars['listing'], ), true) . '" class="" data-tp-primary="on">
							<img src ="' . ($__templater->escape($__vars['listing']['Attachment']['thumbnail_url']) ?: $__templater->func('base_url', array('styles/FS/AuctionPlugin/no_image.png', true, ), true)) . '" onload="timmerCounter(' . $__templater->escape($__vars['listing']['auction_id']) . ',' . $__templater->escape($__vars['listing']['ends_on']) . ')" style="min-height: 92px; max-height: 92px;"></a>
				';
	} else {
		$__finalCompiled .= '
						<a href="' . $__templater->func('link', array('auction/view-auction', $__vars['listing'], ), true) . '" class="" data-tp-primary="on">
							<img src ="' . ($__templater->escape($__vars['listing']['Attachment']['thumbnail_url']) ?: $__templater->func('base_url', array('styles/FS/AuctionPlugin/no_image.png', true, ), true)) . '" style="min-height: 92px; max-height: 92px;"></a>
				';
	}
	$__finalCompiled .= '
						
			</div>
		</div>
			
				
		<div class="structItem-cell structItem-cell--main" data-xf-init="touch-proxy">
		
			<div class="structItem-title">
			<span class="label label--blue label--smallest">
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
						<li class="structItem-startDate">
							' . $__templater->func('date_dynamic', array($__vars['listing']['created_date'], array(
	))) . ' 
							
						</li>
						
							<li>' . $__templater->func('snippet', array($__vars['listing']['Category']['title'], 50, array('stripBbCode' => true, ), ), true) . '</li>
				
				</ul>
			</div>
			
			<!--	<div class="structItem-listingDescription">' . $__templater->escape($__vars['listing']['starting_bid']) . '</div> -->
			
				<div class="auction-category">' . $__templater->func('snippet', array($__vars['listing']['content'], 100, array('stripBbCode' => true, ), ), true) . '</div>
			
		
		</div>
		<div class="structItem-cell structItem-cell--listingMeta">

			<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--type">
				<dt >' . 'Expire' . '</dt>
				<dd>
					' . $__templater->func('date', array($__vars['listing']['ends_on'], 'F j, Y', ), true) . '

				</dd>
			</dl>
			<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--type">
				<dt id="counter-before">
				
				</dt>
				<dd>	';
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
							<div id="auction-counter-' . $__templater->escape($__vars['listing']['auction_id']) . '">
								
						<span class="label  label--blue label--counter" id="days-auction-' . $__templater->escape($__vars['listing']['auction_id']) . '">
							 ' . '00 D' . '
						</span>
						<span class="label  label--blue label--counter" id="hours-auction-' . $__templater->escape($__vars['listing']['auction_id']) . '">
							 ' . '00 H' . '
						</span>
							<span class="label  label--blue label--counter" id="minutes-auction-' . $__templater->escape($__vars['listing']['auction_id']) . '">
							' . '00 M' . '
						</span>
							<span class="label  label--blue label--counter" id="seconds-auction-' . $__templater->escape($__vars['listing']['auction_id']) . '">
							 ' . '00 S' . '
						</span>
							</div>
						
					</li>
					';
	}
	$__finalCompiled .= ' </dd>
			</dl>
			
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

	
	<div id="auction-' . $__templater->escape($__vars['listing']['auction_id']) . '" class="structItem structItem--listing js-inlineModContainer js-listingListItem-' . $__templater->escape($__vars['listing']['auction_id']) . '" style="display: grid;
    justify-content: center;
}">
		<div class="structItem-cell structItem-cell--icon structItem-cell--iconExpanded structItem-cell--iconListingCoverImage">
			<div class="structItem-iconContainer" >
				';
	if ($__vars['listing']['ends_on'] > $__vars['xf']['time']) {
		$__finalCompiled .= '
					<a href="' . $__templater->func('link', array('auction/view-auction', $__vars['listing'], ), true) . '" class="" data-tp-primary="on"><img src ="' . ($__templater->escape($__vars['listing']['Attachment']['thumbnail_url']) ?: $__templater->func('base_url', array('styles/FS/AuctionPlugin/no_image.png', true, ), true)) . '" loading="lazy" class="auction-itemGrid-img" onload="timmerCounter(' . $__templater->escape($__vars['listing']['auction_id']) . ',' . $__templater->escape($__vars['listing']['ends_on']) . ')"></a>
				';
	} else {
		$__finalCompiled .= '
							<a href="' . $__templater->func('link', array('auction/view-auction', $__vars['listing'], ), true) . '" class="" data-tp-primary="on"><img src ="' . ($__templater->escape($__vars['listing']['Attachment']['thumbnail_url']) ?: $__templater->func('base_url', array('styles/FS/AuctionPlugin/no_image.png', true, ), true)) . '" class="auction-itemGrid-img" loading="lazy"></a>
				';
	}
	$__finalCompiled .= '
				
			</div>
		</div>
		
		<div class="structItem-cell structItem-cell--listingMeta">
			<div class="structItem-cell structItem-cell--main" >

			
				<div >
					<span class="auction-category">' . $__templater->func('snippet', array($__vars['listing']['Category']['title'], 50, array('stripBbCode' => true, ), ), true) . '</span>
				</div>
				
				<div >
	
					';
	if ($__vars['listing']['ends_on'] < $__vars['xf']['time']) {
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
	} else {
		$__finalCompiled .= '

						
				<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--expiration">
						<dt>' . 'Expire' . '</dt>
						<dd id="auction-counter-' . $__templater->escape($__vars['listing']['auction_id']) . '">	
						
								
							
							<span class="label  label--blue label--counter" id="days-auction-' . $__templater->escape($__vars['listing']['auction_id']) . '">
								 ' . '00 D' . '
							</span>
							<span class="label  label--blue label--counter" id="hours-auction-' . $__templater->escape($__vars['listing']['auction_id']) . '">
								' . '00 H' . '
							</span>
							<span class="label  label--blue label--counter" id="minutes-auction-' . $__templater->escape($__vars['listing']['auction_id']) . '">
						 		' . '00 M' . '
							</span>
							<span class="label  label--blue label--counter" id="seconds-auction-' . $__templater->escape($__vars['listing']['auction_id']) . '">
								' . '00 S' . '
							</span>
							
						</dd>
				</dl>
	
			';
	}
	$__finalCompiled .= '
				</div>

			<div class="structItem-title">
					<span class="label label--blue label--smallest">
						' . $__templater->func('phrase_dynamic', array($__templater->method($__vars['listing']['Prefix'], 'getPhraseName', array()), ), true) . '
							
					</span>
			<a href="' . $__templater->func('link', array('auction/view-auction', $__vars['listing'], ), true) . '" class="" data-tp-primary="on">' . $__templater->func('snippet', array($__vars['listing']['title'], 33, array('stripBbCode' => true, ), ), true) . '</a>
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
							<li>' . 'Expire' . ' . ' . $__templater->func('date', array($__vars['listing']['ends_on'], 'F j, Y', ), true) . '
</li>
						';
	}
	$__finalCompiled .= '
					</ul>

			</div>
				<div class="auction-category">' . $__templater->func('snippet', array($__vars['listing']['content'], 50, array('stripBbCode' => true, ), ), true) . '</div>

				<dl class="pairs pairs--justified structItem-minor structItem-metaItem structItem-metaItem--expiration">
					<dt style="color:black; font-size:17px">' . 'Bid' . '</dt>
					<dd style="color:black; font-size:17px">
							' . $__templater->escape($__vars['listing']['starting_bid']) . ' ' . ' $' . '
					</dd>
				</dl>
		
		</div>

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

';
	return $__finalCompiled;
}
);