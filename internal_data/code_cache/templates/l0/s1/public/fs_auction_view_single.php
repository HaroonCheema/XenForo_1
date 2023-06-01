<?php
// FROM HASH: ab50fe3274999fdffc1bdee73725e35e
return array(
'macros' => array('singleAuction' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'auction' => '!',
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
	
	<div class="structItem structItem--listing js-inlineModContainer">	
		<div class="structItem-cell structItem-cell--main" data-xf-init="touch-proxy">	
	
			<div class="message-fields message-fields--after">
				<dl class="pairs pairs--columns pairs--fixedSmall pairs--customField" data-field="threadCustomField">
					<dt>' . 'AUCTION ENDS ON' . '</dt>
					<dd>
						' . $__templater->func('date', array($__vars['auction']['ends_on'], 'F j, Y', ), true) . '
				
					</dd>
				</dl>
			
			</div>

		<div class="message-fields message-fields--after">
	
				<dl class="pairs pairs--columns pairs--fixedSmall pairs--customField" data-field="threadCustomField">
					<dt>' . 'AUCTION ENDS AT' . '</dt>
					<dd>' . $__templater->escape($__vars['auction']['timezone']) . '</dd>
				</dl>
		</div>

		<div class="message-fields message-fields--after">
	
				<dl class="pairs pairs--columns pairs--fixedSmall pairs--customField" data-field="threadCustomField">
					<dt>' . 'STARTING BID' . '</dt>
					<dd>' . $__templater->escape($__vars['auction']['starting_bid']) . ' ' . ' $' . '</dd>
				</dl>
			
		</div>

		<div class="message-fields message-fields--after">
	
				<dl class="pairs pairs--columns pairs--fixedSmall pairs--customField" data-field="threadCustomField">
					<dt>' . 'MINIMUM BID INCREMENT' . '</dt>
					<dd>' . $__templater->escape($__vars['auction']['bid_increament']) . '</dd>
				</dl>
			
		</div>

		<div class="message-fields message-fields--after">
	
				<dl class="pairs pairs--columns pairs--fixedSmall pairs--customField" data-field="threadCustomField">
					<dt>' . 'PAYMENTS ACCEPTED' . '</dt>
					<dd>
					';
	if ($__templater->isTraversable($__vars['auction']['payment_methods'])) {
		foreach ($__vars['auction']['payment_methods'] AS $__vars['val']) {
			$__finalCompiled .= '
						<p style="margin:0px;">' . $__templater->escape($__vars['val']) . '</p>
        			';
		}
	}
	$__finalCompiled .= '
					</dd>
				</dl>
			
		</div>

		<div class="message-fields message-fields--after">
	
				<dl class="pairs pairs--columns pairs--fixedSmall pairs--customField" data-field="threadCustomField">
					<dt>' . 'SHIPPING TERMS' . '</dt>
					<dd>' . $__templater->escape($__vars['auction']['ShipTerm']['shipping_term']) . '</dd>
				</dl>
			
		</div>

		<div class="message-fields message-fields--after">
	
				<dl class="pairs pairs--columns pairs--fixedSmall pairs--customField" data-field="threadCustomField">
					<dt>' . 'SHIPS VIA' . '</dt>
					<dd>' . $__templater->escape($__vars['auction']['ShipVia']['ship_via']) . '</dd>
				</dl>
		</div>
	  
	
		
		</div>
		
		
		<div class="structItem-cell structItem-cell--listingMeta" style="width:320px">

		<div id="auction-counter">
								
						<span class="label  label--blue label--counter-single" id="days-auction">
							 ' . '00 D' . '
						</span>
						<span class="label  label--blue label--counter-single" id="hours-auction">
							 ' . '00 H' . '
						</span>
							<span class="label  label--blue label--counter-single" id="minutes-auction">
							' . '00 M' . '
						</span>
							<span class="label  label--blue label--counter-single" id="seconds-auction">
							 ' . '00 S' . '
						</span>
							</div>
			
		</div>
	</div>
';
	return $__finalCompiled;
}
),
'bidding_table_list' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'bidding' => $__vars['bidding'],
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
  ' . $__templater->dataRow(array(
		'rowtype' => 'header',
	), array(array(
		'_type' => 'cell',
		'html' => ' ' . 'By User' . ' ',
	),
	array(
		'_type' => 'cell',
		'html' => ' ' . 'Bid At' . ' ',
	),
	array(
		'_type' => 'cell',
		'html' => ' ' . 'Amount' . ' ',
	))) . '
  ';
	if ($__templater->isTraversable($__vars['bidding'])) {
		foreach ($__vars['bidding'] AS $__vars['val']) {
			$__finalCompiled .= '
    ' . $__templater->dataRow(array(
			), array(array(
				'href' => $__templater->func('link', array('members/', $__vars['val'], ), false),
				'_type' => 'cell',
				'html' => ' ' . $__templater->escape($__vars['val']['User']['username']) . ' ',
			),
			array(
				'_type' => 'cell',
				'html' => ' ' . $__templater->func('date_dynamic', array($__vars['val']['created_at'], array(
			))),
			),
			array(
				'_type' => 'cell',
				'html' => ' ' . $__templater->escape($__vars['val']['bidding_amount']) . ' ',
			))) . '
  ';
		}
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped($__templater->escape($__vars['auction']['title']));
	$__finalCompiled .= '
