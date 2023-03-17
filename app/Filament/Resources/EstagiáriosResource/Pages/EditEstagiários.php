<?php

namespace App\Filament\Resources\EstagiáriosResource\Pages;

use App\Filament\Resources\EstagiáriosResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEstagiários extends EditRecord
{
    protected static string $resource = EstagiáriosResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
