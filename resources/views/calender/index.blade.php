@extends('layout.app')

@section('content')


    <div style="width: 70%;margin: auto;margin-top: 40px;">
        <div id='calendar'></div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/google-calendar@6.1.6/index.global.min.js"></script>

<script src="cal/config.js"></script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'ja',
            events: {
              googleCalendarId: 'aa35df81b4505f773afb3b967fb2293af3b9c1cca4c47495a8c8d49255cbbbe1@group.calendar.google.com',
            }, 
            googleCalendarApiKey: 'AIzaSyCICV1N6YwyWJsoZ1xcvbCwSz7pRK_xSOg',
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
                buttonText: {
                  today: '今月',
                  month: '月',
                  list: 'リスト',
                  week: '週',
                  day: '日',
                },
                eventSources: [
                  {
                url: '/events',
                  },
               ],
            eventDisplay: 'block',


            // eventMouseEnter(info) {
            //     $(info.el).popover({
            //         title: info.event.title,
            //         content: info.event.extendedProps.description,
            //         trigger: 'hover',
            //         placement: 'top',
            //         container: 'body',
            //         html: true
            //     });
            // }
        });
        calendar.render();
    });
</script>


@endsection