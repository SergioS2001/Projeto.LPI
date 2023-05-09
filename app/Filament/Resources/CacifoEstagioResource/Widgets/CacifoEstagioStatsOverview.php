<?php

namespace App\Filament\Resources\CacifoEstagioResource\Widgets;

use App\Models\Cacifo_Estagio;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class CacifoEstagioStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $countCacifoFardamento = Cacifo_Estagio::where('fardamento', 1)->count();

        return [
            Card::make('Total Cacifos Usados', Cacifo_Estagio::all()->count())
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
