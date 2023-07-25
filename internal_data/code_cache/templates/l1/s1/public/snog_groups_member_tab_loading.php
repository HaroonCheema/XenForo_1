<?php
// FROM HASH: 797b0f586f7869378e26237fb3a83f3b
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ((($__vars['user']['Privacy']['snog_groups_view'] == 'everyone') OR (($__vars['user']['Privacy']['snog_groups_view'] == 'members') AND ($__vars['xf']['visitor']['user_id'] > 0))) OR $__vars['xf']['visitor']['is_admin']) {
		$__finalCompiled .= '
    <li data-href="' . $__templater->func('link', array('groups/users', $__vars['user'], ), true) . '" role="tabpanel" aria-labelledby="snogGroups">
        <div class="blockMessage">' . 'Loading' . $__vars['xf']['language']['ellipsis'] . '</div>
    </li>
';
	}
	return $__finalCompiled;
}
);