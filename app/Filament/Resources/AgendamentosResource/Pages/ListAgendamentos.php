<?php

namespace App\Filament\Resources\AgendamentosResource\Pages;

use App\Filament\Resources\AgendamentosResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAgendamentos extends ListRecords
{
    protected static string $resource = AgendamentosResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
