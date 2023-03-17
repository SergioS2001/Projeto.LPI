<?php

namespace App\Filament\Resources\AvaliaçõesResource\Pages;

use App\Filament\Resources\AvaliaçõesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAvaliações extends EditRecord
{
    protected static string $resource = AvaliaçõesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
