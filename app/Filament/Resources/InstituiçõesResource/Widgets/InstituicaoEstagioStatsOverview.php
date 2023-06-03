<?php

namespace App\Filament\Resources\InstituiçõesResource\Widgets;

use App\Models\Instituição_Estágio;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class InstituicaoEstagioStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Instituições', Instituição_Estágio::all()->count())
            ->description('Número de diferentes Instituições registadas')
            ->descriptionIcon('heroicon-o-academic-cap')
            ->color('primary'),
        ];
    }
}
