<?php
// FROM HASH: 5073bd9c9d761f9e394514a9ccba7291
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped($__templater->escape($__vars['group']['name']));
	$__finalCompiled .= '

';
	$__templater->includeCss('tlg_style.less');
	$__finalCompiled .= '


';
	$__compilerTemp1 = '';
	if ($__vars['subForums']['AvatarAttachment']) {
		$__compilerTemp1 .= '
			<img src="' . $__templater->escape($__vars['subForums']['AvatarAttachment']['thumbnail_url']) . '"
                 class="groupAvatar--img bbImage" width="250" height="250"
                 data-width="' . $__templater->escape($__vars['subForums']['AvatarAttachment']['width']) . '"
                 data-height="' . $__templater->escape($__vars['subForums']['AvatarAttachment']['height']) . '"
                 alt="' . $__templater->escape($__vars['subForums']['title']) . '"/>
			';
	} else {
		$__compilerTemp1 .= '
            <span class="groupAvatar--text groupAvatar--dynamic">' . $__templater->escape($__vars['xf']['visitor']['username']) . '</span>
			';
	}
	$__templater->modifySideNavHtml(null, '
	
	<!-- Avatar -->
	
	<div class="block groupAvatar-block">
        <a href="' . $__templater->func('link', array('molly', $__vars['subForums'], ), true) . '"
       class="groupAvatar groupAvatar--link groupAvatar--default" style="background-color:#e08585;color:#8f2424">
           ' . $__compilerTemp1 . '
    </a>
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
        <a href="' . $__templater->func('link', array('groups', $__vars['group'], ), true) . '" style="background-color:#e08585;color:#8f2424">
                <span class="groupCover--text">' . $__templater->func('snippet', array($__vars['subForums']['title'], 25, ), true) . '</span>
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
                                <a href="' . $__templater->func('link', array('molly/add-moderator', $__vars['subForums'], ), true) . '"
                                       class="menu-linkRow"
                                       data-xf-click="overlay">
                                ' . 'Add Moderator' . '
                            </a>
						
						<a href="' . $__templater->func('link', array('molly/chatroom', $__vars['subForums'], ), true) . '"
                                       class="menu-linkRow"
                                       data-xf-click="overlay">
                                ' . 'Add Chatroom' . '
                            </a>
						
						<a href="' . $__templater->func('link', array('molly/avatar', $__vars['subForums'], ), true) . '"
                                       class="menu-linkRow"
                                       data-xf-click="overlay">
                                ' . 'Upload avatar' . '
                            </a>
						
						<a href="' . $__templater->func('link', array('molly/cover', $__vars['subForums'], ), true) . '"
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
									' . $__templater->callMacro(null, 'fs_molly_thread_list_macros::item', $__templater->combineMacroArgumentAttributes(null, array(
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