<?php
// FROM HASH: 59e2e2892c7e7c5d411539c251ca1426
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__vars['auctionLink'] = $__templater->preEscaped($__templater->func('link', array(((('auction/' . $__vars['auction']['category_id']) . '/') . $__vars['auction']['auction_id']) . '/view-auction', ), true));
	$__finalCompiled .= '

<mail:subject>
	' . 'Bid on auction: ' . $__templater->escape($__vars['auction']['title']) . '' . '
</mail:subject>

	' . '<br>
Hello,
<br><br>
Your auction <a href="' . $__templater->escape($__vars['auctionLink']) . '"> ' . $__templater->escape($__vars['auction']['title']) . '</a> get new bid from user: ' . $__templater->func('username_link', array($__vars['auction']['User'], false, array('defaultname' => $__vars['auction']['User']['username'], ), ), true) . '.
<br><br>
Thankyou...!
<br><br>' . '


<table cellpadding="10" cellspacing="0" border="0" width="100%" class="linkBar">
	<tr>
		<td>
			<a href="' . $__templater->escape($__vars['auctionLink']) . '" class="button">' . 'Visit auction' . '</a>
		</td>
	</tr>
</table>';
	return $__finalCompiled;
}
);