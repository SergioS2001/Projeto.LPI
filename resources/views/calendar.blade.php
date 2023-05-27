<!DOCTYPE html>
<html>
<head>
    <title>Calendário</title>
    
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <style>
    .fc-title {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .fc-event-container .fc-event {
        background-color: lightblue; /* Replace with your desired background color */
        color: white; /* Replace with your desired text color */
    }

    .fc-event-time {
        font-size: 12px;
        font-weight: bold;
        padding: 4px;
        margin-bottom: 4px;
        border-radius: 4px;
    }
</style>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

    <script>
        $(document).ready(function () {
            var events = @json($agendamentos);

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                events: events.map(function (agendamento) {
                    return {
                        title: agendamento.nome,
                        start: agendamento.data + 'T' + agendamento.hora,
                        end: agendamento.data + 'T' + agendamento.hora_fim,
                        description: agendamento.descricao,
                        hora_fim: agendamento.hora_fim
                    };
                }),
                timeFormat: 'HH:mm', // Set the time format to 24-hour (e.g., 15:00),

                eventRender: function (event, element) {
    var start = event.start;
    var end = event.end;

    // Calculate the duration in hours
    var duration = moment.duration(end.diff(start));
    var hours = duration.asHours();

    // Set the height of the event box based on the duration
    var height = hours * 50; // Adjust the height value as needed

    // Set the height and other styles of the event container
    element.css({
        height: height + 'px',
        backgroundColor: '#007bff', // Set your desired background color here
        color: '#fff', // Set the text color
        borderRadius: '4px', // Set the border radius
        padding: '4px', // Set the padding
        marginBottom: '4px' // Set the margin
    });

    // Format the start and end times
    var startFormatted = start.format('HH:mm');
    var endFormatted = end.format('HH:mm');

    // Create a new element to display the event time on the event container
    var eventTimeElement = $('<div class="fc-event-time">' + startFormatted + ' - ' + endFormatted + '</div>');

    // Create a new element to display the event title (agendamento.nome) on the event container
    var eventTitleElement = $('<div class="fc-title">' + event.title + '</div>');

    // Empty the event element and append the event time and event title elements
    element.empty().append(eventTimeElement).append(eventTitleElement);
}







            });
        });
    </script>
</head>
<body>
    <div id="calendar"></div>
</body>
</html>
