<?php

namespace App\Filament\Resources\TipologiaResource\Pages;

use App\Filament\Resources\TipologiaResource;
use App\Filament\Resources\TipologiaResource\Widgets\TipologiasStatsOverview;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTipologias extends ListRecords
{
    protected static string $resource = TipologiaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getHeaderWidgets() : array
    {
        return[
        TipologiasStatsOverview::class,
        ];
    }
}
