<?php
// FROM HASH: be851d33c27f9acd05c4f9ae93747db0
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '.structItem-metaItem--rating
{
	font-size: @xf-fontSizeSmall;
}

@listing-grid-gap: 10px;
@listing-grid-width: 330px;
@listing-grid-thumb: 108px;

@media (min-width: @xf-responsiveMedium)
{
	@supports(display: grid)
	{
		.block[data-type="classifieds_listing"] .structItemContainer
		{
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(@listing-grid-width, 1fr));
			grid-gap: @listing-grid-gap;
			padding: @listing-grid-gap;
			background-color: @xf-contentAltBg;
		}

		.structItem.structItem--listing{
			display: grid;
		}
		
		.structItem--listing
		{
		    background-color: @xf-contentBg;
		    border-radius: 3px;
		    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
		    border-width: 0px;
		    display: grid;
		    grid-template-columns: @listing-grid-thumb 1fr;
		    grid-template-areas: \'icon text\' \'stats stats\';

			.structItem-cell--icon.structItem-cell--iconExpanded
			{
				width: auto;
				grid-area: icon;
			}

			.structItem-cell--main 
			{
				grid-area: text;
			}

			.structItem-cell--listingMeta
			{
				grid-area: stats;
				width: auto;
				display: flex;
				flex-wrap: wrap;
				align-items: center;
				justify-content: space-between;
			}

			.structItem-cell--iconExpanded .structItem-iconContainer .avatar 
			{
				width: 100%;
				height: auto;
				font-size: 56px;
			}

			.structItem-secondaryIcon
			{
				display: none;
			}

			.ratingStarsRow--justified
			{
				border-bottom: 1px solid @xf-borderColorFaint;
				margin-bottom: 4px;
				padding-bottom: 4px;
			}
		}
	}
}

@media (max-width: @xf-responsiveMedium)
{
	.structItem-cell.structItem-cell--listingMeta
	{
		display: block;
		width: auto;
		float: left;
		padding-top: 0;
		padding-left: 0;
		padding-right: 0;
		color: @xf-textColorMuted;

		.pairs
		{
			display: inline;

			&:before,
			&:after
			{
				display: none;
			}

			> dt,
			> dd
			{
				display: inline;
				float: none;
				margin: 0;
			}
		}

		.structItem-metaItem
		{
			display: inline;
		}

		.structItem-metaItem + .structItem-metaItem:before
		{
			display: inline;
			content: "\\20\\00B7\\20";
			color: @xf-textColorMuted;
		}
	}
}';
	return $__finalCompiled;
}
);