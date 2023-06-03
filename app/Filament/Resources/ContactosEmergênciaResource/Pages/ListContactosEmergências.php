<?php

namespace App\Filament\Resources\ContactosEmergênciaResource\Pages;

use App\Filament\Resources\ContactosEmergênciaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContactosEmergências extends ListRecords
{
    protected static string $resource = ContactosEmergênciaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
