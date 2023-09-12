<?php
// FROM HASH: f79bcd6b8e2d510ff6add13d7a3e1891
return array(
'macros' => array('data_in_list' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'data' => '!',
		'siteUrl' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	<div class="gridCard js-inlineModContainer visible public" id="' . $__templater->func('unique_id', array(), true) . '">

		<div class="gridCard--container">

			<!-- Cover -->

			<div class="gridCard--cover">
				<div class="webRankingCover--wrapper">
					<div class="webRankingCover webRankingCoverFrame webRankingCover--default" style="background-color:#' . $__templater->escape($__templater->method($__vars['data'], 'getRandomColor', array())) . ';color:#70dbb8">
						<a href="' . $__templater->func('link', array('forums', $__vars['data'], ), true) . '" style="color:#fff">
							<span class="webRankingCover--text">' . $__templater->func('snippet', array($__vars['data']['title'], 25, ), true) . '</span>
						</a>
					</div>

				</div>

			</div>

			<!-- Cover -->


			<!-- Header -->


			<div class="gridCard--header">

				<!-- Avatar -->

				<div class="gridCard--header--avatar">
						' . $__templater->func('avatar', array($__vars['xf']['visitor'], 'l', false, array(
	))) . '
				</div>

				<!-- Avatar -->

				<!-- Header Main -->

				<div class="gridCard--header--main">

					' . trim('
						<a href="' . $__templater->func('link', array('forums', $__vars['data'], ), true) . '" class="gridCard--header--title" data-tp-primary="on">
							<span>' . $__templater->escape($__vars['data']['title']) . '</span>
						</a>
					') . '


					' . trim('
						<ul class="listInline webRanking--counterList u-muted">
							<li class="webRankingItem-stat webRankingItem-stat--viewCount" style="margin-right:10px;">
								' . $__templater->fontAwesome('fa-eye', array(
	)) . '
								' . $__templater->escape($__templater->method($__vars['data'], 'getViewCounts', array())) . '
							</li>

							<li class="webRankingItem-stat webRankingItem-stat--discussionCount">
								' . $__templater->fontAwesome('fa-comment', array(
	)) . '
								' . $__templater->escape($__vars['data']['Forum']['message_count']) . '
							</li>
						</ul>
					') . '

				</div>

				<!-- Header Main -->

			</div>

			<!-- Header -->

			';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '

						<div class="webRankingList--description u-muted">' . $__templater->escape($__vars['data']['description']) . '</div>

					';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
				<div class="gridCard--body">
					' . $__compilerTemp1 . '
				</div>
			';
	}
	$__finalCompiled .= '

		</div>
		

	</div>

';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Website Ranking');
	$__templater->pageParams['pageNumber'] = $__vars['page'];
	$__finalCompiled .= '

<div class="block" data-xf-init="' . ($__vars['canInlineMod'] ? 'inline-mod' : '') . '" data-type="fs_website_ranking" data-href="' . $__templater->func('link', array('inline-mod', ), true) . '">
	<div class="block-outer">

	</div>
	<div class="block-container">

		<!--Listing View--->
		<div class="block-body">

			<!--Website Ranking List View--->
			';
	if ($__templater->func('count', array($__vars['data'], ), false) != 0) {
		$__finalCompiled .= '

				<div class="block webRankingListBlock" data-xf-init="inline-mod" data-type="fs_website_ranking" data-href="' . $__templater->func('link', array('inline-mod', ), true) . '">

					<div class="webRankingList h-dFlex h-dFlex--wrap gridCardList--flex--' . $__templater->escape($__vars['xf']['options']['fs_website_ranking_per_row']) . '-col" data-xf-init="fs_website_ranking_list">

						';
		if ($__templater->isTraversable($__vars['data'])) {
			foreach ($__vars['data'] AS $__vars['value']) {
				$__finalCompiled .= '

							' . $__templater->callMacro(null, 'data_in_list', array(
					'data' => $__vars['value'],
					'siteUrl' => $__vars['siteUrl'],
				), $__vars) . '

						';
			}
		}
		$__finalCompiled .= '
					</div>
				</div>
			';
	}
	$__finalCompiled .= '

			';
	$__templater->includeCss('fs_web_ranking_list.less');
	$__finalCompiled .= '
			';
	$__templater->includeCss('fs_web_ranking_style.less');
	$__finalCompiled .= '
			';
	$__templater->includeCss('fs_web_ranking_grid_card.less');
	$__finalCompiled .= '

			<!--Website Ranking List View--->

			<div class="block-footer">
				<span class="block-footer-counter">' . $__templater->func('display_totals', array($__vars['totalReturn'], $__vars['total'], ), true) . '</span>
			</div>
			
			' . $__templater->func('page_nav', array(array(
		'page' => $__vars['page'],
		'total' => $__vars['total'],
		'link' => $__vars['siteUrl'],
		'wrapperclass' => 'block',
		'perPage' => $__vars['perPage'],
	))) . '
		</div>
	</div>

	<div class="block-outer block-outer--after">

		' . $__templater->func('show_ignored', array(array(
		'wrapperclass' => 'block-outer-opposite',
	))) . '
	</div>
</div>

<!-- Filter Bar Macro Start -->

<!--Website Ranking List View--->

' . '

<!--Website Ranking List View--->';
	return $__finalCompiled;
}
);