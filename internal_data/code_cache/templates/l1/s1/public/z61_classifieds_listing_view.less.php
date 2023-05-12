<?php
// FROM HASH: a809c570eca695d4ef8f1f5a8d455f61
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '.block--classifieds
{
	.classifieds-wrapper
	{
		display: flex;
		flex-wrap: wrap;
		align-items: start;
		padding: @xf-paddingMedium @xf-paddingLarge;
		@media (max-width: (@xf-responsiveWide + @xf-sidebarWidth))
		{
			display: block;
		}
		.classifieds-left
		{
			flex: 0 0 400px;
			overflow: hidden;
			text-align: center;
			.classifieds-featuredImage
			{
				margin-bottom: @xf-paddingMedium;
			}
			.attachment
			{
				padding: 5px !important;
				width: auto;
				display: block;
				.attachment-icon
				{
					height: auto;
					line-height: 1;
				}
				.attachment-name, .attachment-details { display: none; }
			}
		}
		.classifieds-right
		{
			flex: 1 1 auto;
			background-color: @xf-contentAltBg;
			padding: @xf-paddingLargest;
			margin-left: @xf-elementSpacer;
			@media (max-width: (@xf-responsiveWide + @xf-sidebarWidth))
			{
				margin-top: @xf-elementSpacer;
				margin-left: 0;
			}
			dl
			{
				border-bottom: 1px solid @xf-borderColorLight;
				padding: @xf-paddingMedium 0;
				&:first-child { padding-top: 0; }
				&:last-child { border-bottom-width: 0; padding-bottom: 0; }
			}
		}
	}
}

.classifiedsCoverImage-container
{
	img
	{
		max-width: 250px;
		max-height: 250px;
	}
}';
	return $__finalCompiled;
}
);