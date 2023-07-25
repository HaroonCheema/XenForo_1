<?php
// FROM HASH: 240ecd9ec7bfdca1624d8bba071e0598
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '.mediatypeholder
{
	width:100%;
	display:block;
	overflow:hidden;	
}

.mediatypeblock
{
	border:none;
	margin-bottom:5px;
	diplay:block;
	float:right;	
}

.mapholder  {
	position: relative;
	width: 400px;
	height: 400px;
	overflow: hidden;
	
	@media (max-width: @xf-responsiveMedium)
	{
		width:auto;
		height:auto;
		min-height: 200px;
		min-width: 200px;
	}
}

.mapholder iframe {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}

.popholder
{
	width:100%;
	padding-right: 5px;
	overflow:hidden;
	display:block;
}

.popheader
{
	border-top:1px solid @xf-borderColor;
	border-left:1px solid @xf-borderColor;
	border-right:1px solid @xf-borderColor;
}
.popular
{
	width:50%;
	padding-left:5px;
	float:left;
	min-height:325px;
	
	@media (max-width: @xf-responsiveMedium)
	{
		float: none;
		width:auto;
		height:auto;
		min-height: 162px;
	}
}

.mainframe
{
	margin-top:10px;
	margin-bottom:10px;
}

.waitblock
{
	display:block;
	width:300px;
	margin-left:auto;
	margin-right:auto;
	vertical-align:bottom;
	margin-top:20px;
}

.maxblock
{
	display:block;
	width:100%;
	vertical-align:bottom;
	text-align:center;
	margin-top:20px;
}

.postholder
{
	width:95%;
	margin-left:auto;
	margin-right:auto;
}

.tcenter
{
	text-align:center;
}

.ndisplay
{
	display:none !important;
}

.group-p-title
{
	display: flex;
	flex-wrap: wrap;
	align-items: center;
	max-width: 100%;
	margin-bottom: -5px;

	&.p-title--noH1
	{
		flex-direction: row-reverse;
	}

	.has-no-flexbox &
	{
		.m-clearFix();
	}
}

.group-p-title-value
{
	padding: 0;
	margin: 0 0 5px 0;
	font-size: @xf-fontSizeLargest;
	font-weight: @xf-fontWeightNormal;
	min-width: 0;
	margin-right: auto;

	.has-no-flexbox &
	{
		float: left;
	}
}

.group-p-title-pageAction
{
	margin-bottom: 15px;

	.has-no-flexbox &
	{
		float: right;
	}
}

.cleft
{
	clear:left;
}

.headRow
{
	display: table;
	table-layout: fixed;
	width: 100%;
	margin: 0;
	position: relative;

	> dt,
	> dd
	{
		display: table-cell;
		vertical-align: top;
		margin: 0;
	}

	> dt
	{
		width: @xf-sidebarWidth;
		//width: 241px;
		border-right: @xf-borderSize solid transparent;
		/* border-color: @xf-borderColorLight;
		background-color: @xf-contentAltBg; */
		.xf-formLabel();
		padding: @xf-formRowPaddingV @xf-formRowPaddingHInner @xf-formRowPaddingV @xf-formRowPaddingHOuter;
		
		img
		{
			border-radius: 10px;
		}
	}

	> dd
	{
		width: (100% - @xf-sidebarWidth);
		padding: @xf-formRowPaddingV @xf-formRowPaddingHOuter @xf-formRowPaddingV @xf-formRowPaddingHInner;
	}

	&.headRow--input > dt
	{
		/*padding-top: (@xf-formRowPaddingV + @_form-labelShiftInput); */
	}

	&.headRow--button > dt
	{
		/* padding-top: (@xf-formRowPaddingV + @_form-labelButtonInput); */
	}
	
	&.headRow--limited
	{
		/* display: none; */
	}

	.headRow-label
	{
		/* .m-appendColon(); */
	}

	&.headRow--noColon .headRow-label:after
	{
		/*content: ""; */
	}

	.headRow-explain
	{
		/* margin: @_form-elementSpacer 0 0; */
		/* .m-formElementExplain(); */
	}

	.headRow-hint
	{
		/* display: block;
		font-style: normal;
		.xf-formHint();

		.m-textColoredLinks(); */
	}

	+ .headInfoRow
	{
		border-top: @xf-borderSize solid @xf-borderColorLight;
	}
	
	.block-minorHeader
	{
		text-align:left;
	}

	.contentRow-main 
	{
		text-align:left;
		
		.contentRow-main--close
		{
			
		}
		
		contentRow-minor
		{
			font-size: @xf-fontSizeSmallest;
		}
	}
	
	@media (max-width: @xf-responsiveMedium)
	{
		&.headRow > dt
		{
			display: none !important;
		}
	}
}

.headerpad
{
	margin-top:10px;
}

.bannerimg
{
	border-radius: 10px;
}

