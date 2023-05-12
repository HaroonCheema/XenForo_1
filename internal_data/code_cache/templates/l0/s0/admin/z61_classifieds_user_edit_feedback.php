<?php
// FROM HASH: 9cb2d1ac28fc42496c6c0c2bce4a86f0
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<hr class="formRowSep" />
' . $__templater->formRow('
    <dl class="pairs pairs--plainLabel">
        <dt>' . 'Total' . '</dt>
        <dd>
            ' . $__templater->formNumberBox(array(
		'name' => 'classifieds_feedback_total',
		'value' => $__vars['user']['ClassifiedsFeedbackInfo']['total'],
	)) . '
            <span class="formRow-hint">' . 'The amount of total feedback received (positive - negative) feedback. Will be overridden when changing positive or negative. Also is changed when feedback for towards user is given.' . '</span>
        </dd>
    </dl>
    <dl class="pairs pairs--plainLabel">
        <dt>' . 'Positive' . '</dt>
        <dd>
            ' . $__templater->formNumberBox(array(
		'name' => 'classifieds_feedback_positive',
		'value' => $__vars['user']['ClassifiedsFeedbackInfo']['positive'],
		'min' => '0',
	)) . '
            <span class="formRow-hint">' . 'The amount of positive feedback the user has received.' . '</span>
        </dd>
    </dl>
    <dl class="pairs pairs--plainLabel">
        <dt>' . 'Negative' . '</dt>
        <dd>
            ' . $__templater->formNumberBox(array(
		'name' => 'classifieds_feedback_negative',
		'value' => $__vars['user']['ClassifiedsFeedbackInfo']['negative'],
		'min' => '0',
	)) . '
            <span class="formRow-hint">' . 'The amount of negative feedback the user has received. This will be subtracted from positive for calculating the total.' . '</span>
        </dd>
    </dl>
', array(
		'label' => 'Feedback score',
	));
	return $__finalCompiled;
}
);