<?php
// FROM HASH: 7a5f5a44013b2152a9874cc9e995f5d6
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped($__templater->escape($__vars['group']['name']));
	$__finalCompiled .= '

';
	if ($__vars['xf']['visitor']['user_id'] AND ($__vars['xf']['visitor']['user_id'] == $__vars['subForums']['user_id'])) {
		$__finalCompiled .= '
	' . $__templater->button('
		' . 'Moderator List' . '
	', array(
			'href' => $__templater->func('link', array('forumGroups/moderator-list', $__vars['subForums'], ), false),
			'class' => 'button--cta',
			'icon' => 'write',
		), '', array(
		)) . '
';
	}
	$__finalCompiled .= '
	
	<!-- Thread BTN -->
	
	
	' . $__templater->button('
		' . 'Post thread' . '
	', array(
		'href' => $__templater->func('link', array('forums/post-thread', $__vars['subForums'], ), false),
		'class' => 'button--cta',
		'icon' => 'write',
		'style' => 'float: right',
	), '', array(
	)) . '

';
	if ($__vars['xf']['visitor']['user_id'] AND ($__vars['subForums']['room_path'] AND ($__vars['xf']['visitor']['user_id'] == $__vars['subForums']['user_id']))) {
		$__finalCompiled .= '
	' . $__templater->button('
		' . 'Chat Room' . '
	', array(
			'href' => $__templater->func('link', array($__vars['subForums']['room_path'], ), false),
			'class' => 'button--cta',
			'icon' => 'write',
			'style' => 'float: right',
		), '', array(
		)) . '
';
	}
	$__finalCompiled .= '
	
	<!-- Thread BTN -->

';
	$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('
		' . 'Post thread' . '
	', array(
		'href' => $__templater->func('link', array('forums/post-thread', $__vars['forum'], ), false),
		'class' => 'button--cta',
		'icon' => 'write',
	), '', array(
	)) . '
');
	$__finalCompiled .= '

