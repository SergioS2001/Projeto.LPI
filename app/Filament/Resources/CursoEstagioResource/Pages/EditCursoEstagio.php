<?php

namespace App\Filament\Resources\CursoEstagioResource\Pages;

use App\Filament\Resources\CursoEstagioResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCursoEstagio extends EditRecord
{
    protected static string $resource = CursoEstagioResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
