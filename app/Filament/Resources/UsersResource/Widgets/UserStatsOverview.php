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
        $countAdmin = User::where('isAdmin', true)->count();

        return [
            Card::make('Total users', User::all()->count())
            ->description('Número de utilizadores registados')
            ->descriptionIcon('heroicon-o-user-group')
            ->color('primary'),
            Card::make('Total Externos', $countExternos)
            ->description('Número de alunos externos')
            ->descriptionIcon('heroicon-o-user-circle')
            ->color('success'),
            Card::make('Total Admins', $countAdmin)
            ->description('Número de administradores')
            ->descriptionIcon('heroicon-o-users')
            ->color('success'),
        ];
    }
}
