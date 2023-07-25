<?php
// FROM HASH: cd0110ebd7fbb01ecf3bfeecdab89687
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<h1 class="p-title-value">' . $__templater->escape($__vars['discussion']['title']) . '</h1>

';
	if ($__vars['permissions']['inlineMod']) {
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

<div class="block block--messages" data-xf-init="' . ($__vars['permissions']['inlineMod'] ? 'inline-mod' : '') . '" data-type="group_post" data-href="' . $__templater->func('link', array('inline-mod', ), true) . '">
		<div class="block-outer">
		' . $__templater->func('page_nav', array(array(
		'page' => $__vars['page'],
		'total' => $__vars['total'],
		'link' => 'group_discussions/view',
		'data' => $__vars['group'],
		'params' => array('id' => $__vars['discussion']['discussion_id'], ),
		'wrapperclass' => 'block-outer-main',
		'perPage' => $__vars['perPage'],
	))) . '
		';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
					';
	if ($__vars['permissions']['inlineMod']) {
		$__compilerTemp1 .= '
						' . $__templater->button('
							' . 'Selected' . $__vars['xf']['language']['label_separator'] . ' <span class="js-inlineModCounter">0</span>
						', array(
			'class' => 'button--link js-inlineModTrigger',
		), '', array(
		)) . '
					';
	}
	$__compilerTemp1 .= '
					
					';
	$__vars['timelimit'] = ($__vars['editLimit'] + $__vars['discussion']['date']);
	$__compilerTemp1 .= '
					';
	if ($__vars['timelimit'] > $__vars['now']) {
		$__vars['canEdit'] = 1;
	}
	$__compilerTemp1 .= '

					';
	$__compilerTemp2 = '';
	$__compilerTemp2 .= '
										' . '
										';
	if ($__vars['permissions']['editAnyPost'] OR (($__vars['xf']['visitor']['user_id'] == $__vars['discussion']['user_id']) AND ($__vars['permissions']['editOwnThreadTitle'] AND $__vars['canEdit']))) {
		$__compilerTemp2 .= '
											<a href="' . $__templater->func('link', array('group_discussions/title', $__vars['group'], array('post' => $__vars['discussion']['discussion_id'], ), ), true) . '"
												class="blockLink"
												data-xf-click="overlay"
												data-menu-closer="true">
												' . 'Edit discussion title' . '
											</a>
										';
	}
	$__compilerTemp2 .= '
										';
	if ($__vars['permissions']['lockUnlockThread']) {
		$__compilerTemp2 .= '
											<a href="' . $__templater->func('link', array('group_discussions/quick-close', $__vars['group'], array('id' => $__vars['discussion']['discussion_id'], ), ), true) . '"
												class="blockLink"
												data-menu-closer="true">

												';
		if ($__vars['discussion']['state'] !== 'locked') {
			$__compilerTemp2 .= '
													' . 'Close discussion' . '
												';
		} else {
			$__compilerTemp2 .= '
													' . 'Open discussion' . '
												';
		}
		$__compilerTemp2 .= '
											</a>
										';
	}
	$__compilerTemp2 .= '
										';
	if (($__vars['discussion']['state'] !== 'deleted') AND $__vars['permissions']['deleteAnyThread']) {
		$__compilerTemp2 .= '
											<a href="' . $__templater->func('link', array('group_discussions/delete', $__vars['group'], array('id' => $__vars['discussion']['discussion_id'], ), ), true) . '" data-xf-click="overlay" class="blockLink">' . 'Delete discussion' . '</a>
										';
	}
	$__compilerTemp2 .= '
										
										';
	if ($__vars['permissions']['inlineMod']) {
		$__compilerTemp2 .= '
											<div class="menu-footer"
												data-xf-init="inline-mod"
												data-type="group_discussion"
												data-href="' . $__templater->func('link', array('inline-mod', ), true) . '"
												data-toggle=".js-postInlineModToggle">
												' . $__templater->formCheckBox(array(
		), array(array(
			'class' => 'js-postInlineModToggle',
			'value' => $__vars['discussion']['discussion_id'],
			'label' => 'Select for moderation',
			'_type' => 'option',
		))) . '
											</div>
										';
	}
	$__compilerTemp2 .= '
										
									';
	if (strlen(trim($__compilerTemp2)) > 0) {
		$__compilerTemp1 .= '
						<div class="buttonGroup-buttonWrapper">
							' . $__templater->button('&#8226;&#8226;&#8226;', array(
			'class' => 'button--link menuTrigger',
			'data-xf-click' => 'menu',
			'aria-expanded' => 'false',
			'aria-haspopup' => 'true',
			'title' => 'More options',
		), '', array(
		)) . '
							<div class="menu" data-menu="menu" aria-hidden="true">
								<div class="menu-content">
									<h4 class="menu-header">' . 'More options' . '</h4>
									' . $__compilerTemp2 . '
								</div>
							</div>
						</div>
					';
	}
	$__compilerTemp1 .= '
				';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
			<div class="block-outer-opposite">
				<div class="buttonGroup">
				' . $__compilerTemp1 . '
				</div>
			</div>
		';
	}
	$__finalCompiled .= '
	</div>

	
	<div class="block-container lbContainer"
		data-xf-init="lightbox' . ($__vars['xf']['options']['selectQuotable'] ? ' select-to-quote' : '') . '"
		data-message-selector=".js-post"
		data-lb-id="discussion-' . $__templater->escape($__vars['discussion']['discussion_id']) . '"
		data-lb-universal="' . $__templater->escape($__vars['xf']['options']['lightBoxUniversal']) . '">

		<div class="block-body js-replyNewMessageContainer">
			
			';
	if ($__templater->isTraversable($__vars['posts'])) {
		foreach ($__vars['posts'] AS $__vars['post']) {
			$__finalCompiled .= '
				';
			if (($__vars['post']['state'] == 'deleted') AND $__vars['permissions']['viewDeleted']) {
				$__finalCompiled .= '
					' . $__templater->callMacro('snog_groups_post_macros', 'post_deleted', array(
					'post' => $__vars['post'],
					'group' => $__vars['group'],
					'position' => $__vars['position'],
					'permissions' => $__vars['permissions'],
				), $__vars) . '
				';
			} else {
				$__finalCompiled .= '
					';
				if ($__vars['post']['state'] !== 'deleted') {
					$__finalCompiled .= '
					';
					$__vars['position'] = ($__vars['position'] + 1);
					$__finalCompiled .= '
					' . $__templater->callMacro('snog_groups_post_macros', 'post', array(
						'post' => $__vars['post'],
						'group' => $__vars['group'],
						'position' => $__vars['position'],
						'permissions' => $__vars['permissions'],
						'now' => $__vars['now'],
						'editLimit' => $__vars['editLimit'],
						'page' => $__vars['page'],
					), $__vars) . '
					';
				}
				$__finalCompiled .= '
				';
			}
			$__finalCompiled .= '
			';
		}
	}
	$__finalCompiled .= '
		</div>
		' . $__templater->func('page_nav', array(array(
		'page' => $__vars['page'],
		'total' => $__vars['total'],
		'link' => 'group_discussions/view',
		'data' => $__vars['group'],
		'params' => array('id' => $__vars['discussion']['discussion_id'], ),
		'wrapperclass' => 'block-outer block-outer--after',
		'perPage' => $__vars['perPage'],
	))) . '
	</div>
