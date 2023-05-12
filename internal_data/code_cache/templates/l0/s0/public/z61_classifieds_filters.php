<?php
// FROM HASH: 57e7b2f7c7e29d883b014df359fbaba6
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__compilerTemp1 = '';
	if (!$__templater->test($__vars['prefixesGrouped'], 'empty', array())) {
		$__compilerTemp1 .= '
		<div class="menu-row menu-row--separated">
			' . 'Prefix' . $__vars['xf']['language']['label_separator'] . '
			<div class="u-inputSpacer">
				' . $__templater->callMacro('prefix_macros', 'select', array(
			'prefixes' => $__vars['prefixesGrouped'],
			'type' => 'classifieds_listing',
			'selected' => ($__vars['filters']['prefix_id'] ?: 0),
			'name' => 'prefix_id',
			'noneLabel' => $__vars['xf']['language']['parenthesis_open'] . 'Any' . $__vars['xf']['language']['parenthesis_close'],
		), $__vars) . '
			</div>
		</div>
	';
	}
	$__compilerTemp2 = '';
	if (!$__templater->test($__vars['listingTypes'], 'empty', array())) {
		$__compilerTemp2 .= '
		<div class="menu-row menu-row--separated">
			' . 'Type' . $__vars['xf']['language']['label_separator'] . '
			<div class="u-inputSpacer">
				';
		$__compilerTemp3 = array(array(
			'value' => '-1',
			'label' => $__vars['xf']['language']['parenthesis_open'] . 'Any' . $__vars['xf']['language']['parenthesis_close'],
			'_type' => 'option',
		));
		if ($__templater->isTraversable($__vars['listingTypes'])) {
			foreach ($__vars['listingTypes'] AS $__vars['listingType']) {
				$__compilerTemp3[] = array(
					'value' => $__vars['listingType']['listing_type_id'],
					'selected' => ($__vars['listingTypeFilter']['listing_type_id'] == $__vars['listingType']['listing_type_id']),
					'label' => $__templater->escape($__vars['listingType']['title']),
					'_type' => 'option',
				);
			}
		}
		$__compilerTemp2 .= $__templater->formSelect(array(
			'name' => 'listing_type_id',
			'value' => ($__vars['listingTypeFilter'] ?: $__templater->arrayKey($__templater->method($__vars['listingTypes'], 'first', array()), 'title')),
		), $__compilerTemp3) . '
			</div>
		</div>
	';
	}
	$__compilerTemp4 = '';
	if (!$__templater->test($__vars['conditions'], 'empty', array())) {
		$__compilerTemp4 .= '
	<div class="menu-row menu-row--separated">
		' . 'Condition' . $__vars['xf']['language']['label_separator'] . '
		<div class="u-inputSpacer">
			';
		$__compilerTemp5 = array(array(
			'value' => '-1',
			'label' => $__vars['xf']['language']['parenthesis_open'] . 'Any' . $__vars['xf']['language']['parenthesis_close'],
			'_type' => 'option',
		));
		if ($__templater->isTraversable($__vars['conditions'])) {
			foreach ($__vars['conditions'] AS $__vars['condition']) {
				$__compilerTemp5[] = array(
					'value' => $__vars['condition']['condition_id'],
					'selected' => ($__vars['conditionFilter']['condition_id'] == $__vars['condition']['condition_id']),
					'label' => $__templater->escape($__vars['condition']['title']),
					'_type' => 'option',
				);
			}
		}
		$__compilerTemp4 .= $__templater->formSelect(array(
			'name' => 'condition_id',
			'value' => ($__vars['conditionFilter'] ?: $__templater->arrayKey($__templater->method($__vars['conditions'], 'first', array()), 'title')),
		), $__compilerTemp5) . '
		</div>
	</div>
	';
	}
	$__compilerTemp6 = '';
	if ($__vars['xf']['options']['z61ClassifiedsGoogleApi']) {
		$__compilerTemp6 .= '
		<div class="menu-row menu-row--separated">
			' . 'Address' . $__vars['xf']['language']['label_separator'] . '
			<div class="u-inputSpacer">
				' . $__templater->formTextBox(array(
			'name' => 'address',
			'value' => ($__vars['filters']['address']['formatted'] ?: ''),
		)) . '
			</div>
			<hr class="formRowSep" />
			' . 'Within' . $__vars['xf']['language']['label_separator'] . '
			<div class="inputGroup u-inputSpacer">
				<div class="inputGroup inputGroup--numbers">
					' . $__templater->formNumberBox(array(
			'name' => 'distance',
			'class' => 'input input--numberNarrow js-pageJumpPage',
			'value' => (!$__templater->test($__vars['filters']['address']['distance'], 'empty', array()) ? $__vars['distance'] : 5),
			'min' => '5',
			'step' => '5',
		)) . '
				</div>
				<span class="inputGroup-splitter"></span>
				<select name="distance_unit" class="input">
					<option value="km" selected="' . ($__vars['filters']['address']['distance_unit'] == 'km') . '">km</option>
					<option value="mi" selected="' . ($__vars['filters']['address']['distance_unit'] == 'mi') . '">mi</option>
				</select>
			</div>
		</div>
	';
	}
	$__finalCompiled .= $__templater->form('
	' . '
	' . $__compilerTemp1 . '

	' . '
	<div class="menu-row menu-row--separated">
		' . 'Created by' . $__vars['xf']['language']['label_separator'] . '
		<div class="u-inputSpacer">
			' . $__templater->formTextBox(array(
		'name' => 'creator',
		'value' => ($__vars['creatorFilter'] ? $__vars['creatorFilter']['username'] : ''),
		'ac' => 'single',
	)) . '
		</div>
	</div>

	' . $__compilerTemp2 . '

	' . $__compilerTemp4 . '
	<!--[Z61/Classifieds:above_location_filter] -->
	' . $__compilerTemp6 . '
	' . '
	<div class="menu-row menu-row--separated">
		' . 'Sort by' . $__vars['xf']['language']['label_separator'] . '
		<div class="inputGroup u-inputSpacer">
			' . $__templater->formSelect(array(
		'name' => 'order',
		'value' => ($__vars['filters']['order'] ?: $__vars['xf']['options']['z61ClassifiedsListDefaultOrder']),
	), array(array(
		'value' => 'last_update',
		'label' => 'Last updated',
		'_type' => 'option',
	),
	array(
		'value' => 'expiration_date',
		'label' => 'Expiration date',
		'_type' => 'option',
	),
	array(
		'value' => 'listing_date',
		'label' => 'Submission date',
		'_type' => 'option',
	),
	array(
		'value' => 'title',
		'label' => 'Title',
		'_type' => 'option',
	),
	array(
		'value' => 'price',
		'label' => 'Price',
		'_type' => 'option',
	))) . '
			<span class="inputGroup-splitter"></span>
			' . $__templater->formSelect(array(
		'name' => 'direction',
		'value' => ($__vars['filters']['direction'] ?: 'desc'),
	), array(array(
		'value' => 'desc',
		'label' => 'Descending',
		'_type' => 'option',
	),
	array(
		'value' => 'asc',
		'label' => 'Ascending',
		'_type' => 'option',
	))) . '
		</div>
	</div>

	<div class="menu-footer">
		<span class="menu-footer-controls">
			' . $__templater->button('Filter', array(
		'type' => 'submit',
		'class' => 'button--primary',
	), '', array(
	)) . '
		</span>
	</div>
	' . $__templater->formHiddenVal('apply', '1', array(
	)) . '
', array(
		'action' => $__templater->func('link', array(($__vars['category'] ? 'classifieds/categories/filters' : 'classifieds/filters'), $__vars['category'], ), false),
	));
	return $__finalCompiled;
}
);