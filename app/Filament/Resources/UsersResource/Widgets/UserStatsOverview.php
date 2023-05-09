<?php

namespace App\Filament\Resources\UsersResource\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class UserStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $countExternos = User::where('isExterno', true)->count();
        return [
            Card::make('Total users', User::all()->count())
            ->description('Número de utilizadores registados')
            ->descriptionIcon('heroicon-s-user-group')
            ->color('primary'),
            Card::make('Total Externos', $countExternos)
            ->description('Número de alunos externos')
            ->descriptionIcon('heroicon-s-user-circle')
            ->color('success'),
        ];
    }
}