.bannerWidget
{
	text-align: center;
	padding-top: 5px;
}

.infoRow
{
	display: table;
	table-layout: fixed;
	width: 100%;
	margin: 0;
	position: relative;

	> dt,
	> dd
	{
		display: table-cell;
		vertical-align: top;
		margin: 0;
	}

	> dt
	{
		width: 50%;
		color: @xf-textColorMuted;
		text-align: left;
	}

	> dd
	{
		text-align: right;
		width: 50%;
	}
}

.blockLink-group
{
	display: block;
	width: auto;
	max-width: 100px;
	overflow: hidden;
	font-size: @xf-fontSizeSmaller;
	font-weight: @xf-fontWeightNormal;
	
	&:hover
	{
		/*.xf-blockLinkSelected(background);*/
		text-decoration: underline;
	}
}

.photos
{
	width: 99%;
	margin-left: auto;
	margin-right: auto;
	text-align: center;
	overflow:hidden;

	.photoMain
	{
		display:inline-block;
		width: 134px;
		height: 154px;
		text-align:center;
		vertical-align: top;
		margin: 5px;
		padding-top:5px;
		border: 1px solid @xf-borderColorHeavy;
		border-radius: 5px;
		box-shadow: 5px 5px 8px @xf-borderColorHeavy;
		
		position: relative;

		&.deleted
		{
			background-color: rgba(255, 153, 153, 0.2);
		}
	}
	
	.photo
	{
		display: inline-block;
		max-width: 120px;
		max-height: 110px;
		margin-left: auto;
		margin-right: auto;
		border:1px solid @xf-borderColor;
		border-radius: 3px;
		padding: 3px 3px;
		background: @xf-pageBg;
		
		img
		{
			vertical-align: middle;			
		}
	}
	
	.phototitle
	{
		display: block;
		width: 128px;
		font-size: @xf-fontSizeSmallest;
		overflow: hidden;
		position: absolute;
  		bottom: 3px;
		left: 3px;
	}
}

.photodelete
{
	float: right;
	margin-top: 5px;
	margin-bottom: 5px;
	font-size: @xf-fontSizeSmaller;
}

.members
{
	width: 99%;
	margin-top: 10px;
	margin-left: auto;
	margin-right: auto;
	text-align: center;
	
	.user
	{
		display: inline-block;
		width: 150px;
 		vertical-align: top;
		margin: 5px;
		font-size: @xf-fontSizeSmallest;
		text-align: center;
		word-wrap: normal;
		word-break:break-all;
	
		.userTitle
		{
			font-size: @xf-fontSizeSmallest;
			color: @xf-textColorMuted;
			
			&.redtitle
			{
				color: red;
			}
		}
	}
}

.groups
{
	width: 99%;
	margin-top: 10px;
	margin-left: auto;
	margin-right: auto;
	text-align: center;
	
	.groupBlock
	{
    	display: inline-block;
   		width: 240px;
		height:130px;
 		vertical-align: top;
		margin: 5px;
		text-align: center;
		
		.groupName
		{	
			max-width: 220px;
			margin-left: auto;
			margin-right: auto;
		}
	}
	
	img
	{
		border-radius: 10px;
	}
}

.button
{
		&.button--icon
	{
		/*> .button-text:before
		{
			.m-faBase();
			font-size: 120%;
			vertical-align: middle;
			display: inline-block;
			margin: -.255em 6px -.255em 0;
		}*/

		&--handshake          { .m-buttonIcon(@fa-var-handshake-o, 1.1em) }
		&--leave              { .m-buttonIcon(@fa-var-sign-out, .79em) }
		&--previous           { .m-buttonIcon(@fa-var-step-backward, .79em) }
		&--next               { .m-buttonIcon(@fa-var-step-forward, .79em) }
		&--thumbup            { .m-buttonIcon(@fa-var-thumbs-up, .79em) }
		&--thumbdown          { .m-buttonIcon(@fa-var-thumbs-down, .79em) }
		&--times              { .m-buttonIcon(@fa-var-times, .79em) }
			

	}
}

.m-buttonIcon(@icon, @width: false)
{
	& > .button-text:before
	{
		.m-faContent(@icon, @width);
	}
}

.menuLink
{
	display: inline-block;
	padding: @xf-blockPaddingV @xf-blockPaddingH;
	font-size: @xf-fontSizeSmaller;
	font-weight: @xf-fontWeightNormal;
	.xf-blockLink();

	&.is-selected
	{
		.xf-blockLinkSelected(no-border);
		border-left: @xf-blockLinkSelected--border-width solid @xf-blockLinkSelected--border-color;
		padding-left: (@xf-blockPaddingH - xf-default(@xf-blockLinkSelected--border-width, 0));
	}

	&:hover
	{
		.xf-blockLinkSelected(background);
		text-decoration: inherit;
	}
}';
	return $__finalCompiled;
}
);