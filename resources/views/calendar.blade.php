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

        .fc-event {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .fc-event-time {
            font-size: 12px;
            font-weight: bold;
            color: #fff;
            background-color: #007bff;
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
    var duration = moment.duration(moment(event.end).diff(moment(event.start)));
    var minutes = duration.asMinutes();

    // Calculate the height based on the duration (assuming 30 minutes per height unit)
    var height = minutes / 30;

    // Set the height of the event box
    element.css('height', height + 'em');

    // Format the event start and end times
    var startFormatted = event.start.format('HH:mm');
    var endFormatted = moment(event.end).format('HH:mm');

    // Add the event time label with formatted start and end times
    element.append('<div class="fc-event-time">' + startFormatted + ' - ' + endFormatted + '</div>');

    // Set the full event title as the text content
    element.find('.fc-title').text(event.title);
}

            });
        });
    </script>
</head>
<body>
    <div id="calendar"></div>
</body>
</html>
