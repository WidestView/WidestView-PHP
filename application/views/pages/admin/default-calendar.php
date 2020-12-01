<link rel="stylesheet" href="/resources/node_modules/fullcalendar/main.css"/>
<script src="/resources/node_modules/fullcalendar/main.js"></script>
<div id='calendar'></div>
<script>

    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth'
    });
    calendar.render();
    });

</script>
