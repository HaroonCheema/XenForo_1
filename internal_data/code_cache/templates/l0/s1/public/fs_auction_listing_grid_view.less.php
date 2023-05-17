<?php
// FROM HASH: afc099918fd80c89ac3480dceb686ce5
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '.structItem-metaItem--rating
{
	font-size: @xf-fontSizeSmall;
}

@listing-grid-gap: 10px;
//@listing-grid-width: 330px;
@listing-grid-width: 292px;
@listing-grid-thumb: 108px;

.auction-itemGrid-img{
	
	min-width:188px;
	max-width:188px;
	
}
.auction-category{
	font-size: 12px;
    color: #8c8c8c;
}
@media(min-width:767.5){
	.auction-itemGrid-img{
	
	min-width:388px;
	max-width:388px;
	
}
}
@media (min-width: @xf-responsiveMedium)
{
	.auction-itemGrid-img{
		min-width:340px;
		max-width:340
		
	}
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
}

@media  (min-width:1024.5px){
	.auction-itemGrid-img{
	min-width:277px;
	max-width:277px;
		
	}
}';
	return $__finalCompiled;
}
);