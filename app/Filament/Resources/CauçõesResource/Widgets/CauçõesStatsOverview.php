<?php

namespace App\Filament\Resources\CauçõesResource\Widgets;

use App\Models\Cauções;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class CauçõesStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $countPagamentos = Cauções::where('isPago',1)->count();
        $countReembolso = Cauções::where('isDevolvido',1)->count();
        $countAssinatura = Cauções::where('isAssinadoAluno',1)->count();

        return [
            Card::make('Total Pagamentos', $countPagamentos)
            ->description('Número de pagamentos de caução efetuados')
            ->descriptionIcon('heroicon-o-currency-euro')
            ->color('success'),
            Card::make('Total Reembolsos', $countReembolso)
            ->description('Número de reembolsos de caução efetuados')
            ->descriptionIcon('heroicon-o-currency-euro')
            ->color('success'),
            Card::make('Total Assinaturas', $countReembolso)
            ->description('Número de papeis assinados pelos alunos')
            ->descriptionIcon('heroicon-o-pencil')
            ->color('primary'),
        ];
    }
}
