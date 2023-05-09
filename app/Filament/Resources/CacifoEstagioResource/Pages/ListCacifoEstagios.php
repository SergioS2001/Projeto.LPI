<?php

namespace App\Filament\Resources\CacifoEstagioResource\Pages;

use App\Filament\Resources\CacifoEstagioResource;
use App\Filament\Resources\CacifoEstagioResource\Widgets\CacifoEstagioStatsOverview;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCacifoEstagios extends ListRecords
{
    protected static string $resource = CacifoEstagioResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets() : array
    {
        return[
        CacifoEstagioStatsOverview::class,
        ];
    }
}