';
	if ($__vars['xf']['visitor']['user_id'] == $__vars['auction']['User']['user_id']) {
		$__compilerTemp1 = '';
		if ($__vars['auction']['ends_on'] > $__vars['xf']['time']) {
			$__compilerTemp1 .= '
	' . $__templater->button('Bumping', array(
				'href' => $__templater->func('link', array('auction/categories/bumping', $__vars['auction'], ), false),
				'class' => 'button button--icon button--icon--add',
				'icon' => 'add',
			), '', array(
			)) . '
	';
		}
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('Delete', array(
			'href' => $__templater->func('link', array('auction/categories/delete', $__vars['auction'], ), false),
			'overlay' => 'true',
			'class' => 'button button--icon button--icon--edit',
			'icon' => 'delete',
		), '', array(
		)) . '
	' . $__templater->button('Edit', array(
			'href' => $__templater->func('link', array('auction/categories/edit', $__vars['auction'], ), false),
			'class' => 'button button--icon button--icon--edit',
			'icon' => 'edit',
		), '', array(
		)) . '
	' . $__compilerTemp1 . '
');
	}
	$__finalCompiled .= '

	';
	$__templater->includeCss('message.less');
	$__finalCompiled .= '
<script>

// For All Auctions
function DateTimeConverter(unixdatetime) {

  var wStart_time = new Date(unixdatetime *1000).toLocaleString("en-US", {
    hour12: false,
	 //  timeZone: \'America/New_York\',
    // timeZone:\'Europe/London\',
    timeStyle: "long",
  });
  var tempHumanDate = new Date(unixdatetime * 1000).toLocaleDateString("en-US", {
	 timeZone: \'America/New_York\',
	 year: \'numeric\', 
	 month: \'numeric\', 
	 day: \'numeric\',
  });

  var humanDate = new Date(tempHumanDate);
  var year = humanDate.getFullYear();
  var month = (humanDate.getMonth() + 1).toString().padStart(2, "0");
  var date = humanDate.getDate();

  var fulldate = year + "-" + month + "-" + date + " " + wStart_time + ":00";

  // FormatingDateEspecialyForIOS
  var tempCountTimmer = fulldate.split(/[- :]/);
  // Apply each element to the Date function
  var tempDateObject = new Date(
    tempCountTimmer[0],
    tempCountTimmer[1] - 1,
    tempCountTimmer[2],
    tempCountTimmer[3],
    tempCountTimmer[4],
    tempCountTimmer[5]
  );
  var CountDownDateTime = new Date(tempDateObject).getTime();

  return CountDownDateTime;
}

