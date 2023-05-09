<?php

namespace App\Filament\Resources\CursoEstagioResource\Widgets;

use App\Models\Curso_Aluno;
use App\Models\Curso_Estagio;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class CursoEstagioStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Cursos', Curso_Estagio::all()->count())
            ->description('Número de Cursos registados')
            ->descriptionIcon('heroicon-o-academic-cap')
            ->color('primary'),
        ];
    }
}
