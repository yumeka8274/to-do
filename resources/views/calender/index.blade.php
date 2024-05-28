@extends('layout.app')

@section('content')


    <div style="width: 70%;margin: auto;margin-top: 40px;">
        <div id='calendar'></div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: '/events', 
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                eventTimeFormat: { 
                    hour: '2-digit',
                    minute: '2-digit',
                    meridiem: false 
                },
                eventDisplay: 'block'
                
        });
        calendar.render();


       
    });
</script>


@endsection