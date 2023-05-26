<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Agendamentos;
use Illuminate\Support\Carbon;

class CalendarController extends Controller
{
    public function getEvents()
{
    $agendamentos = Agendamentos::all();

    $events = [];

    foreach ($agendamentos as $agendamento) {
        $event = [
            'id' => $agendamento->id,
            'title' => $agendamento->nome,
            'start' => $agendamento->data . 'T' . $agendamento->hora,
            'end' => $this->calculateEndTime($agendamento->data, $agendamento->hora, $agendamento->duracao),
            'description' => $agendamento->descricao,
        ];

        $events[] = $event;
    }

    return response()->json($events);
}

private function calculateEndTime($date, $startTime, $duration)
{
    $start = Carbon::parse($date . ' ' . $startTime);
    $end = $start->copy()->addHours($duration);

    return $end->format('Y-m-d\TH:i:s');
}
}
?>