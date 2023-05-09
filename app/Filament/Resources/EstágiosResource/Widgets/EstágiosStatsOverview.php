<?php

namespace App\Filament\Resources\EstágiosResource\Widgets;

use App\Models\Estágios;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class EstágiosStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $countSolicitados = Estágios::where('estado_estagio_id', 2)->count();
        $countWaiting = Estágios::where('estado_estagio_id', 3)->count();
        $countAprovados = Estágios::where('estado_estagio_id', 4)->count();
        $countInstituicao = Estágios::distinct('instituição_estagio_id')->count('instituição_estagio_id');

        return [
            Card::make('Total Estágios', Estágios::all()->count())
            ->description('Número de Estágios criados')
            ->descriptionIcon('heroicon-o-briefcase')
            ->color('primary'),
            Card::make('Estágios Solicitados', $countSolicitados)
            ->description('Número de Estágios Solicitados')
            ->descriptionIcon('heroicon-o-briefcase')
            ->color('primary'),
            Card::make('Estágios Waiting-reply', $countWaiting)
            ->description('Número de Estágios já solicitados, aguardando resposta da direção')
            ->color('primary'),
            Card::make('Estágios Aprovados', $countAprovados)
            ->description('Número de Estágios aprovados pela direção')
            ->color('primary'),
            Card::make('Total Instituições', $countInstituicao)
            ->description('Número de diferentes Instituições representadas')
            ->color('primary'),
        ];
    }
}
