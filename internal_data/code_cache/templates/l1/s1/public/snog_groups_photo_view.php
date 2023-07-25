<?php
// FROM HASH: 1dbb87815e52228246a321cb4ed0038a
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ((!$__vars['photo']['title']) AND ($__vars['xf']['visitor']['user_id'] == $__vars['photo']['user_id'])) {
		$__finalCompiled .= '
	<div style="margin-top:5px;margin-bottom:5px;">
			' . $__templater->button('Add photo title', array(
			'href' => $__templater->func('link', array('group_photos/title', $__vars['group'], array('photo_id' => $__vars['photo']['photo_id'], ), ), false),
			'class' => 'button button--icon button--icon--add',
			'data-xf-click' => 'overlay',
		), '', array(
		)) . '
	</div>
';
	} else {
		$__finalCompiled .= '
	<h2>' . $__templater->escape($__vars['photo']['title']) . '</h2>
';
	}
	$__finalCompiled .= '

<div class="photos">
	<img src="' . $__templater->escape($__templater->method($__vars['group'], 'getPhotoUrl', array('o', $__vars['photo']['user_id'], $__vars['photo']['name'], ))) . '" />
	';
	if (($__vars['photo']['state'] !== 'deleted') AND (($__vars['xf']['visitor']['is_admin'] OR (($__vars['xf']['visitor']['user_id'] == $__vars['photo']['user_id']) AND $__vars['permissions']['deleteOwnPost'])) OR $__vars['permissions']['deleteAnyPost'])) {
		$__finalCompiled .= '
		<br />
		<div class="photodelete">
			<a href="' . $__templater->func('link', array('group_photos/delete', $__vars['group'], array('photo_id' => $__vars['photo']['photo_id'], ), ), true) . '" data-xf-click="overlay">' . 'Delete photo' . '</a>
		</div>
	';
	} else {
		$__finalCompiled .= '
		';
		if (($__vars['photo']['state'] == 'deleted') AND (($__vars['xf']['visitor']['is_admin'] OR (($__vars['xf']['visitor']['user_id'] == $__vars['photo']['user_id']) AND $__vars['permissions']['deleteOwnPost'])) OR $__vars['permissions']['deleteAnyPost'])) {
			$__finalCompiled .= '
			<br />
			<dl class="blockStatus">
				<dt>' . 'Status' . '</dt>
				<dd class="blockStatus-message blockStatus-message--deleted">
					<ul class="listInline listInline--bullet listInline--selfInline">
						';
			if (!$__templater->test($__vars['message'], 'empty', array())) {
				$__finalCompiled .= '
							<li>' . $__templater->escape($__vars['message']) . '</li>
						';
			}
			$__finalCompiled .= '
						<li>' . 'Deleted by ' . ($__templater->escape($__vars['photo']['deleted_by']) ?: 'N/A') . '' . '</li>
						<li>' . $__templater->func('date_dynamic', array($__vars['photo']['delete_date'], array(
			))) . '</li>
						';
			if ($__vars['photo']['reason']) {
				$__finalCompiled .= '
							<li>' . 'Reason' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['photo']['reason']) . '</li>
						';
			}
			$__finalCompiled .= '
						';
			if ($__vars['permissions']['undelete'] OR $__vars['xf']['visitor']['is_admin']) {
				$__finalCompiled .= '
							<li><a href="' . $__templater->func('link', array('group_photos/undelete', $__vars['group'], array('photo_id' => $__vars['photo']['photo_id'], ), ), true) . '" data-force-flash-message="true">' . 'Undelete photo' . '</a></li>
						';
			}
			$__finalCompiled .= '
						';
			if ($__vars['permissions']['hardDeleteAnyPost'] OR $__vars['xf']['visitor']['is_admin']) {
				$__finalCompiled .= '
							<li><a href="' . $__templater->func('link', array('group_photos/delete', $__vars['group'], array('photo_id' => $__vars['photo']['photo_id'], ), ), true) . '" data-xf-click="overlay">' . 'Delete photo' . '</a></li>
						';
			}
			$__finalCompiled .= '
					</ul>
				</dd>
			</dl>
			<br />
		';
		}
		$__finalCompiled .= '
	';
	}
	$__finalCompiled .= '
</div>

<div class="block block--messages" data-xf-init="inline-mod" data-type="profile_post" data-href="' . $__templater->func('link', array('inline-mod', ), true) . '">
	<div class="block-container">
		<div class="block-body js-replyNewMessageContainer">
			';
	if ($__vars['xf']['visitor']['user_id'] AND ($__vars['xf']['visitor']['is_admin'] OR (!$__templater->test($__vars['xf']['visitor']['SocialGroups'], 'empty', array()) AND $__templater->func('in_array', array($__vars['group']['groupid'], $__vars['xf']['visitor']['SocialGroups']['groups'], ), false)))) {
		$__finalCompiled .= '
				';
		$__vars['firstProfilePost'] = $__templater->filter($__vars['photoPosts'], array(array('first', array()),), false);
		$__finalCompiled .= '
				
				' . $__templater->callMacro('snog_groups_photo_comment_macros', 'submit', array(
			'user' => $__vars['user'],
			'group' => $__vars['group'],
			'photoid' => $__vars['photo']['photo_id'],
			'lastDate' => $__vars['lastDate'],
			'containerSelector' => '< .js-replyNewMessageContainer',
		), $__vars) . '
			';
	}
	$__finalCompiled .= '

			';
	if (!$__templater->test($__vars['photoPosts'], 'empty', array())) {
		$__finalCompiled .= '
				';
		if ($__templater->isTraversable($__vars['photoPosts'])) {
			foreach ($__vars['photoPosts'] AS $__vars['photoPost']) {
				$__finalCompiled .= '
					' . $__templater->callMacro('snog_groups_photo_comment_macros', 'photo_post', array(
					'photoPost' => $__vars['photoPost'],
					'group' => $__vars['group'],
				), $__vars) . '
				';
			}
		}
		$__finalCompiled .= '
			';
	} else {
		$__finalCompiled .= '
				<div class="block-row js-replyNoMessages">' . 'There are no comments for this photo' . '</div>
			';
	}
	$__finalCompiled .= '
		</div>
	</div>

	<div class="block-outer block-outer--after">
		' . $__templater->func('page_nav', array(array(
		'page' => $__vars['page'],
		'total' => $__vars['total'],
		'link' => 'members',
		'data' => $__vars['user'],
		'wrapperclass' => 'block-outer-main',
		'perPage' => $__vars['perPage'],
	))) . '
		<div class="block-outer-opposite">
			' . $__templater->func('show_ignored', array(array(
	))) . '
			';
	if ($__vars['canInlineMod']) {
		$__finalCompiled .= '
				' . $__templater->callMacro('inline_mod_macros', 'button', array(), $__vars) . '
			';
	}
	$__finalCompiled .= '
		</div>
	</div>
</div>';
	return $__finalCompiled;
}
);