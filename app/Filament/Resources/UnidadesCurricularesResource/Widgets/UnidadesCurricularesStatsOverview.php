<?php

namespace App\Filament\Resources\UnidadesCurricularesResource\Widgets;

use App\Models\Unidades_Curriculares;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class UnidadesCurricularesStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total UC', Unidades_Curriculares::all()->count())
            ->description('Número de UC registadas')
            ->descriptionIcon('heroicon-o-academic-cap')
            ->color('primary'),
        ];
    }
}
