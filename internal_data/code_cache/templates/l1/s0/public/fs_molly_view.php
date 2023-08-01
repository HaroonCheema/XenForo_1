<?php
// FROM HASH: b0440f570cecefba1f3db7ac104a17ad
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped($__templater->escape($__vars['group']['name']));
	$__finalCompiled .= '

' . $__templater->func('dump', array($__vars['subForums'], ), true) . '

';
	$__templater->includeCss('tlg_style.less');
	$__finalCompiled .= '


';
	$__templater->modifySideNavHtml(null, '
	
	<div class="block groupAvatar-block">
        <a href="' . $__templater->func('link', array('groups', $__vars['group'], ), true) . '"
       class="groupAvatar groupAvatar--link groupAvatar--default" style="background-color:#e08585;color:#8f2424">
           ' . '
            <span class="groupAvatar--text groupAvatar--dynamic">H</span>
    </a>
    </div>

', 'replace');
	return $__finalCompiled;
}
);