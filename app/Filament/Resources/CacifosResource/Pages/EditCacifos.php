<?php

namespace App\Filament\Resources\CacifosResource\Pages;

use App\Filament\Resources\CacifosResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCacifos extends EditRecord
{
    protected static string $resource = CacifosResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
