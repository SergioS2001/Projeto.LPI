<?php

namespace App\Filament\Resources\CauçõesResource\Pages;

use App\Filament\Resources\CauçõesResource;
use App\Filament\Resources\CauçõesResource\Widgets\CauçõesStatsOverview;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCauções extends ListRecords
{
    protected static string $resource = CauçõesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets() : array
    {
        return[
        CauçõesStatsOverview::class,
        ];
    }
}
