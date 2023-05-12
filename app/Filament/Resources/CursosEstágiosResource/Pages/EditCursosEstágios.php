<?php

namespace App\Filament\Resources\CursosEstágiosResource\Pages;

use App\Filament\Resources\CursosEstágiosResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCursosEstágios extends EditRecord
{
    protected static string $resource = CursosEstágiosResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
