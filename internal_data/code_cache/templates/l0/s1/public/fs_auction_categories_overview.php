<?php
// FROM HASH: 2515375c398f94d9fa186c6d1ae78861
return array(
'macros' => array('table_list' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'data' => $__vars['data'],
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
  ' . $__templater->dataRow(array(
		'rowtype' => 'header',
	), array(array(
		'_type' => 'cell',
		'html' => ' ' . 'fs_cell_bidding' . ' ',
	),
	array(
		'class' => 'dataList-cell--min',
		'_type' => 'cell',
		'html' => '',
	),
	array(
		'class' => 'dataList-cell--min',
		'_type' => 'cell',
		'html' => '',
	))) . '
  ';
	if ($__templater->isTraversable($__vars['data'])) {
		foreach ($__vars['data'] AS $__vars['value']) {
			$__finalCompiled .= '
    ' . $__templater->dataRow(array(
			), array(array(
				'_type' => 'cell',
				'html' => ' ' . $__templater->escape($__vars['value']['title']) . ' ',
			),
			array(
				'href' => $__templater->func('link', array('auction/categories/edit', $__vars['value'], ), false),
				'_type' => 'action',
				'html' => 'Edit',
			),
			array(
				'href' => $__templater->func('link', array('auction/categories/delete', $__vars['value'], ), false),
				'overlay' => 'true',
				'_type' => 'delete',
				'html' => '',
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
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Auction');
	$__templater->pageParams['pageNumber'] = $__vars['page'];
	$__finalCompiled .= '


<script>
//For Mulitiple counter

// For All OtherAuctions
function DateTimeConverter(unixdatetime) {
  var wStart_time = new Date(unixdatetime * 1000).toLocaleString("en-GB", {
    hour12: false,
    // timeZone:\'Europe/London\',
    timeStyle: "short",
  });
  var humanDate = new Date(unixdatetime * 1000);
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

function timmerCounter(auction_id, start_datetime) {
  let auc_id = auction_id;
	console.log(document.getElementById("hours-auction-" + auc_id));
  let humanDateTime = DateTimeConverter(start_datetime);

  var countDownDate = new Date(humanDateTime).getTime();
  var counter = setInterval(function () {
    // Get today\'s date and time
    var now = new Date().getTime();
    // Find the distance between now and the count down date
    var timeDistance = countDownDate - now;
    document.getElementById("days-auction-" + auc_id).innerHTML =
      Math.floor(timeDistance / (1000  60  60 * 24)) + " D";
    document.getElementById("hours-auction-" + auc_id).innerHTML =
      Math.floor((timeDistance % (1000  60  60  24)) / (1000  60 * 60)) +
      " H";
    document.getElementById("minutes-auction-" + auc_id).innerHTML =
      Math.floor((timeDistance % (1000  60  60)) / (1000 * 60)) + " M";
    document.getElementById("seconds-auction-" + auc_id).innerHTML =
      Math.floor((timeDistance % (1000 * 60)) / 1000) + " S";

    // If the count down is over, write some text
    if (timeDistance < 0) {
      clearInterval(counter);
    //  var url = window.location.origin + "/classified/auction/" + auc_id;
 //     document.getElementById("days-" + auc_id).innerHTML =
  //      "<a href=" + url + ">Join</a>";
  //    document.getElementById("hours-" + auc_id).classList.add("d-none");
   //   document.getElementById("minutes-" + auc_id).classList.add("d-none");
   //   document.getElementById("seconds-" + auc_id).classList.add("d-none");
    }
  }, 1000);
}

</script>


';
	$__templater->setPageParam('searchConstraints', array('Listings' => array('search_type' => 'classifieds_listing', ), ));
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['xf']['visitor'], 'canAddAuctions', array()) AND !$__templater->test($__vars['categories'], 'empty', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('Add Bidiing' . $__vars['xf']['language']['ellipsis'], array(
			'href' => $__templater->func('link', array('auction/add', ), false),
			'class' => 'button--cta',
			'icon' => 'write',
			'overlay' => 'true',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if (!$__templater->test($__vars['data'], 'empty', array())) {
		$__compilerTemp1 .= '
	<div class="block-body">
		
		';
		if ($__vars['xf']['options']['fs_auction_list_layout'] == 'list_view') {
			$__compilerTemp1 .= '
				';
			if (!$__templater->test($__vars['listings'], 'empty', array())) {
				$__compilerTemp1 .= '
					<div class="structItemContainer">
						';
				if ($__templater->isTraversable($__vars['listings'])) {
					foreach ($__vars['listings'] AS $__vars['listing']) {
						$__compilerTemp1 .= '
							' . $__templater->callMacro('fs_auction_listing_list_macros', 'listing', array(
							'listing' => $__vars['listing'],
						), $__vars) . '
						';
					}
				}
				$__compilerTemp1 .= '
					</div>
					';
			} else if ($__vars['filters']) {
				$__compilerTemp1 .= '
					<div class="block-row">' . 'There are currently no listings that match your filters.' . '</div>
					';
			} else {
				$__compilerTemp1 .= '
					<div class="block-row">' . 'No listings have been created yet.' . '</div>
				';
			}
			$__compilerTemp1 .= '
				';
		}
		$__compilerTemp1 .= '
			
			
			' . $__templater->dataList('
					
				' . $__templater->callMacro(null, 'table_list', array(
			'data' => $__vars['data'],
		), $__vars) . '


				   ', array(
			'data-xf-init' => 'responsive-data-list',
		)) . '
				
		    
		</div>
       ';
	} else {
		$__compilerTemp1 .= '
			<div class="block-body block-row">' . 'No items have been created yet.' . '</div>
		
       ';
	}
	$__finalCompiled .= $__templater->form('

  <div class="block-container">

  ' . $__compilerTemp1 . '
    
 </div>

', array(
		'action' => $__templater->func('link', array($__vars['prefix'] . '/toggle', ), false),
		'class' => 'block',
		'ajax' => 'true',
	)) . '
' . '


';
	$__templater->setPageParam('sideNavTitle', 'Categories');
	$__finalCompiled .= '
';
	$__templater->modifySideNavHtml(null, '
	' . $__templater->callMacro('fs_auction_category_list_macros', 'simple_list_block', array(
		'categoryTree' => $__vars['categoryTree'],
	), $__vars) . '

', 'replace');
	$__finalCompiled .= '

';
	$__templater->modifySideNavHtml('_xfWidgetPositionSideNav4401d3a32bbed9b86a42e889338553d3', $__templater->widgetPosition('classifieds_overview_sidenav', array()), 'replace');
	return $__finalCompiled;
}
);