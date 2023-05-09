<?php

namespace App\Filament\Resources\UnidadesCurricularesResource\Widgets;

use App\Models\Unidade_Curricular;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class UCStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total UC', Unidade_Curricular::all()->count())
            ->description('Número de UC registadas')
            ->color('primary'),
        ];
    }
}
