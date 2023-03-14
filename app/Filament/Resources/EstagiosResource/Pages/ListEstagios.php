<?php

namespace App\Filament\Resources\EstagiosResource\Pages;

use App\Filament\Resources\EstagiosResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEstagios extends ListRecords
{
    protected static string $resource = EstagiosResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
