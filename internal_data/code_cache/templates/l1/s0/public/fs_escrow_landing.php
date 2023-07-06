<?php
// FROM HASH: 809d2decfcdb828bbfcfae0944eab069
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Escrow');
	$__templater->pageParams['pageNumber'] = $__vars['page'];
	$__finalCompiled .= '
<div class="block-container">
    <div class="block-body">
		' . $__templater->callMacro('notice_macros', 'notice_list', array(
		'type' => 'block',
		'notices' => $__vars['rules'],
	), $__vars) . '
		';
	$__templater->pageParams['pageAction'] = $__templater->preEscaped('
			 ' . $__templater->button('Start Escrow', array(
		'href' => $__templater->func('link', array('escrow/add', ), false),
		'class' => 'button--cta',
		'icon' => 'write',
	), '', array(
	)) . '
		');
	$__finalCompiled .= '
    
    </div>
 </div>';
	return $__finalCompiled;
}
);