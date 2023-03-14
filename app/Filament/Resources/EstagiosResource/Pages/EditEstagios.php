<?php

namespace App\Filament\Resources\EstagiosResource\Pages;

use App\Filament\Resources\EstagiosResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEstagios extends EditRecord
{
    protected static string $resource = EstagiosResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