function timmerCounter(start_datetime) {
	


  let humanDateTime = DateTimeConverter(start_datetime);

  var countDownDate = new Date(humanDateTime).getTime();
  var counter = setInterval(function () {
    // Get today\'s date and time
    var now = new Date().getTime();
    // Find the distance between now and the count down date
    var timeDistance = countDownDate - now;
    document.getElementById("days-auction").innerHTML =
      Math.floor(timeDistance / (1000 * 60 * 60 * 24)) + " D";
    document.getElementById("hours-auction").innerHTML =
      Math.floor((timeDistance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)) +
      " H";
    document.getElementById("minutes-auction").innerHTML =
      Math.floor((timeDistance % (1000 * 60 * 60)) / (1000 * 60)) + " M";
    document.getElementById("seconds-auction").innerHTML =
      Math.floor((timeDistance % (1000 * 60)) / 1000) + " S";

    // If the count down is over, write some text
    if (timeDistance < 0) {
      clearInterval(counter);
		document.getElementById("auction-counter").style.display = "none";
		
    }
  }, 1000);
}

</script>

<header class="message-attribution message-attribution--split" style="color: #8c8c8c; font-size: 12px; padding-bottom: 3px; border-bottom: 1px solid #c9c9c9;">
		<ul class="message-attribution-main listInline ' . $__templater->escape($__vars['mainClass']) . '">
			<li class="u-concealed">
				<a href="' . $__templater->func('link', array('threads/post', $__vars['thread'], array('post_id' => $__vars['post']['post_id'], ), ), true) . '" rel="nofollow">
					' . $__templater->func('date_dynamic', array($__vars['auction']['created_date'], array(
		'itemprop' => 'datePublished',
	))) . '
				</a>
			</li>
		</ul>
		<ul class="message-attribution-opposite message-attribution-opposite--list ' . $__templater->escape($__vars['oppositeClass']) . '">
				
		';
	if ($__vars['auctionUnread']) {
		$__finalCompiled .= '
				<li><span class="message-newIndicator">' . 'New' . '</span></li>
			';
	}
	$__finalCompiled .= '
			
			<li>
				<a href="' . ($__templater->func('link', array((('auction/' . $__vars['auction']['category_id']) . '/') . $__vars['auction']['auction_id'], ), true) . '/view-auction') . '"
					class="message-attribution-gadget"
					data-xf-init="share-tooltip"
					data-href="' . $__templater->func('link', array('auction/share', $__vars['auction'], ), true) . '"
					aria-label="' . $__templater->filter('Share', array(array('for_attr', array()),), true) . '"
					rel="nofollow">
					' . $__templater->fontAwesome('fa-share-alt', array(
	)) . '
				</a>
			</li>
			
				<li>	
						' . $__templater->callMacro('fs_auction_bookmark_macros', 'link', array(
		'content' => $__vars['auction'],
		'class' => 'message-attribution-gadget bookmarkLink--highlightable',
		'confirmUrl' => $__templater->func('link', array('auction/bookmark', $__vars['auction'], ), false),
		'showText' => false,
	), $__vars) . '
				</li>
				<li>
					<a href="' . $__templater->func('link', array('auction', $__vars['auction'], array('auction_id' => $__vars['auction']['auction_id'], ), ), true) . '" rel="nofollow">
						#' . $__templater->escape($__vars['auction']['auction_id']) . '
					</a>
				</li>
		</ul>
	</header>

<!--- here--->
' . $__templater->callMacro(null, 'singleAuction', array(
		'auction' => $__vars['auction'],
	), $__vars) . '