</div>

';
	if (($__vars['discussion']['state'] == 'visible') AND ($__vars['xf']['visitor']['is_admin'] OR (!$__templater->test($__vars['xf']['visitor']['SocialGroups'], 'empty', array()) AND $__templater->func('in_array', array($__vars['group']['groupid'], $__vars['xf']['visitor']['SocialGroups']['groups'], ), false)))) {
		$__finalCompiled .= '
';
		$__templater->includeJs(array(
			'src' => 'xf/message.js',
			'min' => '1',
		));
		$__vars['lastPost'] = $__templater->filter($__vars['posts'], array(array('last', array()),), false);
		$__finalCompiled .= $__templater->form('

	' . '' . '

	<div class="block-container">
		<div class="block-body">
			' . '' . '
			' . $__templater->callMacro('quick_reply_macros', 'body', array(
			'message' => $__vars['discussion']['draft']['message'],
			'messageSelector' => '.js-post',
			'lastDate' => $__vars['lastPost']['date'],
			'lastKnownDate' => $__vars['discussion']['last_post_date'],
			'multiQuoteHref' => $__templater->func('link', array('threads/multi-quote', $__vars['thread'], ), false),
			'multiQuoteStorageKey' => 'multiQuoteThread',
			'showPreviewButton' => false,
		), $__vars) . '
		</div>
	</div>
', array(
			'action' => $__templater->func('link', array('group_discussions/add-reply', $__vars['group'], array('id' => $__vars['discussion']['discussion_id'], ), ), false),
			'ajax' => 'true',
			'draft' => $__templater->func('link', array('group_discussions/draft', $__vars['group'], array('id' => $__vars['discussion']['discussion_id'], ), ), false),
			'class' => 'block js-quickReply',
			'data-xf-init' => 'quick-reply',
			'data-message-container' => '< :prev | .js-replyNewMessageContainer',
		)) . '
';
	}
	$__finalCompiled .= '

';
	$__compilerTemp3 = '';
	$__compilerTemp3 .= '
				';
	if ($__vars['discussion']['state'] == 'deleted') {
		$__compilerTemp3 .= '
					<dd class="blockStatus-message blockStatus-message--deleted">
						' . '
						<ul class="listInline listInline--bullet listInline--selfInline">
							<li>' . ($__templater->escape($__vars['message']) ?: 'removed_from_public_view') . '</li>
							<li>' . 'Deleted by ' . ($__templater->escape($__vars['post']['deleted_by']) ?: 'N/A') . '' . '</li>
							<li>' . $__templater->func('date_dynamic', array($__vars['post']['delete_date'], array(
		))) . '</li>
							<li>' . 'Reason' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['post']['reason']) . '</li>
						</ul>
					</dd>
				';
	} else if ($__vars['discussion']['state'] == 'moderated') {
		$__compilerTemp3 .= '
					<dd class="blockStatus-message blockStatus-message--moderated">
						' . 'awaiting_moderation_before_being_displayed_publicly' . '
					</dd>
				';
	}
	$__compilerTemp3 .= '
				';
	if ($__vars['discussion']['state'] == 'locked') {
		$__compilerTemp3 .= '
					<dd class="blockStatus-message blockStatus-message--locked">
						' . 'Not open for further replies.' . '
					</dd>
				';
	}
	$__compilerTemp3 .= '
			';
	if (strlen(trim($__compilerTemp3)) > 0) {
		$__finalCompiled .= '
	<div class="' . $__templater->escape($__vars['wrapperClass']) . '">
		<dl class="blockStatus">
			<dt>' . 'Status' . '</dt>
			' . $__compilerTemp3 . '
		</dl>
	</div>
';
	}
	return $__finalCompiled;
}
);