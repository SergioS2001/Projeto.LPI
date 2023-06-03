<?php

namespace App\Filament\Resources\TipologiaResource\Pages;

use App\Filament\Resources\TipologiaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTipologia extends EditRecord
{
    protected static string $resource = TipologiaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
