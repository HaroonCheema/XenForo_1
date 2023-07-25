<?php
// FROM HASH: 334d3c41948fff78d14d16852057b936
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->includeCss('snog_groups.less');
	$__finalCompiled .= '

<div class="mainframe">
' . $__templater->func('bb_code', array($__vars['group']['groupdescription'], '', '', ), true) . '

';
	if ($__vars['xf']['visitor']['user_id'] AND ($__vars['xf']['visitor']['user_state'] == 'valid')) {
		$__finalCompiled .= '
	';
		if (!$__templater->func('in_array', array($__vars['group']['groupid'], $__vars['xf']['visitor']['SocialGroups']['pending'], ), false)) {
			$__finalCompiled .= '
		';
			if (!$__templater->func('in_array', array($__vars['group']['groupid'], $__vars['xf']['visitor']['SocialGroups']['groups'], ), false)) {
				$__finalCompiled .= '
			';
				if (($__vars['groupCount'] < $__templater->method($__vars['xf']['visitor'], 'hasPermission', array('snogGroups', 'maxJoinedGroups', ))) OR ($__templater->method($__vars['xf']['visitor'], 'hasPermission', array('snogGroups', 'maxJoinedGroups', )) == -1)) {
					$__finalCompiled .= '
				';
					if ((!$__vars['group']['privategroup']) AND ((!$__vars['group']['privatehide']) AND (!$__vars['group']['approval']))) {
						$__finalCompiled .= '
					' . $__templater->form('
						<p style="text-align:center;">' . $__templater->button('Join group', array(
							'type' => 'submit',
							'class' => 'button button--icon button--icon--handshake',
						), '', array(
						)) . '</p>
					', array(
							'action' => $__templater->func('link', array('group/join', $__vars['group'], ), false),
							'ajax' => 'true',
							'class' => 'block',
							'data-force-flash-message' => 'true',
						)) . '
				';
					} else {
						$__finalCompiled .= '
					';
						if (!$__vars['group']['privatehide']) {
							$__finalCompiled .= '
						' . $__templater->form('
							<p style="text-align:center;">' . $__templater->button('Request membership', array(
								'type' => 'submit',
								'class' => 'button button--icon button--icon--handshake',
							), '', array(
							)) . '</p>
						', array(
								'action' => $__templater->func('link', array('group/request', $__vars['group'], ), false),
								'ajax' => 'true',
								'class' => 'block',
								'data-force-flash-message' => 'true',
							)) . '
					';
						}
						$__finalCompiled .= '
				';
					}
					$__finalCompiled .= '
			';
				} else {
					$__finalCompiled .= '
				<div class="maxblock">
					' . 'You may not join this group.<br />You are already a member of the maxium number of groups you can join.' . '
				</div>
			';
				}
				$__finalCompiled .= '
		';
			} else {
				$__finalCompiled .= '
			';
				if ($__vars['xf']['visitor']['user_id'] !== $__vars['group']['owner_id']) {
					$__finalCompiled .= '
				' . $__templater->form('
					<p style="text-align:center;">' . $__templater->button('Leave group', array(
						'type' => 'submit',
						'class' => 'button button--icon button--icon--leave',
					), '', array(
					)) . '</p>
				', array(
						'action' => $__templater->func('link', array('group/leave', $__vars['group'], ), false),
						'ajax' => 'true',
						'class' => 'block',
						'data-force-flash-message' => 'true',
					)) . '
			';
				}
				$__finalCompiled .= '
		';
			}
			$__finalCompiled .= '
	';
		} else {
			$__finalCompiled .= '
		<div class="waitblock">
			' . 'Membership waiting approval' . '
		</div>
	';
		}
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '
</div>';
	return $__finalCompiled;
}
);