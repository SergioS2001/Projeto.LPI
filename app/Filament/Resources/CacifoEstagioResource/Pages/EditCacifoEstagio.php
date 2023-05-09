<?php

namespace App\Filament\Resources\CacifoEstagioResource\Pages;

use App\Filament\Resources\CacifoEstagioResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCacifoEstagio extends EditRecord
{
    protected static string $resource = CacifoEstagioResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
