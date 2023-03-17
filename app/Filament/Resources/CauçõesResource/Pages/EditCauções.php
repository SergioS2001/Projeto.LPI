<?php

namespace App\Filament\Resources\CauçõesResource\Pages;

use App\Filament\Resources\CauçõesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCauções extends EditRecord
{
    protected static string $resource = CauçõesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
