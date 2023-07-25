<?php
// FROM HASH: 856176a76088e5caa158793b0a097271
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('fs_molly');
	$__templater->pageParams['pageNumber'] = $__vars['page'];
	$__finalCompiled .= '

';
	$__templater->setPageParam('searchConstraints', array('Auctions' => array('search_type' => 'fs_auction_auctions', ), ));
	$__finalCompiled .= '

';
	if ($__vars['xf']['visitor']) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
    ' . $__templater->button('fs_molly_add_sub_forum', array(
			'href' => $__templater->func('link', array('molly/add', ), false),
			'class' => 'button--cta',
			'icon' => 'write',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '
  

<div
  class="block"
  data-xf-init="' . ($__vars['canInlineMod'] ? 'inline-mod' : '') . '"
  data-type="fs_molly"
  data-href="' . $__templater->func('link', array('inline-mod', ), true) . '"
>
  <div class="block-outer">

  </div>
  <div class="block-container">

    <!--Listing View--->
    <div class="block-body">

      <div class="block-footer">
        <span class="block-footer-counter"
          >' . $__templater->func('display_totals', array($__vars['totalReturn'], $__vars['total'], ), true) . '</span
        >
      </div>
    </div>
  </div>

  <div class="block-outer block-outer--after">

    ' . $__templater->func('show_ignored', array(array(
		'wrapperclass' => 'block-outer-opposite',
	))) . '
  </div>
</div>

';
	$__templater->setPageParam('sideNavTitle', 'Categories');
	$__finalCompiled .= '

';
	$__templater->modifySideNavHtml(null, '
  ' . $__templater->callMacro('fs_auction_category_list_macros', 'simple_list_block', array(
		'categoryTree' => 'null',
	), $__vars) . '

', 'replace');
	$__finalCompiled .= '

<!-- Filter Bar Macro Start -->';
	return $__finalCompiled;
}
);