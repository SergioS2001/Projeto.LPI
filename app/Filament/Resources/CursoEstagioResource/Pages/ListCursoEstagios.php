<?php

namespace App\Filament\Resources\CursoEstagioResource\Pages;

use App\Filament\Resources\CursoEstagioResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCursoEstagios extends ListRecords
{
    protected static string $resource = CursoEstagioResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
