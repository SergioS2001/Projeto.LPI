<?php

namespace App\Filament\Resources\HistoricoResource\Pages;

use App\Filament\Resources\HistoricoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHistorico extends EditRecord
{
    protected static string $resource = HistoricoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
