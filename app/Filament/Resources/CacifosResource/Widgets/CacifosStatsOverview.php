<?php

namespace App\Filament\Resources\CacifosResource\Widgets;

use App\Models\Cacifos;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class CacifosStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $countChavePartilhada = Cacifos::where('chave_partilhada', 1)->count();

        return [
            Card::make('Total Cacifos', Cacifos::all()->count())
            ->description('Número de cacifos registados')
            ->color('primary'),
            Card::make('Cacifos Chave Partilhada', $countChavePartilhada)
            ->description('Número de cacifos com chave partihada')
            ->descriptionIcon('heroicon-o-key')
            ->color('primary'),
        ];
    }
}
