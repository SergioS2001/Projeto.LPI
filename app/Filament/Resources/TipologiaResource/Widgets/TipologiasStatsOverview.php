<?php

namespace App\Filament\Resources\TipologiaResource\Widgets;

use App\Models\Tipologia_Estágio;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class TipologiasStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Tipologias', Tipologia_Estágio::all()->count())
            ->description('Número de Tipologias registadas')
            ->color('primary'),
        ];
    }
}
