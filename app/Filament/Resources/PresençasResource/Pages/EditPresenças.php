<?php

namespace App\Filament\Resources\PresençasResource\Pages;

use App\Filament\Resources\PresençasResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPresenças extends EditRecord
{
    protected static string $resource = PresençasResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