';
	$__templater->includeCss('fs_forum_gorups_style.less');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['subForums']['AvatarAttachment']) {
		$__compilerTemp1 .= '
        <a href="' . $__templater->func('link', array('forumGroups', $__vars['subForums'], ), true) . '"
       class="groupAvatar groupAvatar--link groupAvatar--default" style="background-color:#e08585;color:#8f2424">
			<img src="' . $__templater->escape($__vars['subForums']['AvatarAttachment']['thumbnail_url']) . '"
                 class="groupAvatar--img bbImage" width="250" height="250"
                 data-width="' . $__templater->escape($__vars['subForums']['AvatarAttachment']['width']) . '"
                 data-height="' . $__templater->escape($__vars['subForums']['AvatarAttachment']['height']) . '"
                 alt="' . $__templater->escape($__vars['subForums']['title']) . '"/>
    </a>
			   
			';
	} else {
		$__compilerTemp1 .= '
			   ' . '
			  ' . $__templater->func('avatar', array($__vars['subForums']['User'], 'l', false, array(
		))) . '
			';
	}
	$__templater->modifySideNavHtml(null, '
	
	<!-- Avatar -->
	
	<div class="block groupAvatar-block">
           ' . $__compilerTemp1 . '
    </div>
	
	<!-- Avatar -->

', 'replace');
	$__finalCompiled .= '

<div class="groupWrapper groupWrapper-' . $__templater->escape($__vars['subForums']['node_id']) . '">

	<!-- Header -->

	';
	$__templater->setPageParam('headerHtml', '
        <div class="contentRow contentRow--hideFigureNarrow">
            <div class="contentRow-main">
                <div class="p-title">
                    <h1 class="p-title-value">
                        ' . $__templater->escape($__vars['subForums']['title']) . '
                    </h1>
                </div>
                    <div class="p-description">
                        ' . $__templater->escape($__vars['subForums']['description']) . '
                    </div>
            </div>
        </div>
    ');
	$__finalCompiled .= '

	<!-- Header -->

	<!-- Cover Header -->

	<div class="block">
        <div class="block-container groupCover-header">
            <div class="block-body">
               <div class="groupCover groupCoverFrame groupCover--default" style="background-color:#e08585;color:#8f2424">
        <a href="' . $__templater->func('link', array('forumGroups', $__vars['subForums'], ), true) . '" style="background-color:#e08585;color:#8f2424">
                ';
	if ($__vars['subForums']['CoverAttachment']) {
		$__finalCompiled .= '
                <img data-crop="' . $__templater->filter($__templater->method($__vars['subForums'], 'getCoverCropData', array()), array(array('json', array()),), true) . '"
                     class="groupCover--img groupCover--lazy" data-xf-init="fs-forum-groups-cover-setup"
                     ' . ($__templater->method($__vars['subForums'], 'getImageAttributes', array()) ? (' ' . $__templater->escape($__templater->method($__vars['subForums'], 'getImageAttributes', array()))) : '') . '/>
            ';
	} else {
		$__finalCompiled .= '
                <span class="groupCover--text">' . $__templater->func('snippet', array($__vars['subForums']['title'], 25, ), true) . '</span>
            ';
	}
	$__finalCompiled .= '
        </a>
    </div>
            </div>

            ';
	if (!$__templater->test($__vars['isEditing'], 'empty', array())) {
		$__finalCompiled .= '
                ' . $__templater->callMacro(null, 'cover_editor_setup', array(
			'group' => $__vars['group'],
			'width' => $__vars['baseWidth'],
			'height' => $__vars['baseHeight'],
		), $__vars) . '
            ';
	} else {
		$__finalCompiled .= '
               
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
                                <a href="' . $__templater->func('link', array('forumGroups/add-moderator', $__vars['subForums'], ), true) . '"
                                       class="menu-linkRow"
                                       data-xf-click="overlay">
                                ' . 'Add Moderator' . '
                            </a>
						
						<a href="' . $__templater->func('link', array('forumGroups/avatar', $__vars['subForums'], ), true) . '"
                                       class="menu-linkRow"
                                       data-xf-click="overlay">
                                ' . 'Upload avatar' . '
                            </a>
						
						<a href="' . $__templater->func('link', array('forumGroups/cover', $__vars['subForums'], ), true) . '"
                                       class="menu-linkRow"
                                       data-xf-click="overlay">
                                ' . 'Upload cover' . '
                            </a>
                           
                            <hr class="menu-separator" />
                    </div>
                </div>
            </div>   
			   
		   </div>
				
            ';
	}
	$__finalCompiled .= '

        </div>
    </div>

	<!-- Cover Header -->
		
	<!-- Thread Lists -->
	
		<div class="block-container">
		<div class="block-body">
				<div class="structItemContainer">
					';
	if (!$__templater->test($__vars['threads'], 'empty', array())) {
		$__finalCompiled .= '
						<div class="structItemContainer-group js-threadList">
							';
		if (!$__templater->test($__vars['threads'], 'empty', array())) {
			$__finalCompiled .= '
								';
			if ($__templater->isTraversable($__vars['threads'])) {
				foreach ($__vars['threads'] AS $__vars['thread']) {
					$__finalCompiled .= '
									' . $__templater->callMacro(null, 'fs_forum_groups_thread_list_macros::item', $__templater->combineMacroArgumentAttributes(null, array(
						'thread' => $__vars['thread'],
						'forum' => $__vars['forum'],
					)), $__vars) . '
								';
				}
			}
			$__finalCompiled .= '
							';
		}
		$__finalCompiled .= '
						</div>				
					';
	} else {
		$__finalCompiled .= '
						<div class="structItemContainer-group js-threadList">
								<div class="structItem js-emptyThreadList">
									<div class="structItem-cell">' . 'There are no threads in this forum.' . '</div>
								</div>
						</div>
					';
	}
	$__finalCompiled .= '
				</div>
		</div>
	</div>
	
	<!-- Thread Lists -->
	
</div>';
	return $__finalCompiled;
}
);