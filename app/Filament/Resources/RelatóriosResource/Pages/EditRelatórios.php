<?php

namespace App\Filament\Resources\RelatóriosResource\Pages;

use App\Filament\Resources\RelatóriosResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRelatórios extends EditRecord
{
    protected static string $resource = RelatóriosResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
