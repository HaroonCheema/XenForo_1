<?php
// FROM HASH: d2947730a9fd41f30f499e79837c8b69
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<script>
		$(document).ready(function() {
			
		$(\'#calendar\').fullCalendar({
			header: {
				left: \'prev,next today\',
				center: \'title\',
				right: \'listMonth,month,agendaWeek,agendaDay\'
			},
			buttonText: {
				today:    \'' . 'Today' . '\',
    			month:    \'' . 'Month' . '\',
    			week:     \'' . 'Week' . '\',
    			day:      \'' . 'Day' . '\',
    			list:     \'' . 'List' . '\'
			},
			noEventsMessage: \'' . $__templater->filter('No events to display', array(array('escape', array('js', )),), true) . '\',
			// See http://momentjs.com/docs/#/displaying/format/ for date and time formatting
			//listDayFormat: "MMMM D, YYYY",
			//timeFormat: "h:mm A",
			allDayText: \'' . 'All day' . '\',
			monthNames: [\'' . 'January' . '\', \'' . 'February' . '\', \'' . 'March' . '\', \'' . 'April' . '\', \'' . 'May' . '\', \'' . 'June' . '\', \'' . 'July' . '\', \'' . 'August' . '\', \'' . 'September' . '\', \'' . 'October' . '\', \'' . 'November' . '\', \'' . 'December' . '\'],
			monthNamesShort: [\'' . 'Jan' . '\', \'' . 'Feb' . '\', \'' . 'Mar' . '\', \'' . 'Apr' . '\', \'' . 'May' . '\', \'' . 'Jun' . '\', \'' . 'Jul' . '\', \'' . 'Aug' . '\', \'' . 'Sep' . '\', \'' . 'Oct' . '\', \'' . 'Nov' . '\', \'' . 'Dec' . '\'],
			dayNames: [\'' . 'Sunday' . '\', \'' . 'Monday' . '\', \'' . 'Tuesday' . '\', \'' . 'Wednesday' . '\', \'' . 'Thursday' . '\', \'' . 'Friday' . '\', \'' . 'Saturday' . '\'],
			dayNamesShort: [\'' . 'Sun' . '\', \'' . 'Mon' . '\', \'' . 'Tue' . '\', \'' . 'Wed' . '\', \'' . 'Thu' . '\', \'' . 'Fri' . '\', \'' . 'Sat' . '\'],
			navLinks: true, // can click day/week names to navigate views
			selectable: false,
			selectHelper: false,
			editable: true,
			//firstDay: 0, // 0=Sun, 1=Mon, 2=Tue, 3=Wed, 4=Thu, 5=Fri, 6=Sat
			nextDayThreshold: \'00:00:00\',
			eventLimit: true, // allow "more" link when too many events
			events:  "' . $__templater->func('link', array('group_events/eventfeed', $__vars['group'], ), true) . '",
			
			eventClick: function(event) {
     		   if (event.url) {
            		event.url;
        		}
    		},
			
			eventDrop: function(event, delta) {
				var view = $(\'#calendar\').fullCalendar(\'getView\');
				start = event.start.format("YYYY-MM-DD HH:mm:ss");
			
				if((event.allDay))
				{
					allday = 1;
				}else{
					allday = 0;
				}
				
				if((event.end))
				{
					end = event.end.format("YYYY-MM-DD HH:mm:ss");	
				}else{
					end = event.start.format("YYYY-MM-DD HH:mm:ss");	
				}
			
				$.ajax({
					url: "' . $__templater->func('link', array('group_events/update', $__vars['group'], ), true) . '",
					data: \'view=\'+ view.name+\'&title=\'+ event.title+\'&start=\'+ start+\'&end=\'+ end+\'&allday=\'+ allday+\'&id=\'+ event.id+\'&_xfToken=' . $__templater->filter($__templater->func('csrf_token', array(), false), array(array('escape', array('js', )),), true) . '\',
					type: "POST",
				});
			},
			
			eventResize: function(event) {
				var view = $(\'#calendar\').fullCalendar(\'getView\');
				allDay = event.allDay;
				start = event.start.format("YYYY-MM-DD HH:mm:ss");
			
				if((event.end))
				{
					end = event.end.format("YYYY-MM-DD HH:mm:ss");	
				}else{
					end = event.start.format("YYYY-MM-DD HH:mm:ss");	
				}

				$.ajax({
					url: "' . $__templater->func('link', array('group_events/update', $__vars['group'], ), true) . '",
					data: \'view=\'+ view.name+\'&title=\'+ event.title+\'&start=\'+ start+\'&end=\'+ end+\'&allday\'+ allDay+\'&id=\'+ event.id+\'&_xfToken=' . $__templater->filter($__templater->func('csrf_token', array(), false), array(array('escape', array('js', )),), true) . '\',
					type: "POST",
				});
			},
		});
	});
</script>';
	return $__finalCompiled;
}
);