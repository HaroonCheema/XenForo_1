<?php
// FROM HASH: 35bb9dd55302adca003d6782d6bf9fec
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Set cover image');
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['listing'], 'getBreadcrumbs', array()));
	$__finalCompiled .= '

';
	$__templater->includeCss('attachments.less');
	$__compilerTemp1 = '';
	if ($__templater->isTraversable($__vars['listing']['Attachments'])) {
		foreach ($__vars['listing']['Attachments'] AS $__vars['attachment']) {
			$__compilerTemp1 .= '
					';
			if ($__vars['attachment']['has_thumbnail']) {
				$__compilerTemp1 .= '
						<li class="attachment">
							<div class="attachment-icon attachment-icon--img">
								<a class="avatar NoOverlay" style="border-radius:0;"><img width="48" height="48" border="0" src="' . $__templater->escape($__vars['attachment']['thumbnail_url']) . '" alt="' . $__templater->escape($__vars['attachment']['filename']) . '" /></a>
							</div>
							<div class="attachment-details">
								<span class="attachment-select"><input type="radio" name="attachment_id" value="' . $__templater->escape($__vars['attachment']['attachment_id']) . '" ' . (($__vars['listing']['cover_image_id'] == $__vars['attachment']['attachment_id']) ? 'checked' : '') . ' /></span>
							</div>
						</li>
					';
			}
			$__compilerTemp1 .= '
				';
		}
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . '' . '
			<ul class="attachmentList scSetCoverImage-attachments">
				' . $__compilerTemp1 . '
			</ul>	
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
		'sticky' => 'true',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('classifieds/set-cover-image', $__vars['listing'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);