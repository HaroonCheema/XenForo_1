<?php
// FROM HASH: dc4600983c3cdca748dc12ee3c526f29
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<div class="mainframe">
' . $__templater->func('page_nav', array(array(
		'page' => $__vars['page'],
		'total' => $__vars['total'],
		'link' => 'group/members',
		'data' => $__vars['group'],
		'wrapperclass' => 'js-filterHide block-outer block-outer--after',
		'perPage' => $__vars['perPage'],
	))) . '

<div class="members">
	';
	if ($__templater->isTraversable($__vars['members'])) {
		foreach ($__vars['members'] AS $__vars['member']) {
			$__finalCompiled .= '
		<div class="user">
			' . $__templater->func('avatar', array($__vars['member']['User'], 's', false, array(
			))) . '<br />
			' . $__templater->escape($__vars['member']['User']['username']) . '<br />
			';
			if ($__vars['member']['user_id'] == $__vars['group']['owner_id']) {
				$__finalCompiled .= '
				<span class="userTitle">' . 'Group owner' . '</span>
			';
			}
			$__finalCompiled .= '
			';
			if ($__templater->func('in_array', array($__vars['group']['groupid'], $__vars['member']['moderator'], ), false)) {
				$__finalCompiled .= '
				<span class="userTitle">' . 'Group moderator' . '</span>
			';
			}
			$__finalCompiled .= '
			';
			if (($__vars['member']['user_id'] !== $__vars['group']['owner_id']) AND (!$__templater->func('in_array', array($__vars['group']['groupid'], $__vars['member']['moderator'], ), false))) {
				$__finalCompiled .= '
				';
				if (($__vars['xf']['visitor']['user_id'] == $__vars['group']['owner_id']) OR $__templater->method($__vars['xf']['visitor'], 'hasAdminPermission', array('snog_socialgroups_admin', ))) {
					$__finalCompiled .= '
					<a href="' . $__templater->func('link', array('group/remove', $__vars['group'], array('user_id' => $__vars['member']['user_id'], ), ), true) . '" data-xf-click="overlay">
						<span class="userTitle redtitle">' . 'Remove' . '</span>
					</a>
				';
				}
				$__finalCompiled .= '
			';
			}
			$__finalCompiled .= '
		</div>
	';
		}
	}
	$__finalCompiled .= '
	
	';
	if ($__vars['membersearch']) {
		$__finalCompiled .= '
		';
		if ($__templater->test($__vars['members'], 'empty', array())) {
			$__finalCompiled .= '
			<div>
				' . 'No matching users were found.' . '
			</div>
		';
		}
		$__finalCompiled .= '
		<div>
			<a href="' . $__templater->func('link', array('group/members', $__vars['group'], ), true) . '">' . 'Show all members' . '</a>
		</div>
	';
	}
	$__finalCompiled .= '

	';
	if (($__templater->func('in_array', array($__vars['group']['groupid'], $__vars['xf']['visitor']['SocialGroups']['moderator'], ), false) OR $__templater->func('in_array', array($__vars['group']['groupid'], $__vars['xf']['visitor']['SocialGroups']['owner'], ), false)) OR $__templater->method($__vars['xf']['visitor'], 'hasAdminPermission', array('snog_socialgroups_admin', ))) {
		$__finalCompiled .= '
		';
		if (!$__templater->func('empty', array($__vars['pending']))) {
			$__finalCompiled .= '
			<div class="block-container headerpad">
				<h3 class="block-formSectionHeader">
					' . 'Membership waiting approval' . '
				</h3>
				';
			if ($__templater->isTraversable($__vars['pending'])) {
				foreach ($__vars['pending'] AS $__vars['member']) {
					$__finalCompiled .= '
					<div class="user">
						' . $__templater->func('avatar', array($__vars['member']['User'], 's', false, array(
					))) . '<br />
						' . $__templater->escape($__vars['member']['User']['username']) . '<br />
						';
					if (($__vars['xf']['visitor']['user_id'] == $__vars['group']['owner_id']) OR $__templater->func('in_array', array($__vars['group']['groupid'], $__vars['xf']['visitor']['SocialGroups']['moderator'], ), false)) {
						$__finalCompiled .= '
							<a href="' . $__templater->func('link', array('group/approve', $__vars['group'], array('user_id' => $__vars['member']['user_id'], ), ), true) . '" data-xf-click="overlay">
								<span class="userTitle redtitle">' . 'Approve/Deny' . '</span>
								</a>
						';
					}
					$__finalCompiled .= '
					</div>
				';
				}
			}
			$__finalCompiled .= '
			</div>
		';
		}
		$__finalCompiled .= '
	
		';
		if (!$__templater->func('empty', array($__vars['invites']))) {
			$__finalCompiled .= '
			<div class="block-container headerpad">
				<h3 class="block-formSectionHeader">
					' . 'Invited members waiting response' . '
				</h3>

				';
			if ($__templater->isTraversable($__vars['invites'])) {
				foreach ($__vars['invites'] AS $__vars['member']) {
					$__finalCompiled .= '
					<div class="user">
						' . $__templater->func('avatar', array($__vars['member']['User'], 's', false, array(
					))) . '<br />
						' . $__templater->escape($__vars['member']['User']['username']) . '<br />
						';
					if ($__vars['xf']['visitor']['user_id'] == $__vars['group']['owner_id']) {
						$__finalCompiled .= '
							<a href="' . $__templater->func('link', array('group/cancel', $__vars['group'], array('user_id' => $__vars['member']['user_id'], ), ), true) . '" data-xf-click="overlay">
								<span class="userTitle redtitle">' . 'Cancel invitation' . '</span>
								</a>
						';
					}
					$__finalCompiled .= '
					</div>
				';
				}
			}
			$__finalCompiled .= '
			</div>
		';
		}
		$__finalCompiled .= '
	';
	}
	$__finalCompiled .= '
</div>

' . $__templater->func('page_nav', array(array(
		'page' => $__vars['page'],
		'total' => $__vars['total'],
		'link' => 'group/members',
		'data' => $__vars['group'],
		'wrapperclass' => 'js-filterHide block-outer block-outer--after',
		'perPage' => $__vars['perPage'],
	))) . '
</div>';
	return $__finalCompiled;
}
);