<?php
// FROM HASH: 0ab153fbdb282f679df7dbafe9eae3a6
return array(
'macros' => array('item' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'discussion' => '!',
		'group' => '!',
		'showWatched' => true,
		'allowInlineMod' => true,
		'chooseName' => '',
		'extraInfo' => '',
		'allowEdit' => true,
		'permissions' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	';
	$__templater->includeCss('structured_list.less');
	$__finalCompiled .= '
	<div class="structItem structItem--thread  js-inlineModContainer ' . (($__vars['discussion']['state'] == 'moderated') ? 'is-moderated' : '') . ' ' . (($__vars['discussion']['state'] == 'deleted') ? 'is-deleted' : '') . ' js-inlineModContainer js-threadListItem-' . $__templater->escape($__vars['discussion']['discussion_id']) . '" data-author="' . ($__templater->escape($__vars['discussion']['User']['username']) ?: $__templater->escape($__vars['discussion']['username'])) . '">
		<div class="structItem-cell structItem-cell--icon">
			<div class="structItem-iconContainer">
				' . $__templater->func('avatar', array($__vars['discussion']['User'], 's', false, array(
		'defaultname' => $__vars['discussion']['username'],
	))) . '
				
				';
	if (($__vars['discussion']['user_id'] !== $__vars['xf']['visitor']['user_id']) AND $__templater->method($__vars['discussion'], 'getUserPostCount', array($__vars['xf']['visitor'], ))) {
		$__finalCompiled .= '
					' . $__templater->func('avatar', array($__vars['xf']['visitor'], 's', false, array(
			'href' => '',
			'class' => 'avatar--separated structItem-secondaryIcon',
			'title' => '',
		))) . '
				';
	}
	$__finalCompiled .= '
			</div>
		</div>
		<div class="structItem-cell structItem-cell--main" data-xf-init="touch-proxy">
			';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
					';
	if (($__vars['discussion']['state'] == 'moderated') AND $__vars['permissions']['approveUnapprove']) {
		$__compilerTemp1 .= '
						<li>
							<i class="structItem-status structItem-status--moderated" aria-hidden="true" title="' . 'Awaiting approval' . '"></i>
							<span class="u-srOnly">' . 'Awaiting approval' . '</span>
						</li>
					';
	}
	$__compilerTemp1 .= '
					';
	if (($__vars['discussion']['state'] == 'deleted') AND $__vars['permissions']['viewDeleted']) {
		$__compilerTemp1 .= '
						<li>
							<i class="structItem-status structItem-status--deleted" aria-hidden="true" title="' . 'Deleted' . '"></i>
							<span class="u-srOnly">' . 'Deleted' . '</span>
						</li>
					';
	}
	$__compilerTemp1 .= '
					';
	if ($__vars['discussion']['state'] == 'locked') {
		$__compilerTemp1 .= '
						<li>
							<i class="structItem-status structItem-status--locked" aria-hidden="true" title="' . 'Locked' . '"></i>
							<span class="u-srOnly">' . 'Locked' . '</span>
						</li>
					';
	}
	$__compilerTemp1 .= '
				';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
				<ul class="structItem-statuses">
				' . $__compilerTemp1 . '
				</ul>
			';
	}
	$__finalCompiled .= '

			<div class="structItem-title">
				' . '
				<a href="' . $__templater->func('link', array('group_discussions/view', $__vars['group'], array('id' => $__vars['discussion']['discussion_id'], ), ), true) . '" class="" data-tp-primary="on" data-xf-init="' . ($__vars['canPreview'] ? 'preview-tooltip' : '') . '" data-preview-url="' . ($__vars['canPreview'] ? $__templater->func('link', array('group_discussions/preview', $__vars['discussion'], ), true) : '') . '">' . $__templater->escape($__vars['discussion']['title']) . '</a>
			</div>

			<div class="structItem-minor">
				';
	$__compilerTemp2 = '';
	$__compilerTemp2 .= '
						';
	if ($__vars['extraInfo']) {
		$__compilerTemp2 .= '
							<li>' . $__templater->escape($__vars['extraInfo']) . '</li>
						' . '
						';
	}
	$__compilerTemp2 .= '
						';
	if ($__vars['chooseName']) {
		$__compilerTemp2 .= '
							<li>' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'name' => $__vars['chooseName'] . '[]',
			'value' => $__vars['discussion']['discussion_id'],
			'class' => 'js-chooseItem',
			'_type' => 'option',
		))) . '</li>

						';
	} else if ($__vars['permissions']['inlineMod']) {
		$__compilerTemp2 .= '
							<li>' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'value' => $__vars['discussion']['discussion_id'],
			'class' => 'js-inlineModToggle',
			'data-xf-init' => 'tooltip',
			'title' => 'Select for moderation',
			'_type' => 'option',
		))) . '</li>

						';
	}
	$__compilerTemp2 .= '
					';
	if (strlen(trim($__compilerTemp2)) > 0) {
		$__finalCompiled .= '
					<ul class="structItem-extraInfo">
					' . $__compilerTemp2 . '
					</ul>
				';
	}
	$__finalCompiled .= '

				';
	if (($__vars['discussion']['state'] == 'deleted') AND $__vars['permissions']['viewDeleted']) {
		$__finalCompiled .= '
					';
		if ($__vars['extraInfo']) {
			$__finalCompiled .= '<span class="structItem-extraInfo">' . $__templater->escape($__vars['extraInfo']) . '</span>';
		}
		$__finalCompiled .= '

					<ul class="listInline listInline--bullet listInline--selfInline">
						<li>' . ($__templater->escape($__vars['message']) ?: 'removed_from_public_view') . '</li>
							<li>' . 'Deleted by ' . ($__templater->escape($__vars['discussion']['deleted_by']) ?: 'N/A') . '' . '</li>
							<li>' . $__templater->func('date_dynamic', array($__vars['discussion']['delete_date'], array(
		))) . '</li>
							';
		if ($__vars['discussion']['reason']) {
			$__finalCompiled .= '
								<li>' . 'Reason' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['discussion']['reason']) . '</li>
							';
		}
		$__finalCompiled .= '
					</ul>
				';
	} else {
		$__finalCompiled .= '
					<ul class="structItem-parts">
						<li>' . $__templater->func('username_link', array($__vars['discussion']['User'], false, array(
			'defaultname' => $__vars['discussion']['username'],
		))) . '</li>
						<li class="structItem-startDate"><a href="' . $__templater->func('link', array('threads', $__vars['thread'], ), true) . '" rel="nofollow">' . $__templater->func('date_dynamic', array($__vars['discussion']['date'], array(
		))) . '</a></li>
					</ul>

					';
		if (($__vars['discussion']['reply_count'] >= $__vars['xf']['options']['messagesPerPage']) AND $__vars['xf']['options']['lastPageLinks']) {
			$__finalCompiled .= '
						<span class="structItem-pageJump">
						';
			$__compilerTemp3 = $__templater->func('last_pages', array($__vars['discussion']['reply_count'] + 1, $__vars['xf']['options']['messagesPerPage'], $__vars['xf']['options']['lastPageLinks'], ), false);
			if ($__templater->isTraversable($__compilerTemp3)) {
				foreach ($__compilerTemp3 AS $__vars['p']) {
					$__finalCompiled .= '
							<a href="' . $__templater->func('link', array('group_discussions/view', $__vars['group'], array('id' => $__vars['discussion']['discussion_id'], 'page' => $__vars['p'], ), ), true) . '">' . $__templater->escape($__vars['p']) . '</a>
						';
				}
			}
			$__finalCompiled .= '
						</span>
					';
		}
		$__finalCompiled .= '
				';
	}
	$__finalCompiled .= '
			</div>
		</div>
		<div class="structItem-cell structItem-cell--meta">
			<dl class="pairs pairs--justified">
				<dt>' . 'Replies' . '</dt>
				<dd>' . $__templater->filter($__vars['discussion']['reply_count'], array(array('number', array()),), true) . '</dd>
			</dl>
			<dl class="pairs pairs--justified structItem-minor">
				<dt>' . 'Participants' . '</dt>
				<dd>' . $__templater->escape($__vars['discussion']['participant_count']) . '</dd>
			</dl>
		</div>
		<div class="structItem-cell structItem-cell--latest">
			<a href="' . $__templater->func('link', array('group_discussions/latest', $__vars['group'], array('id' => $__vars['discussion']['discussion_id'], ), ), true) . '" rel="nofollow">' . $__templater->func('date_dynamic', array($__vars['discussion']['last_post_date'], array(
		'class' => 'structItem-latestDate',
	))) . '</a>
			<div class="structItem-minor">' . $__templater->func('username_link', array($__vars['discussion']['LastPoster'], false, array(
	))) . '</div>
		</div>
	</div>
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';

	return $__finalCompiled;
}
);