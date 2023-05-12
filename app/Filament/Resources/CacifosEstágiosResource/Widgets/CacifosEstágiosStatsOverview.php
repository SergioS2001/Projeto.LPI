<?php

namespace App\Filament\Resources\CacifosEstágiosResource\Widgets;

use App\Models\Cacifos_Estágios;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class CacifosEstágiosStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $countCacifoFardamento = Cacifos_Estágios::where('fardamento', 1)->count();

        return [
            Card::make('Total Cacifos Usados', Cacifos_Estágios::all()->count())
            ->description('Número de cacifos usados por alunos em estágio')
            ->descriptionIcon('heroicon-o-lock-closed')
            ->color('primary'),
            Card::make('Estágios com Fardamento', $countCacifoFardamento)
            ->description('Número de estágios que necessitam de cacifo para fardamento')
            ->descriptionIcon('heroicon-o-lock-closed')
            ->color('primary'),
        ];
    }
}
