<?php
// FROM HASH: dca0df85f7f64936e9e115bbb96af6a4
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<div style="width:100%;">
' . $__templater->form('
		<div class="message-inner">
			<div class="message-cell message-cell--main">
				' . $__templater->formTextArea(array(
		'name' => 'message',
		'autosize' => 'true',
		'rows' => '1',
		'value' => $__vars['post']['message'],
		'maxlength' => $__vars['xf']['options']['profilePostMaxLength'],
		'placeholder' => 'Post a comment' . '...',
		'class' => (($__vars['style'] == 'full') ? 'input--avatarSizeS' : '') . ' js-editor',
		'data-xf-init' => 'focus-trigger user-mentioner',
		'data-display' => '< :next',
	)) . '
				<br />
				' . $__templater->button('save', array(
		'type' => 'submit',
		'class' => 'button--primary',
	), '', array(
	)) . '
				' . $__templater->button('Cancel', array(
		'class' => 'js-cancelButton',
	), '', array(
	)) . '
			</div>
		</div>

	' . '
	' . $__templater->formHiddenVal('last_date', $__vars['lastDate'], array(
	)) . '
	' . $__templater->formHiddenVal('post', $__vars['post']['comment_id'], array(
	)) . '
	' . $__templater->formHiddenVal('p', $__vars['position'], array(
	)) . '
	' . $__templater->formHiddenVal('style', $__vars['style'], array(
	)) . '
	' . $__templater->formHiddenVal('groupid', $__vars['group']['groupid'], array(
	)) . '
	' . $__templater->formHiddenVal('context', $__vars['context'], array(
	)) . '
', array(
		'action' => $__templater->func('link', array('group_photos/editcomment', $__vars['group'], array('photo_id' => $__vars['photo']['photo_id'], ), ), false),
		'ajax' => 'true',
		'class' => 'message message--simple',
		'data-xf-init' => 'quick-reply',
		'data-message-container' => 'js-replyNewMessageContainer',
		'data-ascending' => '0',
	)) . '
</div>';
	return $__finalCompiled;
}
);