<?php
// FROM HASH: 4eb0cc2b16c2b9e8bc365293403b2e80
return array(
'macros' => array('attribution' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'photoPost' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->func('username_link', array($__vars['photoPost']['User'], true, array(
		'defaultname' => $__vars['photoPost']['User']['username'],
	))) . '
';
	return $__finalCompiled;
}
),
'photo_post' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'photoPost' => '!',
		'group' => '!',
		'showTargetUser' => false,
		'allowInlineMod' => true,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	';
	$__templater->includeCss('message.less');
	$__finalCompiled .= '
	';
	$__templater->includeJs(array(
		'src' => 'xf/comment.js',
		'min' => '1',
	));
	$__finalCompiled .= '

	<article class="message message--simple js-inlineModContainer"
		data-author="' . ($__templater->escape($__vars['photoPost']['User']['username']) ?: $__templater->escape($__vars['photoPost']['User']['username'])) . '"
		data-content="photo-comment-' . $__templater->escape($__vars['photoPost']['comment_id']) . '"
		id="js-photoPost-' . $__templater->escape($__vars['photoPost']['comment_id']) . '">

		<span class="u-anchorTarget" id="photo-comment-' . $__templater->escape($__vars['photoPost']['comment_id']) . '"></span>
		<div class="message-inner">
			<div class="message-cell message-cell--user">
				' . $__templater->callMacro('message_macros', 'user_info_simple', array(
		'user' => $__vars['photoPost']['User'],
		'fallbackName' => $__vars['photoPost']['User']['username'],
	), $__vars) . '
			</div>
			<div class="message-cell message-cell--main">
				<div class="message-main js-quickEditTarget">
					<div class="message-content js-messageContent">
						<header class="message-attribution message-attribution--plain">
							<ul class="listInline listInline--bullet">
								<li class="message-attribution-user">
									' . $__templater->func('avatar', array($__vars['photoPost']['User'], 'xxs', false, array(
	))) . '
									<h4 class="attribution">' . $__templater->callMacro(null, 'attribution', array(
		'photoPost' => $__vars['photoPost'],
	), $__vars) . '</h4>
								</li>
								<li><a href="' . $__templater->func('link', array('photo-comment', $__vars['photoPost'], ), true) . '" class="u-concealed">' . $__templater->func('date_dynamic', array($__vars['photoPost']['comment_date'], array(
	))) . '</a></li>
							</ul>
						</header>

						<article class="message-body">
							' . $__templater->func('structured_text', array($__vars['photoPost']['message'], ), true) . '
						</article>
					</div>

					<footer class="message-footer">
						<div class="message-actionBar actionBar">
							';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
									';
	$__vars['hasActionBarMenu'] = false;
	$__compilerTemp1 .= '
									';
	if ($__templater->method($__vars['photoPost'], 'canEdit', array())) {
		$__compilerTemp1 .= '
										';
		$__templater->includeJs(array(
			'src' => 'xf/message.js',
			'min' => '1',
		));
		$__compilerTemp1 .= '
										<a href="' . $__templater->func('link', array('group_photos/editcomment', $__vars['group'], array('post' => $__vars['photoPost']['comment_id'], ), ), true) . '"
											class="actionBar-action actionBar-action--edit actionBar-action--menuItem"
											data-xf-click="quick-edit"
											data-editor-target="#js-photoPost-' . $__templater->escape($__vars['photoPost']['comment_id']) . ' .js-quickEditTarget"
											data-no-inline-mod="' . ((!$__vars['allowInlineMod']) ? 1 : 0) . '"
											data-menu-closer="true">' . 'Edit' . '</a>
										';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp1 .= '
									';
	}
	$__compilerTemp1 .= '
									';
	if ($__templater->method($__vars['photoPost'], 'canDelete', array('hard', ))) {
		$__compilerTemp1 .= '
										<a href="' . $__templater->func('link', array('group_photos/deletecomment', $__vars['group'], array('post' => $__vars['photoPost']['comment_id'], ), ), true) . '"
											class="actionBar-action actionBar-action--delete actionBar-action--menuItem"
											data-xf-click="overlay">' . 'Delete' . '</a>
										';
		$__vars['hasActionBarMenu'] = true;
		$__compilerTemp1 .= '
									';
	}
	$__compilerTemp1 .= '

									';
	if ($__vars['hasActionBarMenu']) {
		$__compilerTemp1 .= '
										<a class="actionBar-action actionBar-action--menuTrigger"
											data-xf-click="menu"
											title="' . $__templater->filter('More options', array(array('for_attr', array()),), true) . '"
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
	$__compilerTemp1 .= '
								';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
								<div class="actionBar-set actionBar-set--internal">
								' . $__compilerTemp1 . '
								</div>
							';
	}
	$__finalCompiled .= '
						</div>
					</footer>
				</div>
			</div>
		</div>
	</article>
';
	return $__finalCompiled;
}
),
'submit' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'user' => '!',
		'group' => '!',
		'photoid' => '!',
		'lastDate' => '!',
		'containerSelector' => '!',
		'style' => 'full',
		'context' => 'user',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__templater->includeJs(array(
		'src' => 'xf/message.js',
		'min' => '1',
	));
	$__finalCompiled .= '
	';
	if ($__vars['style'] == 'full') {
		$__finalCompiled .= '
		';
		$__templater->includeCss('message.less');
		$__finalCompiled .= '
	';
	}
	$__finalCompiled .= '

	' . $__templater->form('

		<div class="message-inner">
			<div class="message-cell message-cell--user">
				' . $__templater->callMacro('message_macros', 'user_info_simple', array(
		'user' => $__vars['xf']['visitor'],
	), $__vars) . '
			</div>
			<div class="message-cell message-cell--main">

				<div class="message-editorWrapper">
					' . $__templater->formTextArea(array(
		'name' => 'message',
		'autosize' => 'true',
		'rows' => '1',
		'maxlength' => $__vars['xf']['options']['profilePostMaxLength'],
		'class' => (($__vars['style'] == 'full') ? 'input--avatarSizeS' : '') . ' js-editor',
		'data-xf-init' => 'focus-trigger user-mentioner',
		'data-display' => '< :next',
		'placeholder' => 'Post a comment' . $__vars['xf']['language']['ellipsis'],
	)) . '

					<div class="u-hidden u-hidden--transition u-inputSpacer">
						' . $__templater->button('Post', array(
		'type' => 'submit',
		'class' => 'button--primary',
	), '', array(
	)) . '
					</div>
				</div>
			</div>
		</div>

		' . '
		' . $__templater->formHiddenVal('photo_id', $__vars['photoid'], array(
	)) . '
		' . $__templater->formHiddenVal('lastDate', $__vars['lastDate'], array(
	)) . '
		' . $__templater->formHiddenVal('style', $__vars['style'], array(
	)) . '
		' . $__templater->formHiddenVal('context', $__vars['context'], array(
	)) . '
	', array(
		'action' => $__templater->func('link', array('group_photos/postcomment', $__vars['group'], array('photo_id' => $__vars['photo']['photo_id'], ), ), false),
		'ajax' => 'true',
		'class' => (($__vars['style'] == 'full') ? 'message message--simple' : 'block-row'),
		'data-xf-init' => 'quick-reply',
		'data-message-container' => $__vars['containerSelector'],
		'data-ascending' => '0',
	)) . '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

' . '

';
	return $__finalCompiled;
}
);