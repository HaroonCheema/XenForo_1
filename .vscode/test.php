<xf:title page="{$page}">{{ phrase('fs_website_ranking') }}</xf:title>

<div class="block" data-xf-init="{{ $canInlineMod ? 'inline-mod' : '' }}" data-type="fs_website_ranking" data-href="{{ link('inline-mod') }}">
	<div class="block-outer">

	</div>
	<div class="block-container">

		<!--Listing View--->
		<div class="block-body">

			<!--Website Ranking List View--->
			<xf:if is="count($data) != 0">

				<div class="block webRankingListBlock" data-xf-init="inline-mod" data-type="fs_website_ranking" data-href="{{ link('inline-mod') }}">

					<div class="webRankingList h-dFlex h-dFlex--wrap gridCardList--flex--{$xf.options.fs_website_ranking_per_row}-col" data-xf-init="fs_website_ranking_list">

						<xf:foreach loop="{$data}" value="$value">

							<xf:macro name="data_in_list" arg-data="{$value}" arg-siteUrl="{$siteUrl}" />

						</xf:foreach>
					</div>
				</div>
			</xf:if>

			<xf:css src="fs_web_ranking_list.less" />
			<xf:css src="fs_web_ranking_style.less" />
			<xf:css src="fs_web_ranking_grid_card.less" />

			<!--Website Ranking List View--->

			<div class="block-footer">
				<span class="block-footer-counter">{{ display_totals($totalReturn, $total) }}</span>
			</div>
		</div>
	</div>

	<div class="block-outer block-outer--after">

		<xf:showignored wrapperclass="block-outer-opposite" />
	</div>
</div>

<!-- Filter Bar Macro Start -->

<!--Website Ranking List View--->

<xf:macro name="data_in_list" arg-data="!" arg-siteUrl="!">
	<div class="gridCard js-inlineModContainer visible public" id="{{ unique_id() }}">

		<div class="gridCard--container">

			<!-- Cover -->

			<div class="gridCard--cover">

				<div class="webRankingCover--wrapper">

					<div class="webRankingCover webRankingCoverFrame webRankingCover--default" style="background-color:#{{$data.getRandomColor()}};color:#70dbb8">
						<a href="{{ link($siteUrl, $data) }}" style="color:#fff">
							<span class="webRankingCover--text">{{ snippet($data.title, 25) }}</span>
						</a>
					</div>

				</div>

			</div>

			<!-- Cover -->


			<!-- Header -->


			<div class="gridCard--header">

				<!-- Avatar -->

				<div class="gridCard--header--avatar">
					<xf:if is="$data.AvatarAttachment">
						<a href="{{ link($siteUrl, $data) }}" class="webRankingAvatar webRankingAvatar--link webRankingAvatar--default" style="background-color:#e08585;color:#8f2424">
							<img src="{{ $data.AvatarAttachment.thumbnail_url }}" class="webRankingAvatar--img bbImage" width="100" height="100" data-width="{$data.AvatarAttachment.width}" data-height="{$data.AvatarAttachment.height}" alt="{$data.title}" />
						</a>

						<xf:else />
						<xf:comment>
							<span class="webRankingAvatar--text webRankingAvatar--dynamic">{$xf.visitor.username}</span>
						</xf:comment>
						<xf:avatar user="$xf.visitor" size="l" />
					</xf:if>
				</div>

				<!-- Avatar -->

				<!-- Header Main -->

				<div class="gridCard--header--main">

					<xf:trim>
						<a href="{{ link($siteUrl, $data) }}" class="gridCard--header--title" data-tp-primary="on">
							<span>{$data.title}</span>
						</a>
					</xf:trim>


					<xf:trim>
						<ul class="listInline webRanking--counterList u-muted">
							<li class="webRankingItem-stat webRankingItem-stat--viewCount" style="margin-right:10px;">
								<xf:fa icon="fa-eye" />
								{$data.getViewCounts()}
							</li>

							<li class="webRankingItem-stat webRankingItem-stat--discussionCount">
								<xf:fa icon="fa-comment" />
								{$data.Forum.message_count}
							</li>
						</ul>
					</xf:trim>

				</div>

				<!-- Header Main -->

			</div>

			<!-- Header -->

			<xf:if contentcheck="true">
				<div class="gridCard--body">
					<xf:contentcheck>

						<div class="webRankingList--description u-muted">{$data.description}</div>

					</xf:contentcheck>
				</div>
			</xf:if>

		</div>

	</div>

</xf:macro>

<!--Website Ranking List View--->