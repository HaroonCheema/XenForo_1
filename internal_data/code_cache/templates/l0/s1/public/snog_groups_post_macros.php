<?php
// FROM HASH: 23b7191f1de11e0e3036c89755b7f703
return array(
'macros' => array('post' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'post' => '!',
		'group' => '!',
		'position' => '0',
		'permissions' => '!',
		'now' => '0',
		'editLimit' => '0',
		'page' => '0',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__templater->includeCss('message.less');
	$__finalCompiled .= '
	<article class="message message--post js-post js-inlineModContainer"
		data-author="' . ($__templater->escape($__vars['post']['User']['username']) ?: $__templater->escape($__vars['post']['username'])) . '"
		data-content="discussion-' . $__templater->escape($__vars['post']['discussion_id']) . '"
		id="js-discussion-' . $__templater->escape($__vars['post']['discussion_id']) . '">

		<span class="u-anchorTarget" id="discussion-' . $__templater->escape($__vars['post']['discussion_id']) . '"></span>
		<div class="message-inner">
			';
	$__vars['postuser'] = $__vars['post']['User'];
	$__finalCompiled .= '
			<div class="message-cell message-cell--user">
				';
	$__vars['dateHtml'] = $__templater->preEscaped('<a href="' . $__templater->func('link', array('group_discussions/post', $__vars['group'], array('id' => $__vars['post']['discussion_id'], ), ), true) . '" class="u-concealed" rel="nofollow">' . $__templater->func('date_dynamic', array($__vars['post']['date'], array(
	))) . '</a>');
	$__finalCompiled .= '
				';
	$__vars['linkHtml'] = $__templater->preEscaped('<a href="' . $__templater->func('link', array('group_discussions/post', $__vars['group'], array('id' => $__vars['post']['discussion_id'], ), ), true) . '" class="u-concealed" rel="nofollow">#' . $__templater->escape($__vars['position']) . '</a>');
	$__finalCompiled .= '
				' . $__templater->callMacro(null, 'user_info', array(
		'user' => $__vars['post']['User'],
		'group' => $__vars['group'],
		'fallbackName' => $__vars['post']['username'],
		'dateHtml' => $__vars['dateHtml'],
		'linkHtml' => $__vars['linkHtml'],
	), $__vars) . '
			</div>
			
			<div class="message-cell message-cell--main">
				<div class="message-main js-quickEditTarget">
					<div class="message-content js-messageContent">
						<header class="message-attribution">
							<a href="' . $__templater->func('link', array('group_discussions/post', $__vars['group'], array('id' => $__vars['post']['discussion_id'], ), ), true) . '" class="message-attribution-main u-concealed" rel="nofollow">' . $__templater->func('date_dynamic', array($__vars['post']['date'], array(
	))) . '</a>
							<span class="message-attribution-opposite">
								<a href="' . $__templater->func('link', array('group_discussions/post', $__vars['group'], array('id' => $__vars['post']['discussion_id'], ), ), true) . '" class="u-concealed" rel="nofollow">#' . $__templater->escape($__vars['position']) . '</a>
							</span>
						</header>

						';
	if ($__vars['post']['state'] == 'moderated') {
		$__finalCompiled .= '
							<div class="messageNotice messageNotice--moderated">
								' . 'This message is awaiting moderator approval, and is invisible to normal visitors.' . '
							</div>
						';
	}
	$__finalCompiled .= '

						<div class="message-userContent lbContainer js-lbContainer"
							data-lb-id="discussion-' . $__templater->escape($__vars['post']['discussion_id']) . '"
							data-lb-caption-desc="' . ($__vars['post']['User'] ? $__templater->escape($__vars['post']['User']['username']) : $__templater->escape($__vars['post']['username'])) . ' &middot; ' . $__templater->func('date_time', array($__vars['post']['date'], ), true) . '">

							<article class="message-body js-selectToQuote">
								' . $__templater->func('bb_code', array($__vars['post']['message'], 'post', $__vars['post']['User'], ), true) . '
								<div class="js-selectToQuoteEnd">&nbsp;</div>
							</article>
						</div>
					</div>

					<footer class="message-footer">
						';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
									';
	$__compilerTemp2 = '';
	$__compilerTemp2 .= '
											';
	if (($__vars['xf']['visitor']['is_admin'] OR (!$__templater->test($__vars['xf']['visitor']['SocialGroups'], 'empty', array()) AND $__templater->func('in_array', array($__vars['group']['groupid'], $__vars['xf']['visitor']['SocialGroups']['groups'], ), false))) AND (($__vars['xf']['visitor']['user_id'] !== $__vars['post']['user_id']) AND $__vars['permissions']['like'])) {
		$__compilerTemp2 .= '
												<a href="' . $__templater->func('link', array('group_discussions/like', $__vars['group'], array('post' => $__vars['post']['discussion_id'], ), ), true) . '" class="actionBar-action actionBar-action--like" data-xf-click="like" data-like-list="< .js-post | .js-likeList">';
		if ($__templater->method($__vars['post'], 'isLiked', array())) {
			$__compilerTemp2 .= 'Unlike';
		} else {
			$__compilerTemp2 .= 'Like';
		}
		$__compilerTemp2 .= '</a>
											';
	}
	$__compilerTemp2 .= '

											';
	if ($__vars['xf']['visitor']['is_admin'] OR (!$__templater->test($__vars['xf']['visitor']['SocialGroups'], 'empty', array()) AND $__templater->func('in_array', array($__vars['group']['groupid'], $__vars['xf']['visitor']['SocialGroups']['groups'], ), false))) {
		$__compilerTemp2 .= '
												';
		$__vars['quoteLink'] = $__templater->preEscaped($__templater->func('link', array('group_discussions/reply', $__vars['group'], array('quote' => $__vars['post']['discussion_id'], ), ), true));
		$__compilerTemp2 .= '

												<a href="' . $__templater->escape($__vars['quoteLink']) . '"
													class="actionBar-action actionBar-action--reply"
													title="' . 'Reply, quoting this message' . '"
													data-xf-click="quote"
													data-quote-href="' . $__templater->func('link', array('group_discussions/quote', $__vars['group'], array('quote' => $__vars['post']['discussion_id'], ), ), true) . '">' . 'Reply' . '</a>
											';
	}
	$__compilerTemp2 .= '
										';
	if (strlen(trim($__compilerTemp2)) > 0) {
		$__compilerTemp1 .= '
										<div class="actionBar-set actionBar-set--external">
										' . $__compilerTemp2 . '
										</div>
									';
	}
	$__compilerTemp1 .= '

									';
	$__compilerTemp3 = '';
	$__compilerTemp3 .= '
											';
	if ($__vars['permissions']['inlineMod']) {
		$__compilerTemp3 .= '
												<span class="actionBar-action actionBar-action--inlineMod">
													' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'value' => $__vars['post']['discussion_id'],
			'class' => 'js-inlineModToggle',
			'data-xf-init' => 'tooltip',
			'title' => 'Select for moderation',
			'_type' => 'option',
		))) . '
												</span>
											';
	}
	$__compilerTemp3 .= '
											
											';
	if ($__vars['canReport']) {
		$__compilerTemp3 .= '
												<a href="' . $__templater->func('link', array('posts/report', $__vars['post'], ), true) . '"
													class="actionBar-action actionBar-action--report"
													data-xf-click="overlay">' . 'Report' . '</a>
											';
	}
	$__compilerTemp3 .= '

											';
	$__vars['hasActionBarMenu'] = false;
	$__compilerTemp3 .= '
											';
	$__vars['timelimit'] = ($__vars['editLimit'] + $__vars['post']['date']);
	$__compilerTemp3 .= '
											';
	if ($__vars['timelimit'] > $__vars['now']) {
		$__vars['canEdit'] = 1;
	}
	$__compilerTemp3 .= '

											';
	if ($__vars['permissions']['editAnyPost'] OR (($__vars['xf']['visitor']['user_id'] == $__vars['post']['user_id']) AND ($__vars['permissions']['editOwnPost'] AND ($__vars['canEdit'] > 0)))) {
		$__compilerTemp3 .= '
												';
		$__templater->includeJs(array(
			'src' => 'xf/message.js',
			'min' => '1',
		));
		$__compilerTemp3 .= '
												<a href="' . $__templater->func('link', array('group_discussions/edit', $__vars['group'], array('post' => $__vars['post']['discussion_id'], 'p' => $__vars['position'], ), ), true) . '"
													class="actionBar-action actionBar-action--edit actionBar-action--menuItem"
													data-xf-click="quick-edit"
													data-editor-target="#js-discussion-' . $__templater->escape($__vars['post']['discussion_id']) . ' .js-quickEditTarget"
													data-menu-closer="true">' . 'Edit' . '</a>

												';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp3 .= '
											';
	}
	$__compilerTemp3 .= '

											';
	if ($__templater->method($__vars['post'], 'canDelete', array('soft', ))) {
		$__compilerTemp3 .= '
												<a href="' . $__templater->func('link', array('group_discussions/deletepost', $__vars['group'], array('id' => $__vars['post']['discussion_id'], ), ), true) . '"
													class="actionBar-action actionBar-action--delete actionBar-action--menuItem"
													data-xf-click="overlay">' . 'Delete' . '</a>

												';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp3 .= '
											';
	}
	$__compilerTemp3 .= '
											
											';
	if ($__vars['hasActionBarMenu']) {
		$__compilerTemp3 .= '
												<a class="actionBar-action actionBar-action--menuTrigger"
													data-xf-click="menu"
													title="' . 'More options' . '"
													role="button"
													tabindex="0"
													aria-expanded="false"
													aria-haspopup="true">&#8226;&#8226;&#8226;</a>

												<div class="menu" data-menu="menu" aria-hidden="true" data-menu-builder="actionBar">
													<div class="menu-content">
														<h4 class="menu-header">' . 'More options' . '</h4>
														<div class="js-menuBuilderTarget"></div>
													</div>
												</div>
											';
	}
	$__compilerTemp3 .= '
											';
	if (strlen(trim($__compilerTemp3)) > 0) {
		$__compilerTemp1 .= '
										<div class="actionBar-set actionBar-set--internal">
										' . $__compilerTemp3 . '
										</div>
									';
	}
	$__compilerTemp1 .= '
								';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
							<div class="message-actionBar actionBar">
								' . $__compilerTemp1 . '
							</div>
						';
	}
	$__finalCompiled .= '

						<div class="likesBar js-likeList ' . ($__vars['post']['likes'] ? 'is-active' : '') . '">
							' . $__templater->func('likes_content', array($__vars['post'], $__templater->func('link', array('group_discussions/likes', $__vars['group'], array('post' => $__vars['post']['discussion_id'], ), ), false), array(
		'url' => $__templater->func('link', array('group_discussions/likes', $__vars['group'], array('post' => $__vars['post']['discussion_id'], ), ), false),
	))) . '
						</div>

						<div class="js-historyTarget toggleTarget" data-href="trigger-href"></div>
					</footer>
				</div>
			</div>
		</div>
	</article>
