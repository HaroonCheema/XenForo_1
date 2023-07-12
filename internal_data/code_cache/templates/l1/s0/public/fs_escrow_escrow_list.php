<?php
// FROM HASH: 561e066dc0c0f11b4c7ca2c23faefb22
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<div class="block-container">
	<div class="block-body">
		';
	if ($__templater->func('count', array($__vars['escrows'], ), false) > 0) {
		$__finalCompiled .= '
		
				  ';
		if ($__templater->isTraversable($__vars['escrows'])) {
			foreach ($__vars['escrows'] AS $__vars['escrow']) {
				$__finalCompiled .= '
					' . $__templater->callMacro('fs_escrow_list_macro', 'escrow', array(
					'escrow' => $__vars['escrow'],
					'containerClass' => 'contentRow-minor',
				), $__vars) . '
				';
			}
		}
		$__finalCompiled .= '
			
				
		';
	} else {
		$__finalCompiled .= '
          <div class="block-body block-row">
            ' . 'No Data Found...!' . '
          </div> 
        ';
	}
	$__finalCompiled .= '
	</div>
</div>';
	return $__finalCompiled;
}
);