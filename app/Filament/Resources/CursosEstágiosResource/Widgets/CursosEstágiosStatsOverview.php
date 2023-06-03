<?php

namespace App\Filament\Resources\CursosEstágiosResource\Widgets;

use App\Models\Cursos_Estágios;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class CursosEstágiosStatsOverview  extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Cursos', Cursos_Estágios::all()->count())
            ->description('Número de Cursos registados')
            ->descriptionIcon('heroicon-o-academic-cap')
            ->color('primary'),
        ];
    }
}
