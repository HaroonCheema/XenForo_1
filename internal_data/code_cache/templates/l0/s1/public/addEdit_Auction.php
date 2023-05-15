<?php
// FROM HASH: a7764c0b09de33b26b5872a9c02e3e95
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Post Thread');
	$__finalCompiled .= '

';
	$__templater->includeJs(array(
		'prod' => 'xf/attachment_manager-compiled.js',
		'dev' => 'vendor/flow.js/flow-compiled.js, xf/attachment_manager.js',
	));
	$__finalCompiled .= '

';
	$__compilerTemp1 = array(array(
		'value' => '0',
		'label' => $__vars['xf']['language']['parenthesis_open'] . 'None' . $__vars['xf']['language']['parenthesis_close'],
		'_type' => 'option',
	));
	if ($__templater->isTraversable($__vars['timeZones'])) {
		foreach ($__vars['timeZones'] AS $__vars['val']) {
			$__compilerTemp1[] = array(
				'value' => $__vars['val'],
				'selected' => ($__vars['val'] == $__vars['data']['timezone']),
				'label' => $__templater->escape($__vars['val']),
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp2 = array(array(
		'value' => '0',
		'label' => $__vars['xf']['language']['parenthesis_open'] . 'None' . $__vars['xf']['language']['parenthesis_close'],
		'_type' => 'option',
	));
	if ($__templater->isTraversable($__vars['bidIncreaments'])) {
		foreach ($__vars['bidIncreaments'] AS $__vars['val']) {
			$__compilerTemp2[] = array(
				'selected' => ($__vars['val'] == $__vars['data']['bid_increament']),
				'value' => $__vars['val'],
				'label' => $__templater->escape($__vars['val']),
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp3 = array();
	if ($__templater->isTraversable($__vars['paymentMethods'])) {
		foreach ($__vars['paymentMethods'] AS $__vars['val']) {
			$__compilerTemp3[] = array(
				'value' => $__vars['val'],
				'checked' => ($__templater->func('in_array', array($__vars['val'], $__vars['data']['payment_methods'], ), false) ? 'checked' : ''),
				'label' => $__templater->escape($__vars['val']),
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp4 = array(array(
		'value' => '0',
		'label' => $__vars['xf']['language']['parenthesis_open'] . 'None' . $__vars['xf']['language']['parenthesis_close'],
		'_type' => 'option',
	));
	if ($__templater->isTraversable($__vars['shipTerms'])) {
		foreach ($__vars['shipTerms'] AS $__vars['val']) {
			$__compilerTemp4[] = array(
				'selected' => ($__vars['val']['term_id'] == $__vars['data']['shipping_term']),
				'value' => $__vars['val']['term_id'],
				'label' => $__templater->escape($__vars['val']['shipping_term']),
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp5 = array(array(
		'value' => '0',
		'label' => $__vars['xf']['language']['parenthesis_open'] . 'None' . $__vars['xf']['language']['parenthesis_close'],
		'_type' => 'option',
	));
	if ($__templater->isTraversable($__vars['shipsVia'])) {
		foreach ($__vars['shipsVia'] AS $__vars['val']) {
			$__compilerTemp5[] = array(
				'selected' => ($__vars['val']['via_id'] == $__vars['data']['ships_via']),
				'value' => $__vars['val']['via_id'],
				'label' => $__templater->escape($__vars['val']['ship_via']),
				'_type' => 'option',
			);
		}
	}
	$__finalCompiled .= $__templater->form('
  <div class="block-container">
    <div class="block-body">	
		' . $__templater->formHiddenVal('attachment_time', $__vars['attachment_time'], array(
	)) . '
		' . $__templater->formPrefixInputRow($__vars['prefixes'], array(
		'type' => 'thread',
		'prefix-value' => ($__vars['data'] ? $__vars['data']['prefix_id'] : $__vars['auctionPrefixId']),
		'textbox-value' => ($__vars['data'] ? $__vars['data']['title'] : ''),
		'textbox-class' => 'input--title',
		'placeholder' => $__vars['forum']['thread_prompt'],
		'autofocus' => 'autofocus',
		'maxlength' => $__templater->func('max_length', array('XF:Thread', 'title', ), false),
		'help-href' => $__templater->func('link', array('forums/prefix-help', $__vars['forum'], ), false),
	), array(
		'label' => 'Title',
		'rowtype' => 'fullWidth noLabel',
		'finalhtml' => $__templater->escape($__vars['titleFinalHtml']),
	)) . '

      <div>
        ' . $__templater->formEditorRow(array(
		'name' => 'message',
		'value' => ($__vars['data'] ? $__vars['data']['content'] : ''),
		'attachments' => ($__vars['attachmentData'] ? $__vars['attachmentData']['attachments'] : array()),
	), array(
		'rowtype' => 'fullWidth noLabel mergePrev',
		'label' => 'Message',
	)) . '

        ' . $__templater->formRow('
        
            ' . $__templater->callMacro('helper_attach_upload', 'upload_block', array(
		'attachmentData' => $__vars['attachmentData'],
	), $__vars) . '
         
        ', array(
	)) . '
      </div>
      
		
        ' . $__templater->formRow('
		
		 ' . $__templater->formDateInput(array(
		'name' => 'ends_on',
		'class' => 'date end',
		'value' => ($__vars['data'] ? $__templater->func('date', array($__vars['data']['ends_on'], 'Y-m-d', ), false) : $__templater->func('date', array($__vars['xf']['time'], 'Y-m-d', ), false)),
		'required' => 'true',
	)) . '
        ', array(
		'label' => 'AUCTION ENDS ON',
		'hint' => 'Required',
		'explain' => 'Choose a date.2 to 5 days is the most used range with 3 days being the most common.',
	)) . '
		
		' . $__templater->formSelectRow(array(
		'name' => 'timezone',
		'required' => 'required',
	), $__compilerTemp1, array(
		'label' => 'AUCTION ENDS AT',
		'hint' => 'Required',
		'explain' => 'All auction closing times will use the Eastern Time Zone.',
	)) . '
		
      ' . $__templater->formNumberBoxRow(array(
		'name' => 'starting_bid',
		'value' => ($__vars['data'] ? $__vars['data']['starting_bid'] : ''),
		'min' => '0',
		'required' => 'true',
	), array(
		'explain' => 'Must be in whole US dollars only. Do not put $. It will automatically be added when saved.',
		'label' => 'STARTING BID',
	)) . '
		
		' . $__templater->formSelectRow(array(
		'name' => 'bid_increament',
		'required' => 'required',
	), $__compilerTemp2, array(
		'label' => 'MINIMUM BID INCREMENT',
		'hint' => 'Required',
	)) . '
		' . $__templater->formCheckBoxRow(array(
		'name' => 'payment_methods[]',
	), $__compilerTemp3, array(
		'label' => 'PAYMENTS ACCEPTED',
		'hint' => 'Required',
		'explain' => 'Chose which forms of payment you accept.',
	)) . '
		
		' . $__templater->formSelectRow(array(
		'name' => 'shipping_term',
		'required' => 'required',
	), $__compilerTemp4, array(
		'label' => 'SHIPPING TERMS',
		'hint' => 'Required',
		'explain' => 'Chose your shipping terms.',
	)) . '
		
		' . $__templater->formSelectRow(array(
		'name' => 'ships_via',
		'required' => 'required',
	), $__compilerTemp5, array(
		'label' => 'SHIPS VIA',
		'hint' => 'Required',
		'explain' => 'Choose the shipping service you will use.',
	)) . '
		
		' . $__templater->formCheckBoxRow(array(
		'name' => 'auction_guidelines',
	), array(array(
		'value' => '1',
		'checked' => ($__vars['data']['auction_guidelines'] ? 'checked' : ''),
		'label' => '
					' . 'These are the Auction Guidelines. Please read carefully.' . '
				',
		'_type' => 'option',
	)), array(
		'label' => 'AUCTION GUIDLINES',
		'hint' => 'Required',
		'explain' => '<ol>
	<li>The highest bid at the closing time listed above will win. If there is a bid within 5 minutes of the closing time (original or extended closing time), 5 minutes shall be added to the time of the last bid, until there are no bids within the final 5 minutes. Because seconds are not displayed on post timestamps, <a href="#"><b>these examples</b></a> will be used as a reference.</li>
	<li>No Reserve. The Starting Bid of this auction will be treated as the Reserve Price.</li>
		<li>Bids must be placed in whole US dollars, using numbers in minimum increments as stated above. (bids using images or spelled out numbers are not valid)</li>
		<li>All bids are to be placed openly in this thread. No bids via Private Message/Convo. Sellers are not permitted to bid on their own auctions.</li>
		<li>The seller reserves the right to edit the listing to clarify statements or correct any errors.</li>
<li>Once a valid bid is made, the auction can not be canceled. Bid edits and/or retractions are not permitted. Violations of this rule will result in discipline at the discretion of PC Admins and/or Moderators.
</li>
<li>PCF (its Owner, Admins, and Moderators) are not responsible for any actions or outcomes that take place in this auction.</li>
</ol>',
	)) . '
		
		' . $__templater->formCheckBoxRow(array(
		'name' => 'bumping_rules',
	), array(array(
		'value' => '1',
		'checked' => ($__vars['data']['bumping_rules'] ? 'checked' : ''),
		'label' => '
					' . 'I have read and accept the auction bumping rules.' . '
				',
		'_type' => 'option',
	)), array(
		'label' => 'Auction Bumping Rules',
		'hint' => 'Required',
		'explain' => '<ol>
	<li>You can bump your auction <strong>ONCE</strong> per day and <b>TWICE</b> on the day it ends.</li>
	<li>This excludes answering direct questions regarding the item, payment, and shipping terms.</li>
		<li>Failure to abide by these rules can result in the loss of using the Auctions and Classifieds.</li>
</ol>',
	)) . '
		
' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'watch_thread',
		'value' => '1',
		'checked' => ($__vars['data']['watch_thread'] ? 'checked' : ''),
		'selected' => $__vars['option']['option_value']['required'],
		'data-hide' => 'true',
		'label' => 'Watch this thread...',
		'_dependent' => array($__templater->formCheckBox(array(
	), array(array(
		'name' => 'receive_email',
		'checked' => ($__vars['data']['receive_email'] ? 'checked' : ''),
		'selected' => $__vars['option']['option_value']['validate'],
		'label' => 'and receive email notifications',
		'_type' => 'option',
	)))),
		'_type' => 'option',
	)), array(
		'label' => 'Options',
	)) . '

    </div>
	  
	  <input type="hidden" name="category_id" value="' . $__templater->escape($__vars['category']['category_id']) . '" />

    ' . $__templater->formSubmitRow(array(
		'icon' => 'save',
		'sticky' => 'true',
	), array(
	)) . '
  </div>
', array(
		'action' => $__templater->func('link', array('auction/categories/save', $__vars['data'], ), false),
		'ajax' => 'true',
		'class' => 'block',
		'data-xf-init' => 'attachment-manager',
		'draft' => $__templater->func('link', array('auction/categories/draft', $__vars['data'], ), false),
		'data-preview-url' => $__templater->func('link', array('classifieds/categories/listing-preview', $__vars['category'], ), false),
	));
	return $__finalCompiled;
}
);