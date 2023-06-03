<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\AgendamentosResource\Pages\CreateAgendamentos;
use App\Models\Agendamentos;
use Carbon\Carbon;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

class CalendarWidget extends FullCalendarWidget
{
    /**
     * Return events that should be rendered statically on calendar.
     */
    public function getViewData(): array
    {
        $agendamentos = Agendamentos::all();

        $events = $agendamentos->map(function ($agendamento) {
            return [
                'id' => $agendamento->id,
                'title' => $agendamento->nome,
                'start' => $agendamento->data,
            ];
        })->toArray();

        return [
            'events' => $events,
        ];
    }

    /**
     * FullCalendar will call this function whenever it needs new event data.
     * This is triggered when the user clicks prev/next or switches views on the calendar.
     */
    public function fetchEvents(array $fetchInfo): array
    {
        $start = $fetchInfo['start'];
        $end = $fetchInfo['end'];

        $agendamentos = Agendamentos::whereBetween('data', [$start, $end])->get();

        $events = $agendamentos->map(function ($agendamento) {
            return [
                'id' => $agendamento->id,
                'title' => $agendamento->nome,
                'start' => $agendamento->data,
                'allDay' => true, // Adjust as per your data
            ];
        })->toArray();

        return $events;
    }
}
