<?php
// FROM HASH: dedf609f5c002da5c655b628ec1712fd
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Add listing');
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['category'], 'getBreadcrumbs', array()));
	$__finalCompiled .= '

';
	$__templater->includeJs(array(
		'src' => 'https://maps.googleapis.com/maps/api/js?key=' . $__vars['xf']['options']['z61ClassifiedsGoogleApi'] . '&libraries=places',
	));
	$__finalCompiled .= '
';
	$__templater->includeJs(array(
		'src' => 'z61/classifieds/geocomplete.js',
	));
	$__finalCompiled .= '
';
	$__templater->inlineJs('
	$("#location").geocomplete();  
');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['attachmentData']) {
		$__compilerTemp1 .= '
						' . $__templater->callMacro('helper_attach_upload', 'upload_block', array(
			'attachmentData' => $__vars['attachmentData'],
			'forceHash' => $__vars['category']['draft_listing']['attachment_hash'],
		), $__vars) . '
					';
	}
	$__finalCompiled .= $__templater->form('

	<div class="block-container">
		<div class="block-body">
			' . $__templater->callMacro('z61_classifieds_listing_edit_macros', 'title', array(
		'category' => $__vars['category'],
		'listing' => $__vars['listing'],
		'prefixes' => $__vars['prefixes'],
	), $__vars) . '

			<div>
				' . $__templater->formEditorRow(array(
		'name' => 'message',
		'attachments' => ($__vars['attachmentData'] ? $__vars['attachmentData']['attachments'] : array()),
	), array(
		'rowtype' => 'fullWidth noLabel mergePrev',
		'label' => 'Message',
	)) . '

				' . $__templater->formRow('
					' . $__compilerTemp1 . '
				', array(
	)) . '
			</div>
	
		</div>


		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
		'sticky' => 'true',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('auction/categories/add', $__vars['category'], ), false),
		'ajax' => 'true',
		'class' => 'block',
		'data-xf-init' => 'attachment-manager',
		'draft' => $__templater->func('link', array('classifieds/categories/draft', $__vars['category'], ), false),
		'data-preview-url' => $__templater->func('link', array('auction/categories/listing-preview', $__vars['category'], ), false),
	));
	return $__finalCompiled;
}
);