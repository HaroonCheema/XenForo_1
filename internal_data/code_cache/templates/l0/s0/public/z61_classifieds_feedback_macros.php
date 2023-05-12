<?php
// FROM HASH: cbe30a6ea2faf9e1dc796ab10e25dc69
return array(
'macros' => array('feedback' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'feedback' => '!',
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
             data-author="' . ($__templater->escape($__vars['feedback']['FromUser']['username']) ?: $__templater->escape($__vars['feedback']['FromUser']['username'])) . '"
             data-content="classifieds-feedback-' . $__templater->escape($__vars['feedback']['feedback_id']) . '"
             id="js-feedback-' . $__templater->escape($__vars['feedback']['feedback_id']) . '">
        <span class="u-anchorTarget" id="classifieds-feedback-' . $__templater->escape($__vars['feedback']['feedback_id']) . '"></span>
        <div class="message-inner">
            <div class="message-cell message-cell--user">
                ' . $__templater->callMacro('message_macros', 'user_info_simple', array(
		'user' => $__vars['feedback']['FromUser'],
		'fallbackName' => $__vars['feedback']['from_username'],
	), $__vars) . '
            </div>
            <div class="message-cell message-cell--main">
                <div class="message-main js-quickEditTarget">
                    <div class="message-content js-messageContent">
                        <header class="message-attribution message-attribution--plain">
                            <ul class="listInline listInline--bullet">
                                <li>
                                    ' . $__templater->callMacro('z61_classifieds_feedback_macros', 'feedback_icon_simple', array(
		'feedback' => $__vars['feedback'],
	), $__vars) . '
                                </li>
                                <li class="message-attribution-user">
                                    <a href="' . $__templater->func('link', array('classifieds', $__vars['feedback']['Listing'], ), true) . '">' . $__templater->escape($__vars['feedback']['Listing']['title']) . '</a>
                                </li>
                                <li><a href="' . $__templater->func('link', array('members/feedback/view', $__vars['feedback']['ToUser'], array('feedback_id' => $__vars['feedback']['feedback_id'], ), ), true) . '" class="u-concealed" rel="nofollow">' . $__templater->func('date_dynamic', array($__vars['feedback']['feedback_date'], array(
	))) . '</a></li>
                            </ul>
                        </header>

                        <article class="message-body">
                            ' . $__templater->func('bb_code', array($__vars['feedback']['feedback'], 'post', $__vars['feedback'], ), true) . '

                            ';
	if ($__vars['feedback']['last_edit_date']) {
		$__finalCompiled .= '
                                <div class="message-lastEdit pull-right">
                                    ';
		if ($__vars['feedback']['from_user_id'] == $__vars['feedback']['last_edit_user_id']) {
			$__finalCompiled .= '
                                        ' . 'Last edited' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->func('date_dynamic', array($__vars['feedback']['last_edit_date'], array(
			))) . '
                                        ';
		} else {
			$__finalCompiled .= '
                                        ' . 'Last edited by a moderator' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->func('date_dynamic', array($__vars['feedback']['last_edit_date'], array(
			))) . '
                                    ';
		}
		$__finalCompiled .= '
                                </div>
                            ';
	}
	$__finalCompiled .= '
                        </article>
                    </div>

                    <footer class="message-footer">
                        <div class="message-actionBar actionBar">
                            ';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
                                        ';
	if ($__templater->method($__vars['feedback'], 'canEdit', array())) {
		$__compilerTemp1 .= '
                                            <a href="' . $__templater->func('link', array('members/feedback/edit', $__vars['feedback']['ToUser'], array('feedback_id' => $__vars['feedback']['feedback_id'], ), ), true) . '"
                                               class="actionBar-action actionBar-action--ip actionBar-action--menuItem"
                                               data-xf-click="overlay">' . 'Edit' . '</a>
                                        ';
	}
	$__compilerTemp1 .= '
                                        ';
	if ($__templater->method($__vars['feedback'], 'canDelete', array())) {
		$__compilerTemp1 .= '
                                            <a href="' . $__templater->func('link', array('members/feedback/delete', $__vars['feedback']['ToUser'], array('feedback_id' => $__vars['feedback']['feedback_id'], ), ), true) . '"
                                               class="actionBar-action actionBar-action--ip actionBar-action--menuItem"
                                               data-xf-click="overlay">' . 'Delete' . '</a>
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
'feedback_icon_simple' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'feedback' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
    ';
	$__templater->includeCss('z61_classifieds_feedback.less');
	$__finalCompiled .= '
    ';
	if ($__vars['feedback']['rating'] == 'positive') {
		$__finalCompiled .= '
        ' . $__templater->fontAwesome($__templater->func('property', array('z61ClassifiedsFeedbackPositiveIcon', ), true), array(
			'class' => 'classifieds-feedback-positive',
			'title' => '' . $__vars['feedback']['FromUser']['username'] . ' rated their transaction with ' . $__vars['feedback']['ToUser']['username'] . ' positively.',
		)) . '
        ';
	} else if ($__vars['feedback']['rating'] == 'negative') {
		$__finalCompiled .= '
        ' . $__templater->fontAwesome($__templater->func('property', array('z61ClassifiedsFeedbackNegativeIcon', ), true), array(
			'class' => 'classifieds-feedback-negative',
			'title' => '' . $__vars['feedback']['FromUser']['username'] . ' rated their transaction with ' . $__vars['feedback']['ToUser']['username'] . ' negatively.',
		)) . '
        ';
	} else {
		$__finalCompiled .= '
        ' . $__templater->fontAwesome($__templater->func('property', array('z61ClassifiedsFeedbackNeutralIcon', ), true), array(
			'class' => 'classifieds-feedback-neutral',
			'title' => '' . $__vars['feedback']['FromUser']['username'] . ' rated their transaction with ' . $__vars['feedback']['ToUser']['username'] . ' neutrally.',
		)) . '
    ';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'attribution' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'feedback' => '!',
		'showTargetUser' => false,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
    ';
	if ($__vars['showTargetUser'] AND ($__vars['feedback']['from_user_id'] != $__vars['feedback']['to_user_id'])) {
		$__finalCompiled .= '
        ' . $__templater->func('username_link', array($__vars['feedback']['FromUser'], true, array(
			'defaultname' => $__vars['feedback']['from_username'],
			'aria-hidden' => 'true',
		))) . '
       <i class="fa ' . ($__vars['xf']['isRtl'] ? 'fa-caret-left' : 'fa-caret-right') . ' u-muted" aria-hidden="true"></i>
        <a href="' . $__templater->func('link', array('classifieds', $__vars['feedback']['Listing'], ), true) . '" title="' . $__templater->escape($__vars['feedback']['Listing']['title']) . '">' . $__templater->func('snippet', array($__vars['feedback']['Listing']['title'], 20, ), true) . '</a>
        ';
	} else {
		$__finalCompiled .= '
        ' . $__templater->func('username_link', array($__vars['feedback']['FromUser'], true, array(
			'defaultname' => $__vars['feedback']['from_username'],
		))) . '
    ';
	}
	$__finalCompiled .= '
    <span class="pull-right">
    ' . $__templater->callMacro(null, 'feedback_icon_simple', array(
		'feedback' => $__vars['feedback'],
	), $__vars) . '
    </span>
