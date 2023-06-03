<?php

namespace App\Filament\Resources\PresençasResource\Pages;

use App\Filament\Resources\PresençasResource;
use App\Filament\Resources\PresençasResource\Widgets\PresençasStatsOverview;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPresenças extends ListRecords
{
    protected static string $resource = PresençasResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets() : array
    {
        return[
        PresençasStatsOverview::class,
        ];
    }

}
