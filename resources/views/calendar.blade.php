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
                        end: moment(agendamento.data + 'T' + agendamento.hora).add(
                            agendamento.duracao,
                            'minutes'
                        ),
                        description: agendamento.descricao
                    };
                }),
                timeFormat: 'HH:mm', // Set the time format to 24-hour (e.g., 15:00),
                eventRender: function (event, element) {
                    element.find('.fc-title').text(event.title); // Set the full event title as the text content
                }
            });
        });
    </script>
</head>
<body>
    <div id="calendar"></div>
</body>
</html>