' . '
  <div class="message-fields message-fields--after">
	
				<dl class="pairs pairs--columns pairs--fixedSmall pairs--customField" data-field="threadCustomField">
					<dt>' . 'AUCTION GUIDLINES' . '</dt>
					<dd>' . '<ol>
	<li>The highest bid at the closing time listed above will win. If there is a bid within 5 minutes of the closing time (original or extended closing time), 5 minutes shall be added to the time of the last bid, until there are no bids within the final 5 minutes. Because seconds are not displayed on post timestamps, <a href="#"><b>these examples</b></a> will be used as a reference.</li>
	<li>No Reserve. The Starting Bid of this auction will be treated as the Reserve Price.</li>
		<li>Bids must be placed in whole US dollars, using numbers in minimum increments as stated above. (bids using images or spelled out numbers are not valid)</li>
		<li>All bids are to be placed openly in this thread. No bids via Private Message/Convo. Sellers are not permitted to bid on their own auctions.</li>
		<li>The seller reserves the right to edit the listing to clarify statements or correct any errors.</li>
<li>Once a valid bid is made, the auction can not be canceled. Bid edits and/or retractions are not permitted. Violations of this rule will result in discipline at the discretion of PC Admins and/or Moderators.
</li>
<li>PCF (its Owner, Admins, and Moderators) are not responsible for any actions or outcomes that take place in this auction.</li>
</ol>' . '</dd>
				</dl>
			
		</div>	
				<img src="' . ($__templater->method($__vars['auction'], 'getImage', array()) ? $__templater->escape($__templater->method($__vars['auction'], 'getImage', array())) : $__templater->func('base_url', array('styles/FS/AuctionPlugin/no_image.png', true, ), true)) . '" alt="' . $__templater->escape($__vars['attachment']['filename']) . '"
					width=" " onload="timmerCounter(' . $__templater->escape($__vars['auction']['ends_on']) . ')" style="width:-webkit-fill-available; width:-moz-available;" height="" loading="lazy" />
</div>

	   <div class="block-container">
		<div class="block-body">
				';
	if ($__templater->func('count', array($__vars['bidding'], ), false)) {
		$__finalCompiled .= '
						<h3 class="block-minorHeader"> ' . 'Top Bid :' . '</h3>

				  ' . $__templater->dataList('
					  ' . $__templater->dataRow(array(
			'rowtype' => 'header',
		), array(array(
			'_type' => 'cell',
			'html' => ' ' . 'By User' . ' ',
		),
		array(
			'_type' => 'cell',
			'html' => ' ' . 'Bid At' . ' ',
		),
		array(
			'_type' => 'cell',
			'html' => ' ' . 'Amount' . ' ',
		))) . '
					' . $__templater->dataRow(array(
		), array(array(
			'href' => $__templater->func('link', array('members/', $__vars['bidding'], ), false),
			'_type' => 'cell',
			'html' => ' ' . $__templater->escape($__vars['bidding'][$__vars['highestBidId']]['User']['username']) . ' ',
		),
		array(
			'_type' => 'cell',
			'html' => ' ' . $__templater->func('date_dynamic', array($__vars['bidding'][$__vars['highestBidId']]['created_at'], array(
		))),
		),
		array(
			'_type' => 'cell',
			'html' => ' ' . $__templater->escape($__vars['bidding'][$__vars['highestBidId']]['bidding_amount']) . ' ',
		))) . '
				', array(
			'data-xf-init' => 'responsive-data-list',
			'style' => 'border-bottom:1px solid #dfdfdf;',
		)) . '


			';
	}
	$__finalCompiled .= '
