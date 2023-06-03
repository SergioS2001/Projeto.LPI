<?php

namespace App\Filament\Resources\CursosEstágiosResource\Pages;

use App\Filament\Resources\CursosEstágiosResource;
use App\Filament\Resources\CursosEstágiosResource\Widgets\CursosEstágiosStatsOverview ;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCursosEstágios extends ListRecords
{
    protected static string $resource = CursosEstágiosResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getHeaderWidgets() : array
    {
        return[
            CursosEstágiosStatsOverview  ::class,
        ];
    }
}
