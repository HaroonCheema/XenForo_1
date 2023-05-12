<?php
// FROM HASH: 34bc67864d78839d7219fc57a75eb3da
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->func('snippet', array($__vars['content']['content'], $__templater->func('max_length', array($__vars['bookmark'], 'message', ), false), array('stripQuote' => true, ), ), true);
	return $__finalCompiled;
}
);