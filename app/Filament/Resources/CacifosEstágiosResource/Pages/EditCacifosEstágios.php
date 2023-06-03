<?php

namespace App\Filament\Resources\CacifosEstágiosResource\Pages;

use App\Filament\Resources\CacifosEstágiosResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCacifosEstágios extends EditRecord
{
    protected static string $resource = CacifosEstágiosResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
