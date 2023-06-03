<?php

namespace App\Filament\Resources\PresençasResource\Widgets;

use App\Models\Estágios;
use App\Models\Presenças;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class PresençasStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $countvalidadas = Presenças::where('isValidated', 1)->count();

        return [
            Card::make('Total Presenças Registadas', Presenças::all()->count())
            ->description('Número de Presenças Registadas')
            ->descriptionIcon('heroicon-o-briefcase')
            ->color('primary'),
            Card::make('Presenças Validadas', $countvalidadas)
            ->description('Número de presenças validadas pelos orientadores')
            ->color('primary'),
        ];
    }
}