';
	return $__finalCompiled;
}
),
'post_deleted' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'post' => '!',
		'group' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__templater->includeCss('message.less');
	$__finalCompiled .= '
	<div class="message message--deleted message--post js-post js-inlineModContainer"
		data-author="' . ($__templater->escape($__vars['post']['User']['username']) ?: $__templater->escape($__vars['post']['username'])) . '"
		data-content="discussion-' . $__templater->escape($__vars['post']['discussion_id']) . '">

		<span class="u-anchorTarget" id="discussion-' . $__templater->escape($__vars['post']['discussion_id']) . '"></span>
		<div class="message-inner">
			<div class="message-cell message-cell--user">
				' . $__templater->callMacro('message_macros', 'user_info', array(
		'user' => $__vars['post']['User'],
		'fallbackName' => $__vars['post']['username'],
	), $__vars) . '
			</div>
			<div class="message-cell message-cell--main">
				<div class="message-attribution">
					<ul class="listInline listInline--bullet message-attribution-main">
						<li><a href="' . $__templater->func('link', array('group_discussions/post', $__vars['group'], array('id' => $__vars['post']['discussion_id'], ), ), true) . '" class="u-concealed" rel="nofollow">' . $__templater->func('date_dynamic', array($__vars['post']['date'], array(
	))) . '</a></li>
						<li>' . $__templater->func('username_link', array($__vars['post']['User'], false, array(
		'defaultname' => $__vars['post']['username'],
		'class' => 'u-concealed',
	))) . '</li>
					</ul>
				</div>

				<div class="messageNotice messageNotice--deleted">
					<ul class="listInline listInline--bullet listInline--selfInline">
						<li>' . ($__templater->escape($__vars['message']) ?: 'removed_from_public_view') . '</li>
						<li>' . 'Deleted by ' . ($__templater->escape($__vars['post']['deleted_by']) ?: 'N/A') . '' . '</li>
							<li>' . $__templater->func('date_dynamic', array($__vars['post']['delete_date'], array(
	))) . '</li>
							';
	if ($__vars['post']['reason']) {
		$__finalCompiled .= '
								<li>' . 'Reason' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['post']['reason']) . '</li>
							';
	}
	$__finalCompiled .= '
					</ul>
					
					<a href="' . $__templater->func('link', array('group_discussions/show', $__vars['group'], array('discussion_id' => $__vars['post']['discussion_id'], ), ), true) . '" class="u-jsOnly" data-xf-click="inserter" data-replace="[data-content=discussion-' . $__templater->escape($__vars['post']['discussion_id']) . ']">' . 'Show' . $__vars['xf']['language']['ellipsis'] . '</a>
				</div>
			</div>
		</div>
	</div>
