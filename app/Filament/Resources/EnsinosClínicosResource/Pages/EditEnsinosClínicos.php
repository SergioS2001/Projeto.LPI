<?php

namespace App\Filament\Resources\EnsinosClínicosResource\Pages;

use App\Filament\Resources\EnsinosClínicosResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEnsinosClínicos extends EditRecord
{
    protected static string $resource = EnsinosClínicosResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
