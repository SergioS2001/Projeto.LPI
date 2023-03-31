<?php

namespace App\Filament\Resources\HistóricoResource\Pages;

use App\Filament\Resources\HistóricoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHistórico extends EditRecord
{
    protected static string $resource = HistóricoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
