<?php

namespace App\Filament\Resources\CacifosEstágiosResource\Pages;

use App\Filament\Resources\CacifosEstágiosResource;
use App\Filament\Resources\CacifosEstágiosResource\Widgets\CacifosEstágiosStatsOverview;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCacifosEstágios extends ListRecords
{
    protected static string $resource = CacifosEstágiosResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getHeaderWidgets() : array
    {
        return[
            CacifosEstágiosStatsOverview::class,
        ];
    }
}
