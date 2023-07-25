<?php
// FROM HASH: 9c6101866bab03ae94eb675131760ed1
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ((($__vars['user']['Privacy']['snog_groups_view'] == 'everyone') OR (($__vars['user']['Privacy']['snog_groups_view'] == 'members') AND ($__vars['xf']['visitor']['user_id'] > 0))) OR $__vars['xf']['visitor']['is_admin']) {
		$__finalCompiled .= '
    <a href="' . $__templater->func('link', array('groups/users', $__vars['user'], ), true) . '"
        class="tabs-tab"
        id="snogGroups"
        role="tab">' . 'Groups' . '</a>
';
	}
	return $__finalCompiled;
}
);