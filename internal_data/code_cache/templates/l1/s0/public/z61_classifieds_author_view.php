<?php
// FROM HASH: 5a378c11bb3293597247c56c5899209f
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Listings by ' . $__templater->escape($__vars['user']['username']) . '');
	$__templater->pageParams['pageNumber'] = $__vars['page'];
	$__finalCompiled .= '

';
	if (($__vars['user']['user_id'] == $__vars['xf']['visitor']['user_id']) AND $__templater->method($__vars['xf']['visitor'], 'canAddClassified', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
    ' . $__templater->button('Add listing' . $__vars['xf']['language']['ellipsis'], array(
			'href' => $__templater->func('link', array('classifieds/add-listing-chooser', ), false),
			'class' => 'button--cta',
			'icon' => 'write',
			'overlay' => 'true',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

';
	if ($__vars['canInlineMod']) {
		$__finalCompiled .= '
	';
		$__templater->includeJs(array(
			'src' => 'xf/inline_mod.js',
			'min' => '1',
		));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if (!$__templater->test($__vars['listings'], 'empty', array())) {
		$__finalCompiled .= '
	<div class="block" data-xf-init="' . ($__vars['canInlineMod'] ? 'inline-mod' : '') . '" data-type="classifieds_listing" data-href="' . $__templater->func('link', array('inline-mod', ), true) . '">
		<div class="block-outer">';
		$__compilerTemp1 = '';
		$__compilerTemp2 = '';
		$__compilerTemp2 .= '
							';
		if ($__vars['canInlineMod']) {
			$__compilerTemp2 .= '
								' . $__templater->callMacro('inline_mod_macros', 'button', array(), $__vars) . '
							';
		}
		$__compilerTemp2 .= '
						';
		if (strlen(trim($__compilerTemp2)) > 0) {
			$__compilerTemp1 .= '
				<div class="block-outer-opposite">
					<div class="buttonGroup">
						' . $__compilerTemp2 . '
					</div>
				</div>
			';
		}
		$__finalCompiled .= trim('

			' . $__templater->func('page_nav', array(array(
			'page' => $__vars['page'],
			'total' => $__vars['total'],
			'link' => 'classifieds/authors',
			'data' => $__vars['user'],
			'wrapperclass' => 'block-outer-main',
			'perPage' => $__vars['perPage'],
		))) . '

			' . $__compilerTemp1 . '

		') . '</div>

		<div class="block-container">
			<div class="block-body">
				<div class="structItemContainer">
					';
		if ($__templater->isTraversable($__vars['listings'])) {
			foreach ($__vars['listings'] AS $__vars['listing']) {
				$__finalCompiled .= '
						' . $__templater->callMacro('z61_classifieds_listing_list_macros', 'listing', array(
					'listing' => $__vars['listing'],
				), $__vars) . '
					';
			}
		}
		$__finalCompiled .= '
				</div>
			</div>
		</div>

		<div class="block-outer block-outer--after">
			' . $__templater->func('page_nav', array(array(
			'page' => $__vars['page'],
			'total' => $__vars['total'],
			'link' => 'classifieds/authors',
			'data' => $__vars['user'],
			'wrapperclass' => 'block-outer-main',
			'perPage' => $__vars['perPage'],
		))) . '

			' . $__templater->func('show_ignored', array(array(
			'wrapperclass' => 'block-outer-opposite',
		))) . '
		</div>
	</div>
';
	} else {
		$__finalCompiled .= '
	<div class="blockMessage">
		';
		if ($__vars['user']['user_id'] == $__vars['xf']['visitor']['user_id']) {
			$__finalCompiled .= '
			' . 'You have not posted any listings yet.' . '
		';
		} else {
			$__finalCompiled .= '
			' . '' . $__templater->escape($__vars['user']['username']) . ' has not posted any listings yet.' . '
		';
		}
		$__finalCompiled .= '
	</div>
';
	}
	return $__finalCompiled;
}
);