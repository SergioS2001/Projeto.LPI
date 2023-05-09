<?php

namespace App\Filament\Resources\ServiçosResource\Widgets;

use App\Models\Serviços;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class ServiçosStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Serviços', Serviços::all()->count())
            ->description('Número de Serviços registados')
            ->color('primary'),
        ];
    }
}
