<?php

namespace App\Filament\Resources\EstágiosResource\Pages;

use App\Filament\Resources\EstágiosResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEstágios extends ListRecords
{
    protected static string $resource = EstágiosResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
