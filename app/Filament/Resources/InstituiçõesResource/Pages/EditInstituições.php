<?php

namespace App\Filament\Resources\InstituiçõesResource\Pages;

use App\Filament\Resources\InstituiçõesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInstituições extends EditRecord
{
    protected static string $resource = InstituiçõesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
