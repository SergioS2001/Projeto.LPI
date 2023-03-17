<?php

namespace App\Filament\Resources\CacifosResource\Pages;

use App\Filament\Resources\CacifosResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCacifos extends ListRecords
{
    protected static string $resource = CacifosResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
