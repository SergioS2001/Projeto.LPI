<?php

namespace App\Filament\Resources\HistóricoAgendamentosResource\Pages;

use App\Filament\Resources\HistóricoAgendamentosResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHistóricoAgendamentos extends ListRecords
{
    protected static string $resource = HistóricoAgendamentosResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
