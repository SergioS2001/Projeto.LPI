<?php

namespace App\Filament\Resources\OrientadoresResource\Pages;

use App\Filament\Resources\OrientadoresResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrientadores extends EditRecord
{
    protected static string $resource = OrientadoresResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
