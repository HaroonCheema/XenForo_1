<?php
// FROM HASH: 11be86ea0530873b16d59a7787a7b017
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Rules and Regulation');
	$__templater->pageParams['pageNumber'] = $__vars['page'];
	$__finalCompiled .= '
<div class="block-container">
    <div class="block-body">
		' . $__templater->callMacro('notice_macros', 'notice_list', array(
		'type' => 'block',
		'notices' => $__vars['rules'],
	), $__vars) . '
		';
	$__compilerTemp1 = '';
	if ($__vars['xf']['visitor']['user_id'] != 0) {
		$__compilerTemp1 .= '
				 ' . $__templater->button('Start Escrow', array(
			'href' => $__templater->func('link', array('escrow/add', ), false),
			'class' => 'button--cta',
			'icon' => 'write',
		), '', array(
		)) . '
			';
	}
	$__templater->pageParams['pageAction'] = $__templater->preEscaped('
			' . $__compilerTemp1 . '
			
		');
	$__finalCompiled .= '
		<!--start tabs-->
		';
	if (($__vars['xf']['visitor']['user_id'] != 0) OR $__vars['xf']['visitor']['is_admin']) {
		$__finalCompiled .= '
			<div class="block">
				<h2 class="block-tabHeader block-tabHeader--memberTabs tabs hScroller"
					data-xf-init="tabs h-scroller"
					data-panes=".js-memberTabPanes"
					data-state="replace"
					role="tablist">
					<span class="hScroller-scroll">
						' . '
							<a href="' . $__templater->func('link', array('members/my-escrow', $__vars['xf']['visitor'], ), true) . '"
							   class="tabs-tab" id="my-escrow" role="tab">
								' . 'My Escrows' . '
							</a>

							<a href="' . $__templater->func('link', array('members/mentioned-escrow', $__vars['xf']['visitor'], ), true) . '"
							   class="tabs-tab" id="mentioned-escrow" role="tab">
								' . 'Mentioned Escrow' . '
							</a>

							<a href="' . $__templater->func('link', array('members/logs', $__vars['xf']['visitor'], ), true) . '"
							   class="tabs-tab" id="escrow-logs" role="tab">
								' . 'Escrow Logs' . '
							</a>

						' . '
					</span>
				</h2>
			</div>
		';
	}
	$__finalCompiled .= '
		<!--tabs content-->
		
		<ul class="tabPanes js-memberTabPanes">
			' . '

			';
	if (($__vars['xf']['visitor']['user_id'] != 0) OR $__vars['xf']['visitor']['is_admin']) {
		$__finalCompiled .= '
				<li data-href="' . $__templater->func('link', array('members/my-escrow', $__vars['xf']['visitor'], ), true) . '" role="tabpanel" aria-labelledby="my-escrow">
						<div class="blockMessage">' . 'Loading' . $__vars['xf']['language']['ellipsis'] . '</div>
				</li>
				<li data-href="' . $__templater->func('link', array('members/mentioned-escrow', $__vars['xf']['visitor'], ), true) . '" role="tabpanel" aria-labelledby="mentioned-escrow">
						<div class="blockMessage">' . 'Loading' . $__vars['xf']['language']['ellipsis'] . '</div>
				</li>
				<li data-href="' . $__templater->func('link', array('members/logs', $__vars['xf']['visitor'], ), true) . '" role="tabpanel" aria-labelledby="escrow-logs">
						<div class="blockMessage">' . 'Loading' . $__vars['xf']['language']['ellipsis'] . '</div>
				</li>
			';
	} else {
		$__finalCompiled .= '
				<div class="blockMessage">' . 'Sorry, you need to login First...!' . '</div>
				
			';
	}
	$__finalCompiled .= '

			' . '
		</ul>

		
		
    
    </div>
 </div>';
	return $__finalCompiled;
}
);