<?php

namespace App\Filament\Resources\HistóricoAgendamentosResource\Pages;

use App\Filament\Resources\HistóricoAgendamentosResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHistóricoAgendamentos extends EditRecord
{
    protected static string $resource = HistóricoAgendamentosResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
