<?php

namespace App\Filament\Resources\ContactosEmergênciaResource\Pages;

use App\Filament\Resources\ContactosEmergênciaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContactosEmergência extends EditRecord
{
    protected static string $resource = ContactosEmergênciaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
