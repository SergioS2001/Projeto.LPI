<?php

namespace App\Filament\Resources\UsersResource\Pages;

use App\Filament\Resources\UsersResource;
use App\Filament\Resources\UsersResource\Widgets\UserStatsOverview;
use App\Filament\widgets\DailyUsersChart;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UsersResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets() : array
    {
        return[
        UserStatsOverview::class,
        DailyUsersChart::class,
        ];
    }

}
