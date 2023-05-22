<?php
// FROM HASH: 38c9068eea59ea7af6b74f533896b94f
return array(
'macros' => array('bidding_table_list' => array(
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
		'html' => ' ' . 'fs_auction_bidding_username' . ' ',
	),
	array(
		'_type' => 'cell',
		'html' => ' ' . 'fs_auction_bid_at' . ' ',
	),
	array(
		'_type' => 'cell',
		'html' => ' ' . 'fs_auction_bid_amount' . ' ',
	),
	array(
		'class' => 'dataList-cell--min',
		'_type' => 'cell',
		'html' => '',
	))) . '
  ';
	if ($__templater->isTraversable($__vars['bidding'])) {
		foreach ($__vars['bidding'] AS $__vars['val']) {
			$__finalCompiled .= '
    ' . $__templater->dataRow(array(
			), array(array(
				'href' => $__templater->func('link', array('crud/edit', $__vars['val'], ), false),
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
			),
			array(
				'href' => $__templater->func('link', array('ship-via/edit', $__vars['value'], ), false),
				'_type' => 'action',
				'html' => 'Edit',
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
	' . $__templater->button('Bumping', array(
			'href' => $__templater->func('link', array('auction/categories/bumping', $__vars['auction'], ), false),
			'class' => 'button button--icon button--icon--add',
			'icon' => 'add',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

<header class="message-attribution message-attribution--split" style="color: #8c8c8c; font-size: 12px; padding-bottom: 3px; border-bottom: 1px solid #c9c9c9;">
		<ul class="message-attribution-main listInline ">

			<li class="u-concealed">
					' . $__templater->func('date_dynamic', array($__vars['auction']['created_date'], array(
		'itemprop' => 'datePublished',
	))) . '
			</li>
		</ul>
	</header>
  <div class="block-container">

		<div class="message-fields message-fields--after">
	
				<dl class="pairs pairs--columns pairs--fixedSmall pairs--customField" data-field="threadCustomField">
					<dt>' . 'AUCTION ENDS ON' . '</dt>
					
					<dd>' . $__templater->func('date_dynamic', array($__vars['auction']['ends_on'], array(
	))) . '</dd>
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


<br><br>
<div>
	

				<img src="' . ($__templater->method($__vars['auction'], 'getImage', array()) ? $__templater->escape($__templater->method($__vars['auction'], 'getImage', array())) : $__templater->func('base_url', array('styles/FS/AuctionPlugin/no_image.png', true, ), true)) . '" alt="' . $__templater->escape($__vars['attachment']['filename']) . '"
					width=" " style="width:-webkit-fill-available; width:-moz-available;" height="" loading="lazy" />

</div>

';
	if (($__vars['auction']['ends_on'] > $__vars['xf']['time']) AND ($__vars['xf']['visitor']['user_id'] != 0)) {
		$__finalCompiled .= '
		';
		if ($__vars['xf']['visitor']['user_id'] != $__vars['auction']['User']['user_id']) {
			$__finalCompiled .= '


			';
			$__vars['bidDropDownRange'] = $__templater->func('range', array(0, $__vars['dropDownListLimit'], ), false);
			$__vars['sum'] = ($__vars['auction']['bid_increament'] + $__vars['auction']['starting_bid']);
			$__compilerTemp1 = array();
			if ($__templater->isTraversable($__vars['bidDropDownRange'])) {
				foreach ($__vars['bidDropDownRange'] AS $__vars['key'] => $__vars['val']) {
					$__compilerTemp1[] = array(
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
			), array(array(
				'label' => 'Bid from Dropdown',
				'_dependent' => array('
										<!--sum value is  bid increament+bidstart -->
										' . '' . '

										' . $__templater->formSelect(array(
				'name' => 'bidding_amount',
			), $__compilerTemp1) . '
									'),
				'_type' => 'option',
			),
			array(
				'label' => 'Custom Bid',
				'_dependent' => array('
										 ' . $__templater->formNumberBox(array(
				'name' => 'bidding_amount',
				'value' => '',
				'min' => '0',
			)) . '
									'),
				'_type' => 'option',
			))) . '
					</div>
	
		', array(
				'label' => 'Bidding Cost',
			)) . '

			' . $__templater->formSubmitRow(array(
				'icon' => 'reply',
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
		<p>' . 'You can not bid your own Auction' . '</p>
	';
		}
		$__finalCompiled .= '
	
';
	} else {
		$__finalCompiled .= '
	' . 'Bidding Not Allowed.' . '
';
	}
	$__finalCompiled .= '
</div>

<div class="block">
  <div class="block-container">
    <div class="block-body">
      ' . $__templater->dataList('
          ' . $__templater->callMacro(null, 'bidding_table_list', array(
		'bidding' => $__vars['bidding'],
	), $__vars) . '
      ', array(
		'data-xf-init' => 'responsive-data-list',
	)) . '
    </div>
  </div>
</div>


';
	return $__finalCompiled;
}
);