';
	return $__finalCompiled;
}
),
'user_info' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'user' => '!',
		'group' => '!',
		'fallbackName' => '',
		'dateHtml' => '',
		'linkHtml' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	<span class="message-userArrow"></span>
	<section itemscope itemtype="https://schema.org/Person" class="message-user">
		<div class="message-avatar">
			<div class="message-avatar-wrapper">
				' . $__templater->func('avatar', array($__vars['user'], 'm', false, array(
		'defaultname' => $__vars['fallbackName'],
		'itemprop' => 'image',
	))) . '
				';
	if ($__vars['xf']['options']['showMessageOnlineStatus'] AND ($__vars['user'] AND $__templater->method($__vars['user'], 'isOnline', array()))) {
		$__finalCompiled .= '
					<span class="message-avatar-online" data-xf-init="tooltip" title="' . 'Online now' . '"></span>
				';
	}
	$__finalCompiled .= '
			</div>
		</div>
		<div class="message-userDetails">
			<h4 class="message-name">' . $__templater->func('username_link', array($__vars['user'], true, array(
		'defaultname' => $__vars['fallbackName'],
		'itemprop' => 'name',
	))) . '</h4>

			';
	if (!$__templater->test($__vars['user']['SocialGroups'], 'empty', array()) AND $__templater->func('in_array', array($__vars['group']['groupid'], $__vars['user']['SocialGroups']['owner'], ), false)) {
		$__finalCompiled .= '
				<div class="userTitle message-userTitle" dir="auto" itemprop="jobTitle">
					<h5 class="userTitle message-userTitle">' . 'Group owner' . '</h5>
				</div>
			';
	}
	$__finalCompiled .= '

			';
	if (!$__templater->test($__vars['user']['SocialGroups'], 'empty', array()) AND $__templater->func('in_array', array($__vars['group']['groupid'], $__vars['user']['SocialGroups']['moderator'], ), false)) {
		$__finalCompiled .= '
				<div class="userTitle message-userTitle" dir="auto" itemprop="jobTitle">
					<h5 class="userTitle message-userTitle">' . 'Group moderator' . '</h5>
				</div>
			';
	}
	$__finalCompiled .= '
		</div>
	</section>
';
	return $__finalCompiled;
}
),
'user_info_simple' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'user' => '!',
		'fallbackName' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	<header itemscope itemtype="https://schema.org/Person">
		<meta itemprop="name" content="' . ($__templater->escape($__vars['user']['username']) ?: $__templater->escape($__vars['fallbackName'])) . '">
		<span class="message-userArrow"></span>
		<div class="message-avatar">
			<div class="message-avatar-wrapper">
				' . $__templater->func('avatar', array($__vars['user'], 's', false, array(
		'defaultname' => $__vars['fallbackName'],
		'itemprop' => 'image',
	))) . '
			</div>
		</div>
	</header>
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<!--suppress XmlDuplicatedId -->
' . '

' . '

' . '

';
	return $__finalCompiled;
}
);