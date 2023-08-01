<?php
// FROM HASH: cf3b7699400c5fb70a956bd234165579
return array(
'macros' => array('molly_sub_forum_list' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'subForum' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '	  			
	  <div class="gridCard js-inlineModContainer visible public" id="' . $__templater->func('unique_id', array(), true) . '">
		  
        <div class="gridCard--container">
			
			<!-- Cover -->
			
			<div class="gridCard--cover">
			
				<div class="groupCover--wrapper">
                
        <div class="groupCover groupCoverFrame groupCover--default" style="background-color:#1f7a5c;color:#70dbb8">
            <a href="/xenforo/index.php?molly" style="background-color:#1f7a5c;color:#70dbb8">
                
                    <span class="groupCover--text">' . $__templater->escape($__vars['subForum']['node_name']) . '</span>
                
            </a>
        </div>
                    <span class="groupCover--inlineMod">
                        <label class="iconic iconic--noLabel" title="Select for moderation" data-xf-init="tooltip"><input type="checkbox"  name="ids[]" value="2" hiddenLabel="true" class="js-inlineModToggle" /><i aria-hidden="true"></i></label>
                    </span>
                

            </div>
			
			</div>
			
			<!-- Cover -->
			
			
			<!-- Header -->
			
	  
	   <div class="gridCard--header">
		   
			<!-- Avatar -->
		   
		   <div class="gridCard--header--avatar">
			
			   <a href="/xenforo/index.php?groups/test.2/"\\n
           class="groupAvatar groupAvatar--link" >
                <img src="/xenforo/data/attachments/0/259-02803ebab687b3c66b507cd3d34bfb4c.jpg"
                     class="groupAvatar--img" width="100" height="100"
                     data-width="250"
                     data-height="250"
                     alt="test"/>
        </a>
		   
		   </div>
		   
			<!-- Avatar -->
		   
			<!-- Header Main -->
              
                <div class="gridCard--header--main">
                    
		' . trim('
        <a href="' . $__templater->func('link', array('molly', $__vars['subForum'], ), true) . '" class="gridCard--header--title"
           data-tp-primary="on">
            <span>' . $__templater->escape($__vars['subForum']['title']) . '</span>
        </a>
    ') . '					
					
					
		';
	$__compilerTemp1 = '';
	if ($__vars['xf']['options']['tl_groups_enableForums']) {
		$__compilerTemp1 .= '
                <li class="groupItem-stat groupItem-stat--discussionCount">
                    ' . $__templater->fontAwesome('fa-comment', array(
		)) . '
                    3
                </li>
            ';
	}
	$__finalCompiled .= trim('
        <ul class="listInline group--counterList u-muted">
            <li class="groupItem-stat groupItem-stat--viewCount">
                ' . $__templater->fontAwesome('fa-eye', array(
	)) . '
                1
            </li>
            <li class="groupItem-stat groupItem-stat--memberCount">
                ' . $__templater->fontAwesome('fa-users', array(
	)) . '
                2
            </li>
            ' . $__compilerTemp1 . '
            <li class="groupItem-stat groupItem-stat--eventCount">
                ' . $__templater->fontAwesome('fa-calendar', array(
	)) . '
                4
            </li>
        </ul>
    ') . '
						
                </div>
		   
			<!-- Header Main -->
		   
			<!-- Action -->
		   
		   <div class="gridCard--header--actions">
		   
			<div class="buttonGroup-buttonWrapper">
                ' . $__templater->button($__templater->fontAwesome('fa-cog', array(
	)), array(
		'class' => 'button--link menuTrigger',
		'data-xf-click' => 'menu',
		'aria-expanded' => 'false',
		'aria-haspopup' => 'true',
		'title' => $__templater->filter('More options', array(array('for_attr', array()),), false),
	), '', array(
	)) . '
					<div class="menu" data-menu="menu" aria-hidden="true">
                    <div class="menu-content">
                                <a href="' . $__templater->func('link', array('molly/add-moderator', $__vars['subForum'], ), true) . '"
                                       class="menu-linkRow"
                                       data-xf-click="overlay">
                                ' . 'fs_molly_moderator' . '
                            </a>
                           
                            <hr class="menu-separator" />
                    </div>
                </div>
            </div>   
			   
		   </div>
		   
			<!-- Action -->
		   
            </div>
			
			<!-- Header -->
			
	  ';
	$__compilerTemp2 = '';
	$__compilerTemp2 .= '
					
						<div class="groupList--description u-muted">' . $__templater->escape($__vars['subForum']['description']) . '</div>
						
					';
	if (strlen(trim($__compilerTemp2)) > 0) {
		$__finalCompiled .= '
                <div class="gridCard--body">
                    ' . $__compilerTemp2 . '
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
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('fs_molly');
	$__templater->pageParams['pageNumber'] = $__vars['page'];
	$__finalCompiled .= '

';
	$__templater->setPageParam('searchConstraints', array('Auctions' => array('search_type' => 'fs_auction_auctions', ), ));
	$__finalCompiled .= '

';
	if ($__vars['xf']['visitor']) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
    ' . $__templater->button('fs_molly_add_sub_forum', array(
			'href' => $__templater->func('link', array('molly/add', ), false),
			'class' => 'button--cta',
			'icon' => 'write',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '
  

<div
  class="block"
  data-xf-init="' . ($__vars['canInlineMod'] ? 'inline-mod' : '') . '"
  data-type="fs_molly"
  data-href="' . $__templater->func('link', array('inline-mod', ), true) . '"
>
  <div class="block-outer">

  </div>
  <div class="block-container">

    <!--Listing View--->
    <div class="block-body">
		
    <!--Sub Forums List View--->
		';
	if ($__templater->func('count', array($__vars['subForums'], ), false) != 0) {
		$__finalCompiled .= '
            
			    ';
		$__vars['dummyArray'] = $__templater->func('range', array(0, 3, ), false);
		$__finalCompiled .= '
		
		
			 	<div class="block groupListBlock" data-xf-init="inline-mod"
         data-type="tl_group"
         data-href="' . $__templater->func('link', array('inline-mod', ), true) . '">
		
		<div class="groupList h-dFlex h-dFlex--wrap gridCardList--flex--2-col" data-xf-init="tl_groups_list">
		
		 ';
		if ($__templater->isTraversable($__vars['subForums'])) {
			foreach ($__vars['subForums'] AS $__vars['value']) {
				$__finalCompiled .= '

    
			 ' . $__templater->callMacro(null, 'molly_sub_forum_list', array(
					'subForum' => $__vars['value'],
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
	$__templater->includeCss('tlg_group_list.less');
	$__finalCompiled .= '
    ';
	$__templater->includeCss('tlg_style.less');
	$__finalCompiled .= '
	';
	$__templater->includeCss('tlg_grid_card.less');
	$__finalCompiled .= '

    ';
	$__templater->includeJs(array(
		'src' => 'Truonglv/Groups/group.js',
		'addon' => 'Truonglv/Groups',
		'min' => '1',
	));
	$__finalCompiled .= '
	 
		
    <!--Sub Forums List View--->

      <div class="block-footer">
        <span class="block-footer-counter"
          >' . $__templater->func('display_totals', array($__vars['totalReturn'], $__vars['total'], ), true) . '</span
        >
      </div>
    </div>
  </div>

  <div class="block-outer block-outer--after">

    ' . $__templater->func('show_ignored', array(array(
		'wrapperclass' => 'block-outer-opposite',
	))) . '
  </div>
</div>

';
	$__templater->setPageParam('sideNavTitle', 'Categories');
	$__finalCompiled .= '

';
	$__templater->modifySideNavHtml(null, '
  ' . $__templater->callMacro('fs_auction_category_list_macros', 'simple_list_block', array(
		'categoryTree' => 'null',
	), $__vars) . '

', 'replace');
	$__finalCompiled .= '

<!-- Filter Bar Macro Start -->

    <!--Sub Forums List View--->

' . '

    <!--Sub Forums List View--->';
	return $__finalCompiled;
}
);