';
	if (($__vars['auction']['ends_on'] > $__vars['xf']['time']) AND ($__vars['xf']['visitor']['user_id'] != 0)) {
		$__finalCompiled .= '
		';
		if ($__vars['xf']['visitor']['user_id'] != $__vars['auction']['User']['user_id']) {
			$__finalCompiled .= '
			';
			$__vars['bidDropDownRange'] = $__templater->func('range', array(0, $__vars['dropDownListLimit'], ), false);
			$__vars['tempSum'] = ($__vars['bidding'][$__vars['highestBidId']]['bidding_amount'] ? ($__vars['bidding'][$__vars['highestBidId']]['bidding_amount'] + $__vars['auction']['bid_increament']) : ($__vars['auction']['bid_increament'] + $__vars['auction']['starting_bid']));
			$__vars['sum'] = $__vars['tempSum'];
			$__compilerTemp2 = array();
			if ($__templater->isTraversable($__vars['bidDropDownRange'])) {
				foreach ($__vars['bidDropDownRange'] AS $__vars['key'] => $__vars['val']) {
					$__compilerTemp2[] = array(
						'value' => ($__vars['sum'] + $__vars['bidIncrementFromDb']),
						'label' => ($__vars['sum'] + $__vars['bidIncrementFromDb']),
						'_type' => 'option',
					);
					$__vars['sum'] = ($__vars['sum'] + $__vars['auction']['bid_increament']);
				}
			}
			$__finalCompiled .= $__templater->form('
				' . $__templater->formRow('
	
			<!--bidDropDownRange value is  bid dropdown List items count-->
	
					' . '' . '
					
					<div class="inputChoices">
							' . $__templater->formRadio(array(
				'name' => 'use_biddingAmountTyp',
			), array(array(
				'label' => 'Bid from Dropdown',
				'_dependent' => array('
										<!--sum value is  bid increament+bidstart -->
										' . '' . '

										' . '' . '
										
										' . $__templater->formSelect(array(
				'name' => 'bidding_amount',
			), $__compilerTemp2) . '
									'),
				'_type' => 'option',
			),
			array(
				'label' => 'Custom Bid',
				'name' => 'use_biddingAmountTyp',
				'_dependent' => array('
										 ' . $__templater->formNumberBox(array(
				'name' => 'bidding_amount',
				'value' => $__vars['tempSum'],
				'min' => $__vars['tempSum'],
			)) . '
									'),
				'_type' => 'option',
			))) . '
					</div>
		', array(
				'label' => 'Bidding Cost',
			)) . '
			' . $__templater->formSubmitRow(array(
				'icon' => 'save',
				'sticky' => 'true',
			), array(
			)) . '
		', array(
				'action' => $__templater->func('link', array('auction/categories/bidding', $__vars['auction'], ), false),
				'ajax' => 'true',
				'class' => 'block',
				'data-xf-init' => 'attachment-manager',
			)) . '
	';
		} else {
			$__finalCompiled .= '
		<div style="display:flex; justify-content: center; padding:0.7rem;">
				<span >' . 'You can not bid your own Auction' . '</span>	
			</div>
	';
		}
		$__finalCompiled .= '
	
	';
	} else {
		$__finalCompiled .= '
	<div style="display:flex; justify-content: center; padding:0.7rem;">
				<span >' . 'Bidding Not Allowed.' . '</span>	</div>
	
	';
	}
	$__finalCompiled .= '
		   </div>
	  </div>
</div>
</div>


';
	if ($__templater->func('count', array($__vars['bidding'], ), false)) {
		$__finalCompiled .= '
	<div class="block" style="margin-top:1rem;">
	  <div class="block-container">
		<div class="block-body">
		  ' . $__templater->dataList('
			  ' . $__templater->callMacro(null, 'bidding_table_list', array(
			'bidding' => $__vars['bidding'],
		), $__vars) . '
		  ', array(
			'data-xf-init' => 'responsive-data-list',
		)) . '
			
			<div class="block-outer block-outer--after">
		' . $__templater->func('show_ignored', array(array(
			'wrapperclass' => 'block-outer-opposite',
		))) . '
	</div>
		</div>
	  </div>
	</div>
';
	}
	$__finalCompiled .= '


';
	return $__finalCompiled;
}
);