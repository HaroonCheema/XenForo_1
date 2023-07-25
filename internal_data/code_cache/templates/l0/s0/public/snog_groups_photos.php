<?php
// FROM HASH: b6e03e57da100de31b524e328826bfad
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<div class="mainframe">
';
	if ($__vars['myphotos']) {
		$__finalCompiled .= '
	' . $__templater->func('page_nav', array(array(
			'page' => $__vars['page'],
			'total' => $__vars['total'],
			'link' => 'group_photos/myphotos',
			'data' => $__vars['group'],
			'wrapperclass' => 'js-filterHide block-outer block-outer--after',
			'perPage' => $__vars['perPage'],
		))) . '
';
	} else {
		$__finalCompiled .= '
	';
		if ($__vars['member']) {
			$__finalCompiled .= '
		' . $__templater->func('page_nav', array(array(
				'page' => $__vars['page'],
				'total' => $__vars['total'],
				'link' => 'group_photos/memberphotos',
				'data' => $__vars['group'],
				'params' => array('user_id' => $__vars['member'], ),
				'wrapperclass' => 'js-filterHide block-outer block-outer--after',
				'perPage' => $__vars['perPage'],
			))) . '
	';
		} else {
			$__finalCompiled .= '
		' . $__templater->func('page_nav', array(array(
				'page' => $__vars['page'],
				'total' => $__vars['total'],
				'link' => 'group_photos/photolist',
				'data' => $__vars['group'],
				'wrapperclass' => 'js-filterHide block-outer block-outer--after',
				'perPage' => $__vars['perPage'],
			))) . '
	';
		}
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

<div class="photos">
	';
	if (!$__templater->test($__vars['photos'], 'empty', array())) {
		$__finalCompiled .= '
		';
		if ($__templater->isTraversable($__vars['photos'])) {
			foreach ($__vars['photos'] AS $__vars['photo']) {
				$__finalCompiled .= '
			<div class="photoMain' . ($__vars['photo']['delete_date'] ? ' deleted' : '') . '">
					<a href="' . $__templater->func('link', array('group_photos/view', $__vars['group'], array('photo_id' => $__vars['photo']['photo_id'], 'myphotos' => $__vars['myphotos'], 'member' => $__vars['member'], ), ), true) . '">
				<div class="photo">
					<img src="' . $__templater->escape($__templater->method($__vars['group'], 'getPhotoUrl', array('t', $__vars['photo']['user_id'], $__vars['photo']['name'], ))) . '" /><br />
				</div>
				</a>
				<a href="' . $__templater->func('link', array('group_photos/memberphotos', $__vars['group'], array('user_id' => $__vars['photo']['User']['user_id'], ), ), true) . '">
				<div class="phototitle">
					' . 'Uploaded by' . '<br />
					' . $__templater->escape($__vars['photo']['User']['username']) . '
				</div>
				</a>
			</div>
		';
			}
		}
		$__finalCompiled .= '
	';
	} else {
		$__finalCompiled .= '
		' . 'There are no photos in this group' . '
	';
	}
	$__finalCompiled .= '
</div>

';
	if ($__vars['myphotos']) {
		$__finalCompiled .= '
	' . $__templater->func('page_nav', array(array(
			'page' => $__vars['page'],
			'total' => $__vars['total'],
			'link' => 'group_photos/myphotos',
			'data' => array('groupid' => $__vars['group']['groupid'], ),
			'wrapperclass' => 'js-filterHide block-outer block-outer--after',
			'perPage' => $__vars['perPage'],
		))) . '
';
	} else {
		$__finalCompiled .= '
	';
		if ($__vars['member']) {
			$__finalCompiled .= '
		' . $__templater->func('page_nav', array(array(
				'page' => $__vars['page'],
				'total' => $__vars['total'],
				'link' => 'group_photos/memberphotos&user_id=' . $__vars['member'],
				'data' => array('groupid' => $__vars['group']['groupid'], 'name' => $__vars['group']['name'], ),
				'wrapperclass' => 'js-filterHide block-outer block-outer--after',
				'perPage' => $__vars['perPage'],
			))) . '
	';
		} else {
			$__finalCompiled .= '
		' . $__templater->func('page_nav', array(array(
				'page' => $__vars['page'],
				'total' => $__vars['total'],
				'link' => 'group_photos/photolist',
				'data' => array('groupid' => $__vars['group']['groupid'], ),
				'wrapperclass' => 'js-filterHide block-outer block-outer--after',
				'perPage' => $__vars['perPage'],
			))) . '
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