';
	return $__finalCompiled;
}
),
'simple' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'feedback' => '!',
		'limitHeight' => false,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

    <div class="contentRow">
        <div class="contentRow-figure">
            ' . $__templater->func('avatar', array($__vars['feedback']['FromUser'], 'xxs', false, array(
		'defaultname' => $__vars['feedback']['from_username'],
	))) . '
        </div>
        <div class="contentRow-main contentRow-main--close">
            <div class="contentRow-lesser">
                ' . $__templater->callMacro(null, 'attribution', array(
		'feedback' => $__vars['feedback'],
		'showTargetUser' => true,
	), $__vars) . '
            </div>

            ';
	if ($__vars['limitHeight']) {
		$__finalCompiled .= '
                <div class="contentRow-faderContainer">
                    <div class="contentRow-faderContent">
                        ' . $__templater->func('snippet', array($__templater->func('structured_text', array($__vars['feedback']['feedback'], ), false), 150, ), true) . '
                    </div>
                    <div class="contentRow-fader"></div>
                </div>
                ';
	} else {
		$__finalCompiled .= '
                ' . $__templater->func('snippet', array($__templater->func('structured_text', array($__vars['feedback']['feedback'], ), false), 150, ), true) . '
            ';
	}
	$__finalCompiled .= '

            <div class="contentRow-minor">
                <a href="' . $__templater->func('link', array('members/feedback/view', $__vars['feedback']['ToUser'], array('feedback_id' => $__vars['feedback']['feedback_id'], ), ), true) . '" rel="nofollow" class="u-concealed">' . $__templater->func('date_dynamic', array($__vars['feedback']['feedback_date'], array(
	))) . '</a>
                <a href="' . $__templater->func('link', array('members/feedback/view', $__vars['feedback']['ToUser'], array('feedback_id' => $__vars['feedback']['feedback_id'], ), ), true) . '" rel="nofollow" class="contentRow-extra" data-xf-click="overlay" data-xf-init="tooltip" title="' . $__templater->filter('Interact', array(array('for_attr', array()),), true) . '">&#8226;&#8226;&#8226;</a>
            </div>
        </div>
    </div>
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

' . '

' . '

';
	return $__finalCompiled;
}
);